<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CrmController extends Controller
{

    public function index()
    {
        $users = User::with('subscriptions')->get();

        $users = $users->map(function ($user) {
            $user->subscribed = $user->subscribed('default');
            return $user;
        });
        return view('pages.admin.users', compact('users'));
    }

    public function edit()
    {
        $content = HomepageContent::firstOrCreate([], [
            'main_heading' => 'Default Main Heading',
            'main_content' => 'This is the default main content paragraph.',
            'plans_main_heading' => 'Choose Your Plan',
            'plans' => [],
            'why_choose_us_main_heading' => 'Why Choose Us?',
            'why_choose_us_items' => [],
            'prompet_type' => null, // no type initially
            'prompet_content' => null,
        ]);

        // Call API only if prompet_type not set yet
        if (!$content->prompet_type) {
            $apiUrl = 'https://nha-tutor.onrender.com/prompt';
            $response = Http::timeout(120)->get($apiUrl, [
                'prompt_type' => 'system',
            ]);

            if ($response->successful()) {
                $result = $response->json();
                $content->update([
                    'prompet_type' => $result['prompt_type'] ?? 'system',
                    'prompet_content' => $result['prompt'] ?? '',
                ]);
            }
        }

        return view('crm', compact('content'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'main_heading' => 'nullable|string',
            'main_content' => 'nullable|string',
            'plans_main_heading' => 'nullable|string',
            'plans' => 'nullable|array',
            'plans.*.image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'plans.*.heading' => 'required_with:plans|string',
            'plans.*.description' => 'nullable|string',
            'plans.*.details' => 'nullable|array',
            'plans.*.price' => 'nullable|string',
            'plans.*.stripe_price_id' => 'nullable|string',
            'why_choose_us_main_heading' => 'nullable|string',
            'why_choose_us_items' => 'nullable|array',
        ]);

        $content = HomepageContent::first();
        $currentPlans = $content->plans ?? [];
        $newPlansData = [];

        if ($request->has('plans')) {
            foreach ($request->plans as $index => $planData) {
                $newPlan = $currentPlans[$index] ?? [];

                if (isset($planData['image'])) {
                    if (isset($newPlan['image_path'])) {
                        Storage::disk('public')->delete($newPlan['image_path']);
                    }
                    $newPlan['image_path'] = $planData['image']->store('plan_images', 'public');
                }

                $newPlan['heading'] = $planData['heading'];
                $newPlan['description'] = $planData['description'];
                $newPlan['details'] = isset($planData['details']) ? array_filter($planData['details']) : [];
                $newPlan['price'] = $planData['price'];
                $newPlan['stripe_price_id'] = $planData['stripe_price_id'] ?? null;

                $newPlansData[] = $newPlan;
            }
        }


        $content->update([
            'main_heading' => $request->main_heading,
            'main_content' => $request->main_content,
            'plans_main_heading' => $request->plans_main_heading,
            'plans' => $newPlansData,
            'why_choose_us_main_heading' => $request->why_choose_us_main_heading,
            'why_choose_us_items' => isset($request->why_choose_us_items) ? array_filter($request->why_choose_us_items) : [],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Homepage content updated successfully!',
        ]);
    }

    public function propet_update(Request $request)
    {
        // Validate input
        $request->validate([
            'prompet_type' => 'nullable|in:system,lesson',
            'prompet_content' => 'nullable|string',
        ]);

        // Get the first record
        $content = HomepageContent::first();

        $newPromptType = $request->prompet_type;
        $newPromptContent = $request->prompet_content;

        // Only call API if type or content is provided
        if ($newPromptType && $newPromptContent) {
            try {
                $apiUrl = 'https://nha-tutor.onrender.com/prompt';
                $response = Http::timeout(120)->put($apiUrl, [
                    'prompt_type' => $newPromptType,
                    'prompt' => $newPromptContent,
                ]);

                if ($response->successful()) {
                    $result = $response->json();
                    $newPromptContent = $result['prompt'] ?? $newPromptContent;
                }
            } catch (\Illuminate\Http\Client\RequestException $e) {
                return redirect()->back()->with('error', 'Failed to update prompt via API. Please try again.');
            }
        }

        // Update the database
        $content->update([
            'prompet_type' => $newPromptType,
            'prompet_content' => $newPromptContent,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
