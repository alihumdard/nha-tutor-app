<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $userId = 1;

        $stripePriceId = 'price_1R1uogFRx4mA13uOJz9cXDqd'; // Half In plan
        $stripeProductId = 'prod_fake_halfin123'; // You can leave this fake unless you want to be more accurate

        // Insert into subscriptions
        $subscriptionId = DB::table('subscriptions')->insertGetId([
            'user_id' => $userId,
            'name' => 'default',
            'stripe_id' => 'sub_' . uniqid(),
            'stripe_status' => 'active',
            'stripe_price' => $stripePriceId,
            'quantity' => 1,
            'trial_ends_at' => null,
            'ends_at' => now()->addYear(), // 1 year subscription
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert into subscription_items
        DB::table('subscription_items')->insert([
            'subscription_id' => $subscriptionId,
            'stripe_id' => $stripePriceId,
            'stripe_product' => $stripeProductId,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
