<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .profile-container {
            background-color: #f9fafb;
            padding: 2rem;
        }

        .card {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
        }
        
        .form-file {
            border: 1px solid #d1d5db;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        .btn-primary {
            background-color: #229a76;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #1a7f66;
        }
        
        .btn-secondary {
            background-color: #6b7280;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .plan-card {
            background-color: #ecfdf5;
            border-left: 4px solid #3cb371;
        }

        .plan-heading {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .plan-details {
            margin-top: 1rem;
        }

        .plan-details p {
            margin: 0.25rem 0;
            color: #4b5563;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    @include('pages.preloader')

    <div class="profile-container min-h-screen">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-10">
                <a href="{{ route('profile.show') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back
                </a>
                <h1 class="text-3xl font-bold text-gray-800">Your Profile</h1>
                <div></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- User Profile Card -->
                <div class="card p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Profile Information</h2>
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-input" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-input" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" name="address" class="form-input">{{ old('address', Auth::user()->address) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" id="country" name="country" value="{{ old('country', Auth::user()->country) }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city', Auth::user()->city) }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" name="state" value="{{ old('state', Auth::user()->state) }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="zip_code" class="form-label">Zip Code</label>
                            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', Auth::user()->zip_code) }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="com_name" class="form-label">Company Name</label>
                            <input type="text" id="com_name" name="com_name" value="{{ old('com_name', Auth::user()->com_name) }}" class="form-input">
                        </div>
                         <div class="form-group">
                            <label for="user_pic" class="form-label">Profile Picture</label>
                            <input type="file" id="user_pic" name="user_pic" class="form-input form-file">
                        </div>
                        <div class="form-group">
                            <label for="com_pic" class="form-label">Company Picture</label>
                            <input type="file" id="com_pic" name="com_pic" class="form-input form-file">
                        </div>
                        <button type="submit" class="btn-primary w-full mt-4">Update Profile</button>
                    </form>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- Password Update Card -->
                    <div class="card p-6 mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6">Update Password</h2>
                        <form method="POST" action="{{ route('profile.password.update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" id="current_password" name="current_password" class="form-input" required>
                                @error('current_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" id="password" name="password" class="form-input" required>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                            </div>
                            <button type="submit" class="btn-secondary w-full mt-4">Update Password</button>
                        </form>
                    </div>

                    <!-- Subscription Card -->
                    <div class="card p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6">Subscription Plan</h2>
                        @if(Auth::user()->role === 'admin')
                            <div class="plan-card p-4 rounded-lg bg-indigo-100 border-l-4 border-indigo-500">
                                <p class="plan-heading text-indigo-800 flex items-center">
                                    <i class="fas fa-crown mr-2"></i> You are an Admin User
                                </p>
                                <p class="plan-details text-sm text-indigo-600 mt-2">
                                    As an administrator, you have full access to all features and content. No subscription is required.
                                </p>
                            </div>
                        @else
                            @if(Auth::user()->subscribed('default'))
                                @php
                                    $subscription = Auth::user()->subscription('default');
                                @endphp
                                <div class="plan-card p-4 rounded-lg">
                                    <p class="plan-heading text-green-800 flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i> You are currently subscribed!
                                    </p>
                                    <div class="plan-details mt-2">
                                        <p><strong>Status:</strong> {{ ucfirst($subscription->stripe_status) }}</p>
                                        @if($subscription->onGracePeriod())
                                            <p class="text-sm text-yellow-600 mt-2">Your subscription is scheduled to be cancelled on {{ $subscription->ends_at->format('M d, Y') }}.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-6 space-y-4">
                                    @if(!$subscription->onGracePeriod())
                                        <a href="{{ route('home') }}" class="block text-center btn-primary w-full">Change Plan</a>
                                        <form method="POST" action="{{ route('subscribe.cancel') }}">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure you want to cancel your subscription?')" class="w-full text-center py-2 px-4 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition">
                                                Cancel Subscription
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @else
                                <div class="plan-card p-4 rounded-lg bg-red-100 border-l-4 border-red-500">
                                    <p class="plan-heading text-red-800 flex items-center">
                                        <i class="fas fa-exclamation-triangle mr-2"></i> You are not subscribed
                                    </p>
                                    <p class="plan-details text-sm text-red-600 mt-2">Please subscribe to a plan to access all the features.</p>
                                </div>
                                <div class="mt-6 text-center">
                                    <a href="{{ route('home') }}" class="btn-primary">View Plans</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
