<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "PASSWORD";
$dbname = "practiceForm";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if($conn) {
    echo "Connection Success!";
} elseif (!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}

$sql = "SELECT * FROM identity";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0) {
    echo "<table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            <tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['firstName'] . "</td>
                <td>" . $row['lastName'] . "</td>
                <td>" . $row['email'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    die;
}
mysqli_close();

?>