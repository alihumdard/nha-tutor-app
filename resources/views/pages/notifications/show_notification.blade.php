<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notification Details</title>
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
    .right-col_faizan {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .notification-card {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        padding: 25px;
    }
    .notification-card.unread {
        background: #eff6ff;
        border-color: #93c5fd;
    }
    .notification-card h4 {
      margin: 0 0 10px 0;
      font-size: 15px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .notification-card p {
        font-size: 14px;
        color: #374151;
        margin: 0;
    }
    .notification-card small {
        font-size: 12px;
        color: #6b7280;
        margin-top: 15px;
        display: block;
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
      color: #fff;
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
  </style>
</head>
<body>
 <div class="header_faizan">
     <h2>Notification Details</h2>
  <p class="sub-text_faizan">Review the notification and the associated user's profile.</p>

 </div>
  <div class="container_faizan">
    <div class="left-card_faizan">
      <div class="profile-info_faizan">
        <img src="{{ $user->user_pic ? Storage::url($user->user_pic) : 'https://via.placeholder.com/70' }}" alt="Profile">
        <div class="profile-details_faizan">
          <h3>{{ $user->name }}</h3>
          <p class="verified_faizan"><i class="fa-solid fa-circle-check"></i> Verified Account</p>
        </div>
      </div>

      <div class="info-grid_faizan">
        <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-envelope" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Email<br>
           <strong>{{ $user->email }}</strong>
          </span>
        </p>

         <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-phone" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Phone<br>
           <strong>{{ $user->phone ?: 'Not available' }}</strong>
          </span>
        </p>

         <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-location-dot" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Location<br>
           <strong>{{ $user->city && $user->state ? $user->city . ', ' . $user->state : 'Not available' }}</strong>
          </span>
        </p>

         <p style="display: flex; align-items: flex-start; gap: 8px;">
          <i class="fa-solid fa-calendar" style="font-size:18px; margin-top:3px;"></i>
          <span>
            Member since<br>
           <strong>{{ $user->created_at->format('F Y') }}</strong>
          </span>
        </p>
      </div>
    </div>

    <div class="right-col_faizan">
      <div class="notification-card {{ !$notification->read ? 'unread' : '' }}">
        <h4><i class="fa-solid fa-bell"></i> {{ $notification->title }}</h4>
        <p>{{ $notification->message }}</p>
        <small>Received: {{ $notification->created_at->diffForHumans() }}</small>
      </div>

      @if($user->subscribed('default'))
            @php
                $subscription = $user->subscription('default');
            @endphp
      <div class="premium-card_faizan">
        <h4><i class="fa-solid fa-crown"></i> Premium Plan</h4>
        <p>Everything you need to succeed</p>
        <div class="twenty_faizan"><h2>$29 <br> <span>per month</span></h2></div>
        <p><b>Next billing</b> {{ $subscription->ends_at ? $subscription->ends_at->format('M d, Y') : 'N/A' }}</p>
        <div class="status_faizan">Status <span>{{ ucfirst($subscription->stripe_status) }}</span></div>
      </div>
      @else
      <div class="premium-card_faizan" style="background: #6c757d;">
          <h4><i class="fas fa-times-circle"></i> No Active Plan</h4>
          <p>This user does not have an active subscription.</p>
          <div class="twenty_faizan"><h2>$0 <br> <span>per month</span></h2></div>
          <p><b>Next billing</b> N/A</p>
          <div class="status_faizan">Status <span style="background: #ef4444;">Inactive</span></div>
      </div>
      @endif
    </div>
  </div>
</body>
</html>
