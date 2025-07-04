@extends('layouts.main')
@section('title', 'Module 2 - Resident Rights')
@section('content')

<div class="min-h-screen w-full bg-gradient-to-br from-gray-50 to-blue-50 py-4 sm:py-8 mb-20 sm:mb-0">
    <div class="px-4 sm:px-6 lg:px-8 w-full">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Section with subtle gradient -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-4 sm:px-6 py-3 sm:py-4">
                <h1 class="text-xl sm:text-2xl font-bold text-white">NHA Tutor Pro</h1>
                <h2 class="text-lg sm:text-xl font-semibold text-blue-100">Module 2 – Resident Rights</h2>
            </div>

            <!-- Progress Section -->
            <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="mb-3 sm:mb-0 w-full sm:w-auto">
                        <div class="text-sm font-medium text-gray-600 mb-1">Your Progress</div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 12%"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between sm:justify-normal sm:space-x-4 text-sm mt-2 sm:mt-0">
                        <span class="text-gray-500">12% Complete</span>
                        <span class="text-gray-300 hidden sm:inline">|</span>
                        <div class="flex space-x-2 sm:space-x-4">
                            <button class="text-blue-600 hover:text-blue-800 font-medium transition">Previous</button>
                            <button class="text-blue-600 hover:text-blue-800 font-medium transition">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row">
                <!-- Lesson Content -->
                <div class="px-4 sm:px-6 py-4 sm:py-6 space-y-4 sm:space-y-6 flex-1">
                    <div class="prose max-w-none">
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-3 sm:p-4 rounded-r-lg mb-4 sm:mb-6">
                            <p class="font-medium text-blue-800"><span class="font-bold">A1:</span> Welcome to Module 2.
                                Let's begin by understanding what resident rights mean under federal regulations.
                                Residents have the right to... [lesson content continues]</p>
                        </div>

                        <div class="bg-gray-50 p-3 sm:p-4 rounded-lg mb-4 sm:mb-6">
                            <p class="text-gray-700">Can you explain what "dignity" means in this context?</p>
                        </div>

                        <div class="bg-green-50 border-l-4 border-green-500 p-3 sm:p-4 rounded-r-lg">
                            <p class="font-medium text-green-800"><span class="font-bold">A1:</span> Great question. In
                                this context, dignity refers to respecting each resident's individuality, choices, and
                                privacy...</p>
                        </div>
                    </div>
                </div>

                <!-- Lesson Tools - Hidden on small screens, shown on medium and up -->
                <div class="px-4 sm:px-6 py-4 bg-gray-50 lg:w-[30%] border-t lg:border-t-0 lg:border-l border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Lesson Tools</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-4">
                        <button
                            class="flex flex-col items-center justify-center p-3 sm:p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600 mb-1 sm:mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <span class="text-xs sm:text-sm font-medium text-gray-700">Take Quiz</span>
                        </button>
                        <button
                            class="flex flex-col items-center justify-center p-3 sm:p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600 mb-1 sm:mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="text-xs sm:text-sm font-medium text-gray-700">Key Takeaways</span>
                        </button>
                        <button
                            class="flex flex-col items-center justify-center p-3 sm:p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600 mb-1 sm:mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span class="text-xs sm:text-sm font-medium text-gray-700">Flash Cards</span>
                        </button>
                        <button
                            class="flex flex-col items-center justify-center p-3 sm:p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600 mb-1 sm:mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-xs sm:text-sm font-medium text-gray-700">Take Exam</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Links - Redesigned -->
        </div>
    </div>
</div>

@stop

@pushOnce('scripts')
<script>
// You can add any specific JavaScript for this page here
document.addEventListener('DOMContentLoaded', function() {
    // Add any interactive functionality here
});
</script>
@endPushOnce