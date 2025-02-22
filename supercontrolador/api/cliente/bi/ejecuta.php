<?php
// Database connection details
$host = "localhost";
$username = "hola";
$password = "hola";
$database = "crimson";

// Create connection
$mysqli = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$mysqli) {  // Verificar si la conexión falló
    die("Connection failed: " . mysqli_connect_error());
}

// Define the SQL query
$sql = $_GET['sql'];  // ⚠️ OJO: esto es un riesgo de SQL Injection, usa prepared statements

// Execute the query
$result = $mysqli->query($sql);

// Function to generate table HTML
function generateTableHTML($result) {
    if ($result && $result->num_rows > 0) {
        $html = "<table border='1'>";
        
        // Fetch and display column headers dynamically
        $html .= "<tr><th>#</th>";
        $columns = $result->fetch_fields();
        foreach ($columns as $column) {
            $html .= "<th>" . htmlspecialchars($column->name) . "</th>";
        }
        $html .= "</tr>";
        
        // Display rows dynamically
        $rowNumber = 1;
        while ($row = $result->fetch_assoc()) {
            $html .= "<tr>";
            $html .= "<td>" . $rowNumber++ . "</td>";
            foreach ($row as $value) {
                $html .= "<td>" . htmlspecialchars($value) . "</td>";
            }
            $html .= "</tr>";
        }
        
        $html .= "</table>";
        return $html;
    } else {
        return "No results found.";
    }
}

// Generate table HTML
$tableHTML = generateTableHTML($result);

// Display table
echo $tableHTML;

// Generate download link
if ($result && $result->num_rows > 0) {
    $encodedTableHTML = base64_encode($tableHTML);
    echo "<form method='post' action='download.php'>";
    echo "<input type='hidden' name='table' value='" . $encodedTableHTML . "'>";
    echo "<button type='submit'>Download as HTML</button>";
    echo "</form>";
}

// Close the connection
$mysqli->close();
?>
