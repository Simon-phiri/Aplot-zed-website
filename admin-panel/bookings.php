<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <!-- Internal CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Booker's Name</th>
                    <th>Surname</th>
                    <th>Gender</th>
                    <th>Language Type</th>
                    <th>Class</th>
                    <th>Departure City</th>
                    <th>Arrival City</th>
                    <th>Amount</th>
                    <th>Flight Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Male</td>
                    <td>1</td>
                    <td>Economy</td>
                    <td>New York</td>
                    <td>London</td>
                    <td>$500</td>
                    <td>International</td>
                </tr>
                <tr>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>Female</td>
                    <td>2</td>
                    <td>Business</td>
                    <td>Los Angeles</td>
                    <td>Tokyo</td>
                    <td>$1200</td>
                    <td>International</td>
                </tr>
                <tr>
                    <td>Emily</td>
                    <td>Johnson</td>
                    <td>Female</td>
                    <td>3</td>
                    <td>First Class</td>
                    <td>Chicago</td>
                    <td>Paris</td>
                    <td>$2000</td>
                    <td>International</td>
                </tr>
                <tr>
                    <td>Michael</td>
                    <td>Brown</td>
                    <td>Male</td>
                    <td>1</td>
                    <td>Economy</td>
                    <td>Houston</td>
                    <td>Toronto</td>
                    <td>$400</td>
                    <td>International</td>
                </tr>
                <tr>
                    <td>Sarah</td>
                    <td>Davis</td>
                    <td>Female</td>
                    <td>2</td>
                    <td>Business</td>
                    <td>Miami</td>
                    <td>Dubai</td>
                    <td>$1500</td>
                    <td>International</td>
                </tr>
                <tr>
                    <td>David</td>
                    <td>Miller</td>
                    <td>Male</td>
                    <td>3</td>
                    <td>First Class</td>
                    <td>Seattle</td>
                    <td>Sydney</td>
                    <td>$2500</td>
                    <td>International</td>
                </tr>
                <tr>
                    <td>Amanda</td>
                    <td>Wilson</td>
                    <td>Female</td>
                    <td>1</td>
                    <td>Economy</td>
                    <td>Denver</td>
                    <td>San Francisco</td>
                    <td>$300</td>
                    <td>Domestic</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
