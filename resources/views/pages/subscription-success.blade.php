<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subscription Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- This meta tag will redirect the user to the dashboard after 5 seconds -->
    <meta http-equiv="refresh" content="5;url={{ route('dashboard') }}">
    <style>
        .bg { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); }
    </style>
</head>
<body class="bg min-h-screen flex items-center justify-center font-sans px-4">
    <div class="w-full max-w-lg p-8 text-center bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-200">
        <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <h1 class="text-3xl font-bold text-gray-800 mt-4">Payment Successful!</h1>
        <p class="text-gray-600 mt-2">Thank you for subscribing. Your account is being updated.</p>
        <p class="text-gray-600 mt-4">We are preparing your dashboard. You will be redirected automatically in a few moments.</p>
        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="text-white font-semibold py-2 px-4 rounded-lg transition duration-200" style="background-color: #3cb371;">Go to Dashboard Now</a>
        </div>
    </div>
</body>
</html>
 @include('includes.security-scripts')
