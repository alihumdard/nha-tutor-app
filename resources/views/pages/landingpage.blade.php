@include('includes.script')

<body class="bg-white text-gray-800 font-sans">
    <div class="w-full px-8 py-6">

        <!-- Header -->
        <header class="flex flex-row justify-between items-center border-b border-gray-200 pb-4 mb-8 px-6 py-3 bg-white shadow-sm">
            <!-- Logo -->
            <div class="text-2xl font-bold text-gray-800 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                NHA Tutor Pro
            </div>

            <!-- Navigation -->
            <a href="#" class="text-green-600 hover:text-green-800 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>

            <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-lg shadow-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Log in
            </a>
        </header>

        <!-- Hero Section -->
        <section class="text-center bg-gray-50 rounded-lg p-6 mb-12">
            <h2 class="text-3xl font-semibold mb-4">Empowering the Next Generation of Nursing Home Administrators</h2>
            <p class="max-w-full mx-auto text-base">
                This AI was trained specifically on NHA study material to deliver Lessons, Quizzes, Exams, Rationales,
                and Downloadable Flash Cards. It has been reviewed and approved by a Licensed Nursing Home Administrator.
            </p>
        </section>

        <!-- Plans Section -->
        <h2 class="text-3xl font-semibold text-center mb-8">Choose Your Plan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach(['Bronze', 'Silver', 'Gold'] as $index => $plan)
            <div class="border border-gray-200 rounded-lg p-6">
                <div class="flex justify-center mb-4">
                    <img src="/assets/images/plan{{ $index + 1 }}.svg" alt="{{ $plan }} Plan" class="h-20 w-20 object-contain">
                </div>
                <h3 class="text-xl font-semibold text-gray-800 border-b border-gray-200 pb-3 text-center">{{ $plan }} Plan</h3>
                <p class="text-gray-600 mt-2 text-center">
                    @if($plan == 'Bronze') Perfect for new learners
                    @elseif($plan == 'Silver') Most popular for serious students
                    @else Essential for passing on your first try
                    @endif
                </p>
                <ul class="mt-4 space-y-3">
                    @php
                        $features = [
                            'Bronze' => ['AI-generated Lessons', 'Topic Quizzes', 'Progress Dashboard', 'Answer Explanations'],
                            'Silver' => ['Everything from Bronze', 'Practice Exams', 'Answer Explanations', 'Mobile Access'],
                            'Gold'   => ['Everything from Silver', 'Downloadable Flash Cards', 'NHA Readiness Certificate', 'Practice Exams']
                        ];
                    @endphp
                    @foreach($features[$plan] as $feature)
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-base">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="text-2xl font-bold my-6 text-center">${{ 49.99 + ($index * 10) }}/mo</div>
                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded text-base">
                    Subscribe
                </button>
            </div>
            @endforeach
        </div>

        <!-- Why Choose Us -->
        <section class="bg-gray-50 rounded-lg p-6">
            <h2 class="text-3xl font-semibold mb-4">Why Choose Us?</h2>
            <ul class="space-y-3">
                @foreach([
                    'Most Affordable and Complete NHA Self Study Program',
                    'Over 4k High Quality Exam Questions',
                    'Answer Explanations so you can learn from your mistakes',
                    'Downloadable Flash Cards'
                ] as $reason)
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-base">{{ $reason }}</span>
                </li>
                @endforeach
            </ul>
        </section>

    </div>
</body>
