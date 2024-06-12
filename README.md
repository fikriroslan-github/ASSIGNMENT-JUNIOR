# Electricity Consumption Calculator

This project is a PHP-based application that calculates electricity consumption based on user input for voltage, current, and hours of usage.

## How to Use

1. Enter the voltage in volts (V).
2. Enter the current in amperes (A).
3. Enter the number of hours the device is used.

The application will calculate:
- Power (Wh)
- Energy (kWh)
- Total cost based on the tariff rates

## Tariff Rates

- For the first 200 kWh (1 - 200 kWh) per month: 21.80 cent/kWh
- For the next 100 kWh (201 - 300 kWh) per month: 33.40 cent/kWh
- For the next 300 kWh (301 - 600 kWh) per month: 51.60 cent/kWh
- For the next 300 kWh (601 - 900 kWh) per month: 54.60 cent/kWh
- For the next kWh (901 kWh onwards) per month: 57.10 cent/kWh

The minimum monthly charge is RM3.00.

## Requirements

- PHP
- XAMPP

## Installation

1. Clone the repository to your local machine.
2. Move the project folder to the `htdocs` directory of your XAMPP installation.
3. Start the Apache server from the XAMPP Control Panel.
4. Open your browser and navigate to `http://localhost/electricity_calculator/index.php`.

