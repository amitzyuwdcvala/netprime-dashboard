<?php

namespace Database\Seeders;

use App\Constants\SubscriptionStatus;
use App\Models\PaymentGateway;
use App\Models\PaymentTransaction;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportLegacyUsersSeeder extends Seeder
{
    /** Production plan IDs — for client reference */
    protected const PLAN_MONTHLY = '019e9d69-7eab-7377-b3ee-9f98b3e6dccb';
    protected const PLAN_3_MONTH = '019e9d69-7eb2-73a1-b3f0-b5d580465fd1';
    protected const PLAN_6_MONTH = '019e9d69-7eb8-70f4-a983-f70b58795bd3';
    protected const PLAN_YEARLY = '019e9d69-7eba-7291-8ea7-17362e57249d';

    /**
     * DELETE dummy examples below and paste real client data.
     * All dates must be dd-mm-yyyy HH:mm:ss
     */
    protected array $users = [
        [
            'android_id' => '11e51731ad7fc852',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '14-05-2026 19:19:26',
            'end_date' => '13-06-2026 19:19:26',
            'subscription_status' => 'active',
            'joined_at' => '14-05-2026 19:19:26',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SpGZUzg9GeGCBr',
            'gateway_payment_id' => 'pay_SpGZUzg9GeGCBr',
            'notes' => 'paid',
        ],
        [
            'android_id' => '186f34341c023320',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '01-01-2026 12:00:00',
            'end_date' => '01-01-2027 12:00:00',
            'subscription_status' => 'active',
            'joined_at' => '01-01-2026 12:00:00',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_QvdxaeJo1jXnxZ',
            'gateway_payment_id' => 'pay_QvdxaeJo1jXnxZ',
            'notes' => 'paid',
        ],
        [
            'android_id' => '3126ea9ef993e7a7',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '16-05-2026 00:06:52',
            'end_date' => '15-06-2026 00:06:52',
            'subscription_status' => 'active',
            'joined_at' => '16-05-2026 00:06:52',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_Spk057ZVqfT5fU',
            'gateway_payment_id' => 'pay_Spk057ZVqfT5fU',
            'notes' => 'paid',
        ],
        [
            'android_id' => '3370b2ef239f838c',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '21-07-2025 15:13:27',
            'end_date' => '21-07-2026 15:13:27',
            'subscription_status' => 'active',
            'joined_at' => '21-07-2025 15:13:27',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_QvpQmdvGGxOav2',
            'gateway_payment_id' => 'pay_QvpQmdvGGxOav2',
            'notes' => 'paid',
        ],
        [
            'android_id' => '36f813bdd285cda4',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '02-05-2026 08:50:10',
            'end_date' => '29-10-2026 08:50:10',
            'subscription_status' => 'active',
            'joined_at' => '02-05-2026 08:50:10',
            'video_click_count' => 1,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SkLRaqWA6BwLSf',
            'gateway_payment_id' => 'pay_SkLRaqWA6BwLSf',
            'notes' => 'paid',
        ],
        [
            'android_id' => '3d2182ee9c1ca7b2',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '16-01-2026 10:58:14',
            'end_date' => '15-07-2026 10:58:14',
            'subscription_status' => 'active',
            'joined_at' => '16-01-2026 10:58:14',
            'video_click_count' => 5,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_S4QziloOlILmRZ',
            'gateway_payment_id' => 'pay_S4QziloOlILmRZ',
            'notes' => 'paid',
        ],
        [
            'android_id' => '4042627e96abbd05',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '03-06-2026 10:07:10',
            'end_date' => '03-07-2026 10:07:10',
            'subscription_status' => 'active',
            'joined_at' => '03-06-2026 10:07:10',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_Sx1qRmny2IMaNP',
            'gateway_payment_id' => 'pay_Sx1qRmny2IMaNP',
            'notes' => 'paid',
        ],
        [
            'android_id' => '4376313a3d2dd64e',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '27-05-2026 22:44:55',
            'end_date' => '26-06-2026 22:44:55',
            'subscription_status' => 'active',
            'joined_at' => '27-05-2026 22:44:55',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SuT0xfO9YfdFRZ',
            'gateway_payment_id' => 'pay_SuT0xfO9YfdFRZ',
            'notes' => 'paid',
        ],
        [
            'android_id' => '43df367330839098',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '01-01-2026 12:00:00',
            'end_date' => '01-01-2027 12:00:00',
            'subscription_status' => 'active',
            'joined_at' => '01-01-2026 12:00:00',
            'video_click_count' => 2,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => '"pay_QvdxaeJo1jXnxZ"',
            'gateway_payment_id' => '"pay_QvdxaeJo1jXnxZ"',
            'notes' => 'paid',
        ],
        [
            'android_id' => '4931c4ff69904a2d',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '26-05-2026 23:53:47',
            'end_date' => '25-06-2026 23:53:47',
            'subscription_status' => 'active',
            'joined_at' => '26-05-2026 23:53:47',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_Su5erL6iuSeA3Y',
            'gateway_payment_id' => 'pay_Su5erL6iuSeA3Y',
            'notes' => 'paid',
        ],
        [
            'android_id' => '4d10609359a97181',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '11-04-2026 17:08:27',
            'end_date' => '08-10-2026 17:08:27',
            'subscription_status' => 'active',
            'joined_at' => '11-04-2026 17:08:27',
            'video_click_count' => 5,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_ScAiLdieyVEw8q',
            'gateway_payment_id' => 'pay_ScAiLdieyVEw8q',
            'notes' => 'paid',
        ],
        [
            'android_id' => '501d9af12fe81a77',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '16-03-2026 14:25:41',
            'end_date' => '12-09-2026 14:25:41',
            'subscription_status' => 'active',
            'joined_at' => '16-03-2026 14:25:41',
            'video_click_count' => 5,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SRq31EJUZeUyR5',
            'gateway_payment_id' => 'pay_SRq31EJUZeUyR5',
            'notes' => 'paid',
        ],
        [
            'android_id' => '6b73078a7f46fec7',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '23-07-2025 15:41:27',
            'end_date' => '23-07-2026 15:41:27',
            'subscription_status' => 'active',
            'joined_at' => '23-07-2025 15:41:27',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_QwTGpaHDdNqgy0',
            'gateway_payment_id' => 'pay_QwTGpaHDdNqgy0',
            'notes' => 'paid',
        ],
        [
            'android_id' => '6baef2a096dd6c36',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '01-02-2026 13:11:17',
            'end_date' => '31-07-2026 13:11:17',
            'subscription_status' => 'active',
            'joined_at' => '01-02-2026 13:11:17',
            'video_click_count' => 5,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SAnoMGEG7eIlUp',
            'gateway_payment_id' => 'pay_SAnoMGEG7eIlUp',
            'notes' => 'paid',
        ],
        [
            'android_id' => '6d70659bca8f661f',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '01-01-2026 09:50:14',
            'end_date' => '01-01-2027 09:50:14',
            'subscription_status' => 'active',
            'joined_at' => '01-01-2026 09:50:14',
            'video_click_count' => 1,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_RyTpK3fcCL8csB',
            'gateway_payment_id' => 'pay_RyTpK3fcCL8csB',
            'notes' => 'paid',
        ],
        [
            'android_id' => '6e95c1ac67c2550f',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '31-12-2025 22:59:44',
            'end_date' => '31-12-2026 22:59:44',
            'subscription_status' => 'active',
            'joined_at' => '31-12-2025 22:59:44',
            'video_click_count' => 1,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_RyIkKrz7AFdfJ2',
            'gateway_payment_id' => 'pay_RyIkKrz7AFdfJ2',
            'notes' => 'paid',
        ],
        [
            'android_id' => '71f231d209d72b00',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '03-06-2026 21:42:50',
            'end_date' => '03-07-2026 21:42:50',
            'subscription_status' => 'active',
            'joined_at' => '03-06-2026 21:42:50',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SxDhVx0TrnXiLy',
            'gateway_payment_id' => 'pay_SxDhVx0TrnXiLy',
            'notes' => 'paid',
        ],
        [
            'android_id' => '7a8f3575caa4070a',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '13-01-2026 15:49:34',
            'end_date' => '12-07-2026 15:49:34',
            'subscription_status' => 'active',
            'joined_at' => '13-01-2026 15:49:34',
            'video_click_count' => 5,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_S3KLzrG10B637N',
            'gateway_payment_id' => 'pay_S3KLzrG10B637N',
            'notes' => 'paid',
        ],
        [
            'android_id' => '7b5be363ed0a922f',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '21-05-2026 16:42:16',
            'end_date' => '20-06-2026 16:42:16',
            'subscription_status' => 'active',
            'joined_at' => '21-05-2026 16:42:16',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SrzdNYH4pkFpED',
            'gateway_payment_id' => 'pay_SrzdNYH4pkFpED',
            'notes' => 'paid',
        ],
        [
            'android_id' => '867e19721879d134',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '10-01-2026 14:39:12',
            'end_date' => '10-01-2027 14:39:12',
            'subscription_status' => 'active',
            'joined_at' => '10-01-2026 14:39:12',
            'video_click_count' => 0,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_S27YkVnp0KDAZJ',
            'gateway_payment_id' => 'pay_S27YkVnp0KDAZJ',
            'notes' => 'paid',
        ],
        [
            'android_id' => '884977de5fce6b03',
            'is_vip' => true,
            'plan_id' => self::PLAN_3_MONTH,
            'plan_name' => '3 Months',
            'start_date' => '14-04-2026 10:55:31',
            'end_date' => '13-07-2026 10:55:31',
            'subscription_status' => 'active',
            'joined_at' => '14-04-2026 10:55:31',
            'video_click_count' => 5,
            'paid_amount' => 249.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SdFxX86JHUoiD0',
            'gateway_payment_id' => 'pay_SdFxX86JHUoiD0',
            'notes' => 'paid',
        ],
        [
            'android_id' => '8d219a42a83f3e85',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '25-03-2026 14:11:01',
            'end_date' => '25-03-2027 14:11:01',
            'subscription_status' => 'active',
            'joined_at' => '25-03-2026 14:11:01',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SVObsOmx7dHlpn',
            'gateway_payment_id' => 'pay_SVObsOmx7dHlpn',
            'notes' => 'paid',
        ],
        [
            'android_id' => '99dc1cacdf3b0a53',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '02-06-2026 20:48:35',
            'end_date' => '02-07-2026 20:48:35',
            'subscription_status' => 'active',
            'joined_at' => '02-06-2026 20:48:35',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SwoF8WY9rISWbj',
            'gateway_payment_id' => 'pay_SwoF8WY9rISWbj',
            'notes' => 'paid',
        ],
        [
            'android_id' => '9ed45a4f1da8af48',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '30-05-2026 12:41:02',
            'end_date' => '29-06-2026 12:41:02',
            'subscription_status' => 'active',
            'joined_at' => '30-05-2026 12:41:02',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SvUKaLSU7fKQMl',
            'gateway_payment_id' => 'pay_SvUKaLSU7fKQMl',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'a905d066b8053b64',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '18-01-2026 17:13:55',
            'end_date' => '18-01-2027 17:13:55',
            'subscription_status' => 'active',
            'joined_at' => '18-01-2026 17:13:55',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_S5KTK38f7NjEHn',
            'gateway_payment_id' => 'pay_S5KTK38f7NjEHn',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'a9f9f742a190e008',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '31-07-2025 14:34:01',
            'end_date' => '31-07-2026 14:34:01',
            'subscription_status' => 'active',
            'joined_at' => '31-07-2025 14:34:01',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_QzcOaE406mMKM0',
            'gateway_payment_id' => 'pay_QzcOaE406mMKM0',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'aa6d9e69d5cb6789',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '23-05-2026 14:54:32',
            'end_date' => '22-06-2026 14:54:32',
            'subscription_status' => 'active',
            'joined_at' => '23-05-2026 14:54:32',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SskrkVEXZ7uHnh',
            'gateway_payment_id' => 'pay_SskrkVEXZ7uHnh',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'ab84856ea4eaa61e',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '15-01-2026 11:34:30',
            'end_date' => '15-01-2027 11:34:30',
            'subscription_status' => 'active',
            'joined_at' => '15-01-2026 11:34:30',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_S4351Nyy4se0B1',
            'gateway_payment_id' => 'pay_S4351Nyy4se0B1',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'adc80d75aefc6381',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '18-05-2026 03:15:52',
            'end_date' => '17-06-2026 03:15:52',
            'subscription_status' => 'active',
            'joined_at' => '18-05-2026 03:15:52',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SqaIGK08WyuV5s',
            'gateway_payment_id' => 'pay_SqaIGK08WyuV5s',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'aeebc1618fbf2b08',
            'is_vip' => true,
            'plan_id' => self::PLAN_6_MONTH,
            'plan_name' => '6 Months',
            'start_date' => '01-01-2026 22:54:35',
            'end_date' => '30-06-2026 22:54:35',
            'subscription_status' => 'active',
            'joined_at' => '01-01-2026 22:54:35',
            'video_click_count' => 5,
            'paid_amount' => 399.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_RyhB8eqGleRFVK',
            'gateway_payment_id' => 'pay_RyhB8eqGleRFVK',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'bf9f0ef536134cda',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '11-05-2026 22:44:59',
            'end_date' => '10-06-2026 22:44:59',
            'subscription_status' => 'active',
            'joined_at' => '11-05-2026 22:44:59',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_So8TGvGKoHpr7E',
            'gateway_payment_id' => 'pay_So8TGvGKoHpr7E',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'c03f2cd471ec2413',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '20-05-2026 20:07:34',
            'end_date' => '19-06-2026 20:07:34',
            'subscription_status' => 'active',
            'joined_at' => '20-05-2026 20:07:34',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_Sreb7A5fY0NRhF',
            'gateway_payment_id' => 'pay_Sreb7A5fY0NRhF',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'c425b23f23840029',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '23-05-2026 23:49:13',
            'end_date' => '22-06-2026 23:49:13',
            'subscription_status' => 'active',
            'joined_at' => '23-05-2026 23:49:13',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SstykEYhOxldl2',
            'gateway_payment_id' => 'pay_SstykEYhOxldl2',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'e3f37ff6b21456d9',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '22-05-2026 21:39:42',
            'end_date' => '21-06-2026 21:39:42',
            'subscription_status' => 'active',
            'joined_at' => '22-05-2026 21:39:42',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SsTEcPxYrrUEwN',
            'gateway_payment_id' => 'pay_SsTEcPxYrrUEwN',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'e88b01447c403d3f',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '19-02-2026 16:19:09',
            'end_date' => '19-02-2027 16:19:09',
            'subscription_status' => 'active',
            'joined_at' => '19-02-2026 16:19:09',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SHyceQIPzJSm0n',
            'gateway_payment_id' => 'pay_SHyceQIPzJSm0n',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'eda879a28e43e003',
            'is_vip' => true,
            'plan_id' => self::PLAN_YEARLY,
            'plan_name' => 'Yearly',
            'start_date' => '05-02-2026 00:09:19',
            'end_date' => '05-02-2027 00:09:19',
            'subscription_status' => 'active',
            'joined_at' => '05-02-2026 00:09:19',
            'video_click_count' => 5,
            'paid_amount' => 599.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SCAdeTQ5hGM7af',
            'gateway_payment_id' => 'pay_SCAdeTQ5hGM7af',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'efe53dde07a7afef',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '09-05-2026 01:29:39',
            'end_date' => '08-06-2026 01:29:39',
            'subscription_status' => 'active',
            'joined_at' => '09-05-2026 01:29:39',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_Smzfx0i4CnkdSI',
            'gateway_payment_id' => 'pay_Smzfx0i4CnkdSI',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'f0155ea7c4f13c03',
            'is_vip' => true,
            'plan_id' => self::PLAN_MONTHLY,
            'plan_name' => 'Monthly',
            'start_date' => '11-05-2026 23:09:55',
            'end_date' => '10-06-2026 23:09:55',
            'subscription_status' => 'active',
            'joined_at' => '11-05-2026 23:09:55',
            'video_click_count' => 5,
            'paid_amount' => 99.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_So8tE4emWq6llc',
            'gateway_payment_id' => 'pay_So8tE4emWq6llc',
            'notes' => 'paid',
        ],
        [
            'android_id' => 'f9ea76fc12ee7276',
            'is_vip' => true,
            'plan_id' => self::PLAN_3_MONTH,
            'plan_name' => '3 Months',
            'start_date' => '11-03-2026 14:36:55',
            'end_date' => '09-06-2026 14:36:55',
            'subscription_status' => 'active',
            'joined_at' => '11-03-2026 14:36:55',
            'video_click_count' => 5,
            'paid_amount' => 249.00,
            'payment_gateway' => 'razorpay',
            'gateway_order_id' => 'pay_SPrZUvlfIidlg8',
            'gateway_payment_id' => 'pay_SPrZUvlfIidlg8',
            'notes' => 'paid',
        ],

    ];

    public function run(): void
    {
        $gatewaysByCode = PaymentGateway::pluck('id', 'code');
        $plansByName = SubscriptionPlan::where('is_active', true)->pluck('id', 'name');
        $defaultPlan = SubscriptionPlan::where('is_active', true)->orderBy('sort_order')->first();

        $imported = 0;
        $skipped = 0;

        foreach ($this->users as $row) {
            $androidId = trim((string) ($row['android_id'] ?? ''));
            if ($androidId === '' || str_starts_with($androidId, 'DUMMY_REPLACE_')) {
                $this->command->warn("Skipping placeholder row: {$androidId}");
                $skipped++;
                continue;
            }

            try {
                DB::transaction(function () use ($row, $androidId, $gatewaysByCode, $plansByName, $defaultPlan) {
                    $this->importUser($row, $androidId, $gatewaysByCode, $plansByName, $defaultPlan);
                });
                $imported++;
            } catch (\Throwable $e) {
                $this->command->error("Failed {$androidId}: {$e->getMessage()}");
                $skipped++;
            }
        }

        $this->command->info("Import complete: {$imported} imported, {$skipped} skipped.");
    }

    /**
     * Parse client date: dd-mm-yyyy HH:mm:ss (or dd-mm-yyyy only)
     */
    private function parseDate(?string $value): ?Carbon
    {
        if ($value === null || trim($value) === '') {
            return null;
        }

        $value = trim($value);

        $formats = ['d-m-Y H:i:s', 'd-m-Y H:i', 'd-m-Y', 'Y-m-d H:i:s', 'Y-m-d'];

        foreach ($formats as $format) {
            try {
                $parsed = Carbon::createFromFormat($format, $value);
                if ($parsed !== false) {
                    return $parsed;
                }
            } catch (\Throwable) {
                continue;
            }
        }

        throw new \RuntimeException("Invalid date format: {$value}. Use dd-mm-yyyy HH:mm:ss");
    }

    private function importUser(
        array $row,
        string $androidId,
        $gatewaysByCode,
        $plansByName,
        ?SubscriptionPlan $defaultPlan
    ): void {
        $isVip = (bool) ($row['is_vip'] ?? false);
        $subscriptionStatus = $this->resolveSubscriptionStatus($row);
        $needsSubscription = $subscriptionStatus !== 'none';

        $plan = $this->resolvePlan($row, $plansByName, $defaultPlan);
        if ($needsSubscription && !$plan) {
            throw new \RuntimeException('subscription data provided but no matching plan found');
        }

        $user = User::firstOrCreate(
            ['android_id' => $androidId],
            [
                'is_vip' => $isVip,
                'video_click_count' => $row['video_click_count'] ?? ($isVip ? 0 : 5),
                'added_by' => null,
            ]
        );

        $user->update([
            'is_vip' => $isVip,
            'video_click_count' => $row['video_click_count'] ?? $user->video_click_count,
        ]);

        if (!empty($row['joined_at'])) {
            $joinedAt = $this->parseDate($row['joined_at']);
            DB::table('users')->where('android_id', $androidId)->update([
                'created_at' => $joinedAt,
                'updated_at' => $joinedAt,
            ]);
        }

        if (!$needsSubscription || !$plan) {
            $this->command->info("User {$androidId}: registered (no subscription)");
            return;
        }

        $startAt = $this->parseDate($row['start_date'] ?? null) ?? now()->startOfDay();
        $endAt = $this->parseDate($row['end_date'] ?? null)
            ?? (clone $startAt)->addDays((int) $plan->days)->endOfDay();

        $startDate = $startAt->toDateString();
        $endDate = $endAt->toDateString();
        $days = max(1, (int) $startAt->copy()->startOfDay()->diffInDays($endAt->copy()->startOfDay()) + 1);

        $status = $subscriptionStatus === 'active'
            ? SubscriptionStatus::ACTIVE
            : SubscriptionStatus::EXPIRED;

        $gatewayId = $this->resolveGatewayId($row['payment_gateway'] ?? null, $gatewaysByCode);

        $subscription = UserSubscription::updateOrCreate(
            [
                'android_id' => $androidId,
                'start_date' => $startDate,
            ],
            [
                'plan_id' => $plan->id,
                'payment_gateway_id' => $gatewayId,
                'gateway_order_id' => $row['gateway_order_id'] ?? null,
                'gateway_payment_id' => $row['gateway_payment_id'] ?? null,
                'paid_amount' => $row['paid_amount'] ?? 0,
                'days' => $days,
                'end_date' => $endDate,
                'start_at' => $startAt,
                'end_at' => $endAt,
                'status' => $status,
            ]
        );

        if (($row['paid_amount'] ?? 0) > 0 && $gatewayId) {
            $this->importPaymentTransaction($row, $androidId, $plan, $gatewayId, $subscription, $startAt);
        }

        $label = $status === SubscriptionStatus::ACTIVE
            ? "VIP until {$endAt->format('d-m-Y H:i:s')}"
            : "expired ({$startAt->format('d-m-Y')} → {$endAt->format('d-m-Y')})";
        $this->command->info("User {$androidId}: {$label}");
    }

    private function resolveSubscriptionStatus(array $row): string
    {
        if (!empty($row['subscription_status'])) {
            return strtolower($row['subscription_status']);
        }

        $hasSubData = !empty($row['plan_id']) || !empty($row['plan_name']) || !empty($row['start_date']);

        if (!($row['is_vip'] ?? false) && !$hasSubData) {
            return 'none';
        }

        if (!empty($row['end_date'])) {
            $endAt = $this->parseDate($row['end_date']);
            if ($endAt && $endAt->isPast()) {
                return 'expired';
            }
        }

        return ($row['is_vip'] ?? false) ? 'active' : 'expired';
    }

    private function resolvePlan(array $row, $plansByName, ?SubscriptionPlan $defaultPlan): ?SubscriptionPlan
    {
        if (!empty($row['plan_id'])) {
            return SubscriptionPlan::find($row['plan_id']);
        }

        if (!empty($row['plan_name'])) {
            $planId = $plansByName[$row['plan_name']] ?? null;
            return $planId ? SubscriptionPlan::find($planId) : null;
        }

        return $defaultPlan;
    }

    private function resolveGatewayId(?string $gateway, $gatewaysByCode): ?string
    {
        if (empty($gateway)) {
            return null;
        }

        $code = strtolower(trim($gateway));

        return $gatewaysByCode[$code] ?? PaymentGateway::where('name', 'like', '%' . $gateway . '%')->value('id');
    }

    private function importPaymentTransaction(
        array $row,
        string $androidId,
        SubscriptionPlan $plan,
        string $gatewayId,
        UserSubscription $subscription,
        Carbon $paidAt
    ): void {
        $transactionId = $row['transaction_id']
            ?? 'IMPORT-' . Str::upper(Str::substr(md5($androidId . ($row['gateway_payment_id'] ?? $subscription->id)), 0, 12));

        PaymentTransaction::firstOrCreate(
            ['transaction_id' => $transactionId],
            [
                'android_id' => $androidId,
                'plan_id' => $plan->id,
                'payment_gateway_id' => $gatewayId,
                'gateway_order_id' => $row['gateway_order_id'] ?? null,
                'gateway_payment_id' => $row['gateway_payment_id'] ?? null,
                'amount' => $row['paid_amount'] ?? 0,
                'currency' => 'INR',
                'status' => 'success',
                'paid_at' => $paidAt,
            ]
        );
    }
}
