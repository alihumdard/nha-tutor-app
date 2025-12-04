<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>NHA Tutor Pro</title>
    <style>
        :root {
            --teal: #3cb371;
            --dark: #051014;
            --gray: #666;
            --border: #e5e7eb;
            --radius: 8px;
            --blue: #007bff;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Helvetica, Arial, sans-serif;
            margin: 0;
            color: var(--dark);
            line-height: 1.45;
            width: 100%;
        }

        header {
            display: flex;
            justify-content: space-around;
            gap: 200px;
            align-items: center;
            padding: 20px 0px;
            flex-wrap: wrap;
        }

        header .brand {
            font-size: 1.6rem;
            font-weight: 600;
        }

        header nav {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        header nav a {
            background: #fff;
            text-decoration: none;
            color: #051014;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 8px 18px;
            cursor: pointer;
            font-size: 0.95rem;
        }

        h1 {
            font-size: 2rem;
            margin: 40px 0 10px;
            text-align: center;
        }

        p.tagline {
            max-width: 720px;
            margin: 0 auto 40px;
            font-size: 1.05rem;
            text-align: center;
            padding: 0 12px;
        }

        h2.section {
            text-align: center;
            margin: 20px 0 32px;
            font-size: 1.6rem;
        }

        .plan-grid {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 60px;
            padding: 0 12px;
            align-items: stretch;
        }

        .plan {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            width: 260px;
            padding: 24px 20px 40px;
            text-align: left;
            background: white;
            display: flex;
            flex-direction: column;
        }

        .plan.current-plan {
            border-color: var(--teal);
            box-shadow: 0 0 15px rgba(60, 179, 113, 0.3);
            transform: scale(1.03);
        }

        .plan h3 {
            margin: 16px 0 4px;
            font-size: 1.25rem;
        }

        .plan p.subhead {
            color: var(--gray);
            margin: 0 0 16px;
            font-size: 0.95rem;
        }

        .checklist {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }

        .checklist li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 22px;
        }

        .checklist li::before {
            content: "✔";
            color: var(--teal);
            position: absolute;
            left: 0;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 18px;
            margin-top: auto;
        }

        /* Base styles for all plan buttons/links */
        .plan a,
        .plan button,
        .plan span {
            width: 100%;
            color: #fff;
            border: none;
            padding: 12px 0;
            border-radius: var(--radius);
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
            text-align: center;
            display: block;
            font-family: inherit; /* Ensure button inherits font */
        }

        .btn-subscribe {
            background: var(--teal);
        }
        .btn-subscribe:hover {
            background: #2e8b57; /* Darker teal */
        }

        .btn-swap {
            background: var(--blue);
        }
        .btn-swap:hover {
            background: #0056b3; /* Darker blue */
        }

        .btn-disabled {
            background-color: #999;
            cursor: not-allowed;
            opacity: 0.7;
        }

        footer {
            background: #fafafa;
            padding: 40px 16px 60px;
            box-sizing: border-box;
        }

        footer h3 {
            margin: 0 0 24px;
            font-size: 1.4rem;
            text-align: center;
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
        }

        footer ul {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            max-width: 720px;
        }

        footer li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 22px;
            font-size: 1rem;
        }

        footer li::before {
            content: "✔";
            color: var(--teal);
            position: absolute;
            left: 0;
            top: 0;
        }

        .why-choose-us {
            padding: 20px;
            margin-right: 50px;
        }

        .why-choose-us h3,
        .why-choose-us ul {
            margin-right: 430px;
            text-align: left;
        }

        @media (max-width: 1024px) {

            .why-choose-us h3,
            .why-choose-us ul {
                margin-right: 0;
                text-align: left;
                padding-left: 10px;
            }
        }

        @media (max-width: 600px) {
            header {
                gap: 0px;
            }
        }



        /* ======== MODAL STYLES START ======== */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.6);
            /* Black w/ opacity */
        }

        .terms-modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            /* 5% from the top and centered */
            padding: 24px;
            border: 1px solid #888;
            width: 100%;
            /* Could be more or less, depending on screen size */
            max-width: 700px;
            border-radius: 12px;
            position: relative;
        }

        .modal-close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-close:hover,
        .modal-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-terms-box {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #eee;
            padding: 16px;
            background: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .modal-terms-box h1,
        .modal-terms-box h2,
        .modal-terms-box h3 {
            color: #1f2937;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .modal-terms-box p,
        .modal-terms-box ul,
        .modal-terms-box li {
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 0.75rem;
        }

        .modal-terms-box ul {
            padding-left: 1.5rem;
        }

        /* Style for disabled modal proceed button */
        #modal-proceed-link.btn-disabled {
            background-color: #999;
            cursor: not-allowed;
            opacity: 0.7;
        }
        /* ======== MODAL STYLES END ======== */

    </style>
</head>

<body>
    <header>
        <div class="brand">NHA Tutor Pro</div>
        <nav>
            @auth
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @else
            <a href="{{ route('dashboard') }}">Dashboard</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline;">
                @csrf
                <button type="submit" style="background: #fff; text-decoration: none; color: #051014; border: 1px solid var(--border, #e5e7eb); border-radius: var(--radius, 8px); padding: 8px 18px; cursor: pointer; font-size: 0.95rem; font-family: inherit; vertical-align: middle;">
                    Logout
                </button>
            </form>
            @else
            <a href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </header>

    <main>
        @if(session('error'))
        <div style="padding: 1rem; margin: 1rem 2rem; background-color: #fef2f2; color: #991b1b; border: 1px solid #fecaca; border-radius: 8px; text-align: center;">
            {{ session('error') }}
        </div>
        @endif

        <h1>{!! nl2br(e($content->main_heading ?? 'Default Main Heading')) !!}</h1>
        <p class="tagline">{{ $content->main_content ?? 'Default main content paragraph.' }}</p>
        <h2 class="section">{{ $content->plans_main_heading ?? 'Choose Your Plan' }}</h2>
        <div class="plan-grid">

            {{-- Find the current user's plan index (rank) first --}}
            @php
                $currentUserPlanRank = -1; // -1 means not subscribed or plan not found
                $subscription = auth()->check() ? auth()->user()->subscription('default') : null;
                
                if ($subscription && $subscription->valid()) {
                    foreach ($content->plans as $index => $plan) {
                        if ($subscription->hasPrice($plan['stripe_price_id'] ?? null)) {
                            $currentUserPlanRank = $index; // 0, 1, or 2
                            break;
                        }
                    }
                }
            @endphp

            @if(!empty($content->plans))
            @foreach($content->plans as $index => $plan)
            @php
                // --- This block is mostly the same ---
                $planName = '';
                if ($index === 0) $planName = 'Half In';
                if ($index === 1) $planName = 'All In';
                if ($index === 2) $planName = 'All or Nothing';

                $isSubscribed = $subscription && $subscription->valid();
                $onGracePeriod = $subscription && $subscription->onGracePeriod();
                $isCurrentPlan = $isSubscribed && ($index === $currentUserPlanRank); // Check if this is the current plan
                $stripePriceId = $plan['stripe_price_id'] ?? null;
                
                // --- NEW LOGIC ---
                // A plan is considered "lower" if its index is less than the user's current plan index.
                // We only care about this if the user IS subscribed and NOT on a grace period.
                $isLowerPlan = $isSubscribed && !$onGracePeriod && ($index < $currentUserPlanRank);
            @endphp
            <div class="plan {{ $isCurrentPlan ? 'current-plan' : '' }}">
                <img src="{{ isset($plan['image_path']) ? asset('public/storage/' . $plan['image_path']) : asset('assets/images/p1.png') }}"
                     alt="{{ $plan['heading'] ?? '' }}"
                     style="width: 100%; height: 150px; border-radius: 6px; object-fit: cover;" />

                <h3>{{ $plan['heading'] ?? 'Plan Heading' }}</h3>
                <p class="subhead">{{ $plan['description'] ?? 'Plan Description' }}</p>
                <ul class="checklist">
                    @if(!empty($plan['details']))
                    @foreach($plan['details'] as $detail)
                    <li>
                        @if(($planName === 'Half In' || $planName === 'All In') && str_contains($detail, 'Answer Rationales'))
                        {{ str_replace('Answer Rationales', 'Answer Explanations', $detail) }}
                        @else
                        {{ $detail }}
                        @endif
                    </li>
                    @endforeach
                    @endif
                </ul>
                <div class="price">{{ $plan['price'] ?? '$0.00' }}</div>

                @guest
                    {{-- This part is unchanged --}}
                    @if ($stripePriceId)
                    <a href="{{ route('login') }}" class="btn-subscribe">Subscribe</a>
                    @else
                    <span class="btn-disabled" title="Plan not available">Not Available</span>
                    @endif
                @endguest

                @auth
                    @if ($isCurrentPlan)
                        {{-- This part is unchanged --}}
                        @if ($onGracePeriod)
                        <span class="btn-disabled" title="Your subscription is ending soon.">Canceling</span>
                        @else
                        <span class="btn-disabled" title="This is your current active plan.">Current Plan</span>
                        @endif

                    {{-- NEW CONDITION: Check if it's a lower plan --}}
                    @elseif ($isLowerPlan)
                        <span class="btn-disabled" title="You cannot downgrade to this plan.">Downgrade Not Allowed</span>

                    @elseif ($isSubscribed && !$onGracePeriod)
                        {{-- This is a HIGHER plan, so show the Swap button --}}
                        @if ($stripePriceId)
                        <button type="button" 
                                class="open-terms-modal btn-swap" 
                                data-action-url="{{ route('subscribe.swap', ['priceId' => $stripePriceId]) }}"
                                data-plan-name="{{ $plan['heading'] ?? 'Plan' }}"
                                data-btn-class="btn-swap">
                            Swap Plan
                        </button>
                        @else
                        <span class="btn-disabled" title="Plan not available">Not Available</span>
                        @endif
                    @else
                        {{-- This is for users who are on a grace period or not subscribed at all --}}
                        @if ($stripePriceId)
                        <button type="button" 
                                class="open-terms-modal btn-subscribe" 
                                data-action-url="{{ route('subscribe', ['priceId' => $stripePriceId]) }}"
                                data-plan-name="{{ $plan['heading'] ?? 'Plan' }}"
                                data-btn-class="btn-subscribe">
                            Subscribe
                        </button>
                        @else
                        <span class="btn-disabled" title="Plan not available">Not Available</span>
                        @endif
                    @endif
                @endauth
            </div>
            @endforeach
            @endif
        </div>
    </main>
    <footer>
        <div class="why-choose-us">
            <h3>{{ $content->why_choose_us_main_heading ?? 'Why Choose Us?' }}</h3>
            @if(!empty($content->why_choose_us_items))
            <ul>
                @foreach($content->why_choose_us_items as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </footer>

    <div id="termsModal" class="modal ">
        <div class="terms-modal-content">
            <span class="modal-close">&times;</span>
            <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">Terms and Conditions</h2>
            
            <div class="modal-terms-box">
                {!! $content->terms_and_conditions ?? '<p>Terms and conditions are loading...</p>' !!}
            </div>
            
            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                <input type="checkbox" id="modal_terms_checkbox" style="width: 1rem; height: 1rem; margin-right: 0.5rem;">
                <label for="modal_terms_checkbox" style="font-size: 0.9rem;">
                    I have read and agree to the Terms and Conditions.
                </label>
            </div>
            
            <a id="modal-proceed-link" 
               href="#" 
               class="btn-disabled" 
               style="width: 100%; text-align: center; display: block; padding: 12px 0; text-decoration: none; border-radius: var(--radius); color: #fff; font-size: 1rem;">
                Proceed
            </a>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById("termsModal");
        var closeButton = document.querySelector(".modal-close");
        var proceedLink = document.getElementById("modal-proceed-link");
        var checkbox = document.getElementById("modal_terms_checkbox");
        var planButtons = document.querySelectorAll(".open-terms-modal");

        // When the user clicks a plan button, open the modal
        planButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the data from the button
                var actionUrl = button.getAttribute('data-action-url');
                var planName = button.getAttribute('data-plan-name');
                var btnClass = button.getAttribute('data-btn-class'); // Get the class
                
                // Set the link's URL
                proceedLink.setAttribute('href', actionUrl);
                
                // Update the proceed button text
                proceedLink.innerText = 'Proceed with ' + planName;
                
                // Reset the modal to its default state
                checkbox.checked = false;
                proceedLink.className = 'btn-disabled'; // Reset classes
                proceedLink.setAttribute('data-btn-class', btnClass); // Store the correct class
            
                // Show the modal
                modal.style.display = "block";
            });
        });

        // When the user checks the box, enable the button
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                var btnClass = proceedLink.getAttribute('data-btn-class');
                proceedLink.className = btnClass; // Set the correct class (btn-subscribe or btn-swap)
            } else {
                proceedLink.className = 'btn-disabled'; // Set back to disabled
            }
        });

        // When the user clicks the Proceed link, check if it's disabled
        proceedLink.addEventListener('click', function(event) {
            if (proceedLink.classList.contains('btn-disabled')) {
                event.preventDefault(); // Stop the link from working
                alert('You must accept the Terms and Conditions to proceed.');
            }
            // If not disabled, the link works normally and redirects
        });

        // When the user clicks on <span> (x), close the modal
        closeButton.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>


    @include('includes.security-scripts')
</body>


</html>