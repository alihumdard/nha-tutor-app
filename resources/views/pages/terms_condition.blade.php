<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
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
        margin-top: 3rem;
        text-align: center;
        background: white;
        color: #fff;
        padding: 3rem 2rem;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-heading {
        font-size: 1.875rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: black;
        letter-spacing: -0.5px;
    }

    .contact-text {
        font-size: 1.05rem;
        line-height: 1.7;
        max-width: 550px;
        color: black;
        margin: 0 auto 1.5rem auto;
    }

    .contact-email {
        display: inline-block;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        background: #fff;
        color: #1d4ed8;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .contact-email:hover {
        background: #1d4ed8;
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
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

    button {
        background: linear-gradient(135deg, #1d4ed8, #3b82f6);
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
        padding: 0.75rem 1.75rem;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        letter-spacing: 0.5px;
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }

    button:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    button:active {
        transform: scale(0.98);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
                <!-- Contact Information -->
                <div class="contact-section">
                    <h3 class="contact-heading">Contact Us</h3>
                    <p class="contact-text">
                        If you have any questions about these Terms and Conditions,
                        please contact us at:
                    </p>
                    <p class="contact-email">nhaaitutor@gmail.com</p>
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