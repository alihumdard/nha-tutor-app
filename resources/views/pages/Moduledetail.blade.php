@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<body class="bg-gray-50 font-sans">
    <div class="min-h-screen w-full flex flex-col">

        <!-- Main Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 mb-8 text-white">
                    <h1 class="text-2xl font-bold mb-2">Welcome back, Learner!</h1>
                    <p class="opacity-90">Continue your journey with 98 comprehensive learning modules</p>
                    <div class="mt-4 flex items-center">
                        <div class="w-full bg-blue-400 bg-opacity-30 rounded-full h-2">
                            <div class="bg-white h-2 rounded-full" style="width: 35%"></div>
                        </div>
                        <span class="ml-3 text-sm font-medium">50% Complete</span>
                    </div>
                </div>

                <!-- Dashboard Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Progress Card -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-500">Your Progress</h3>
                                    <p class="text-2xl font-bold text-gray-800 mt-1">35%</p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="flex justify-between text-sm text-gray-500 mb-1">
                                    <span>Completed</span>
                                    <span>50/98</span>
                                </div>
                                <div class="text-center pt-6">
                                    <circle-progress value="50" max="100"></circle-progress>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Learning Plan Card -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6 h-full flex flex-col">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-500">Learning Plan</h3>
                                    <p class="text-2xl font-bold text-gray-800 mt-1">Core + LOS</p>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-auto pt-6">
                                <div class="flex justify-center">
                                    <img src="assets/images/plan1.svg" class="w-40 h-40" alt="Learning Plan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Exam Card -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6 h-full flex flex-col">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-500">Practice Exam</h3>
                                    <p class="text-2xl font-bold text-gray-800 mt-1">Ready to Test</p>
                                </div>
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-auto pt-6">
                                <button
                                    class="w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white py-3 px-4 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                                    Start Practice Exam
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white w-full rounded-xl shadow-md border border-gray-100 p-8 mb-8">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- CORE Section -->
                        <div class="w-full md:w-1/2">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-4 mb-6 shadow-md">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-white text-center font-bold text-xl mb-1">CORE</h2>
                                        <p class="text-blue-100 text-center text-sm">Essential Learning Modules</p>
                                    </div>
                                    <span
                                        class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-medium">98
                                        Modules</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="coreModulesContainer">
                                @php
                                $coreModules = [

                                "Quality of Care",
                                "Medical and Nursing Care Practices",
                                "Medication Management and Administration",
                                "Disease Management (e.g., acute vs. chronic conditions)",
                                "Nutrition and Hydration (e.g., specialized diets)",
                                "Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)",
                                "Rehabilitation and Restorative Programs",
                                "Care Recipient Assessment and Interdisciplinary Care Planning",
                                "Clinical and Medical Records and Documentation Requirements (e.g., storage, retention,
                                destruction)",
                                "Medical Director",
                                "Emergency Medical Services (e.g., CPR, first aid, Heimlich maneuver, AED)",
                                "Transition of Care (e.g., admission, move-in, transfer, discharge, and move-out)",
                                "Basic Healthcare Terminology",
                                "Quality of Life",
                                "Psychosocial Needs (e.g., social, spiritual, community, cultural)",
                                "Person-Centered Care and Comprehensive Care Planning",
                                "Person-Centered Environment (e.g., home-like environment)",
                                "Care Recipient Bill of Rights and Responsibilities",
                                "Care Recipient Safety (e.g., fall prevention, elopement prevention, adverse events)",
                                "Care Recipient (and Representative) Grievance, Conflict, and Dispute Resolution",
                                "Care Recipient Advocacy (e.g., Ombudsman, resident and family council)",
                                "Care Recipient Decision-Making (e.g., capacity, power of attorney, guardianship,
                                conservatorship, code status, advance directives, ethical decision-making)",
                                "Care Recipient (and Representative) Satisfaction",
                                "Recognition of Maltreatment (e.g., abuse, neglect, exploitation)",
                                "Mental and Behavioral Health (e.g., cognitive impairment, depression, social support
                                systems)",
                                "Trauma-Informed Care (e.g., PTSD)",
                                "Pain Management",
                                "Death, Dying, and Grief",
                                "Restraint Usage and Reduction",
                                "Foodservice (e.g., choice and menu planning, dietary management, food storage and
                                handling, dining services)",
                                "Social Services Programs",
                                "Therapeutic Recreation and Activity Programs",
                                "Community Resources, Programs, and Agencies (e.g., meals on wheels, housing vouchers,
                                Area Agencies on Aging, Veterans Affairs)",
                                "Ancillary Services",
                                "Hospice and Palliative Care",
                                "Specialized Medical Equipment (e.g., oxygen, durable medical equipment)",
                                "Transportation for Care Recipients",
                                "Telemedicine (e.g., e-health)",
                                "Diagnostic Services (e.g., radiology, lab services)",
                                "Dental and Oral Care Services",
                                "Healthcare Partners and Clinical Providers (e.g., MD/DO, Nurse Practitioner,
                                Psychiatrist, Podiatrist, Dentist)",
                                "Volunteer Programs",
                                "Financial Management",
                                "Budgeting and Forecasting",
                                "Financial Analysis (e.g., ratios, profitability, debt, revenue mix, depreciation,
                                operating margin, cash flow)",
                                "Revenue Cycle Management (e.g., billing, accounts receivable, accounts payable,
                                collections)",
                                "Financial Statements (e.g., income/revenue statement, balance sheet, statement of cash
                                flows, cost reporting)",
                                "Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs, Medicaid, private payors)",
                                "Financial Reporting Requirements (e.g., requirements for not-for-profit, for-profit,
                                and governmental providers)",
                                "Integration of Clinical and Financial Systems (e.g., EMR/EHR, MDS)",
                                "Internal Financial Management Controls (e.g., segregation of duties, access)",
                                "Supply-Chain Management (e.g., inventory control)",
                                "Resident Trust Accounts for Personal Funds",
                                "Risk Management",
                                "OSHA Rules and Regulations",
                                "Workers' Compensation",
                                "Ethical Conduct and Standards of Practice",
                                "Care Setting",
                                "Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds",
                                "Person-Centered Environment (e.g., home-like environment)",
                                "Safety and Accessibility (e.g., ADA, safety data sheets)",
                                "Facility Management and Environmental Services",
                                "Preventative and Routine Maintenance Programs (e.g., pest control, equipment,
                                mechanical systems)",
                                "Infection Control and Sanitation (e.g., linens, kitchen, hand washing,
                                healthcare-acquired infections, hazardous materials)",
                                "Disaster and Emergency Planning, Preparedness, Response, and Recovery (e.g., Appendix
                                Z)",
                                "Leadership",
                                "Organizational Structures (e.g., departments, functions, systemic processes)",
                                "Organizational Change Management",
                                "Organizational Behavior (e.g., organizational culture, team building, group dynamics)",
                                "Leadership Principles (e.g., communication, styles, mentoring, coaching, personal
                                professional development)",
                                "Governance (e.g., board of directors, governing bodies, corporate entities, advisory
                                boards)",
                                "Professional Advocacy and Governmental Relations",
                                "Organizational Strategy",
                                "Mission, Vision, and Value Statements",
                                "Strategic Business Planning (e.g., new lines of service, succession management,
                                staffing pipeline)",
                                "Specialized Rehabilitation or Skilled Services",
                                "Durable Medical Equipment (DME) and Assistive Devices",
                                "Laboratory Services",
                                "Sexual Expression and Intimacy Needs",
                                "Telehealth and Remote Monitoring Systems",
                                "Financial Planning, Budgeting, Cash Flow, and Cost Containment",
                                "Payroll Management",
                                "Capital Expenditures and Asset Management",
                                "Vendor and Supply Chain Management",
                                "Risk Mitigation Measures",
                                "Emergency Response Systems",
                                "Resident Incident Management Systems",
                                "Human Resource Planning, Recruitment, and Retention",
                                "Compliance Programs",
                                "Risk Management Process and Programs",
                                "Quality Improvement Processes (e.g., root cause analysis, PDCA/PDSA)",
                                "Scope of Practice and Legal Liability",
                                "Internal Investigation Protocols and Techniques",
                                "Mandatory Reporting Requirements",
                                "Insurance Coverage (e.g., liability, property)",
                                "Healthcare Record Requirements (e.g., HIPAA, HITECH)",
                                "Security (e.g., cameras, locks)",
                                "Contracted Services"

                                ];
                                @endphp

                                @foreach($coreModules as $index => $module)
                                <div class="module-card bg-white border border-gray-200 rounded-xl p-4 flex flex-col h-full transition-all duration-300 hover:shadow-md hover:border-blue-200 hover:-translate-y-1"
                                    @if($index>= 9) style="display: none;" @endif>
                                    <div class="flex-grow">
                                        <div
                                            class="bg-blue-50 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                            <span class="text-blue-600 font-bold">{{ $index + 1 }}</span>
                                        </div>
                                        <h3 class="text-gray-800 text-sm font-medium mb-3 text-center">{{ $module }}
                                        </h3>
                                    </div>
                                    <div class="mt-auto text-center">
                                        <button
                                            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-2 px-4 rounded-lg text-xs font-medium transition-all duration-300">
                                            Start Quiz
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-6 text-center">
                                <button id="showMoreCoreBtn"
                                    class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center justify-center mx-auto transition-colors duration-300">
                                    Show More Modules
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- LOS Section -->
                        <div class="w-full md:w-1/2">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-4 mb-6 shadow-md">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-white text-center font-bold text-xl mb-1">LOS</h2>
                                        <p class="text-green-100 text-center text-sm">Learning Outcome Subjects</p>
                                    </div>
                                    <span
                                        class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-medium">77
                                        Modules</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="losModulesContainer">
                                @php
                                $losModules = [
                                "1. Care, Services, and Support, Operation, Environment and Quality",
                                "2. Quality of Care",
                                "3. Medical and Nursing Care Practices",
                                "4. Medication Management and Administration",
                                "5. Nutrition and Hydration",
                                "6. Rehabilitation and Restorative Programs",
                                "7. Care Recipient Assessment and Interdisciplinary Care Planning",
                                "8. Clinical and Medical Records and Documentation Requirements",
                                "9. Medical Director",
                                "10. Emergency Medical Services",
                                "11. Transition of Care",
                                "12. Quality of Life",
                                "13. Psychosocial Needs",
                                "14. Person-Centered Care and Comprehensive Care Planning",
                                "15. Care Recipient Bill of Rights and Responsibilities",
                                "16. Care Recipient Safety",
                                "17. Care Recipient Grievance, Conflict, and Dispute Resolution",
                                "18. Care Recipient Advocacy",
                                "19. Care Recipient Decision-Making",
                                "20. Recognition of Maltreatment",
                                "21. Mental and Behavioral Health",
                                "22. Trauma-Informed Care",
                                "23. Pain Management",
                                "24. Death, Dying, and Grief",
                                "25. Restraint Usage and Reduction",
                                "26. Foodservices",
                                "27. Social Services Programs",
                                "28. Therapeutic Recreation and Activity Programs",
                                "29. Hospice and Palliative Care",
                                "30. Transportation for Care Recipients",
                                "31. Diagnostic Services",
                                "32. Dental and Oral Care Services",
                                "33. Healthcare Partners and Clinical Providers",
                                "34. Volunteer Programs",
                                "35. Financial Management",
                                "36. Revenue and Reimbursement",
                                "37. Financial Reporting Requirements",
                                "38. Integration of Clinical and Financial Systems",
                                "39. Resident Trust Accounts for Personal Funds",
                                "40. Risk Management",
                                "41. OSHA Rules and Regulations",
                                "42. Compliance Programs",
                                "43. Scope of Practice and Legal Liability",
                                "44. Internal Investigation Protocols and Techniques",
                                "45. Mandatory Reporting Requirements",
                                "46. Healthcare Record Requirements",
                                "47. Security",
                                "48. Contracted Services",
                                "49. Human Resources",
                                "50. Organizational Staffing Requirements and Reporting",
                                "51. Staff Certification and Licensure Requirements",
                                "52. Professional Development",
                                "53. Employee Training and Orientation",
                                "54. Performance Evaluation",
                                "55. Employee Record-Keeping Requirements",
                                "56. Cultural Competence and Diversity Awareness",
                                "57. Care Setting",
                                "58. Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds",
                                "59. Person-Centered Environment",
                                "60. Safety and Accessibility",
                                "61. Facility Management and Environmental Services",
                                "62. Preventative and Routine Maintenance Programs",
                                "63. Infection Control and Sanitation",
                                "64. Disaster and Emergency Planning, Preparedness, Response, and Recovery",
                                "65. Federal Healthcare Laws, Rules, and Regulations",
                                "66. Government Programs and Entities",
                                "67. Certification and Licensure Requirements for the Organization",
                                "68. Regulatory Survey and Inspection Process",
                                "69. Procedures for Informal Dispute Resolution",
                                "70. Centers for Medicare and Medicaid Services Quality Measures",
                                "71. Quality Assurance and Performance Improvement",
                                "72. Bed-Hold Requirements",
                                "73. Pre-Admission Screening and Annual Review",
                                "74. Facility Assessment",
                                "75. Infection Prevention and Control Practices",
                                "76. Disease Management (e.g., acute vs. chronic conditions)",
                                "77. Activities of Daily Living (ADLs) and Independent Activities of Daily Living
                                (IADLs)"
                                ];
                                @endphp

                                @foreach($losModules as $module)
                                @php
                                $moduleParts = explode('. ', $module, 2);
                                $moduleNumber = $moduleParts[0];
                                $moduleTitle = $moduleParts[1] ?? '';
                                @endphp
                                <div class="module-card bg-white border border-gray-200 rounded-xl p-4 flex flex-col h-full transition-all duration-300 hover:shadow-md hover:border-green-200 hover:-translate-y-1"
                                    @if($loop->index >= 9) style="display: none;" @endif>
                                    <div class="flex-grow">
                                        <div
                                            class="bg-green-50 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                            <span class="text-green-600 font-bold">{{ $moduleNumber }}</span>
                                        </div>
                                        <h3 class="text-gray-800 text-sm font-medium mb-3 text-center">
                                            {{ $moduleTitle }}</h3>
                                    </div>
                                    <div class="mt-auto text-center">
                                        <button
                                            class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-2 px-4 rounded-lg text-xs font-medium transition-all duration-300">
                                            Start Quiz
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-6 text-center">
                                <button id="showMoreLosBtn"
                                    class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center justify-center mx-auto transition-colors duration-300">
                                    Show More Modules
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

