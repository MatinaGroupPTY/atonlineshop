<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
</head>
<body>
    <h1>Customer Information</h1>

    <?php
    $serverName = "matinagroup.database.windows.net";
    $connectionOptions = array(
        "Database" => "eCommerce",
        "Uid" => "matinagroupAdmin",
        "PWD" => "#@ayibongweDJ1"
    );

    // Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $sql = "SELECT Name, Email, Password FROM Customers";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Password</th></tr>";

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Email']."</td>";
        echo "<td>".$row['Password']."</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Close the connection
    sqlsrv_close($conn);
    ?>

</body>
</html>
