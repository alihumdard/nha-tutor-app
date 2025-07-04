@include('includes.script')

<body class="bg-gray-100 flex items-center justify-center min-h-screen my-10">

    <div class="bg-gray-50 p-8 rounded-lg shadow-md w-full max-w-md space-y-6 text-center">
        <h1 class="text-xl font-semibold">NHA Tutor Pro</h1>
        <h2 class="text-3xl font-bold">REGISTER</h2>

        <!-- Google Button -->
        <button
            class="flex items-center justify-center w-full border border-gray-300 rounded-md py-2 space-x-2 hover:bg-gray-100">
            <svg class="w-5 h-5" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                <path fill="#4285f4"
                    d="M533.5 278.4c0-17.4-1.6-34.1-4.6-50.2H272v95h147.3c-6.4 34.6-25.1 63.9-53.3 83.5v69.2h86.1c50.4-46.5 81.4-115 81.4-197.5z" />
                <path fill="#34a853"
                    d="M272 544.3c72.6 0 133.6-24 178.2-65.1l-86.1-69.2c-24 16-54.7 25.5-92.1 25.5-70.9 0-131-47.9-152.5-112.1H30.8v70.8c44.6 88 136.2 150.1 241.2 150.1z" />
                <path fill="#fbbc04"
                    d="M119.5 323.4c-10.8-32.6-10.8-67.9 0-100.5V152.1H30.8c-36.1 71.7-36.1 156.4 0 228.1l88.7-56.8z" />
                <path fill="#ea4335"
                    d="M272 107.7c39.5-.6 77.6 13.9 106.6 40.5l79.7-79.7C407.5 24.2 341.3-1.1 272 0 167 0 75.4 62.1 30.8 150.1l88.7 70.8c21.5-64.2 81.6-112.1 152.5-113.2z" />
            </svg>
            <span>Continue with Google</span>
        </button>

        <!-- OR separator -->
        <div class="flex items-center space-x-2">
            <hr class="flex-grow border-gray-300" />
            <span class="text-gray-500 text-sm">or</span>
            <hr class="flex-grow border-gray-300" />
        </div>

        <!-- Facebook Button -->
        <button
            class="flex items-center justify-center w-full border border-gray-300 rounded-md py-2 space-x-2 hover:bg-gray-100">
            <svg class="w-5 h-5 fill-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path
                    d="M279.1 288l14.2-92.7h-88.9v-60.1c0-25.4 12.4-50.1 52.2-50.1h40.4V6.3S267.7 0 234.8 0c-73.4 0-121.4 44.3-121.4 124.7v70.6H56v92.7h57.4V512h111.1V288z" />
            </svg>
            <span>Continue with Facebook</span>
        </button>

        <!-- Form -->
        <form class="space-y-4 text-left" onsubmit="return validateForm(event)">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required minlength="6"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirmPassword" required
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
                <p id="error" class="text-red-500 text-sm mt-1 hidden">Passwords do not match</p>
            </div>
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md">
                Sign Up
            </button>
        </form>
    </div>

    <script>
        function validateForm(event) {
            const password = document.getElementById("password").value;
            const confirm = document.getElementById("confirmPassword").value;
            const error = document.getElementById("error");

            if (password !== confirm) {
                error.classList.remove("hidden");
                return false;
            } else {
                error.classList.add("hidden");
                return true;
            }
        }
    </script>

</body>
