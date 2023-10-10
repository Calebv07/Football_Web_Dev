# Work for September 26, 2023
TODO:
- [ ] Setup basic connection to database
- [ ] Select data for all tables
- [ ] Return all the data in a table format
- [ ] Stylize the return table (Task for Caleb)

## How to connect
Previous code to connect to database
```php
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "DynoMonitorFoodPan374$&%";
$dbname = "practiceForm";

// Create the Connection
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
// Check Connection
if(!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}
```
### Selecting Data
Selecting ALL data from "myTable"
```php
$sql = "SELECT * FROM myTable";
```
Selecting "firstName", "lastName", "email" Fields and their data from "myTable"
```php
$sql = "SELECT firstName, lastName, email FROM myTable";
```
### The WHERE clause
Manipulating specific data
```php
$sql = "WHERE condition";
```
Selects data with data "Wheeler" in field "lastName"
```php
$sql = "SELECT firstName, lastName, email
FROM myTable
WHERE lastName="Wheeler"";
```
Accepted boolean logics
* =
* \>
* \<
* <=
* \>=
* BETWEEN
* AND | OR - Connecting two statements
Selects data with data "Wheeler" AND "Wayne" in fields "lastName" AND "firstName"
```php
$sql = "SELECT firstName, lastName, email
FROM myTable
WHERE lastName="Wheeler" AND firstName = "Wayne"";
```
### Submitting query request
Send a request of our sql query to the database.
```php
$result = mysqli_query($conn, $sql);
```

### Using the data from the request
If there are more than 0 results from our request, do the following code. Else, kill the process.
* Echo the start of the table with table headings
* Inside the while loop
  * For each row, echo the data in each column/field into the table.
```php
if(mysqli_num_rows($request)>0) {
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

```