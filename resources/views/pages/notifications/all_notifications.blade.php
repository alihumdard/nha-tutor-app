<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Notifications</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            background-color: #f4f7f9;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-5">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Notifications</h1>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-500 hover:underline flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>
        </div>

        <div class="flex space-x-4 mb-6 border-b border-gray-200 pb-4">
            <a href="{{ route('admin.notifications.index') }}" class="px-4 py-2 rounded-md text-sm font-medium {{ !$status ? 'bg-blue-500 text-white shadow' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                All
            </a>
            <a href="{{ route('admin.notifications.index', ['status' => 'unread']) }}" class="px-4 py-2 rounded-md text-sm font-medium {{ $status == 'unread' ? 'bg-blue-500 text-white shadow' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Unread
            </a>
            <a href="{{ route('admin.notifications.index', ['status' => 'read']) }}" class="px-4 py-2 rounded-md text-sm font-medium {{ $status == 'read' ? 'bg-blue-500 text-white shadow' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Read
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-5">
                @if($notifications->isEmpty())
                    <div class="text-center py-12">
                        <i class="fas fa-bell-slash text-5xl text-gray-300"></i>
                        <p class="text-gray-500 mt-4 text-lg">No notifications found for this filter.</p>
                    </div>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach($notifications as $notification)
                            <li class="p-4 transition-colors duration-200 {{ !$notification->read ? 'bg-blue-50 hover:bg-blue-100' : 'hover:bg-gray-50' }}">
                                <a href="{{ route('admin.notifications.show', $notification) }}" class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 relative">
                                        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                                            <i class="fas fa-bell text-xl text-blue-500"></i>
                                        </div>
                                        @if(!$notification->read)
                                            <span class="absolute top-0 right-0 block h-3 w-3 rounded-full bg-red-500 ring-2 ring-white"></span>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-md font-semibold text-gray-900 truncate">
                                            {{ $notification->title }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            {{ $notification->message }}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-xs font-semibold text-gray-500">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
        <div class="mt-8">
            {{ $notifications->links() }}
        </div>
    </div>

</body>
</html>
 @include('includes.security-scripts')
