<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheFinder - Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-blue-600 p-4 shadow mb-8">
        <div class="container mx-auto flex justify-between items-center text-white">
            <h1 class="text-2xl font-bold">🔍 TheFinder</h1>
            <div>
                <a href="#" class="px-3 hover:text-blue-200">Home</a>
                <a href="#" class="px-3 hover:text-blue-200">Report Found Item</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Latest Posted Items</h2>
            <div class="bg-white rounded-lg shadow px-4 py-2">
                <span class="text-sm text-gray-500">Total Database: {{ $items->total() }} items</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($items as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-800 line-clamp-1">{{ $item->name }}</h3>
                            @if($item->is_found)
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold">Found</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-semibold">Lost</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-500 mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $item->location }}
                        </p>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                            {{ $item->description }}
                        </p>
                        <div class="text-xs text-gray-400 mt-auto border-t pt-2">
                            Posted: {{ $item->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    No items reported yet.
                </div>
            @endforelse
        </div>

        <div class="mt-8 mb-12">
            {{ $items->links() }}
        </div>
    </div>

</body>
</html>
