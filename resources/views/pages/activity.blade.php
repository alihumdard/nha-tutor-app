<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Activity</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-5">
        <h1 class="text-3xl font-bold mb-5">My Activity</h1>

        <div class="bg-white shadow-md rounded-lg p-5">
            {{-- *** THIS IS THE FIX *** --}}
            @if($activities->isEmpty())
                <p class="text-gray-500">You have not done any activity yet.</p>
            @else
                <ul>
                    @foreach($activities as $activity)
                        <li class="border-b border-gray-200 py-3">
                            <p class="text-gray-800">{{ $activity->description }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        
        <div class="mt-5">
            {{ $activities->links() }}
        </div>
    </div>

</body>
</html>