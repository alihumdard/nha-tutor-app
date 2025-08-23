<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background: #f9fafb;
      margin: 0;
      padding: 40px;
      color: #111827;
    }
    .header_faizan{
         max-width: 1050px;
      margin: auto;
      gap: 20px;
    }
    .header_faizan h2 {
      font-size: 22px;
      font-weight: 700;
      margin: 0;
    }
    .sub-text_faizan {
      font-size: 14px;
      color: #6b7280;
      margin: 5px 0 20px;
    }
    .container_faizan {
      display: flex;
      max-width: 1050px;
      margin: auto;
      gap: 20px;
    }
    /* Left card */
    .left-card_faizan {
      flex: 2;
      background: #fff;
      border-radius: 10px;
      border: 1px solid #e5e7eb;
      padding: 25px;
    }
    .profile-info_faizan {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .profile-info_faizan img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background: #e5e7eb;
    }
    .profile-details_faizan h3 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }
    .verified_faizan {
      color: #22c55e;
      font-size: 14px;
      margin-top: 3px;
    }
    .info-grid_faizan {
      display: grid;
      grid-template-columns: 1fr 1fr;
      margin-top: 20px;
      gap: 15px;
    }
    .info-grid_faizan p {
      margin: 0;
      font-size: 14px;
      color: #374151;
      display: flex;
      align-items: center;
    }
    .info-grid_faizan i {
      margin-right: 8px;
      color: #6b7280;
      font-size: 14px;
    }
    .buttons_faizan {
      margin-top: 20px;
      display: flex;
      gap: 12px;
      border-top: 1px solid #e5e7eb;
      padding-top: 20px;
    }
    .buttons_faizan button {
      flex: 1;
      padding: 10px;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      background: #fff;
      cursor: pointer;
      font-weight: 500;
      font-size: 14px;
    }
    .buttons_faizan button:hover {
      background: #f9fafb;
    }
    /* Right column */
    .right-col_faizan {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .premium-card_faizan {
      background: linear-gradient(to bottom, #2563eb, #3b82f6);
      padding: 20px;
      border-radius: 10px;
      color: #fff;
    }
    .premium-card_faizan h4 {
      margin: 0 0 5px 0;
      font-size: 15px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .premium-card_faizan p {
      font-size: 14px;
      display:flex;
      justify-content:space-between;
      margin: 3px 0;
    }
    .premium-card_faizan h2 {
      margin: 12px 0;
      font-size: 28px;
      font-weight: 700;
    }
    .premium-card_faizan small {
      font-size: 14px;
      font-weight: normal;
    }
    .status_faizan {
      margin-top: 8px;
      display:flex;
      justify-content:space-between;
      font-size: 14px;
      font-weight: 500;
    }
    .status_faizan span {
      background: #22c55e;
      color: #fff;
      font-size: 12px;
      padding: 3px 10px;
      border-radius: 20px;
      margin-left: 6px;
    }
    .plan-features_faizan {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #e5e7eb;
    }
    .plan-features_faizan h4 {
      margin: 0 0 10px 0;
      font-size: 15px;
      font-weight: 600;
    }
    .plan-features_faizan ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .plan-features_faizan ul li {
      font-size: 14px;
      margin: 8px 0;
      color: #374151;
      display: flex;
      align-items: center;
    }
    .plan-features_faizan ul li i {
      color: #22c55e;
      margin-right: 8px;
    }
    .manage-btn_faizan {
      margin-top: 15px;
      padding: 10px;
      border: 1px solid #e5e7eb;
      width: 100%;
      border-radius: 6px;
      background: #fff;
      cursor: pointer;
      font-weight: 500;
      font-size: 14px;
    }
    .manage-btn_faizan:hover {
      background: #f9fafb;
    }
    .cancel_faizan {
      margin-top: 12px;
      text-align: center;
      font-size: 14px;
      color: #ef4444;
      cursor: pointer;
    }
    .twenty_faizan{
        text-align:center;
    }
      .twenty_faizan span{
        text-align:center;
        font-size:16px;
    }
    
    @media (max-width: 768px) {
      .container_faizan {
        flex-direction: column;
      }
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
  </style>
</head>
<body>
    <div class="flex justify-between items-center mb-10">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>
 <div class="header_faizan">
     <h2>Profile Settings</h2>
  <p class="sub-text_faizan">Manage your account information and subscription</p>

 </div>
  <div class="container_faizan">
    <div class="left-card_faizan">
      <div class="profile-info_faizan">
        <img src="{{ Auth::user()->user_pic ? Storage::url(Auth::user()->user_pic) : 'https://via.placeholder.com/70' }}" alt="Profile">
        <div class="profile-details_faizan">
          <h3>{{ Auth::user()->name }}</h3>
          <p class="verified_faizan"><i class="fa-solid fa-circle-check"></i> Verified Account</p>
        </div>
      </div>

      <div class="info-grid_faizan">
        <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-envelope" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Email<br>
           <strong>{{ Auth::user()->email }}</strong>
          </span>
        </p>

         <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-phone" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Phone<br>
           <strong>{{ Auth::user()->phone ?: 'Not available' }}</strong>
          </span>
        </p>

         <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-location-dot" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Location<br>
           <strong>{{ Auth::user()->city && Auth::user()->state ? Auth::user()->city . ', ' . Auth::user()->state : 'Not available' }}</strong>
          </span>
        </p>

         <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-calendar" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Member since<br>
           <strong>{{ Auth::user()->created_at->format('F Y') }}</strong>
          </span>
        </p>

      </div>

      <div class="buttons_faizan">
        <a href="{{ route('profile.edit') }}" style="flex: 1; text-align: center; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; background: #fff; cursor: pointer; font-weight: 500; font-size: 14px; text-decoration: none; color: #111827;"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
        <a href="{{ route('profile.edit') }}" style="flex: 1; text-align: center; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; background: #fff; cursor: pointer; font-weight: 500; font-size: 14px; text-decoration: none; color: #111827;"><i class="fa-solid fa-lock"></i> Change Password</a>
      </div>
    </div>

    <div class="right-col_faizan">
        @if(Auth::user()->subscribed('default'))
            @php
                $subscription = Auth::user()->subscription('default');
            @endphp
      <div class="premium-card_faizan">
        <h4><i class="fa-solid fa-crown"></i> Premium Plan</h4>
        <p>Everything you need to succeed</p>
        <div class="twenty_faizan"><h2>$29 <br> <span>per month</span></h2></div>
        <p><b>Next billing</b> {{ $subscription->ends_at ? $subscription->ends_at->format('M d, Y') : 'N/A' }}</p>
        <div class="status_faizan">Status <span>{{ ucfirst($subscription->stripe_status) }}</span></div>
      </div>

      <div class="plan-features_faizan">
        <h4>Plan Features</h4>
        <ul>
          <li><i class="fas fa-check-circle"></i> Unlimited projects</li>
          <li><i class="fas fa-check-circle"></i> Priority support</li>
          <li><i class="fas fa-check-circle"></i> Advanced analytics</li>
          <li><i class="fas fa-check-circle"></i> Custom integrations</li>
          <li><i class="fas fa-check-circle"></i> Team collaboration</li>
        </ul>
        <button class="manage-btn_faizan" onclick="location.href='{{ route('home') }}'">Manage Billing</button>
        <div class="cancel_faizan">
            <form method="POST" action="{{ route('subscribe.cancel') }}">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to cancel your subscription?')" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 14px;">Cancel Subscription</button>
            </form>
        </div>
      </div>
      @else
      <div class="premium-card_faizan" style="background: #6c757d;">
          <h4><i class="fas fa-times-circle"></i> No Active Plan</h4>
          <p>Subscribe to unlock all features.</p>
          <div class="twenty_faizan"><h2>$0 <br> <span>per month</span></h2></div>
          <p><b>Next billing</b> N/A</p>
          <div class="status_faizan">Status <span style="background: #ef4444;">Inactive</span></div>
      </div>
       <div class="plan-features_faizan">
           <button class="manage-btn_faizan" onclick="location.href='{{ route('home') }}'">View Plans</button>
       </div>
      @endif
    </div>
  </div>
</body>
</html>