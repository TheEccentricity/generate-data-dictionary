<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "database_name";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection error: " . $con->connect_error);
}
$tables = "SHOW TABLES FROM $dbname";
$result = $con->query($tables);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            echo "<br/>";
            echo "<div><b>" . $value . "</b></div>";
            // echo "<br/>";
            echo "<table style='border: 1px solid black; border-collapse: collapse; width: 100%'>
                
                <tr style='border: 1px solid'>
                    <td style='border: 1px solid black; padding: 8px'><b>Column Name</b></td>
                    <td style='border: 1px solid black; padding: 8px'><b>Data Type</b></td>
                    <td style='border: 1px solid black; padding: 8px'><b>Required</b></td>
                    <td style='border: 1px solid black; padding: 8px'><b>Max Length</b></td>
                    <td style='border: 1px solid black; padding: 8px'><b>Description</b></td>
                    <td style='border: 1px solid black; padding: 8px'><b>?</b></td>
                 </tr>
            ";
            $tables = "SHOW columns FROM $value";
            $table_result = $con->query($tables);
            if ($table_result->num_rows > 0) {
                while($table_row = $table_result->fetch_assoc()) {
                    echo "<tr>";
                    foreach($table_row as $table_key => $table_val) {
                        echo "<td style='border: 1px solid black; padding: 8px'>" . $table_val . "</td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
    }
}
