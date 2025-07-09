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
        
        {{-- The form retains Laravel's action, method, and CSRF token for security and functionality --}}
        {{-- The 'novalidate' attribute is added to enable custom javascript validation --}}
        <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            {{-- Email Input --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="you@example.com"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required value="{{ old('email') }}" />
                {{-- Client-side validation message (initially hidden) --}}
                <p class="mt-1 text-sm text-red-500 hidden" id="emailError">Please enter a valid email.</p>
                {{-- Server-side validation message from Laravel --}}
                @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Input --}}
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required minlength="6" />
                {{-- Client-side validation message (initially hidden) --}}
                <p class="mt-1 text-sm text-red-500 hidden" id="passwordError">Password must be at least 6 characters.</p>
                {{-- Server-side validation message from Laravel --}}
                @error('password')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me & Forgot Password --}}
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300 text-green-600 focus:ring-green-500" />
                    Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-[#229a76] hover:underline">Forgot Password?</a>
            </div>

            {{-- General Session Messages from Laravel Controller --}}
            @if(session('error'))
            <p class="my-2 text-sm text-center text-red-500">{{ session('error') }}</p>
            @endif
            @if(session('success'))
            <p class="my-2 text-sm text-center text-green-500">{{ session('success') }}</p>
            @endif

            {{-- Submit Button --}}
            <button type="submit"
                class="w-full bg-[#229a76] hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Sign In
            </button>

            {{-- Registration Link --}}
            <p class="text-center text-sm text-gray-600 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[#229a76] hover:underline font-medium">Register</a>
            </p>
        </form>
    </div>

    {{-- JavaScript for client-side validation --}}
    <script>
        const form = document.getElementById("loginForm");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");

        form.addEventListener("submit", function (e) {
            let valid = true;

            // Hide previous server-side errors on new submission attempt
            document.querySelectorAll('p.text-red-500').forEach(p => {
                if(p.id !== 'emailError' && p.id !== 'passwordError') {
                    p.style.display = 'none';
                }
            });
            
            // Email validation
            if (!email.value || !email.checkValidity()) {
                emailError.classList.remove("hidden");
                valid = false;
            } else {
                emailError.classList.add("hidden");
            }

            // Password validation
            if (!password.value || !password.checkValidity()) {
                passwordError.classList.remove("hidden");
                valid = false;
            } else {
                passwordError.classList.add("hidden");
            }

            if (!valid) {
                e.preventDefault(); // Prevent form submission if validation fails
            }
        });
    </script>
</body>

</html>