@stop

@pushOnce('scripts')
<script src="https://unpkg.com/js-circle-progress/dist/circle-progress.min.js" type="module"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Core modules show more functionality
    const showMoreCoreBtn = document.getElementById('showMoreCoreBtn');
    let coreModulesShown = 6;
    const totalCoreModules = 42;

    showMoreCoreBtn.addEventListener('click', function() {
        // In a real app, you would fetch more modules from the server
        coreModulesShown += 6;
        if (coreModulesShown >= totalCoreModules) {
            showMoreCoreBtn.classList.add('hidden');
        }
        // Here you would typically append new modules to the DOM
        alert('Loading more Core modules... (Demo only)');
    });

    // LOS modules show more functionality
    const showMoreLosBtn = document.getElementById('showMoreLosBtn');
    let losModulesShown = 6;
    const totalLosModules = 56;

    showMoreLosBtn.addEventListener('click', function() {
        // In a real app, you would fetch more modules from the server
        losModulesShown += 6;
        if (losModulesShown >= totalLosModules) {
            showMoreLosBtn.classList.add('hidden');
        }
        // Here you would typically append new modules to the DOM
        alert('Loading more LOS modules... (Demo only)');
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // CORE modules pagination
    const showMoreCoreBtn = document.getElementById('showMoreCoreBtn');
    const coreModules = document.querySelectorAll('#coreModulesContainer .module-card');
    let coreVisible = 6;

    // LOS modules pagination
    const showMoreLosBtn = document.getElementById('showMoreLosBtn');
    const losModules = document.querySelectorAll('#losModulesContainer .module-card');
    let losVisible = 6;

    // Initialize both sections
    initPagination(showMoreCoreBtn, coreModules, coreVisible);
    initPagination(showMoreLosBtn, losModules, losVisible);

    function initPagination(button, modules, visibleCount) {
        // Hide modules beyond initial count
        modules.forEach((module, index) => {
            if (index >= visibleCount) {
                module.style.display = 'none';
            }
        });

        // Hide button if less than visibleCount modules
        if (modules.length <= visibleCount) {
            button.style.display = 'none';
        }

        button.addEventListener('click', function() {
            // Show next batch of modules
            const nextBatch = visibleCount + 6;
            for (let i = visibleCount; i < nextBatch && i < modules.length; i++) {
                modules[i].style.display = 'flex';
            }
            visibleCount = nextBatch;

            // Hide button if all modules shown
            if (visibleCount >= modules.length) {
                button.style.display = 'none';
            }
        });
    }
});
</script>
@endPushOnce