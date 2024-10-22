{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Seat Layout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .seat {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            margin: 5px;
        }

        .occupied {
            background-color: red;
        }

        .available {
            background-color: green;
        }

        .gap {
            visibility: hidden;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-8">Bus Seat Layout</h1>

        <div class="grid grid-cols-12 gap-4 place-items-center">
            @foreach($seatLayout as $row => $seats)
                <div class="flex">
                    @foreach($seats as $seat)
                        @if($seat->is_gap == 1)
                            <!-- Invisible seat space -->
                            <div class="seat gap"></div>
                        @else
                            <!-- Visible seat with seat number and color coding -->
                            <div class="seat {{ $seat->is_occupied ? 'occupied' : 'available' }}">
                                {{ $seat->seat_number }}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</body>
</html> --}}

<div class="bus-layout">
    @foreach($seats->groupBy('row') as $row)
        <div class="seat-row">
            @foreach($row as $seat)
                <div class="seat {{ $seat->is_occupied ? 'occupied' : 'available' }}{{ $seat->seat_number == 0 && $seat->is_gap == 1 ? 'gap' : '' }}">
                     @if( $seat->seat_number == 0 && $seat->is_gap == 1 ? 'gap' : '' )
                     {{""}}
                     @else
                     {{$seat->seat_number}}
                     @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<style>


.bus-layout {
    display: flex;
    flex-direction: column;
}

.seat-row {
    display: flex;
}

.seat {
    width: 30px;
    height: 30px;
    margin: 5px;
    border: 1px solid black;
    text-align: center;
    line-height: 30px;
}

.seat.available {
    background-color: green;
}

.seat.occupied {
    background-color: red;
}

.seat.gap {
    width: 30px;          /* Same width as other seats */
    height: 30px;         /* Same height as other seats */
    margin: 5px;          /* Keep the spacing consistent */
    background-color: transparent;  /* Make it invisible */
    border: 5px solid green;         /* Remove the border */
    color: transparent;   /* Hide the seat number */
    pointer-events: none; /* Ensure it doesn't interact with clicks or hovers */
}
.seat{
    border: none;
}
</style>

