<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Professional Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <style>
        .bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
    </style>
</head>

<body class="bg min-h-screen flex items-center justify-center font-sans px-4 py-10">
    <div class="w-full max-w-md p-8 bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Account</h2>

        <form class="space-y-5" id="registerForm" method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required value="{{ old('name') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                <p class="mt-1 text-sm text-red-500 hidden" id="nameError">Please enter your full name.</p>
                @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                <p class="mt-1 text-sm text-red-500 hidden" id="emailError">Please enter a valid email.</p>
                 @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Minimum 6 characters" required minlength="6"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                <p class="mt-1 text-sm text-red-500 hidden" id="passwordError">Password must be at least 6 characters.</p>
                 @error('password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter your password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                <p class="mt-1 text-sm text-red-500 hidden" id="password_confirmationError">This field is required.</p>
                <p class="mt-1 text-sm text-red-500 hidden" id="passwordMismatchError">Passwords do not match.</p>
            </div>

            <button type="submit"
                class="w-full bg-[#229a76] hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Sign Up
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-[#229a76] hover:underline font-medium">Login</a>
        </p>
    </div>

    <script>
        const form = document.getElementById("registerForm");
        const passwordInput = document.getElementById("password");
        const confirmPasswordInput = document.getElementById("password_confirmation");
        const mismatchError = document.getElementById("passwordMismatchError");

        form.addEventListener("submit", function (e) {
            let valid = true;
            
            form.querySelectorAll('p.text-red-500').forEach(p => p.classList.add('hidden'));

            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                const errorElement = document.getElementById(`${input.id}Error`);
                if (!input.checkValidity()) {
                    if (errorElement) errorElement.classList.remove("hidden");
                    valid = false;
                } else {
                    if (errorElement) errorElement.classList.add("hidden");
                }
            });
            
            if (passwordInput.value !== confirmPasswordInput.value) {
                mismatchError.classList.remove("hidden");
                valid = false;
            } else {
                mismatchError.classList.add("hidden");
            }

            if (!valid) {
                e.preventDefault();
            }
        });

        function validatePasswordMatch() {
             if (passwordInput.value !== confirmPasswordInput.value && confirmPasswordInput.value) {
                mismatchError.classList.remove("hidden");
            } else {
                mismatchError.classList.add("hidden");
            }
        }
        passwordInput.addEventListener('input', validatePasswordMatch);
        confirmPasswordInput.addEventListener('input', validatePasswordMatch);
    </script>
</body>

</html>