<?php

namespace App\Jobs;

use App\Constants\PaymentStatus;
use App\Models\PaymentTransaction;
use App\Services\Admin\DashboardService;
use App\Services\API\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessPaymentWebhook implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $uniqueFor = 300;

    public function __construct(
        public string $gatewayName,
        public ?string $orderId,
        public ?string $paymentId,
        public string $status,
        public ?string $errorMessage = null,
    ) {}

    /**
     * Unique id so the same webhook (order_id + payment_id) is not processed twice.
     */
    public function uniqueId(): string
    {
        return 'payment_webhook:' . $this->gatewayName . ':' . ($this->orderId ?? '') . ':' . ($this->paymentId ?? '');
    }

    public function handle(PaymentService $paymentService): void
    {
        $transaction = PaymentTransaction::where('gateway_order_id', $this->orderId)
            ->orWhere('gateway_payment_id', $this->paymentId)
            ->first();

        if (!$transaction) {
            Log::warning('[ProcessPaymentWebhook] Transaction not found', [
                'gateway' => $this->gatewayName,
                'order_id' => $this->orderId,
                'payment_id' => $this->paymentId,
            ]);
            return;
        }

        if ($this->status === 'captured' || $this->status === 'success') {
            $ok = $paymentService->processSuccessfulPayment($transaction);
        }

        // Invalidate dashboard cache so stats reflect new payment/subscription state
        app(DashboardService::class)->clearCache();
    }
}
