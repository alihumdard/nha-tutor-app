<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NHA Tutor Pro</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    /* Base Styles */
    body {
      background-color: #f9fafb;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
      padding: 0px 190px;
    }

    /* Header */
    .header-container {
      width: 82%;
      margin-left: auto;
      margin-right: auto;
    }

    /* Main Content */
    .main-content {
      flex-grow: 1;
    }

    .container {
      max-width: 80rem;
      margin-left: auto;
      margin-right: auto;
      padding: 2rem 1rem;
    }

    /* Cards */
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

    /* Progress Bar */
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

    /* Learning Plan */
    .learning-plan-image {
      width: 10rem;
      height: 10rem;
    }

    /* Exam Card */
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

    /* Modules Section */
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

      /* box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); */
      height: 100%;
    }

    .module-card h3 {
      color: #1f2937;
      /* Tailwind's text-gray-800 */
      font-size: 0.875rem;
      /* text-sm */
      font-weight: 500;
      /* font-medium */
      text-align: left;
    }

    .module-card button {
      color: #2563eb;
      /* Tailwind's text-blue-600 */
      padding: 0.5rem 1rem;
      /* py-2 px-4 */
      border-radius: 0.5rem;
      /* rounded-lg */
      font-size: 1rem;
      /* text-md is not in Tailwind by default, assume 1rem */
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

    /* Responsive Styles */
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

    /* Navigation Container */
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

    /* Hover colors */
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

    /* Icon default colors */
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


    /* Responsive Gaps */
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
                background-color: transparent; /* Makes the button look like a link */
            ">
          Log out
        </button>
      </form>
    </nav>
  </header>

  <div class="min-h-screen w-full flex flex-col">
    <!-- Main Content -->
    <main class="main-content">
      <div class="container mx-auto">
        <!-- Dashboard Cards -->

        <h2 style=" text-align: center; padding-top: 25px; font-size: x-large; font-weight: 500;">
          Here is All Modules <br>
          Make the Most of your study time
        </h2>

        <div class="modules-section">
          <div class="modules-container">
            <!-- CORE Section -->
            <div class="module-section core-section">
              <div class="section-header">
                <h2>CORE</h2>
              </div>

              <div class="modules-grid" id="coreModulesContainer">
                <!-- CORE Modules -->
                <div class="module-card">
                  <div class="flex-grow" style="cursor: pointer;">
                    <a href="{{ route('send.topic',['less_name' => 'Quality of Care']) }}" class="send-topic" data-topic="Quality of Care">Quality of Care</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Quality of Care']) }}" class="">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Medical and Nursing Care Practices']) }}" class="send-topic" data-topic="Medical and Nursing Care Practices">Medical and Nursing Care Practices</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Medical and Nursing Care Practices']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Medication Management and Administration']) }}" class="send-topic" data-topic="Medication Management and Administration">Medication Management and Administration</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Medication Management and Administration']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Disease Management (e.g., acute vs. chronic conditions)']) }}" class="send-topic" data-topic="Disease Management (e.g., acute vs. chronic conditions)">Disease Management (e.g., acute vs. chronic conditions)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Disease Management (e.g., acute vs. chronic conditions)']) }}">Quiz</a>
                  </div>
                </div>
                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Nutrition and Hydration (e.g., specialized diets)']) }}" class="send-topic" data-topic="Nutrition and Hydration (e.g., specialized diets)">Nutrition and Hydration (e.g., specialized diets)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Nutrition and Hydration (e.g., specialized diets)']) }}">Quiz</a>
                  </div>
                </div>
                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs))']) }}" class="send-topic" data-topic="Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)">Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs))']) }}">Quiz</a>
                  </div>
                </div>
                <!-- Hidden modules -->
                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Rehabilitation and Restorative Programs']) }}" class="send-topic" data-topic="Rehabilitation and Restorative Programs">Rehabilitation and Restorative Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Rehabilitation and Restorative Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Assessment and Interdisciplinary Care Planning']) }}" class="send-topic" data-topic="Care Recipient Assessment and Interdisciplinary Care Planning">Care Recipient Assessment and Interdisciplinary CarePlanning</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quizzes') }}">Quiz</a>
                  </div>
                </div>
                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Clinical and Medical Records and Documentation Requirements e.g., storage, retention']) }}" class="send-topic" data-topic="Clinical and Medical Records and Documentation Requirements e.g., storage, retention">Clinical and Medical Records and Documentation Requirements e.g., storage, retention</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Clinical and Medical Records and Documentation Requirements e.g., storage, retention']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Medical Director']) }}" class="send-topic" data-topic="Medical Director">Medical Director</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Medical Director']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Emergency Medical Services (e.g., CPR, first aid,Heimlich maneuver, AED)']) }}" class="send-topic" data-topic=" Emergency Medical Services (e.g., CPR, first aid,Heimlich maneuver, AED)"> Emergency Medical Services (e.g., CPR, first aid,Heimlich maneuver, AED)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Emergency Medical Services (e.g., CPR, first aid,Heimlich maneuver, AED)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Transition of Care (e.g., admission, move-in, transfer, discharge, and move-out)']) }}" class="send-topic" data-topic="Transition of Care (e.g., admission, move-in, transfer, discharge, and move-out)">Transition of Care (e.g., admission, move-in, transfer,discharge, and move-out)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Transition of Care (e.g., admission, move-in, transfer, discharge, and move-out)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Basic Healthcare Terminology']) }}" class="send-topic" data-topic="Basic Healthcare Terminology">Basic Healthcare Terminology</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Basic Healthcare Terminology']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Quality of Life']) }}" class="send-topic" data-topic="Quality of Life">Quality of Life</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Quality of Life']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Psychosocial Needs (e.g., social, spiritual, community,cultural)']) }}" class="send-topic" data-topic=" Psychosocial Needs (e.g., social, spiritual, community,cultural)"> Psychosocial Needs (e.g., social, spiritual, community,cultural)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Psychosocial Needs (e.g., social, spiritual, community,cultural)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Person-Centered Care and Comprehensive Care Planning']) }}" class="send-topic" data-topic="Person-Centered Care and Comprehensive Care Planning">Person-Centered Care and Comprehensive Care Planning</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Person-Centered Care and Comprehensive Care Planning']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Person-Centered Environment (e.g., home-like environment)']) }}" class="send-topic" data-topic="Person-Centered Environment (e.g., home-like environment)">Person-Centered Environment (e.g., home-like environment)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Person-Centered Environment (e.g., home-like environment)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Bill of Rights and Responsibilities']) }}" class="send-topic" data-topic=" Care Recipient Bill of Rights and Responsibilities"> Care Recipient Bill of Rights and Responsibilities</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Bill of Rights and Responsibilities']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Safety (e.g., fall prevention, elopement prevention, adverse events)']) }}" class="send-topic" data-topic="Care Recipient Safety (e.g., fall prevention, elopement prevention, adverse events)">Care Recipient Safety (e.g., fall prevention, elopement prevention, adverse events)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Safety (e.g., fall prevention, elopement prevention, adverse events)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient (and Representative) Grievance, Conflict, and Dispute Resolution']) }}" class="send-topic" data-topic="Care Recipient (and Representative) Grievance, Conflict,and Dispute Resolution">Care Recipient (and Representative) Grievance, Conflict, and Dispute Resolution</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient (and Representative) Grievance, Conflict, and Dispute Resolution']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Decision-Making (e.g., capacity, power of attorney, guardianship)']) }}" class="send-topic" data-topic="Care Recipient Decision-Making (e.g., capacity, power of attorney, guardianship)">Care Recipient Decision-Making (e.g., capacity, power of attorney, guardianship)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Decision-Making (e.g., capacity, power of attorney, guardianship)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient (and Representative) Satisfaction']) }}" class="send-topic" data-topic="Care Recipient (and Representative) Satisfaction">Care Recipient (and Representative) Satisfaction</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient (and Representative) Satisfaction']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Recognition of Maltreatment (e.g., abuse, neglect, exploitation)']) }}" class="send-topic" data-topic="Recognition of Maltreatment (e.g., abuse, neglect, exploitation)">Recognition of Maltreatment (e.g., abuse, neglect, exploitation)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Recognition of Maltreatment (e.g., abuse, neglect, exploitation)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Mental and Behavioral Health (e.g., cognitive impairment, depression, social support systems)']) }}" class="send-topic" data-topic="Mental and Behavioral Health (e.g., cognitive impairment, depression, social support systems)">Mental and Behavioral Health (e.g., cognitive impairment, depression, social support systems)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Mental and Behavioral Health (e.g., cognitive impairment, depression, social support systems)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Trauma-Informed Care (e.g., PTSD)']) }}" class="send-topic" data-topic="Trauma-Informed Care (e.g., PTSD)">Trauma-Informed Care (e.g., PTSD)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Trauma-Informed Care (e.g., PTSD)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Trauma-Informed Care (e.g., PTSD)']) }}" class="send-topic" data-topic="Trauma-Informed Care (e.g., PTSD)">Trauma-Informed Care (e.g., PTSD)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Trauma-Informed Care (e.g., PTSD)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Pain Management']) }}" class="send-topic" data-topic="Pain Management"></a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Pain Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Death, Dying, and Grief']) }}" class="send-topic" data-topic="Death, Dying, and Grief">Death, Dying, and Grief</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Death, Dying, and Grief']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Restraint Usage and Reduction']) }}" class="send-topic" data-topic="Restraint Usage and Reduction">Restraint Usage and Reduction</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Restraint Usage and Reduction']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Foodservice (e.g., choice and menu planning, dietary management, food storage and handling, dining services)']) }}" class="send-topic" data-topic="Foodservice (e.g., choice and menu planning, dietary management, food storage and handling, dining services)">Foodservice (e.g., choice and menu planning, dietary management, food storage and handling, dining services)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Foodservice (e.g., choice and menu planning, dietary management, food storage and handling, dining services)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Social Services Programs']) }}" class="send-topic" data-topic="Social Services Programs">Social Services Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Social Services Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Therapeutic Recreation and Activity Programs']) }}" class="send-topic" data-topic="Therapeutic Recreation and Activity Programs">Therapeutic Recreation and Activity Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Therapeutic Recreation and Activity Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Community Resources, Programs, and Agencies (e.g., meals on wheels, housing vouchers, Area Agencies on Aging,Veterans Affairs)']) }}" class="send-topic" data-topic="Community Resources, Programs, and Agencies (e.g., meals on wheels, housing vouchers, Area Agencies on Aging,Veterans Affairs)">Community Resources, Programs, and Agencies (e.g., meals on wheels, housing vouchers, Area Agencies on Aging, Veterans Affairs)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Community Resources, Programs, and Agencies (e.g., meals on wheels, housing vouchers, Area Agencies on Aging,Veterans Affairs)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Ancillary Services']) }}" class="send-topic" data-topic="Ancillary Services">Ancillary Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Ancillary Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Hospice and Palliative Care']) }}" class="send-topic" data-topic="Hospice and Palliative Care">Hospice and Palliative Care</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Hospice and Palliative Care']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Specialized Medical Equipment (e.g., oxygen, durable medical equipment)']) }}" class="send-topic" data-topic="Specialized Medical Equipment (e.g., oxygen, durable medical equipment)">Specialized Medical Equipment (e.g., oxygen, durable medical equipment)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Specialized Medical Equipment (e.g., oxygen, durable medical equipment)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Transportation for Care Recipients']) }}" class="send-topic" data-topic="Transportation for Care Recipients">Transportation for Care Recipients</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Transportation for Care Recipients']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Telemedicine (e.g., e-health)']) }}" class="send-topic" data-topic="Telemedicine (e.g., e-health)">Telemedicine (e.g., e-health)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Telemedicine (e.g., e-health)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Diagnostic Services (e.g., radiology, lab services)']) }}" class="send-topic" data-topic="Diagnostic Services (e.g., radiology, lab services)">Diagnostic Services (e.g., radiology, lab services)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Diagnostic Services (e.g., radiology, lab services)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Dental and Oral Care Services']) }}" class="send-topic" data-topic="Dental and Oral Care Services">Dental and Oral Care Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Dental and Oral Care Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Healthcare Partners and Clinical Providers (e.g., MD/DO, Nurse Practitioner, Psychiatrist, Podiatrist, Dentist)']) }}" class="send-topic" data-topic="Healthcare Partners and Clinical Providers (e.g., MD/DO, Nurse Practitioner, Psychiatrist, Podiatrist, Dentist)">Healthcare Partners and Clinical Providers (e.g., MD/DO, Nurse Practitioner, Psychiatrist, Podiatrist, Dentist)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Healthcare Partners and Clinical Providers (e.g., MD/DO, Nurse Practitioner, Psychiatrist, Podiatrist, Dentist)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Volunteer Programs']) }}" class="send-topic" data-topic="Volunteer Programs">Volunteer Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Volunteer Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Management']) }}" class="send-topic" data-topic="Financial Management">Financial Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Budgeting and Forecasting']) }}" class="send-topic" data-topic="Budgeting and Forecasting">Budgeting and Forecasting</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Budgeting and Forecasting']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Analysis (e.g., ratios, profitability, debt, revenue mix, depreciation, operating margin, cash flow)']) }}" class="send-topic" data-topic=" Financial Analysis (e.g., ratios, profitability, debt, revenue mix, depreciation, operating margin, cash flow)"> Financial Analysis (e.g., ratios, profitability, debt, revenue mix, depreciation, operating margin, cash flow)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Analysis (e.g., ratios, profitability, debt, revenue mix, depreciation, operating margin, cash flow)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Revenue Cycle Management (e.g., billing, accounts receivable, accounts payable, collections)']) }}" class="send-topic" data-topic="Revenue Cycle Management (e.g., billing, accounts receivable, accounts payable, collections)">Revenue Cycle Management (e.g., billing, accounts receivable, accounts payable, collections)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Revenue Cycle Management (e.g., billing, accounts receivable, accounts payable, collections)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Statements (e.g., income/revenue statement, balance sheet, statement of cash flows, cost reporting)']) }}" class="send-topic" data-topic="Financial Statements (e.g., income/revenue statement, balance sheet, statement of cash flows, cost reporting)">Financial Statements (e.g., income/revenue statement, balance sheet, statement of cash flows, cost reporting)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Statements (e.g., income/revenue statement, balance sheet, statement of cash flows, cost reporting)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs,Medicaid, private payors)']) }}" class="send-topic" data-topic="Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs, Medicaid, private payors)">Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs,Medicaid, private payors)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs,Medicaid, private payors)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Reporting Requirements (e.g., requirements for not-for-profit, for-profit, and governmental providers)']) }}" class="send-topic" data-topic="Financial Reporting Requirements (e.g., requirements for not-for-profit, for-profit, and governmental providers)">Financial Reporting Requirements (e.g., requirements for not-for-profit, for-profit, and governmental providers)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Reporting Requirements (e.g., requirements for not-for-profit, for-profit, and governmental providers)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'ntegration of Clinical and Financial Systems (e.g., EMR/EHR, MDS)']) }}" class="send-topic" data-topic="ntegration of Clinical and Financial Systems (e.g., EMR/EHR, MDS)">ntegration of Clinical and Financial Systems (e.g., EMR/EHR, MDS)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'ntegration of Clinical and Financial Systems (e.g., EMR/EHR, MDS)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Internal Financial Management Controls (e.g., segregation of duties, access)']) }}" class="send-topic" data-topic="Internal Financial Management Controls (e.g., segregation of duties, access)">Internal Financial Management Controls (e.g., segregation of duties, access)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Internal Financial Management Controls (e.g., segregation of duties, access)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Supply-Chain Management (e.g., inventory control)']) }}" class="send-topic" data-topic="Supply-Chain Management (e.g., inventory control)">Supply-Chain Management (e.g., inventory control)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Supply-Chain Management (e.g., inventory control)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Resident Trust Accounts for Personal Funds']) }}" class="send-topic" data-topic="Resident Trust Accounts for Personal Funds">Resident Trust Accounts for Personal Funds</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Resident Trust Accounts for Personal Funds']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Risk Management']) }}" class="send-topic" data-topic="Risk Management">Risk Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Risk Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'OSHA Rules and Regulations']) }}" class="send-topic" data-topic="OSHA Rules and Regulations">OSHA Rules and Regulations</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'OSHA Rules and Regulations']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Workers Compensation']) }}" class="send-topic" data-topic="Workers' Compensation">Workers' Compensation</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Workers Compensation']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Ethical Conduct and Standards of Practice']) }}" class="send-topic" data-topic="Ethical Conduct and Standards of Practice">Ethical Conduct and Standards of Practice</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Ethical Conduct and Standards of Practice']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Setting']) }}" class="send-topic" data-topic="Care Setting">Care Setting</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Setting']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds']) }}" class="send-topic" data-topic="Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds">Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Person-Centered Environment (e.g., home-like environment)']) }}" class="send-topic" data-topic="Person-Centered Environment (e.g., home-like environment)">Person-Centered Environment (e.g., home-like environment)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Person-Centered Environment (e.g., home-like environment)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Safety and Accessibility (e.g., ADA, safety data sheets)']) }}" class="send-topic" data-topic="Safety and Accessibility (e.g., ADA, safety data sheets)">Safety and Accessibility (e.g., ADA, safety data sheets)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Safety and Accessibility (e.g., ADA, safety data sheets)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Facility Management and Environmental Services']) }}" class="send-topic" data-topic="Facility Management and Environmental Services">Facility Management and Environmental Services</a>

                    <h3>Facility Management and Environmental Services</h3>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Facility Management and Environmental Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Preventative and Routine Maintenance Programs (e.g., pest control, equipment, mechanical systems)']) }}"
                      class="send-topic"
                      data-topic="Preventative and Routine Maintenance Programs (e.g., pest control, equipment, mechanical systems)">Preventative
                      and Routine Maintenance Programs (e.g., pest control, equipment, mechanical systems)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Preventative and Routine Maintenance Programs (e.g., pest control, equipment, mechanical systems)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Infection Control and Sanitation (e.g., linens, kitchen, hand washing, healthcare-acquired infections, hazardous materials)']) }}" class="send-topic" data-topic="Infection Control and Sanitation (e.g., linens, kitchen, hand washing, healthcare-acquired infections, hazardous materials)">Infection Control and Sanitation (e.g., linens, kitchen, hand washing, healthcare-acquired infections, hazardous materials)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Infection Control and Sanitation (e.g., linens, kitchen, hand washing, healthcare-acquired infections, hazardous materials)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Disaster and Emergency Planning, Preparedness, Response,and Recovery (e.g., Appendix Z)']) }}" class="send-topic" data-topic="Disaster and Emergency Planning, Preparedness, Response,and Recovery (e.g., Appendix Z)">Disaster and Emergency Planning, Preparedness, Response,and Recovery (e.g., Appendix Z)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Disaster and Emergency Planning, Preparedness, Response,and Recovery (e.g., Appendix Z)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Leadership']) }}" class="send-topic" data-topic="Leadership">Leadership</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Leadership']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Organizational Structures (e.g., departments, functions,systemic processes)']) }}" class="send-topic" data-topic="Organizational Structures (e.g., departments, functions,systemic processes)">Organizational Structures (e.g., departments, functions,systemic processes)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Organizational Structures (e.g., departments, functions,systemic processes)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Organizational Change Management']) }}" class="send-topic" data-topic="Organizational Change Management">Organizational Change Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Organizational Change Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Organizational Behavior (e.g., organizational culture,team building, group dynamics)']) }}" class="send-topic" data-topic="Organizational Behavior (e.g., organizational culture,team building, group dynamics)">Organizational Behavior (e.g., organizational culture,team building, group dynamics)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Organizational Behavior (e.g., organizational culture,team building, group dynamics)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Leadership Principles (e.g., communication, styles,mentoring, coaching, personal professional development)']) }}" class="send-topic" data-topic="Leadership Principles (e.g., communication, styles,mentoring, coaching, personal professional development)">Leadership Principles (e.g., communication, styles,mentoring, coaching, personal professional development)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Leadership Principles (e.g., communication, styles,mentoring, coaching, personal professional development)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Governance (e.g., board of directors, governing bodies,corporate entities, advisory boards)']) }}" class="send-topic" data-topic="Governance (e.g., board of directors, governing bodies,corporate entities, advisory boards)">Governance (e.g., board of directors, governing bodies,corporate entities, advisory boards)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Governance (e.g., board of directors, governing bodies,corporate entities, advisory boards)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Professional Advocacy and Governmental Relations']) }}" class="send-topic" data-topic="Professional Advocacy and Governmental Relations">Professional Advocacy and Governmental Relations</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Professional Advocacy and Governmental Relations']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Organizational Strategy']) }}" class="send-topic" data-topic="Organizational Strategy">Organizational Strategy</a>>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Organizational Strategy']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Mission, Vision, and Value Statements']) }}" class="send-topic" data-topic="Mission, Vision, and Value Statements">Mission, Vision, and Value Statements</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Mission, Vision, and Value Statements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Strategic Business Planning (e.g., new lines of service,succession management, staffing pipeline)']) }}" class="send-topic" data-topic="Strategic Business Planning (e.g., new lines of service,succession management, staffing pipeline)">Strategic Business Planning (e.g., new lines of service,succession management, staffing pipeline)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Strategic Business Planning (e.g., new lines of service,succession management, staffing pipeline)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Specialized Rehabilitation or Skilled Services']) }}" class="send-topic" data-topic="Specialized Rehabilitation or Skilled Services">Specialized Rehabilitation or Skilled Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Specialized Rehabilitation or Skilled Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Durable Medical Equipment (DME) and Assistive Devices']) }}" class="send-topic" data-topic=" Durable Medical Equipment (DME) and Assistive Devices"> Durable Medical Equipment (DME) and Assistive Devices</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Durable Medical Equipment (DME) and Assistive Devices']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Laboratory Services']) }}" class="send-topic" data-topic="Laboratory Services">Laboratory Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Laboratory Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Sexual Expression and Intimacy Needs']) }}" class="send-topic" data-topic="Sexual Expression and Intimacy Needs">Sexual Expression and Intimacy Needs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Sexual Expression and Intimacy Needs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Telehealth and Remote Monitoring Systems']) }}" class="send-topic" data-topic="Telehealth and Remote Monitoring Systems">Telehealth and Remote Monitoring Systems</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Telehealth and Remote Monitoring Systems']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Planning, Budgeting, Cash Flow, and Cost Containment']) }}" class="send-topic" data-topic="Financial Planning, Budgeting, Cash Flow, and Cost Containment">Financial Planning, Budgeting, Cash Flow, and Cost Containment</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Planning, Budgeting, Cash Flow, and Cost Containment']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Payroll Management']) }}" class="send-topic" data-topic="Payroll Management">Payroll Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Payroll Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Capital Expenditures and Asset Management']) }}" class="send-topic" data-topic="Capital Expenditures and Asset Management">Capital Expenditures and Asset Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Capital Expenditures and Asset Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Vendor and Supply Chain Management']) }}" class="send-topic" data-topic="Vendor and Supply Chain Management">Vendor and Supply Chain Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Vendor and Supply Chain Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Risk Mitigation Measures']) }}" class="send-topic" data-topic="Risk Mitigation Measures">Risk Mitigation Measures</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Risk Mitigation Measures']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Emergency Response Systems']) }}" class="send-topic" data-topic="Emergency Response Systems">Emergency Response Systems</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Emergency Response Systems']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Resident Incident Management Systems']) }}" class="send-topic" data-topic="Resident Incident Management Systems">Resident Incident Management Systems</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Resident Incident Management Systems']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Human Resource Planning, Recruitment, and Retention']) }}" class="send-topic" data-topic=" Human Resource Planning, Recruitment, and Retention"> Human Resource Planning, Recruitment, and Retention</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Human Resource Planning, Recruitment, and Retention']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'ompliance Programs']) }}" class="send-topic" data-topic="ompliance Programs">ompliance Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'ompliance Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Risk Management Process and Programs']) }}" class="send-topic" data-topic="Risk Management Process and Programs">Risk Management Process and Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Risk Management Process and Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Quality Improvement Processes (e.g., root cause analysis, PDCA/PDSA)']) }}" class="send-topic" data-topic="Quality Improvement Processes (e.g., root cause analysis, PDCA/PDSA)">Quality Improvement Processes (e.g., root cause analysis, PDCA/PDSA)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Quality Improvement Processes (e.g., root cause analysis, PDCA/PDSA)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Scope of Practice and Legal Liability']) }}" class="send-topic" data-topic="Scope of Practice and Legal Liability">Scope of Practice and Legal Liability</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Scope of Practice and Legal Liability']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Internal Investigation Protocols and Techniques']) }}" class="send-topic" data-topic="Internal Investigation Protocols and Techniques">Internal Investigation Protocols and Techniques</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Internal Investigation Protocols and Techniques']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Mandatory Reporting Requirements']) }}" class="send-topic" data-topic="Mandatory Reporting Requirements">Mandatory Reporting Requirements</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Mandatory Reporting Requirements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Insurance Coverage (e.g., liability, property)']) }}" class="send-topic" data-topic="Insurance Coverage (e.g., liability, property)">Insurance Coverage (e.g., liability, property)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Insurance Coverage (e.g., liability, property)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Healthcare Record Requirements (e.g., HIPAA, HITECH)']) }}" class="send-topic" data-topic="Healthcare Record Requirements (e.g., HIPAA, HITECH)">Healthcare Record Requirements (e.g., HIPAA, HITECH)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Healthcare Record Requirements (e.g., HIPAA, HITECH)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Security (e.g., cameras, locks)']) }}" class="send-topic" data-topic="Security (e.g., cameras, locks)">Security (e.g., cameras, locks)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Security (e.g., cameras, locks)']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Contracted Services']) }}" class="send-topic" data-topic="Contracted Services">Contracted Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Contracted Services']) }}">Quiz</a>
                  </div>
                </div>
              </div>
              <div class="show-more-container">
                <button id="showMoreCoreBtn" class="show-more-button font-bold">
                  Show More Modules
                  <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- LOS Section -->
            <div class="module-section los-section">
              <div class="section-header">
                <h2>LOS</h2>
              </div>

              <div class="modules-grid" id="losModulesContainer">
                <!-- LOS Modules -->
                <div class="module-card">
                  <div>
                    <a href="{{ route('send.topic',['less_name' => 'Care, Services, and Support, Operation, Environment and Quality']) }}" class="send-topic" data-topic="Care, Services, and Support, Operation, Environment and Quality">Care, Services, and Support, Operation, Environment and Quality</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care, Services, and Support, Operation, Environment and Quality']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Quality of Care']) }}" class="send-topic" data-topic="Quality of Care">Quality of Care</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Quality of Care']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Medical and Nursing Care Practices']) }}" class="send-topic" data-topic="Medical and Nursing Care Practices">Medical and Nursing Care Practices</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Medical and Nursing Care Practices']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Medication Management and Administration']) }}" class="send-topic" data-topic="Medication Management and Administration">Medication Management and Administration</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Medication Management and Administration']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Nutrition and Hydration']) }}" class="send-topic" data-topic="Nutrition and Hydration">Nutrition and Hydration</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Nutrition and Hydration']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Rehabilitation and Restorative Programs']) }}" class="send-topic" data-topic="Rehabilitation and Restorative Programs">Rehabilitation and Restorative Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Rehabilitation and Restorative Programs']) }}">Quiz</a>
                  </div>
                </div>

                <!-- Hidden modules -->
                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Assessment and Interdisciplinary Care Planning']) }}" class="send-topic" data-topic="Care Recipient Assessment and Interdisciplinary Care Planning">Care Recipient Assessment and Interdisciplinary Care Planning</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Assessment and Interdisciplinary Care Planning']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Clinical and Medical Records and Documentation Requirements']) }}" class="send-topic" data-topic="Clinical and Medical Records and Documentation Requirements">Clinical and Medical Records and Documentation Requirements</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Clinical and Medical Records and Documentation Requirements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Medical Director']) }}" class="send-topic" data-topic="Medical Director">Medical Director</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Medical Director']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Emergency Medical Services']) }}" class="send-topic" data-topic="Emergency Medical Services">Emergency Medical Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Emergency Medical Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Transition of Care']) }}" class="send-topic" data-topic="Transition of Care">Transition of Care</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Transition of Care']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Quality of Life']) }}" class="send-topic" data-topic="Quality of Life">Quality of Life</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Quality of Life']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Psychosocial Needs']) }}" class="send-topic" data-topic="Psychosocial Needs">Psychosocial Needs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Psychosocial Needs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Person-Centered Care and Comprehensive Care Planning']) }}" class="send-topic" data-topic="Person-Centered Care and Comprehensive Care Planning">Person-Centered Care and Comprehensive Care Planning</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Person-Centered Care and Comprehensive Care Planning']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Bill of Rights and Responsibilities']) }}" class="send-topic" data-topic="Care Recipient Bill of Rights and Responsibilities">Care Recipient Bill of Rights and Responsibilities</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Bill of Rights and Responsibilities']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Safety']) }}" class="send-topic" data-topic="Care Recipient Safety">Care Recipient Safety</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Safety']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Grievance, Conflict, and Dispute Resolution']) }}" class="send-topic" data-topic="Care Recipient Grievance, Conflict, and Dispute Resolution">Care Recipient Grievance, Conflict, and Dispute Resolution</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Grievance, Conflict, and Dispute Resolution']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Advocacy']) }}" class="send-topic" data-topic="Care Recipient Advocacy">Care Recipient Advocacy</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Advocacy']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Recipient Advocacy']) }}" class="send-topic" data-topic="Care Recipient Decision-Making">Care Recipient Decision-Making</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Recipient Advocacy']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Recognition of Maltreatment']) }}" class="send-topic" data-topic="Recognition of Maltreatment">Recognition of Maltreatment</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Recognition of Maltreatment']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Mental and Behavioral Health']) }}" class="send-topic" data-topic="Mental and Behavioral Health">Mental and Behavioral Health</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Mental and Behavioral Health']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Trauma-Informed Care']) }}" class="send-topic" data-topic="Trauma-Informed Care">Trauma-Informed Care</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Trauma-Informed Care']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Pain Management']) }}" class="send-topic" data-topic="Pain Management">Pain Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Pain Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Death, Dying, and Grief']) }}" class="send-topic" data-topic="Death, Dying, and Grief">Death, Dying, and Grief</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Death, Dying, and Grief']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Restraint Usage and Reduction']) }}" class="send-topic" data-topic="Restraint Usage and Reduction">Restraint Usage and Reduction</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Restraint Usage and Reduction']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Foodservices']) }}" class="send-topic" data-topic="Foodservices">Foodservices</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Foodservices'] )}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Social Services Programs']) }}" class="send-topic" data-topic="Social Services Programs">Social Services Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Social Services Programs'] )}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Therapeutic Recreation and Activity Programs']) }}" class="send-topic" data-topic="Therapeutic Recreation and Activity Programs">Therapeutic Recreation and Activity Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Therapeutic Recreation and Activity Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Hospice and Palliative Care']) }}" class="send-topic" data-topic="Hospice and Palliative Care">Hospice and Palliative Care</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Hospice and Palliative Care'] )}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Transportation for Care Recipients']) }}" class="send-topic" data-topic="Transportation for Care Recipients">Transportation for Care Recipients</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Transportation for Care Recipients']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Diagnostic Services']) }}" class="send-topic" data-topic="Diagnostic Services">Diagnostic Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Diagnostic Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Dental and Oral Care Services']) }}" class="send-topic" data-topic="Dental and Oral Care Services">Dental and Oral Care Services</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Dental and Oral Care Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Healthcare Partners and Clinical Providers']) }}" class="send-topic" data-topic="Healthcare Partners and Clinical Providers">Healthcare Partners and Clinical Providers</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Healthcare Partners and Clinical Providers']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Volunteer Programs']) }}" class="send-topic" data-topic="Volunteer Programs">Volunteer Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Volunteer Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Management']) }}" class="send-topic" data-topic="Financial Management">Financial Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Revenue and Reimbursement']) }}" class="send-topic" data-topic="Revenue and Reimbursement">Revenue and Reimbursement</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Revenue and Reimbursement']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Financial Reporting Requirements']) }}" class="send-topic" data-topic="Financial Reporting Requirements">Financial Reporting Requirements</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Financial Reporting Requirements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Integration of Clinical and Financial Systems']) }}" class="send-topic" data-topic="Integration of Clinical and Financial Systems">Integration of Clinical and Financial Systems</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Integration of Clinical and Financial Systems']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Resident Trust Accounts for Personal Funds']) }}" class="send-topic" data-topic="Resident Trust Accounts for Personal Funds">Resident Trust Accounts for Personal Funds</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Resident Trust Accounts for Personal Funds']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Risk Management']) }}" class="send-topic" data-topic="Risk Management">Risk Management</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Risk Management']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'OSHA Rules and Regulations']) }}" class="send-topic" data-topic="OSHA Rules and Regulations">OSHA Rules and Regulations</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'OSHA Rules and Regulations'] )}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Compliance Programs']) }}" class="send-topic" data-topic="Compliance Programs">Compliance Programs</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Compliance Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Scope of Practice and Legal Liability']) }}" class="send-topic" data-topic="Scope of Practice and Legal Liability">Scope of Practice and Legal Liability</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Scope of Practice and Legal Liability']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Internal Investigation Protocols and Techniques']) }}" class="send-topic" data-topic="Internal Investigation Protocols and Techniques">Internal Investigation Protocols and Techniques</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Internal Investigation Protocols and Techniques']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Mandatory Reporting Requirements']) }}" class="send-topic" data-topic="Mandatory Reporting Requirements">Mandatory Reporting Requirements</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Mandatory Reporting Requirements']) }}">Quiz</a>
                  </div>
                </div>
                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Healthcare Record Requirements']) }}" class="send-topic"
                      data-topic="Healthcare Record Requirements">Healthcare Record Requirements</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Healthcare Record Requirements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Security']) }}" class="send-topic"
                      data-topic="Security">Security</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Security']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Contracted Services']) }}" class="send-topic"
                      data-topic="Contracted Services">Contracted Services</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Contracted Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Human Resources']) }}" class="send-topic"
                      data-topic="Human Resources">Human Resources</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Human Resources']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Organizational Staffing Requirements and Reporting']) }}"
                      class="send-topic" data-topic="Organizational Staffing Requirements and Reporting">Organizational Staffing
                      Requirements and Reporting</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Organizational Staffing Requirements and Reporting']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Staff Certification and Licensure Requirements']) }}"
                      class="send-topic" data-topic="Staff Certification and Licensure Requirements">Staff Certification and
                      Licensure Requirements</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Staff Certification and Licensure Requirements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Professional Development']) }}" class="send-topic"
                      data-topic="Professional Development">Professional Development</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Professional Development']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Employee Training and Orientation']) }}" class="send-topic"
                      data-topic="Employee Training and Orientation">Employee Training and Orientation</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Employee Training and Orientation']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Performance Evaluation']) }}" class="send-topic"
                      data-topic="Performance Evaluation">Performance Evaluation</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Performance Evaluation']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Employee Record-Keeping Requirements']) }}" class="send-topic"
                      data-topic="Employee Record-Keeping Requirements">Employee Record-Keeping Requirements</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Employee Record-Keeping Requirements']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Cultural Competence and Diversity Awareness']) }}"
                      class="send-topic" data-topic="Cultural Competence and Diversity Awareness">Cultural Competence and
                      Diversity Awareness</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Cultural Competence and Diversity Awareness']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Care Setting']) }}" class="send-topic"
                      data-topic="Care Setting">Care Setting</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Care Setting']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => ' Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds']) }}"
                      class="send-topic"
                      data-topic=" Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds"> Federal Codes
                      and Regulations for Building, Equipment, Maintenance, and Grounds</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => ' Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Person-Centered Environment']) }}" class="send-topic"
                      data-topic="Person-Centered Environment">Person-Centered Environment</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Person-Centered Environment']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Safety and Accessibility']) }}" class="send-topic"
                      data-topic="Safety and Accessibility">Safety and Accessibility</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Safety and Accessibility']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Facility Management and Environmental Services']) }}"
                      class="send-topic" data-topic="Facility Management and Environmental Services">Facility Management and
                      Environmental Services</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Facility Management and Environmental Services']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Preventative and Routine Maintenance Programs']) }}"
                      class="send-topic" data-topic="Preventative and Routine Maintenance Programs">Preventative and Routine
                      Maintenance Programs</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Preventative and Routine Maintenance Programs']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Infection Control and Sanitation']) }}" class="send-topic"
                      data-topic="Infection Control and Sanitation">Infection Control and Sanitation</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Infection Control and Sanitation']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => ' Disaster and Emergency Planning, Preparedness, Response, and Recovery']) }}"
                      class="send-topic" data-topic=" Disaster and Emergency Planning, Preparedness, Response,and Recovery">
                      Disaster and Emergency Planning, Preparedness, Response, and Recovery</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => ' Disaster and Emergency Planning, Preparedness, Response, and Recovery']) }}">Quiz</a>
                  </div>
                </div>
              </div>

              <div class="module-card" style="display: none">
                <div class="flex-grow">
                  <a href="{{ route('send.topic',['less_name' => 'Federal Healthcare Laws, Rules, and Regulations']) }}"
                    class="send-topic" data-topic="Federal Healthcare Laws, Rules, and Regulations">Federal Healthcare Laws,
                    Rules, and Regulations</a>

                </div>
                <div class="mt-auto text-center">
                  <a href="{{ route('quiz',['less_name' => 'Federal Healthcare Laws, Rules, and Regulations']) }}">Quiz</a>
                </div>
              </div>

              <div class="module-card" style="display: none">
                <div class="flex-grow">
                  <a href="{{ route('send.topic',['less_name' => 'Government Programs and Entities']) }}" class="send-topic"
                    data-topic="Government Programs and Entities">Government Programs and Entities</a>

                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Government Programs and Entities']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => ' Certification and Licensure Requirements for the Organization']) }}"
                      class="send-topic" data-topic=" Certification and Licensure Requirements for the Organization">
                      Certification and Licensure Requirements for the Organization</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => ' Certification and Licensure Requirements for the Organization']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Regulatory Survey and Inspection Process']) }}"
                      class="send-topic" data-topic="Regulatory Survey and Inspection Process">Regulatory Survey and
                      Inspection Process</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Regulatory Survey and Inspection Process']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Procedures for Informal Dispute Resolution']) }}"
                      class="send-topic" data-topic="Procedures for Informal Dispute Resolution">Procedures for Informal
                      Dispute Resolution</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Procedures for Informal Dispute Resolution']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => ' Centers for Medicare and Medicaid Services Quality Measures']) }}"
                      class="send-topic" data-topic=" Centers for Medicare and Medicaid Services Quality Measures"> Centers
                      for Medicare and Medicaid Services Quality Measures</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => ' Centers for Medicare and Medicaid Services Quality Measures']) }}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Quality Assurance and Performance Improvement']) }}"
                      class="send-topic" data-topic="Quality Assurance and Performance Improvement">Quality Assurance and Performance Improvement</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Quality Assurance and Performance Improvement'])}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Bed-Hold Requirements']) }}" class="send-topic"
                      data-topic="Bed-Hold Requirements">Bed-Hold Requirements</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Bed-Hold Requirements'])}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Pre-Admission Screening and Annual Review']) }}"
                      class="send-topic" data-topic="Pre-Admission Screening and Annual Review">Pre-Admission Screening and
                      Annual Review</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Pre-Admission Screening and Annual Review'])}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Facility Assessment']) }}" class="send-topic"
                      data-topic="Facility Assessment">Facility Assessment</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Facility Assessment'])}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Infection Prevention and Control Practices']) }}"
                      class="send-topic" data-topic="Infection Prevention and Control Practices">Infection Prevention and
                      Control Practices</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Infection Prevention and Control Practices'])}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Disease Management (e.g., acute vs. chronic conditions)']) }}"
                      class="send-topic" data-topic="Disease Management (e.g., acute vs. chronic conditions)">Disease
                      Management (e.g., acute vs. chronic conditions)</a>

                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Disease Management (e.g., acute vs. chronic conditions)'])}}">Quiz</a>
                  </div>
                </div>

                <div class="module-card" style="display: none">
                  <div class="flex-grow">
                    <a href="{{ route('send.topic',['less_name' => 'Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)']) }}"
                      class="send-topic"
                      data-topic="Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)">Activities
                      of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)</a>
                  </div>
                  <div class="mt-auto text-center">
                    <a href="{{ route('quiz',['less_name' => 'Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)'])}}">Quiz</a>
                  </div>
                </div>
              </div>
              <div class="show-more-container">
                <button
                  id="showMoreLosBtn"
                  class="show-more-button font-bold">
                  Show More Modules
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="chevron-icon"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom Navigation -->
        @include('includes.bottom-navigation')

      </div>
    </main>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Initialize pagination
      const showMoreCoreBtn = document.getElementById("showMoreCoreBtn");
      const coreModulesElements = document.querySelectorAll(
        "#coreModulesContainer .module-card"
      );
      let coreVisible = 6;

      const showMoreLosBtn = document.getElementById("showMoreLosBtn");
      const losModulesElements = document.querySelectorAll(
        "#losModulesContainer .module-card"
      );
      let losVisible = 6;

      initPagination(showMoreCoreBtn, coreModulesElements, coreVisible);
      initPagination(showMoreLosBtn, losModulesElements, losVisible);

      // Responsive adjustments
      handleResponsive();
      window.addEventListener("resize", handleResponsive);
    });

    function initPagination(button, modules, visibleCount) {
      // Hide modules beyond initial count
      modules.forEach((module, index) => {
        if (index >= visibleCount) {
          module.style.display = "none";
        }
      });

      // Hide button if less than visibleCount modules
      if (modules.length <= visibleCount) {
        button.style.display = "none";
      }

      button.addEventListener("click", function() {
        // Show next batch of modules
        const nextBatch = visibleCount + 6;
        for (let i = visibleCount; i < nextBatch && i < modules.length; i++) {
          modules[i].style.display = "flex";
        }
        visibleCount = nextBatch;

        // Hide button if all modules shown
        if (visibleCount >= modules.length) {
          button.style.display = "none";
        }
      });
    }

    function handleResponsive() {
      const screenWidth = window.innerWidth;
      const coreModules = document.querySelectorAll(
        "#coreModulesContainer .module-card"
      );
      const losModules = document.querySelectorAll(
        "#losModulesContainer .module-card"
      );
      const showMoreCoreBtn = document.getElementById("showMoreCoreBtn");
      const showMoreLosBtn = document.getElementById("showMoreLosBtn");

      let coreVisible, losVisible;

      if (screenWidth < 640) {
        coreVisible = 4;
        losVisible = 4;
      } else if (screenWidth < 1024) {
        coreVisible = 6;
        losVisible = 6;
      } else {
        coreVisible = 9;
        losVisible = 9;
      }

      // Reinitialize pagination with new visible counts
      initPagination(showMoreCoreBtn, coreModules, coreVisible);
      initPagination(showMoreLosBtn, losModules, losVisible);
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleExamBtn = document.getElementById('toggle-exam-btn');
      const examDifficulties = document.getElementById('exam-difficulties');

      if (toggleExamBtn) {
        toggleExamBtn.addEventListener('click', () => {
          if (examDifficulties.style.display === 'none') {
            examDifficulties.style.display = 'grid';
          } else {
            examDifficulties.style.display = 'none';
          }
        });
      }
    });
  </script>
</body>

</html>