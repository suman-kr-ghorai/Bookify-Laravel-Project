{{-- {{dd($tickets)}} --}}
<x-header/>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-700 mb-6"><i class="fas fa-ticket-alt mr-2"></i>All Confirmed Ticket Details</h1>

    {{-- Display any errors --}}
    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Check if tickets are set and not empty --}}
    @if(empty($tickets))
        <p class="text-lg text-gray-700">No tickets found.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden shadow-md text-lg">
            <thead class="bg-yellow-500 text-white">
                <tr>
                    <th class="py-4 px-5 text-left"><i class="fas fa-ticket-alt"></i> Ticket Number</th>
                    <th class="py-4 px-5 text-left"><i class="fas fa-bus"></i> Bus Name</th>                  
                    <th class="py-4 px-5 text-left">Category</th>                  
                    <th class="py-4 px-5 text-left"><i class="fas fa-money-bill-wave"></i> Price</th>
                    <th class="py-4 px-5 text-left"><i class="fas fa-calendar-alt"></i> Date</th>
                    <th class="py-4 px-5 text-left"><i class="fas fa-info-circle"></i> Bus Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $index => $ticket)
                    <tr class="@if($index % 2 == 0) bg-gray-100 @else bg-white @endif border-b border-gray-300">
                        <td class="py-4 px-5">{{ $ticket->ticket_number }}</td>
                        <td class="py-4 px-5">{{ $ticket->bus->name ?? 'N/A' }}</td>
                        <td class="py-4 px-5">{{ $ticket->bus->category ?? 'N/A' }}</td>

                        <td class="py-4 px-5">Rs {{ number_format($ticket->bus->price ?? 0, 2) }}</td>
                        <td class="py-4 px-5">{{ \Carbon\Carbon::parse($ticket->date)->format('d M Y') }}</td>
                        <td class="py-4 px-5">
                            @if(isset($ticket->bus))
                                <div class="bg-gray-200 p-3 rounded-lg text-sm">
                                    <strong>Bus Name:</strong> {{ $ticket->bus->name }}<br>
                                    <strong>Category:</strong> {{ $ticket->bus->category }}<br>
                                    <strong>Contact:</strong> {{ $ticket->bus->phone }}<br>
                                    <strong>Departure:</strong> {{ $ticket->bus->time }}
                                </div>
                            @else
                                <p class="text-gray-500">No details available</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<x-footer/>
