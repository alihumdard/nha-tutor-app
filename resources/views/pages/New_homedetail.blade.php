@include('includes.script')

<div class="w-full">

    <div class="bg-white">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-r from-blue-800 to-blue-900 px-4 sm:px-6 py-3 sm:py-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-2">
            <h1 class="text-xl sm:text-2xl font-bold text-white">NHA Tutor Pro</h1>
            <h2 class="text-lg sm:text-xl font-semibold text-blue-100">Module 2 – Resident Rights</h2>
            <a href="#" class="text-white text-xl">Log Out</a>
        </div>

        <!-- Progress Bar -->
        <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200 bg-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-center text-center">
                <div class="w-full sm:w-auto flex flex-col sm:flex-row items-center justify-center gap-2">
                    <div class="text-sm font-medium text-gray-600">Your Progress:</div>
                    <span class="text-gray-500">12% Complete</span>
                    <span class="text-gray-300 hidden sm:inline">|</span>
                    <div class="flex space-x-2">
                        <button class="text-blue-600 hover:text-blue-800 font-medium transition">Previous</button>
                        <span class="text-gray-300 hidden sm:inline">|</span>
                        <button class="text-blue-600 hover:text-blue-800 font-medium transition">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col px-4 sm:px-6 py-6 lg:flex-row gap-6">
            <!-- Lesson Content -->
            <div
                class="flex-1 shadow-lg rounded-3xl bg-white p-4 sm:p-6 space-y-4 text-sm sm:text-base leading-relaxed text-gray-800">
                <!-- Content Blocks -->
                <div class="bg-green-50 p-4 sm:p-6 rounded-lg">
                    <p class="font-medium text-black">
                        <span class="font-bold">A1:</span> Welcome to Module 2. Let's begin by understanding what
                        resident rights mean under federal regulations. Residents have the right to... [lesson
                        content continues]
                    </p>
                </div>

                <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <p class="text-gray-700">Can you explain what "dignity" means in this context?</p>
                </div>

                <div class="bg-green-50 p-4 sm:p-6 rounded-lg">
                    <p class="font-medium text-black">
                        <span class="font-bold">A1:</span> Great question. In this context, dignity refers to
                        respecting each resident's individuality, choices, and privacy...
                    </p>
                </div>
            </div>

            <!-- Lesson Tools -->
            <div
                class="lg:w-[30%] bg-gray-50 shadow-lg rounded-3xl p-4 sm:p-6 border-t lg:border-t-0 lg:border-l border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Lesson Tools</h3>
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1 gap-4">
                    <!-- Tool Buttons -->
                    <button
                        class="bg-gradient-to-r from-blue-800 to-blue-900 flex items-center justify-center gap-2 p-3 sm:p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="text-xs sm:text-sm font-medium text-white">Take Quiz</span>
                    </button>

                    <button
                        class="bg-gradient-to-r from-blue-800 to-blue-900 flex items-center justify-center gap-2 p-3 sm:p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-xs sm:text-sm font-medium text-white">Key Takeaways</span>
                    </button>

                    <button
                        class="bg-gradient-to-r from-blue-800 to-blue-900 flex items-center justify-center gap-2 p-3 sm:p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="text-xs sm:text-sm font-medium text-white">Flash Cards</span>
                    </button>

                    <button
                        class="bg-gradient-to-r from-blue-800 to-blue-900 flex items-center justify-center gap-2 p-3 sm:p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all hover:border-blue-300">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xs sm:text-sm font-medium text-white">Take Exam</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="">
    @include('includes.footer')
</div>

@pushOnce('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add interactive functionality here if needed
});
</script>
@endPushOnce