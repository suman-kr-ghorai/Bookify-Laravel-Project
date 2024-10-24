<x-header/>
<div class="container mt-5">
    <h2 class="text-xl font-bold mb-4">Bus Search Results</h2>

    @if(request()->has('results'))
        @php
            $results = json_decode(request()->get('results'), true);
        @endphp

        @if(count($results) > 0)
            

            <div class="space-y-4"> <!-- Use space-y-4 for vertical spacing between cards -->
                @foreach($results as $bus)
                <div class="flex items-center bg-white rounded-lg shadow-lg p-4 mb-4 w-full">
                    <div class="flex-1 w-full">
                        <h3 class="text-xl font-bold text-gray-800">{{ $bus['name'] }}</h3>
                        <p class="text-gray-600">From <span class="font-semibold text-blue-600">{{ $bus['source'] }}</span> To <span class="font-semibold text-blue-600">{{ $bus['destination'] }}</span></p>
                        <p class="text-gray-600">Time: <span class="font-semibold">{{ $bus['time'] }}</span></p>
                        <p class="text-gray-600">Price: <span class="font-semibold text-green-600">₹{{ $bus['price'] }}</span></p>
                        <p class="text-gray-600">Rating: <span class="font-semibold text-yellow-500">{{ $bus['rating'] }} ★</span></p>
                        <p class="text-gray-600">Capacity: <span class="font-semibold">{{ $bus['capacity'] }}</span></p>
                    </div>
                    <div class="ml-4">
                        <a href="/bus/{{ $bus['bus_id'] }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-200">
                            Book Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p>No buses found for your search.</p>
        @endif
    @else
        <p>Please perform a search to see the results.</p>
    @endif
</div>

<x-footer/>
