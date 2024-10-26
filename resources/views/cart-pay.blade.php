@vite('resources/css/app.css')

<x-header/>

<div class="bg-gray-100 h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-6 flex items-center"><i class="fas fa-ticket-alt mr-3 text-black"></i>Ticket Details</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Ticket Details Section -->
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-md p-8 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold text-xl py-4">Seat Number</th>
                                <th class="text-left font-semibold text-xl py-4">Price per Seat</th>
                                <th class="text-left font-semibold text-xl py-4">Quantity</th>
                                <th class="text-left font-semibold text-xl py-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seats as $seat)
                            <tr>
                                <td class="py-6">
                                    <div class="flex items-center">
                                        <i class="fas fa-chair text-blue-500 mr-2"></i>
                                        <span class="font-semibold text-lg">Seat {{ $seat }}</span>
                                    </div>
                                </td>
                                <td class="py-6 text-lg">Rs{{ number_format($bus->price, 2) }}</td>
                                <td class="py-6 text-lg text-center">1</td>
                                <td class="py-6 text-lg">Rs{{ number_format($bus->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Summary Section -->
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-semibold mb-6"><i class="fas fa-receipt text-blue-500 mr-2"></i>Summary</h2>

                    @php
                        $taxRate = 0.10; 
                        $subtotal = $totalPrice; 
                        $taxAmount = $subtotal * $taxRate; 
                        $totalWithTax = $subtotal + $taxAmount; 
                    @endphp

                    <div class="flex justify-between mb-4 text-lg">
                        <span>Subtotal</span>
                        <span>Rs{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-4 text-lg">
                        <span>Taxes (10%)</span>
                        <span>Rs{{ number_format($taxAmount, 2) }}</span>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between text-xl font-semibold">
                        <span>Total</span>
                        <span>Rs{{ number_format($totalWithTax, 2) }}</span>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded-lg mt-6 w-full text-lg flex items-center justify-center" id="checkout-btn">
                        <i class="fas fa-shopping-cart mr-2"></i> Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="confirmation-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-10 rounded-lg shadow-lg w-1/3">
        <h2 class="text-2xl font-semibold mb-6"><i class="fas fa-question-circle text-yellow-500 mr-2"></i>Confirm Purchase</h2>
        <p class="mb-6 text-lg">Please choose your payment method:</p>

        <div class="mb-6">
            <label class="block mb-3 font-semibold text-lg">Payment Method</label>
            <div class="flex items-center mb-3">
                <input type="radio" id="cod" name="payment-method" value="cod" checked disabled>
                <label for="cod" class="ml-3 text-lg">Cash on Delivery (COD)</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="online" name="payment-method" value="online" disabled>
                <label for="online" class="ml-3 text-lg">Online Payment (Disabled)</label>
            </div>
        </div>

        <div class="flex justify-end">
            <button id="cancel-button" class="bg-gray-600 text-white py-3 px-6 rounded-md mr-3 text-lg">Cancel</button>
            <button id="confirm-button" class="bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-md text-lg flex items-center">
                <i class="fas fa-check-circle mr-2"></i> Confirm
            </button>
        </div>
    </div>
</div>

<x-footer/>

<script>
    document.getElementById('checkout-btn').addEventListener('click', function() {
        document.getElementById('confirmation-modal').classList.remove('hidden');
    });
    
    document.getElementById('cancel-button').addEventListener('click', function() {
        document.getElementById('confirmation-modal').classList.add('hidden');
    });
    
    document.getElementById('confirm-button').addEventListener('click', function() {
        const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;
    
        if (paymentMethod === 'cod') {
            const busId = "{{ $bus->bus_id }}";
            const seats = @json($seats);
            const bookingDate = "{{ $bookingDate }}";
            const totalWithTax = "{{ $totalWithTax }}";
    
            const seatsParam = encodeURIComponent(JSON.stringify(seats));
            const dateParam = encodeURIComponent(bookingDate);
            const busIdParam = encodeURIComponent(busId);
            const totalPriceParam = encodeURIComponent(totalWithTax);
    
            window.location.href = `/confirm-tickets?busId=${busIdParam}&seats=${seatsParam}&date=${dateParam}&price=${totalPriceParam}`;
        }
    });
</script>
