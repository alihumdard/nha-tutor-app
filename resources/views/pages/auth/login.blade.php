<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Professional Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <style>
        .bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
    </style>
</head>

<body class="bg min-h-screen flex items-center justify-center font-sans">
    <div class="w-full max-w-md p-8 bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Login</h2>
        
        <a href="{{ route('auth.google') }}" class="flex items-center justify-center w-full border border-gray-300 rounded-lg px-4 py-3 space-x-3 hover:bg-gray-100 transition mb-4">
            <svg class="w-5 h-5" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg"><path fill="#4285f4" d="M533.5 278.4c0-17.4-1.6-34.1-4.6-50.2H272v95h147.3c-6.4 34.6-25.1 63.9-53.3 83.5v69.2h86.1c50.4-46.5 81.4-115 81.4-197.5z"/><path fill="#34a853" d="M272 544.3c72.6 0 133.6-24 178.2-65.1l-86.1-69.2c-24 16-54.7 25.5-92.1 25.5-70.9 0-131-47.9-152.5-112.1H30.8v70.8c44.6 88 136.2 150.1 241.2 150.1z"/><path fill="#fbbc04" d="M119.5 323.4c-10.8-32.6-10.8-67.9 0-100.5V152.1H30.8c-36.1 71.7-36.1 156.4 0 228.1l88.7-56.8z"/><path fill="#ea4335" d="M272 107.7c39.5-.6 77.6 13.9 106.6 40.5l79.7-79.7C407.5 24.2 341.3-1.1 272 0 167 0 75.4 62.1 30.8 150.1l88.7 70.8c21.5-64.2 81.6-112.1 152.5-113.2z"/></svg>
            <span class="text-sm font-medium">Continue with Google</span>
        </a>

        <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="you@example.com"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required value="{{ old('email') }}" />
                @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required minlength="6" />
                @error('password')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300 text-green-600 focus:ring-green-500" />
                    Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-[#229a76] hover:underline">Forgot Password?</a>
            </div>

            @if(session('error'))
            <p class="my-2 text-sm text-center text-red-500">{{ session('error') }}</p>
            @endif
            @if(session('success'))
            <p class="my-2 text-sm text-center text-green-500">{{ session('success') }}</p>
            @endif

            <button type="submit"
                class="w-full bg-[#229a76] hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Sign In
            </button>

            <p class="text-center text-sm text-gray-600 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[#229a76] hover:underline font-medium">Register</a>
            </p>
        </form>
    </div>

    @if(session('verify_error'))
    <div id="popup-modal" class="fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-md">
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <button onclick="document.getElementById('popup-modal').style.display='none'" type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <p class="mb-4 text-gray-500">{{ session('verify_error') }}</p>
                <div class="flex justify-center items-center space-x-4">
                    <a href="{{ route('register.otp.show', ['email' => session('email_for_verification')]) }}" class="py-2 px-3 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700">Verify Now</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</body>
</html>