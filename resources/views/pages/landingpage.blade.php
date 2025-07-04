@extends('layouts.main')
@section('title', 'page name')
@section('content')

<body class="bg-white text-gray-800 font-sans">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
        <!-- Header -->
        <header class="flex flex-col sm:flex-row justify-between items-center border-b border-gray-200 pb-4 mb-6 sm:mb-8 px-4 sm:px-6 py-3 bg-white shadow-sm">
            <!-- Logo -->
            <div class="text-xl sm:text-2xl font-bold text-gray-800 flex items-center mb-3 sm:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 sm:h-8 w-6 sm:w-8 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                NHA Tutor Pro
            </div>

            <!-- Navigation -->
            <a href="#" class="text-green-600 hover:text-green-800 font-medium transition-colors duration-200 flex pb-2 sm:pb-0 items-center w-full justify-center sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-4 md:space-x-8 w-full sm:w-auto">
                <!-- Home Link -->

                <!-- Login Button -->
                <nav class="flex items-center w-full sm:w-auto">
                    <a href="#" class="w-full sm:w-auto bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-medium px-4 sm:px-5 py-2 sm:py-2.5 rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Log in
                    </a>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="text-center bg-gray-50 rounded-lg p-4 sm:p-6 mb-8 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl font-semibold mb-3 sm:mb-4">Empowering the Next Generation of Nursing Home Administrators</h2>
            <p class="max-w-3xl mx-auto text-sm sm:text-base">
                This AI was trained specifically on NHA study material to deliver Lessons, Quizzes, Exams, Rationales,
                and Downloadable Flash Cards.
                It has been reviewed and approved by a Licensed Nursing Home Administrator.
            </p>
        </section>

        <!-- Plans Section -->
        <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-6 sm:mb-8">Choose Your Plan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8 sm:mb-12">
            <!-- Bronze Plan -->
            <div class="border border-gray-200 rounded-lg p-4 sm:p-6">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <img src="/assets/images/plan1.svg" alt="Bronze Plan" class="h-16 sm:h-20 w-16 sm:w-20 object-contain">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 border-b border-gray-200 pb-2 sm:pb-3 text-center">Bronze Plan</h3>
                <p class="text-gray-600 mt-1 sm:mt-2 text-center text-sm sm:text-base">Perfect for new learners</p>
                <ul class="mt-3 sm:mt-4 space-y-2 sm:space-y-3 pl-0">
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">AI-generated Lessons</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Topic Quizzes</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Progress Dashboard</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Answer Explanations</span>
                    </li>
                </ul>
                <div class="text-xl sm:text-2xl font-bold my-4 sm:my-6 text-center">$49.99/mo</div>
                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded transition-colors duration-200 text-sm sm:text-base">
                    Subscribe
                </button>
            </div>

            <!-- Silver Plan -->
            <div class="border border-gray-200 rounded-lg p-4 sm:p-6">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <img src="/assets/images/plan2.svg" alt="Silver Plan" class="h-16 sm:h-20 w-16 sm:w-20 object-contain">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 border-b border-gray-200 pb-2 sm:pb-3 text-center">Silver Plan</h3>
                <p class="text-gray-600 mt-1 sm:mt-2 text-center text-sm sm:text-base">Most popular for serious students</p>
                <ul class="mt-3 sm:mt-4 space-y-2 sm:space-y-3 pl-0">
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Everything from Bronze</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Practice Exams</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Answer Explanations</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Mobile Access</span>
                    </li>
                </ul>
                <div class="text-xl sm:text-2xl font-bold my-4 sm:my-6 text-center">$59.99/mo</div>
                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded transition-colors duration-200 text-sm sm:text-base">
                    Subscribe
                </button>
            </div>

            <!-- Gold Plan -->
            <div class="border border-gray-200 rounded-lg p-4 sm:p-6">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <img src="/assets/images/plan3.svg" alt="Gold Plan" class="h-16 sm:h-20 w-16 sm:w-20 object-contain">
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 border-b border-gray-200 pb-2 sm:pb-3 text-center">Gold Plan</h3>
                <p class="text-gray-600 mt-1 sm:mt-2 text-center text-sm sm:text-base">Essential for passing on your first try</p>
                <ul class="mt-3 sm:mt-4 space-y-2 sm:space-y-3 pl-0">
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Everything from Silver</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Downloadable Flash Cards</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">NHA Readiness Certificate</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-sm sm:text-base">Practice Exams</span>
                    </li>
                </ul>
                <div class="text-xl sm:text-2xl font-bold my-4 sm:my-6 text-center">$69.99/mo</div>
                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded transition-colors duration-200 text-sm sm:text-base">
                    Subscribe
                </button>
            </div>
        </div>

        <!-- Why Choose Us -->
        <section class="bg-gray-50 rounded-lg p-4 sm:p-6">
            <h2 class="text-2xl sm:text-3xl font-semibold mb-3 sm:mb-4">Why Choose Us?</h2>
            <ul class="space-y-2 sm:space-y-3 pl-0">
                <li class="flex items-start">
                    <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm sm:text-base">Most Affordable and Complete NHA Self Study Program</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm sm:text-base">Over 4k High Quality Exam Questions</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm sm:text-base">Answer Explanations so you can learn from your mistakes</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm sm:text-base">Downloadable Flash Cards</span>
                </li>
            </ul>
        </section>
    </div>
</body>

@stop

@pushOnce('scripts')
@endPushOnce