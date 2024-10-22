<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Seat Configuration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-8">Bus Seat Configuration</h1>

        <form action="bus.store" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <!-- Input for number of rows -->
            <div class="mb-4">
                <label for="rows" class="block text-lg font-medium text-gray-700">Number of Rows</label>
                <input type="number" name="rows" id="rows" min="1" class="mt-1 p-2 border border-gray-300 rounded w-full" placeholder="Enter number of rows" required>
            </div>

            <!-- Section to dynamically display input fields for each row's columns -->
            <div id="column-inputs" class="mb-4"></div>

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                Submit
            </button>
        </form>
    </div>

    <script>
        const rowsInput = document.getElementById('rows');
        const columnInputsContainer = document.getElementById('column-inputs');

        rowsInput.addEventListener('input', function() {
            const numberOfRows = parseInt(this.value);
            columnInputsContainer.innerHTML = '';

            if (!isNaN(numberOfRows) && numberOfRows > 0) {
                for (let i = 1; i <= numberOfRows; i++) {
                    const rowDiv = document.createElement('div');
                    rowDiv.classList.add('mb-6', 'p-4', 'border', 'rounded-lg', 'bg-gray-50');

                    const label = document.createElement('label');
                    label.classList.add('block', 'text-lg', 'font-medium', 'text-gray-700');
                    label.textContent = `Number of Columns for Row ${i}`;
                    rowDiv.appendChild(label);

                    const input = document.createElement('input');
                    input.type = 'number';
                    input.name = `columns[${i}]`;
                    input.min = '0';
                    input.classList.add('mt-1', 'p-2', 'border', 'border-gray-300', 'rounded', 'w-full');
                    input.placeholder = `Enter number of columns for row ${i}`;
                    input.required = true;
                    rowDiv.appendChild(input);

                    // When column number is entered, generate seat inputs
                    input.addEventListener('input', function() {
                        const numberOfColumns = parseInt(this.value);
                        const seatDiv = document.createElement('div');
                        seatDiv.classList.add('mt-4');

                        // Remove existing seat number inputs (if any)
                        const existingSeats = rowDiv.querySelector('.seat-inputs');
                        if (existingSeats) {
                            existingSeats.remove();
                        }

                        if (!isNaN(numberOfColumns) && numberOfColumns > 0) {
                            const seatsContainer = document.createElement('div');
                            seatsContainer.classList.add('seat-inputs');

                            for (let j = 1; j <= numberOfColumns; j++) {
                                const seatLabel = document.createElement('label');
                                seatLabel.classList.add('block', 'text-sm', 'font-medium', 'text-gray-600');
                                seatLabel.textContent = `Seat Number ${j} for Row ${i}`;
                                seatsContainer.appendChild(seatLabel);

                                const seatInput = document.createElement('input');
                                seatInput.type = 'number';
                                seatInput.name = `seats[${i}][${j}]`;
                                seatInput.min = '0';
                                seatInput.classList.add('mt-1', 'p-2', 'border', 'border-gray-300', 'rounded', 'w-full');
                                seatInput.placeholder = `Enter seat number ${j} for row ${i}`;
                                seatsContainer.appendChild(seatInput);
                            }

                            rowDiv.appendChild(seatsContainer);
                        }
                    });

                    columnInputsContainer.appendChild(rowDiv);
                }
            }
        });
    </script>
</body>
</html>
