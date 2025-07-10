<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NHA Tutor Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        background: radial-gradient(
            closest-side,
            white 79%,
            transparent 80% 100%
          ),
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
        color: #1f2937; /* Tailwind's text-gray-800 */
        font-size: 0.875rem; /* text-sm */
        font-weight: 500; /* font-medium */
        text-align: left;
      }

      .module-card button {
        color: #2563eb; /* Tailwind's text-blue-600 */
        padding: 0.5rem 1rem; /* py-2 px-4 */
        border-radius: 0.5rem; /* rounded-lg */
        font-size: 1rem; /* text-md is not in Tailwind by default, assume 1rem */
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
    </style>
  </head>
  <body class="font-sans">
    <header
      style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 24px;
        background-color: #f9fafb;
      "
    >
      <a
        href="/"
        style="
          font-size: 20px;
          border: none;
          cursor: pointer;
          font-weight: 400;
          color: gray;
        "
      >
        Unsubscribe
      </a>
      <div
        class="brand"
        style="font-size: 1.6rem; font-weight: 600; color: #1f2937"
      >
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
            "
        >
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
          <div
            class="dashboard-cards flex flex-col md:flex-row justify-between gap-6 p-4"
          >
            <!-- Progress Card -->
            <div class="card w-full md:w-1/3 bg-white rounded-lg shadow-md p-4">
              <div class="card-content">
                <div class="progress-container">
                  <div class="progress-bar"></div>
                  <h1 class="progress-title text-xl font-semibold mt-4">
                    Progress
                  </h1>
                </div>
              </div>
            </div>

            <!-- Learning Plan (center image as a card) -->
            <div
              class=" w-full md:w-1/3  p-4 flex justify-center items-center"
            >
              <img
                src="assets/images/p4.png"
                alt="Learning Plan"
                class="learning-plan-image w-full h-auto max-h-[300px] object-contain"
              />
            </div>

            <!-- Exam Card -->
            <div class="card w-full md:w-1/3 bg-white rounded-lg shadow-md p-4">
              <div class="card-content text-center">
                <h1 class="exam-title text-xl font-semibold my-10">Exam</h1>
                <button
                  class="exam-button bg-[#1fac8d] text-white px-5 py-2 rounded-md text-lg font-semibold"
                >
                  Start
                </button>
              </div>
            </div>
          </div>

          <h2
            style="
              text-align: center;
              padding-top: 25px;
              font-size: x-large;
              font-weight: 500;
            "
          >
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
                    <div class="flex-grow">
                      <h3>Quality of Care</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button class="">Quiz</button>
                    </div>
                  </div>
                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Medical and Nursing Care Practices</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Medication Management and Administration</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>
                        Disease Management (e.g., acute vs. chronic conditions)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Nutrition and Hydration (e.g., specialized diets)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>
                        Activities of Daily Living (ADLs) and Independent
                        Activities of Daily Living (IADLs)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                  <!-- Hidden modules -->
                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Rehabilitation and Restorative Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Assessment and Interdisciplinary Care
                        Planning
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Clinical and Medical Records and Documentation
                        Requirements e.g., storage, retention
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Medical Director</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Emergency Medical Services (e.g., CPR, first aid,
                        Heimlich maneuver, AED)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Transition of Care (e.g., admission, move-in, transfer,
                        discharge, and move-out)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Basic Healthcare Terminology</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Quality of Life</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Psychosocial Needs (e.g., social, spiritual, community,
                        cultural)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Person-Centered Care and Comprehensive Care Planning
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Person-Centered Environment (e.g., home-like
                        environment)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Bill of Rights and Responsibilities
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Safety (e.g., fall prevention, elopement
                        prevention, adverse events)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient (and Representative) Grievance, Conflict,
                        and Dispute Resolution
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Decision-Making (e.g., capacity, power of
                        attorney, guardianship)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Care Recipient (and Representative) Satisfaction</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Recognition of Maltreatment (e.g., abuse, neglect,
                        exploitation)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Mental and Behavioral Health (e.g., cognitive
                        impairment, depression, social support systems)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Trauma-Informed Care (e.g., PTSD)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Trauma-Informed Care (e.g., PTSD)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Pain Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Death, Dying, and Grief</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Restraint Usage and Reduction</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Foodservice (e.g., choice and menu planning, dietary
                        management, food storage and handling, dining services)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Social Services Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Therapeutic Recreation and Activity Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Community Resources, Programs, and Agencies (e.g., meals
                        on wheels, housing vouchers, Area Agencies on Aging,
                        Veterans Affairs)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Ancillary Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Hospice and Palliative Care</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Specialized Medical Equipment (e.g., oxygen, durable
                        medical equipment)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Transportation for Care Recipients</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Telemedicine (e.g., e-health)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Diagnostic Services (e.g., radiology, lab services)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Dental and Oral Care Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Healthcare Partners and Clinical Providers (e.g., MD/DO,
                        Nurse Practitioner, Psychiatrist, Podiatrist, Dentist)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Volunteer Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Financial Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Budgeting and Forecasting</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Financial Analysis (e.g., ratios, profitability, debt,
                        revenue mix, depreciation, operating margin, cash flow)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Revenue Cycle Management (e.g., billing, accounts
                        receivable, accounts payable, collections)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Financial Statements (e.g., income/revenue statement,
                        balance sheet, statement of cash flows, cost reporting)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs,
                        Medicaid, private payors)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Financial Reporting Requirements (e.g., requirements for
                        not-for-profit, for-profit, and governmental providers)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Integration of Clinical and Financial Systems (e.g.,
                        EMR/EHR, MDS)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Internal Financial Management Controls (e.g.,
                        segregation of duties, access)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Supply-Chain Management (e.g., inventory control)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Resident Trust Accounts for Personal Funds</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Risk Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>OSHA Rules and Regulations</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Workers' Compensation</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Ethical Conduct and Standards of Practice</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Care Setting</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Federal Codes and Regulations for Building, Equipment,
                        Maintenance, and Grounds
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Person-Centered Environment (e.g., home-like
                        environment)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Safety and Accessibility (e.g., ADA, safety data sheets)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Facility Management and Environmental Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Preventative and Routine Maintenance Programs (e.g.,
                        pest control, equipment, mechanical systems)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Infection Control and Sanitation (e.g., linens, kitchen,
                        hand washing, healthcare-acquired infections, hazardous
                        materials)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Disaster and Emergency Planning, Preparedness, Response,
                        and Recovery (e.g., Appendix Z)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Leadership</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Organizational Structures (e.g., departments, functions,
                        systemic processes)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Organizational Change Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Organizational Behavior (e.g., organizational culture,
                        team building, group dynamics)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Leadership Principles (e.g., communication, styles,
                        mentoring, coaching, personal professional development)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Governance (e.g., board of directors, governing bodies,
                        corporate entities, advisory boards)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Professional Advocacy and Governmental Relations</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Organizational Strategy</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Mission, Vision, and Value Statements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Strategic Business Planning (e.g., new lines of service,
                        succession management, staffing pipeline)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Specialized Rehabilitation or Skilled Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Durable Medical Equipment (DME) and Assistive Devices
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Laboratory Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Sexual Expression and Intimacy Needs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Telehealth and Remote Monitoring Systems</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Financial Planning, Budgeting, Cash Flow, and Cost
                        Containment
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Payroll Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Capital Expenditures and Asset Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Vendor and Supply Chain Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Risk Mitigation Measures</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Emergency Response Systems</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Resident Incident Management Systems</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Human Resource Planning, Recruitment, and Retention
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Compliance Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Risk Management Process and Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Quality Improvement Processes (e.g., root cause
                        analysis, PDCA/PDSA)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Scope of Practice and Legal Liability</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Internal Investigation Protocols and Techniques</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Mandatory Reporting Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Insurance Coverage (e.g., liability, property)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Healthcare Record Requirements (e.g., HIPAA, HITECH)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Security (e.g., cameras, locks)</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Contracted Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                </div>

                <div class="show-more-container">
                  <button
                    id="showMoreCoreBtn"
                    class="show-more-button font-bold"
                  >
                    Show More Modules
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="chevron-icon"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
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
                      <h3>
                        Care, Services, and Support, Operation, Environment and
                        Quality
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Quality of Care</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Medical and Nursing Care Practices</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Medication Management and Administration</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Nutrition and Hydration</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card">
                    <div class="flex-grow">
                      <h3>Rehabilitation and Restorative Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <!-- Hidden modules -->
                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Assessment and Interdisciplinary Care
                        Planning
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Clinical and Medical Records and Documentation
                        Requirements
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Medical Director</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Emergency Medical Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Transition of Care</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Quality of Life</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Psychosocial Needs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Person-Centered Care and Comprehensive Care Planning
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Bill of Rights and Responsibilities
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Care Recipient Safety</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Care Recipient Grievance, Conflict, and Dispute
                        Resolution
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Care Recipient Advocacy</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Care Recipient Decision-Making</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Recognition of Maltreatment</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Mental and Behavioral Health</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Trauma-Informed Care</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Pain Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Death, Dying, and Grief</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Restraint Usage and Reduction</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Foodservices</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Social Services Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Therapeutic Recreation and Activity Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Hospice and Palliative Care</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Transportation for Care Recipients</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Diagnostic Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Dental and Oral Care Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Healthcare Partners and Clinical Providers</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Volunteer Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Financial Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Revenue and Reimbursement</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Financial Reporting Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Integration of Clinical and Financial Systems</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Resident Trust Accounts for Personal Funds</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Risk Management</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>OSHA Rules and Regulations</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Compliance Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Scope of Practice and Legal Liability</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Internal Investigation Protocols and Techniques</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Mandatory Reporting Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Healthcare Record Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Security</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Contracted Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Human Resources</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Organizational Staffing Requirements and Reporting
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Staff Certification and Licensure Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Professional Development</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Employee Training and Orientation</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Performance Evaluation</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Employee Record-Keeping Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Cultural Competence and Diversity Awareness</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Care Setting</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Federal Codes and Regulations for Building, Equipment,
                        Maintenance, and Grounds
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Person-Centered Environment</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Safety and Accessibility</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Facility Management and Environmental Services</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Preventative and Routine Maintenance Programs</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Infection Control and Sanitation</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Disaster and Emergency Planning, Preparedness, Response,
                        and Recovery
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Federal Healthcare Laws, Rules, and Regulations</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Government Programs and Entities</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Certification and Licensure Requirements for the
                        Organization
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Regulatory Survey and Inspection Process</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Procedures for Informal Dispute Resolution</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Centers for Medicare and Medicaid Services Quality
                        Measures
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Quality Assurance and Performance Improvement</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Bed-Hold Requirements</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Pre-Admission Screening and Annual Review</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Facility Assessment</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>Infection Prevention and Control Practices</h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Disease Management (e.g., acute vs. chronic conditions)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>

                  <div class="module-card" style="display: none">
                    <div class="flex-grow">
                      <h3>
                        Activities of Daily Living (ADLs) and Independent
                        Activities of Daily Living (IADLs)
                      </h3>
                    </div>
                    <div class="mt-auto text-center">
                      <button>Quiz</button>
                    </div>
                  </div>
                </div>
                <div class="show-more-container">
                  <button
                    id="showMoreLosBtn"
                    class="show-more-button font-bold"
                  >
                    Show More Modules
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="chevron-icon"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Bottom Navigation -->
          <div class="bottom-nav">
            <div class="nav-items">
              <a href="{{ route('home') }}" class="nav-link group">
                <div class="icon-wrapper">
                  <svg
                    class="icon blue"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                  </svg>
                </div>
                <span class="label">Home</span>
              </a>

              <a href="{{ route('quiz') }}" class="nav-link group">
                <div class="icon-wrapper">
                  <svg
                    class="icon indigo"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                    />
                  </svg>
                </div>
                <span class="label">Modules</span>
              </a>

              <a href="{{ route('quiz') }}" class="nav-link group">
                <div class="icon-wrapper">
                  <svg
                    class="icon purple"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                    />
                  </svg>
                </div>
                <span class="label">Quizzes</span>
              </a>

              <a href="{{ route('dashboard') }}" class="nav-link group">
                <div class="icon-wrapper">
                  <svg
                    class="icon green"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                    />
                  </svg>
                </div>
                <span class="label">Dashboard</span>
              </a>

              <a href="{{ route('terms') }}" class="nav-link group">
                <div class="icon-wrapper">
                  <svg
                    class="icon orange"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                </div>
                <span class="label">Help</span>
              </a>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
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

        button.addEventListener("click", function () {
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
  </body>
</html>
