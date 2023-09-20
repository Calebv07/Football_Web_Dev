## PHP
PHP can serve items to the client, but mainly it excutes php code on the server
* Connect to a database
* Post to that database
* Using some form of sql language
When following tutorials, use ones with mysqli for the most up to date version

Operations for SQL
* Create
* Read
* Update
* Delete

## PHP
PHP can serve items to the client, but mainly it excutes php code on the server
* Connect to a database
* Post to that database
* Using some form of sql language
When following tutorials, use ones with mysqli for the most up to date version

## The HTML Form
Two things are done when forms are submitted
* Data is bundled into a POST-ARRAY
* Client is directed with the "action" attribute

To access the POST-ARRAY with the input name "firstName"
```PHP
$_POST['firstNAME']
```

## 9-18-2023 Notes
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

## PHP Review
Reviewing PHP
### Opening Tag
All PHP files start with this opening tag.
```php
<?php
```
### Connection Variables
DO NOT USE IN PRODUCTION ENVIRONMENT.

These are used for creating a connection object. Essentially the connection variables for connecting to the database.
```php
$servername = 'localhost';
$username = 'username';
$password = 'password';
$dbname = 'myDatabase';
```

### Create the Connection
This connection object holds
* Server Address - The address of the Server
* Authorization - Username/Password
* Database Name - The name of the database
```php
$conn = mysqli_connet($servername, $username, $password, $dbname);
```
### Testing the connection
You are going to check the connection in a production environment.
* DO NOT echo the error in production environment
```php
if(!$conn) {
    die ("Connection Failed: " . mysqli_connect_error());
    // DO NOT ECHO IN PRODUCTION ENVIRONMENT
}
```

### SQL Updating
Use the update to update values in the table.

Keywords:
* UPDATE - Changes a value in the table
* SET - Assign a field the value
* WHERE - Set to ONLY a specific set of data

**Using an "update" WITHOUT "WHERE" clause will affect ALL data in the table to the "SET" variable**
```php
$sql = "UPDATE myTableName SET lastName='Hill' WHERE firstName = 'Liz'";
```

### Deleting Data (Crude Operations)
Use the DELETE to delete values in the table

Keywords:
* DELETE - Delete a value in the table
* FROM - Select from a table
* WHERE - Set to ONLY a specific set of data
```php
$sql = "DELETE FROM myTableName WHERE id=17";
```

### Submit the query request
If the mysqli query fails, this if statement will be able to catch the error so the program doesn't crash.
* IF query works: Echo "Record Updated"
* ELSE: Echo "Error: " and the error

DO NOT echo the error in production environment.
```php
if (mysqli_query($conn, $sql)) {
    echo "Record Updated";
} else {
    echo "Error: " . mysqli_error($conn);
}
```
