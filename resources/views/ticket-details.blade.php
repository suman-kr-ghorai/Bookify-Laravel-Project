<x-header/>
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Your Ticket Details</h1>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl">Ticket Numbers:</h2>
        <ul class="list-disc pl-5">
            @foreach($ticketNumbers as $ticketNumber)
                <li>{{ $ticketNumber }}</li>
            @endforeach
        </ul>

        <h3 class="text-lg mt-4">Total Price: ${{ $totalPrice }}</h3>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Back to Home
            </a>
        </div>
    </div>
</div>
<x-footer/>
