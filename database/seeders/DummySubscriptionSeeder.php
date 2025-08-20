<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Cashier\Subscription;
use App\Models\User;

class DummySubscriptionSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1);

        if (!$user) {
            $this->command->error("User with ID 1 not found.");
            return;
        }

        // Create dummy subscription for "Half In" plan
        Subscription::updateOrCreate(
            [
                'user_id' => $user->id,
                'name' => 'default', // Cashier requires subscription name
            ],
            [
                'stripe_id' => 'sub_dummy_12345', // fake subscription id
                'stripe_status' => 'active',
                'stripe_price' => 'price_1R1uogFRx4mA13uOJz9cXDqd', // your plan's stripe price id
                'quantity' => 1,
                'trial_ends_at' => null,
                'ends_at' => null,
            ]
        );

        $this->command->info("✅ Dummy subscription created for User ID 1.");
    }
}
