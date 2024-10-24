@vite('resources/css/app.css')

<x-header/>

<div class="bg-gray-100 h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Seat Number</th>
                                <th class="text-left font-semibold">Price per Seat</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seats as $seat)
                            <tr>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <span class="font-semibold">Seat {{ $seat }}</span>
                                    </div>
                                </td>
                                <td class="py-4">${{ number_format($bus->price, 2) }}</td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <span class="text-center w-8">1</span>
                                    </div>
                                </td>
                                <td class="py-4">${{ number_format($bus->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>

                    @php
                        $taxRate = 0.10; // Assuming a 10% tax rate
                        $subtotal = $totalPrice; // Subtotal is the total price of the seats
                        $taxAmount = $subtotal * $taxRate; // Calculate taxes
                        $totalWithTax = $subtotal + $taxAmount; // Calculate total with tax
                    @endphp

                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes (10%)</span>
                        <span>${{ number_format($taxAmount, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>$0.00</span> <!-- Assuming no shipping cost -->
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">${{ number_format($totalWithTax, 2) }}</span>
                    </div>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full" id="checkout-btn">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="confirmation-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-1/3">
        <h2 class="text-xl font-semibold mb-4">Confirm Purchase</h2>
        <p class="mb-4">Please choose your payment method:</p>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Payment Method</label>
            <div>
                <input type="radio" id="cod" name="payment-method" value="cod" checked disabled>
                <label for="cod" class="ml-2">Cash on Delivery (COD)</label>
            </div>
            <div>
                <input type="radio" id="online" name="payment-method" value="online" disabled>
                <label for="online" class="ml-2">Online Payment (Disabled)</label>
            </div>
        </div>

        <div class="flex justify-end">
            <button id="cancel-button" class="bg-gray-500 text-white py-2 px-4 rounded-md mr-2">Cancel</button>
            <button id="confirm-button" class="bg-green-500 text-white py-2 px-4 rounded-md">Confirm</button>
        </div>
    </div>
</div>

<x-footer/>

<script>
    document.getElementById('checkout-btn').addEventListener('click', function() {
        // Show the confirmation modal
        document.getElementById('confirmation-modal').classList.remove('hidden');
    });
    
    document.getElementById('cancel-button').addEventListener('click', function() {
        // Hide the confirmation modal
        document.getElementById('confirmation-modal').classList.add('hidden');
    });
    
    document.getElementById('confirm-button').addEventListener('click', function() {
        // Get the selected payment method (COD)
        const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;
    
        // Ensure that only COD is selected
        if (paymentMethod === 'cod') {
            // Get busId, seats, and date from the URL
            const currentUrl = window.location.href;
            const busId = "{{ $bus->bus_id }}";  // You can pass this from the server-side
            const seats = @json($seats);     // Seats passed from server-side
            const bookingDate = "{{ $bookingDate }}";  // Pass the booking date from the server-side
            const totalWithTax = "{{ $totalWithTax }}"; // Pass totalWithTax from server-side
    
            // Redirect to confirm-tickets route with busId, seats, and date as query parameters
            const seatsParam = encodeURIComponent(JSON.stringify(seats));
            const dateParam = encodeURIComponent(bookingDate);
            const busIdParam = encodeURIComponent(busId);
            const totalPriceParam = encodeURIComponent(totalWithTax);
    
            window.location.href = `/confirm-tickets?busId=${busIdParam}&seats=${seatsParam}&date=${dateParam}&price=${totalPriceParam}`;
        }
    });
    </script>
    
