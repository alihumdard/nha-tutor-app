<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Terms and Conditions - NHA Tutor Pro</title>
  <style>
    /* Base Styles */
    :root {
      --primary-color: #3b82f6;
      --secondary-color: #10b981;
      --text-color: #1f2937;
      --text-secondary: #4b5563;
      --bg-color: #f9fafb;
      --border-color: #e5e7eb;
      --white: #ffffff;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      line-height: 1.6;
      color: var(--text-color);
      background-color: var(--bg-color);
    }

    /* Layout Classes */
    .page-body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .page-container {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .main-content {
      flex-grow: 1;
      padding: 1rem;
    }

    .content-wrapper {
      max-width: 56rem;
      margin: 0 auto;
      width: 100%;
    }

    .content-card {
      background-color: var(--white);
      border-radius: 0.75rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      border: 1px solid var(--border-color);
      padding: 1.5rem;
      margin: 1rem 0;
    }

    /* Header Styles */
    header {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
      background-color: var(--white);
      border-bottom: 1px solid var(--border-color);
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .brand {
      font-size: 1.25rem;
      font-weight: bold;
      color: var(--text-color);
    }

    nav button {
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
      border: none;
      cursor: pointer;
      background-color: var(--primary-color);
      color: white;
      border-radius: 0.375rem;
      transition: background-color 0.2s;
    }

    nav button:hover {
      background-color: #2563eb;
    }

    .header-section {
      text-align: center;
      margin-bottom: 2rem;
    }

    .main-heading {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text-color);
      margin-bottom: 0.5rem;
      line-height: 1.2;
    }

    .intro-section {
      margin-bottom: 2rem;
    }

    .intro-text {
      color: var(--text-secondary);
      margin-bottom: 1rem;
      font-size: 1rem;
    }

    .terms-sections {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .blue-border {
      border-left-color: var(--primary-color);
    }

    .green-border {
      border-left-color: var(--secondary-color);
    }

    .purple-border {
      border-left-color: #8b5cf6;
    }

    .yellow-border {
      border-left-color: #f59e0b;
    }

    .red-border {
      border-left-color: #ef4444;
    }

    .indigo-border {
      border-left-color: #6366f1;
    }

    .term-heading {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text-color);
      margin-bottom: 0.5rem;
    }

    .term-content {
      color: var(--text-secondary);
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      font-size: 0.9375rem;
    }

    .notice-box {
      padding: 1rem;
      border-radius: 0.5rem;
      margin: 0.5rem 0;
    }

    .blue-notice {
      background-color: #eff6ff;
    }

    .green-notice {
      background-color: #ecfdf5;
    }

    .notice-list {
      padding-left: 1.25rem;
      margin-top: 0.5rem;
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }

    .notice-list li {
      margin-bottom: 0.25rem;
    }

    .acceptance-section {
      margin-top: 2rem;
      padding: 1.25rem;
      background-color: var(--bg-color);
      border-radius: 0.5rem;
      border: 1px solid var(--border-color);
    }

    .acceptance-heading {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--text-color);
      margin-bottom: 0.5rem;
    }

    .acceptance-text {
      color: var(--text-secondary);
      font-size: 0.9375rem;
    }

    .contact-section {
      margin-top: 2rem;
      text-align: center;
    }

    .contact-heading {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--text-color);
      margin-bottom: 0.5rem;
    }

    .contact-text {
      color: var(--text-secondary);
      font-size: 0.9375rem;
    }

    .contact-email {
      color: var(--primary-color);
      font-weight: 500;
      margin-top: 0.25rem;
      font-size: 0.9375rem;
    }

    .page-footer {
      background-color: var(--white);
      border-top: 1px solid var(--border-color);
      padding: 1rem;
      margin-top: 2rem;
    }

    .footer-content {
      max-width: 80rem;
      margin: 0 auto;
      text-align: center;
    }

    .footer-text {
      color: var(--text-secondary);
      font-size: 0.8125rem;
    }

    /* Responsive Styles */
    @media (min-width: 480px) {
      .main-content {
        padding: 1.5rem;
      }

      .content-card {
        padding: 2rem;
      }
    }

    @media (min-width: 640px) {
      .main-heading {
        font-size: 2rem;
      }

      .term-heading {
        font-size: 1.375rem;
      }

      .term-content,
      .acceptance-text,
      .contact-text,
      .contact-email {
        font-size: 1rem;
      }
    }

    @media (min-width: 768px) {
      header {
        padding: 1rem 1.5rem;
      }

      .brand {
        font-size: 1.5rem;
      }

      nav button {
        padding: 0.625rem 1.25rem;
        font-size: 1rem;
      }

      .main-content {
        padding: 2rem;
      }

      .content-card {
        padding: 2.5rem;
      }

      .main-heading {
        font-size: 2.25rem;
      }
    }

    @media (min-width: 1024px) {
      .content-wrapper {
        padding: 0;
      }

      .terms-sections {
        gap: 2rem;
      }
    }

    @media (min-width: 1280px) {
      .main-content {
        padding: 2rem 3rem;
      }
    }
  </style>
</head>

