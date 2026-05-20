<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'book_omotara_db';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // Check for connection errors
}

$sql = "SELECT book_name, no_of_pages, illustration, author, publisher, summary, genre FROM books";
$result = $conn->query($sql);

// Debugging: Check if the query was successful
if ($result === false) {
    echo "Error executing query: " . $conn->error;  // Show any query errors
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book View Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th {
            background-color: #16a8d9;
            color: white;
            padding: 12px;
            text-transform: capitalize;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6f2ff;
        }
    </style>
</head>
<body>
    <h1>Book View Details</h1>

    <table>
        <tr>
            <th>book_name</th>
            <th>no_of_pages</th>
            <th>illustration</th>
            <th>author</th>
            <th>publisher</th>
            <th>summary</th>
            <th>genre</th>
        </tr>

        <?php 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["book_name"] . "</td>";
                echo "<td>" . $row["no_of_pages"] . "</td>";
                echo "<td>" . $row["illustration"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["publisher"] . "</td>";
                echo "<td>" . $row["summary"] . "</td>";
                echo "<td>" . $row["genre"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No books found.</td></tr>";
        }

        $conn->close();  // Close the connection
        ?>
    </table>
</body>
</html>
