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
        }

        .plan a,
        .plan span {
            width: 100%;
            color: #fff;
            border: none;
            padding: 12px 0;
            border-radius: var(--radius);
            cursor: pointer;
            font-size: 1rem;
            margin-top: auto;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        .btn-subscribe {
            background: var(--teal);
        }

        .btn-swap {
            background: var(--blue);
        }

        .btn-disabled {
            background-color: #999;
            cursor: not-allowed;
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
            @if(!empty($content->plans))
            @foreach($content->plans as $plan)
            @php
            $subscription = auth()->check() ? auth()->user()->subscription('default') : null;
            $isSubscribed = $subscription && $subscription->valid();
            $onGracePeriod = $subscription && $subscription->onGracePeriod();
            $isCurrentPlan = $isSubscribed && $subscription->hasPrice($plan['stripe_price_id'] ?? null);
            $stripePriceId = $plan['stripe_price_id'] ?? null;
            @endphp
            <div class="plan {{ $isCurrentPlan ? 'current-plan' : '' }}">
                <img src="{{ isset($plan['image_path']) ? Storage::url($plan['image_path']) : 'assets/images/p1.png' }}"
                    alt="{{ $plan['heading'] ?? '' }}"
                    style="width: 100%; height: 150px; border-radius: 6px; object-fit: cover;" />
                <h3>{{ $plan['heading'] ?? 'Plan Heading' }}</h3>
                <p class="subhead">{{ $plan['description'] ?? 'Plan Description' }}</p>
                <ul class="checklist">
                    @if(!empty($plan['details']))
                    @foreach($plan['details'] as $detail)
                    <li>{{ $detail }}</li>
                    @endforeach
                    @endif
                </ul>
                <div class="price">{{ $plan['price'] ?? '$0.00' }}</div>

                @guest
                @if ($stripePriceId)
                <a href="{{ route('login') }}" class="btn-subscribe">Subscribe</a>
                @else
                <span class="btn-disabled" title="Plan not available">Not Available</span>
                @endif
                @endguest

                @auth
                @if ($isCurrentPlan)
                @if ($onGracePeriod)
                <span class="btn-disabled" title="Your subscription is ending soon.">Canceling</span>
                @else
                <span class="btn-disabled" title="This is your current active plan.">Current Plan</span>
                @endif
                @elseif ($isSubscribed && !$onGracePeriod)
                @if ($stripePriceId)
                <a href="{{ route('subscribe.swap', ['priceId' => $stripePriceId]) }}" class="btn-swap">Swap Plan</a>
                @else
                <span class="btn-disabled" title="Plan not available">Not Available</span>
                @endif
                @else
                @if ($stripePriceId)
                <a href="{{ route('subscribe', ['priceId' => $stripePriceId]) }}" class="btn-subscribe">Subscribe</a>
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
</body>

</html>