<body class="page-body">


  <header>
    <div class="brand">NHA Tutor Pro</div>
  </header>
  <div class="page-container">
    <!-- Main Content -->
    <main class="main-content">
      <div class="content-wrapper">
        <div class="content-card">
          <!-- Header Section -->
          <div class="header-section">
            <h1 class="main-heading">Terms and Conditions</h1>
          </div>

          <!-- Introduction -->
          <div class="intro-section">
            <p class="intro-text">
              Welcome to NHA Tutor Pro! These terms and conditions outline the
              rules and regulations for the use of our educational platform.
            </p>
            <p class="intro-text">
              By accessing this platform, we assume you accept these terms and
              conditions in full. Do not continue to use NHA Tutor Pro if you
              do not accept all of the terms and conditions stated on this
              page.
            </p>
          </div>

          <!-- Terms Sections -->
          <div class="terms-sections">
            <!-- Section 1 -->
            <div class="">
              <h2 class="term-heading">1. License to Use</h2>
              <div class="term-content">
                <p>
                  Unless otherwise stated, NHA Tutor Pro and/or its licensors
                  own the intellectual property rights for all material on
                  this platform. All intellectual property rights are
                  reserved.
                </p>
                <p>
                  You may view and/or print pages from https://nhatutorpro.com
                  for your own personal use subject to restrictions set in
                  these terms and conditions.
                </p>
                <div class="notice-box blue-notice">
                  <strong>You must not:</strong>
                  <ul class="notice-list">
                    <li>Republish material from this platform</li>
                    <li>
                      Sell, rent or sub-license material from this platform
                    </li>
                    <li>
                      Reproduce, duplicate or copy material from this platform
                    </li>
                    <li>Redistribute content from NHA Tutor Pro</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Section 2 -->
            <div class="green-border">
              <h2 class="term-heading">2. User Responsibilities</h2>
              <div class="term-content">
                <p>
                  As a user of our platform, you agree to use NHA Tutor Pro
                  only for lawful purposes and in a way that does not infringe
                  the rights of, restrict or inhibit anyone else's use and
                  enjoyment of the platform.
                </p>
                <div class="notice-box green-notice">
                  <strong>Prohibited activities include:</strong>
                  <ul class="notice-list">
                    <li>Harassing or causing distress to other users</li>
                    <li>
                      Uploading offensive, obscene or inappropriate content
                    </li>
                    <li>
                      Disrupting the normal flow of dialogue within our
                      platform
                    </li>
                    <li>
                      Attempting to gain unauthorized access to our systems
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Section 3 -->
            <div class="">
              <h2 class="term-heading">3. Account Security</h2>
              <div class="term-content">
                <p>
                  You are responsible for maintaining the confidentiality of
                  your account and password and for restricting access to your
                  computer or device. You agree to accept responsibility for
                  all activities that occur under your account or password.
                </p>
                <p>
                  We reserve the right to refuse service, terminate accounts,
                  remove or edit content, or cancel orders at our sole
                  discretion.
                </p>
              </div>
            </div>

            <!-- Section 4 -->
            <div class="">
              <h2 class="term-heading">4. Content Liability</h2>
              <div class="term-content">
                <p>
                  We shall not be held responsible for any content that
                  appears on your learning dashboard. You agree to protect and
                  defend us against all claims that may arise from your use of
                  our platform.
                </p>
                <p>
                  No link(s) should appear on any website that may be
                  interpreted as libelous, obscene or criminal, or which
                  infringes, otherwise violates, or advocates the infringement
                  or other violation of, any third party rights.
                </p>
              </div>
            </div>

            <!-- Section 5 -->
            <div class="">
              <h2 class="term-heading">5. Privacy Policy</h2>
              <div class="term-content">
                <p>
                  Your privacy is important to us. Our Privacy Policy explains
                  how we collect, use, disclose, and safeguard your
                  information when you visit our platform.
                </p>
                <p>
                  Please review our Privacy Policy, which is incorporated into
                  these Terms and Conditions. If you do not agree with our
                  Privacy Policy, you must not use our platform.
                </p>
              </div>
            </div>

            <!-- Section 6 -->
            <div class="">
              <h2 class="term-heading">6. Changes to Terms</h2>
              <div class="term-content">
                <p>
                  We reserve the right, at our sole discretion, to modify or
                  replace these Terms at any time. We will provide at least 30
                  days' notice prior to any new terms taking effect.
                </p>
                <p>
                  By continuing to access or use our platform after those
                  revisions become effective, you agree to be bound by the
                  revised terms. If you do not agree to the new terms, you
                  must stop using the platform.
                </p>
              </div>
            </div>
          </div>

          <!-- Acceptance Section -->
          <div class="acceptance-section">
            <h3 class="acceptance-heading">Acceptance of Terms</h3>
            <p class="acceptance-text">
              By using NHA Tutor Pro, you signify your acceptance of these
              terms and conditions. If you do not agree to these terms, please
              do not use our platform. Your continued use of the platform
              following the posting of changes to these terms will be deemed
              your acceptance of those changes.
            </p>
          </div>

          <!-- Contact Information -->
          <div class="contact-section">
            <h3 class="contact-heading">Contact Us</h3>
            <p class="contact-text">
              If you have any questions about these Terms and Conditions,
              please contact us at:
            </p>
            <p class="contact-email">support@nhatutorpro.com</p>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="page-footer">
      <div class="footer-content">
        <p class="footer-text">© 2023 NHA Tutor Pro. All rights reserved.</p>
      </div>
    </footer>
  </div>
</body>

</html>
 @include('includes.security-scripts')
