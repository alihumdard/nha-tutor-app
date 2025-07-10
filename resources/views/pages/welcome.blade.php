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
    }

    body {
      font-family: system-ui, -apple-system, "Segoe UI", Helvetica, Arial,
        sans-serif;
      margin: 0;
      color: var(--dark);
      line-height: 1.45;
      width: 100%;
    }

    header {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 20px;
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
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 60px;
      padding: 0 12px;
    }

    .plan {
      border: 1px solid var(--border);
      border-radius: var(--radius);
      width: 260px;
      padding: 24px 20px 32px;
      text-align: left;
      box-sizing: border-box;
      background: white;
      display: flex;
      flex-direction: column;
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

    .plan a {
      width: 100%;
      background: var(--teal);
      color: #fff;
      border: none;
      padding: 12px 0;
      border-radius: var(--radius);
      cursor: pointer;
      font-size: 1rem;
      margin-top: auto;
      text-decoration: none;
      text-align: center;
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
      padding-left: 62px;
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
      max-width: 720px;
    }

    footer li::before {
      content: "✔";
      color: var(--teal);
      position: absolute;
      left: 0;
      top: 0;
    }

    @media (max-width: 1000px) {
      footer h3 {
        text-align: left;
        padding-left: 0px;
      }
    }

    @media (max-width: 480px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }

      .plan {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="brand">NHA Tutor Pro</div>
    <a href="{{ route('home') }}" style="color: black; text-decoration: none; font-weight: 700">Home</a>
    <nav>
      @auth
      {{-- This content shows if the user IS logged in --}}
      <a href="{{ route('dashboard') }}" class="your-button-styles">Dashboard</a>
      @else
      {{-- This content shows if the user is NOT logged in (is a guest) --}}
      <a href="{{ route('login') }}" class="your-button-styles">Login</a>
      @endauth
    </nav>
  </header>

  <main>
    <h1>
      Empowering the Next Generation of<br />Nursing Home Administrators
    </h1>
    <p class="tagline">
      This AI was trained specifically on NHA study material to deliver
      Lessons, Quizzes, Exams, Rationales, and Downloadable Flash Cards. It
      has been reviewed and approved by a Licensed Nursing Home Administrator.
    </p>

    <h2 class="section">Choose Your Plan</h2>
    <div class="plan-grid">
      <div class="plan">
        <img
          src="assets/images/p1.png"
          alt="Bronze Plan Icon"
          style="width: 100%; height: 150px; border-radius: 6px; object-fit: cover;" />
        <h3>Bronze Plan</h3>
        <p class="subhead">Perfect for new learners</p>
        <ul class="checklist">
          <li>AI-Generated Lessons</li>
          <li>Topic Quizzes</li>
          <li>Progress Dashboard</li>
          <li>Answer Explanations</li>
        </ul>
        <div class="price">$49.99/mo</div>
        <a href="https://buy.stripe.com/14k6su7T28i7fgk288">Subscribe</a>
      </div>

      <div class="plan">
        <img
          src="assets/images/p2.png"
          alt="Silver Plan Icon"
          style="width: 100%; height: 170px; border-radius: 6px; object-fit: cover;" />
        <h3>Silver Plan</h3>
        <p class="subhead">Most popular for serious students</p>
        <ul class="checklist">
          <li>Everything from Bronze</li>
          <li>4830 CORE & LOS Exam</li>
          <li>Answer Explanations</li>
          <li>Mobile Access</li>
        </ul>
        <div class="price">$59.99/mo</div>
        <a href="{{ route('register') }}">Subscribe</a>
      </div>

      <div class="plan">
        <img
          src="assets/images/p3.png"
          alt="Gold Plan Icon"
          style="width: 100%; height: 150px; border-radius: 6px; object-fit: cover;" />
        <h3>Gold Plan</h3>
        <p class="subhead">Essential for Passing on Your First Try</p>
        <ul class="checklist">
          <li>Everything from Silver</li>
          <li>Downloadable Flash Cards</li>
          <li>NHA Readiness Certificate</li>
          <li>Everything from Silver</li>
        </ul>
        <div class="price">$69.99/mo</div>
        <a href="{{ route('register') }}">Subscribe</a>
      </div>
    </div>
  </main>

  <footer>
    <h3>Why Choose Us?</h3>
    <ul>
      <li>Most Affordable and Complete NHA Self Study Program</li>
      <li>Over 4k High Quality Exam Questions</li>
      <li>Answer Explanations so you can learn from your mistakes</li>
      <li>Downloadable Flash Cards</li>
      <li>
        Subscriptions for 3 months and automatically renews but Cancel Anytime
      </li>
    </ul>
  </footer>
</body>

</html>