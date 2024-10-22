@vite('resources/css/app.css')
dd($seats);
 <x-header/>
 <div class="container mx-auto flex justify-center items-center min-h-screen">
    <div class="bus-layout max-w-3xl"> <!-- Adjust max-width here -->
        @foreach($seats->groupBy('row') as $row)
            <div class="seat-row flex">
                @foreach($row as $seat)
                    @if($seat->seat_number == 0 && $seat->is_gap == 1)
                        <!-- Gap between seats -->
                        <div class="seat gap w-12 h-12 mx-2"></div> <!-- Adjust size here -->
                    @else
                        <div class="seat w-12 h-12 mx-2"> <!-- Adjust size here -->
                            <input 
                                type="checkbox" 
                                id="seat-{{ $seat->seat_number }}" 
                                value="{{ $seat->seat_number }}" 
                                class="hidden seat-checkbox"
                                {{ $seat->is_occupied ? 'disabled' : '' }}
                            >


                            <label for="seat-{{ $seat->seat_number }}" class="seat-label block relative">
                                <!-- Seat SVG Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="seat-icon w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v12h14V3m-7 12v5m4-2H7"/>
                                </svg>
                            </label>


                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<x-footer/>
