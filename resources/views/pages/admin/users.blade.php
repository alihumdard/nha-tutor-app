<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
            background-color: #f4f7f9;
            padding: 0 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .header-section {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .table-container {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th,
        .user-table td {
            padding: 1.25rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid #f1f5f9;
        }

        .user-table th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .user-table tr:last-child td {
            border-bottom: none;
        }

        .user-table .action-btn {
            color: #4338ca;
            cursor: pointer;
            transition: color 0.2s;
            font-size: 1rem;
        }

        .user-table .action-btn:hover {
            color: #312e81;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease, visibility 0.3s;
            z-index: 9999;
            backdrop-filter: blur(8px);
        }

        .modal.show {
            visibility: visible;
            opacity: 1;
        }

        .modal-content {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 0.75rem;
            width: 90%;
            max-width: 600px;
            position: relative;
            transform: scale(0.95);
            transition: transform 0.3s ease-out;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal.show .modal-content {
            transform: scale(1);
        }

        .modal-close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #f1f5f9;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-size: 1rem;
            transition: background-color 0.2s, color 0.2s;
        }

        .modal-close-btn:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        .modal-body p {
            margin-bottom: 0.5rem;
        }

        .modal-body strong {
            color: #1f2937;
        }

        .modal-plan-card {
            background-color: #ecfdf5;
            border-left: 4px solid #10b981;
            padding: 1.25rem;
            border-radius: 0.5rem;
            margin-top: 1.5rem;
        }

        .modal-plan-card.unsubscribed {
            background-color: #fef2f2;
            border-left-color: #ef4444;
        }
        
        .modal-plan-heading {
            font-size: 1.125rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .profile-pic-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #e2e8f0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 1.5rem;
            border: 4px solid #fff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .profile-pic-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-pic-container i {
            font-size: 4rem;
            color: #94a3b8;
        }
        
        .data-row {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 0.875rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .data-row:last-child {
            border-bottom: none;
        }
        
        .data-row .icon {
            color: #3b82f6;
            width: 1.5rem;
            text-align: center;
        }
        
        .data-row .icon.text-green-500 { color: #22c55e; }
        .data-row .icon.text-yellow-500 { color: #f59e0b; }
        .data-row .icon.text-blue-500 { color: #3b82f6; }
        .data-row .icon.text-red-500 { color: #ef4444; }
    </style>
</head>

<body>
    @include('includes.header')

    <div class="container">
         <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Dashboard
            </a>
        <div class="header-section">
            <h1 class="text-3xl font-bold text-gray-900">User Management</h1>
            <p class="mt-2 text-gray-600">View and manage all registered users on the platform.</p>
        </div>

        <div class="table-container">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subscription Status</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->subscribed)
                            <span class="text-green-600 font-semibold">Subscribed</span>
                            @else
                            <span class="text-red-600 font-semibold">Not Subscribed</span>
                            @endif
                        </td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <button onclick="showUserModal({{ json_encode($user) }})" class="action-btn">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="userModal" class="modal">
        <div class="modal-content">
            <button class="modal-close-btn" onclick="closeUserModal()">
                <i class="fas fa-times"></i>
            </button>
            <div id="modal-body" class="modal-body">
            </div>
        </div>
    </div>


    <script>
        function showUserModal(user) {
            const modal = document.getElementById('userModal');
            const modalBody = document.getElementById('modal-body');
            modalBody.innerHTML = '';

            const profilePicDiv = document.createElement('div');
            profilePicDiv.classList.add('profile-pic-container');
            if (user.user_pic) {
                const img = document.createElement('img');
                img.src = `/public/storage/${user.user_pic}`;
                profilePicDiv.appendChild(img);
            } else {
                const icon = document.createElement('i');
                icon.classList.add('fas', 'fa-user');
                profilePicDiv.appendChild(icon);
            }
            modalBody.appendChild(profilePicDiv);

            const attributes = {
                'ID': { icon: 'fas fa-id-badge', key: 'id' },
                'Name': { icon: 'fas fa-user', key: 'name' },
                'Email': { icon: 'fas fa-envelope', key: 'email' },
                'Phone': { icon: 'fas fa-phone', key: 'phone' },
                'Address': { icon: 'fas fa-address-card', key: 'address' },
                'Role': { icon: 'fas fa-user-tag', key: 'role' },
                'Status': { icon: 'fas fa-check-circle', key: 'status' },
                'Joined': { icon: 'fas fa-calendar-plus', key: 'created_at' },
            };

            for (const [label, attribute] of Object.entries(attributes)) {
                if (user[attribute.key] !== null && user[attribute.key] !== undefined) {
                    const div = document.createElement('div');
                    div.classList.add('data-row');
                    let value = user[attribute.key];
                    let iconClass = attribute.icon;

                    if (attribute.key === 'status') {
                        value = value == '1' ? 'Active' : 'Inactive';
                        iconClass = value === 'Active' ? 'fas fa-circle-check text-green-500' : 'fas fa-circle-xmark text-red-500';
                    }
                    if (attribute.key === 'created_at' || attribute.key === 'updated_at') {
                        value = new Date(value).toLocaleDateString();
                        iconClass = 'fas fa-clock text-blue-500';
                    }
                    if (attribute.key === 'role') {
                        value = value.charAt(0).toUpperCase() + value.slice(1);
                        iconClass = 'fas fa-user-shield text-purple-500';
                    }
                    if (attribute.key === 'email') {
                         iconClass = 'fas fa-envelope text-red-500';
                    }

                    div.innerHTML = `
                        <i class="${iconClass} icon"></i>
                        <p><strong>${label}:</strong> ${value}</p>
                    `;
                    modalBody.appendChild(div);
                }
            }
            
            const subStatusDiv = document.createElement('div');
            const hasActiveSubscription = user.subscriptions && user.subscriptions.some(sub => sub.name === 'default' && sub.stripe_status === 'active');

            if (hasActiveSubscription) {
                const subscriptionInfo = user.subscriptions.find(sub => sub.name === 'default');
                const status = subscriptionInfo.stripe_status;
                const endsAt = subscriptionInfo.ends_at ? new Date(subscriptionInfo.ends_at).toLocaleDateString() : 'N/A';
                
                subStatusDiv.classList.add('modal-plan-card');
                subStatusDiv.innerHTML = `
                    <p class="modal-plan-heading text-green-800">
                        <i class="fas fa-check-circle mr-2"></i> Subscription Details
                    </p>
                    <p class="text-sm text-green-700 mt-2"><strong>Plan:</strong> Premium Plan</p>
                    <p class="text-sm text-green-700"><strong>Status:</strong> ${status}</p>
                    <p class="text-sm text-green-700"><strong>Ends At:</strong> ${endsAt}</p>
                `;
            } else {
                subStatusDiv.classList.add('modal-plan-card', 'unsubscribed');
                subStatusDiv.innerHTML = `
                    <p class="modal-plan-heading text-red-800">
                        <i class="fas fa-exclamation-triangle mr-2"></i> Not Subscribed
                    </p>
                    <p class="text-sm text-red-700 mt-2">This user does not have an active subscription.</p>
                `;
            }
            modalBody.appendChild(subStatusDiv);

            modal.classList.add('show');
        }

        function closeUserModal() {
            const modal = document.getElementById('userModal');
            modal.classList.remove('show');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('userModal');
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        }
    </script>
</body>

</html>
