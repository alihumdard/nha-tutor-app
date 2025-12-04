<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NHA Tutor Pro</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      background-color: #f9fafb;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
      padding: 0px 190px;
    }

    .header-container {
      width: 82%;
      margin-left: auto;
      margin-right: auto;
    }

    .main-content {
      flex-grow: 1;
    }

    .container {
      max-width: 80rem;
      margin-left: auto;
      margin-right: auto;
      padding: 2rem 1rem;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .card {
      background-color: white;
      border-radius: 0.75rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      border: 1px solid #e5e7eb;
      transition: all 0.3s;
      overflow: hidden;
    }

    .card:hover {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      transform: translateY(-0.25rem);
    }

    .card-content {
      padding: 1.5rem;
    }

    .progress-container {
      margin-top: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .progress-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: radial-gradient(closest-side,
          white 79%,
          transparent 80% 100%),
        conic-gradient(#229a76 25%, #90ee90 0);
    }

    .progress-bar::before {
      content: "25%";
      font-size: 1.5rem;
      font-weight: bold;
      color: #3cb371;
    }

    .progress-title {
      font-size: 1.25rem;
      font-weight: bold;
      padding-top: 1.5rem;
    }

    .learning-plan-image {
      width: 10rem;
      height: 10rem;
    }

    .exam-title {
      font-size: 1.5rem;
      font-weight: bold;
      color: #1f2937;
      text-align: center;
      margin-bottom: 1rem;
    }

    .exam-button {
      width: 100%;
      background-color: #229a76;
      border: none;
      margin-top: 15px;
      color: white;
      padding: 0.75rem 2.5rem;
      border-radius: 0.5rem;
      font-weight: 500;
      transition: all 0.3s;
      transform: scale(1);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .exam-button:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .modules-section {
      width: 100%;
      padding: 2rem 0;
      margin-bottom: 2rem;
    }

    .modules-container {
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }

    .module-section {
      width: 100%;
      border: 1px solid #e5e7eb;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      overflow: hidden;
    }

    .modules-grid {
      display: grid;
      gap: 1rem;
    }

    .module-card {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .module-card h3 {
      color: #1f2937;
      font-size: 0.875rem;
      font-weight: 500;
      text-align: left;
    }

    .module-card button {
      color: #2563eb;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-weight: 500;
      transition: all 0.3s ease-in-out;
      background: transparent;
      border: none;
      cursor: pointer;
    }

    .module-card button:hover {
      opacity: 0.8;
    }

    .text-center {
      text-align: center;
    }

    .flex-grow {
      flex-grow: 1;
    }

    .mt-auto {
      margin-top: auto;
    }

    .section-header {
      padding: 1rem;
      margin-bottom: 1.5rem;
      text-align: center;
      background-color: #f3f4f6;
    }

    .section-header h2 {
      font-weight: bold;
      font-size: 1.25rem;
      margin-bottom: 0.25rem;
    }

    .modules-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
      padding: 0 1.5rem;
    }

    .module-card {
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .module-card h3 {
      color: #1f2937;
      font-size: 0.875rem;
      font-weight: 500;
      margin-bottom: 0.75rem;
      text-align: left;
    }

    .module-card button {
      color: #2563eb;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-weight: 500;
      transition: all 0.3s;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      border-bottom: 1px solid var(--border);
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
      border: 1px solid gray;
      border-radius: 10px;
      padding: 8px 18px;
      cursor: pointer;
      font-size: 0.95rem;
    }

    .module-card button:hover {
      color: #1e40af;
    }

    .show-more-container {
      margin: 1.5rem 0;
      text-align: center;
      padding: 0 1.5rem;
    }

    .bold {
      font-weight: 500;
      font-size: 15px;
    }

    .show-more-button {
      color: #2563eb;
      font-weight: 500;
      font-size: 0.875rem;
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: auto;
      margin-right: auto;
      transition: color 0.3s;
      border: none;
    }

    .show-more-button:hover {
      color: #1e40af;
    }

    .chevron-icon {
      height: 1rem;
      width: 1rem;
      margin-left: 0.25rem;
    }

    @media (max-width: 1190px) {
      body {
        padding: 0px 20px;
      }
    }

    @media (max-width: 640px) {
      body {
        padding: 0px 20px;
      }
    }

    @media (min-width: 640px) {
      .container {
        padding: 2rem 1.5rem;
      }

      .dashboard-cards {
        grid-template-columns: repeat(3, 1fr);
      }

      .progress-bar {
        width: 100px;
        height: 100px;
      }

      .progress-bar::before {
        font-size: 1.2rem;
      }

      .module-card {
        flex-direction: row;
        align-items: center;
      }

      .module-card h3 {
        margin-bottom: 0;
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 0px 50px;
      }
    }

    @media (min-width: 768px) {
      .modules-container {
        flex-direction: row;
      }

      .module-section {
        width: 50%;
      }
    }

    @media (min-width: 1024px) {
      .dashboard-cards {
        grid-template-columns: repeat(3, 1fr);
      }

      .container {
        padding: 2rem 2rem;
      }
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to right, #eff6ff, #eef2ff);
      border-top: 1px solid #e5e7eb;
      padding: 12px 16px;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
      z-index: 1000;
    }

    .nav-items {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      flex-wrap: nowrap;
    }

    .nav-link {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: #374151;
      font-size: 0.75rem;
      font-weight: 500;
      width: 60px;
      transition: color 0.3s ease;
    }

    .icon-wrapper {
      margin-bottom: 4px;
    }

    .icon {
      width: 20px;
      height: 20px;
      stroke-width: 2;
    }

    .label {
      display: block;
    }

    .nav-link:hover .blue {
      color: #1e3a8a;
    }

    .nav-link:hover .indigo {
      color: #3730a3;
    }

    .nav-link:hover .purple {
      color: #6b21a8;
    }

    .nav-link:hover .green {
      color: #166534;
    }

    .nav-link:hover .orange {
      color: #c2410c;
    }

    .blue {
      color: #2563eb;
    }

    .indigo {
      color: #4f46e5;
    }

    .purple {
      color: #7c3aed;
    }

    .green {
      color: #16a34a;
    }

    .orange {
      color: #f97316;
    }


    @media (max-width: 540px) {
      body {
        padding: 0px 10px;
      }
    }

    @media (max-width: 640px) {
      body {
        padding: 0px 10px;
      }
    }

    @media (min-width: 640px) {
      .nav-items {
        gap: 1rem;
      }
    }

    @media (min-width: 768px) {
      .nav-items {
        gap: 1.5rem;
      }
    }

    @media (min-width: 1024px) {
      .nav-items {
        gap: 2rem;
      }
    }

    @media (min-width: 1280px) {
      .nav-items {
        gap: 10rem;
      }
    }

    .tools-grid {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 1rem;
    }

    @media (min-width: 1024px) {
      .tools-grid {
        grid-template-columns: 1fr;
      }
    }

    .tool-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0a4d68;
      color: white;
      border: 1px solid #e5e7eb;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      font-size: 0.75rem;
      font-weight: 500;
      gap: 0.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .tool-btn svg {
      width: 1.25rem;
      height: 1.25rem;
      stroke: currentColor;
      stroke-width: 2;
      fill: none;
    }
  </style>
</head>

<body class="font-sans">
  @include('pages.preloader')
  <header
    style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 24px;
        background-color: #f9fafb;
      ">
    @auth
    @if(auth()->user()->subscribed('default'))
    <form method="POST" action="{{ route('subscribe.cancel') }}">
      @csrf
      <button type="submit" style="font-size: 20px; border: none; cursor: pointer; font-weight: 400; color: gray; background-color: transparent;">
        Unsubscribe
      </button>
    </form>
    @else
    <a href="{{ route('home') }}" style="font-size: 20px; border: none; cursor: pointer; font-weight: 400; color: gray; text-decoration: none;">
      View Plans
    </a>
    @endif
    @else
    <div style="width: 120px;"></div>
    @endauth
    <div
      class="brand"
      style="font-size: 1.6rem; font-weight: 600; color: #1f2937">
      NHA Tutor Pro
    </div>
    <nav>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          style="
                padding: 8px 16px;
                font-size: 20px;
                border: none;
                cursor: pointer;
                font-weight: 500;
                background-color: transparent;
            ">
          Log out
        </button>
      </form>
    </nav>
  </header>

  <div class="min-h-screen w-full flex flex-col">
    <main class="main-content">
      <div class="container mx-auto">
        <h2 style=" text-align: center; padding-top: 25px; font-size: x-large; font-weight: 500;">
          Here is All Quizzes <br>
          Make the Most of your study time
        </h2>

        <div class="modules-section">
          <div class="modules-container">
            <div class="module-section core-section">
              <div class="section-header">
                <h2>You Can</h2>
              </div>

              <div class="modules-grid" id="coreModulesContainer">
                @foreach($coreModules as $module)
                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic', ['slug' => $module->slug]) }}" style="color: revert; text-decoration: revert;">{{ $module->title }}</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz', ['module' => $module->id]) }}" style="color: revert; text-decoration: revert;">Quiz</a>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="show-more-container">
                <button id="showMoreCoreBtn" class="show-more-button font-bold">
                  Show More Modules
                  <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>

            <div class="module-section los-section">
              <div class="section-header">
                <h2>Do It</h2>
              </div>

              <div class="modules-grid" id="losModulesContainer">
                @foreach($losModules as $module)
                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic', ['slug' => $module->slug]) }}" style="color: revert; text-decoration: revert;">{{ $module->title }}</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz', ['module' => $module->id]) }}" style="color: revert; text-decoration: revert;">Quiz</a>
                  </div>
                </div>
                @endforeach
              </div>

              <div class="show-more-container">
                <button id="showMoreLosBtn" class="show-more-button font-bold">
                  Show More Modules
                  <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        @include('includes.bottom-navigation')
      </div>
    </main>
  </div>
 @include('includes.security-scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      function setupPagination(containerId, buttonId, initialVisible) {
          const container = document.getElementById(containerId);
          if (!container) return;

          const button = document.getElementById(buttonId);
          const modules = container.querySelectorAll(".module-card");
          let visibleCount = initialVisible;

          function updateVisibility() {
              modules.forEach((module, index) => {
                  module.style.display = index < visibleCount ? "flex" : "none";
              });

              if (visibleCount >= modules.length) {
                  button.style.display = "none";
              } else {
                  button.style.display = "flex";
              }
          }

          button.addEventListener("click", function() {
              visibleCount += 6;
              updateVisibility();
          });

          updateVisibility();
      }

      setupPagination("coreModulesContainer", "showMoreCoreBtn", 6);
      setupPagination("losModulesContainer", "showMoreLosBtn", 6);
    });
  </script>
</body>
</html>
