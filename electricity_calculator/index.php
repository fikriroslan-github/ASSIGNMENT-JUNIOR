<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Consumption Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Electricity Consumption Calculator</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="voltage">Voltage (V):</label>
            <input type="number" class="form-control" id="voltage" name="voltage" required>
        </div>
        <div class="form-group">
            <label for="current">Current (A):</label>
            <input type="number" class="form-control" id="current" name="current" required>
        </div>
        <div class="form-group">
            <label for="hours">Hours:</label>
            <input type="number" class="form-control" id="hours" name="hours" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $voltage = $_POST['voltage'];
        $current = $_POST['current'];
        $hours = $_POST['hours'];

        // Calculate Power in Wh
        $power = $voltage * $current;

        // Calculate Energy in kWh
        $energy = ($power * $hours) / 1000;

        // Calculate Total Cost based on tiered rates
        $total = 0;
        if ($energy <= 200) {
            $total = $energy * 21.80;
        } elseif ($energy <= 300) {
            $total = (200 * 21.80) + (($energy - 200) * 33.40);
        } elseif ($energy <= 600) {
            $total = (200 * 21.80) + (100 * 33.40) + (($energy - 300) * 51.60);
        } elseif ($energy <= 900) {
            $total = (200 * 21.80) + (100 * 33.40) + (300 * 51.60) + (($energy - 600) * 54.60);
        } else {
            $total = (200 * 21.80) + (100 * 33.40) + (300 * 51.60) + (300 * 54.60) + (($energy - 900) * 57.10);
        }

        // Convert total cost from cents to RM
        $total_rm = $total / 100;

        // Ensure the minimum monthly charge is applied
        if ($total_rm < 3.00) {
            $total_rm = 3.00;
        }

        echo "<div class='mt-5'>";
        echo "<h2>Results:</h2>";
        echo "<p>Power (Wh): " . number_format($power, 2) . "</p>";
        echo "<p>Energy (kWh): " . number_format($energy, 2) . "</p>";
        echo "<p>Total Cost: RM " . number_format($total_rm, 2) . "</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
