<!-- resources/views/create_bus.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Bus Details</h2>
        <form action="register-buses" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label for="bus_id">Bus ID:</label>
                <input type="text" class="form-control" id="bus_id" name="bus_id" required>
            </div> --}}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="source">Source:</label>
                <input type="text" class="form-control" id="source" name="source" required>
            </div>

            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" class="form-control" id="destination" name="destination" required>
            </div>

            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" class="form-control" id="rating" name="rating" step="0.1" min="0" max="5" required>
            </div>

            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo" required>
            </div>

            <div class="form-group">
                <label for="to_details">To Details:</label>
                <textarea class="form-control" id="to_details" name="to_details" required></textarea>
            </div>

            <div class="form-group">
                <label for="from_details">From Details:</label>
                <textarea class="form-control" id="from_details" name="from_details" required></textarea>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Bus</button>
        </form>
    </div>
</body>
</html>
