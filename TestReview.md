# Test Review
Created by Caleb V.

This is a complete review of the **CRUD** (Create, Read, Update, Delete) operations in sql. This should cover most of the things on the test. Please contact me if you have questions or comments.
* Email at [cvang07@jeffcityschools.org](mailto:cvang07@jeffcityschools.org?subject=SQL%20Test%20Review%20Questions)

# Table of Contents
- [Test Review](#test-review)
- [Table of Contents](#table-of-contents)
  * [Connection Review](#connection-review)
    + [Important Note](#important-note)
  * [The HTML form & getting data](#the-html-form---getting-data)
  * [Inserting data into the database - Create.r.u.d.](#inserting-data-into-the-database---createrud)
    + [Important Note:](#important-note-)
  * [Reading data in the database - c.Read.u.d](#reading-data-in-the-database---creadud)
    + [Accepted boolean logics](#accepted-boolean-logics)
    + [Displaying Data](#displaying-data)
  * [Updating data in the database - c.r.Update.d.](#updating-data-in-the-database---crupdated)
  * [Deleting data in the database - c.r.u.Delete](#deleting-data-in-the-database---crudelete)
  * [Quering the request](#quering-the-request)
  * [Ending Statements](#ending-statements)
  * [Conclusion](#conclusion)

## Connection Review
For most of our PHP files, we'll start off by trying to connect to the database
* Always start the PHP file with the PHP Tag
```php
<?php
// Comments (code that is not ran) is made with two slashes
```
These are the variables that we'll use to connect to the database. Remember that these are variables, not special SQL or PHP statements.
```php
 // Address of server (localhost means on the computer)
$dbserver = "localhost";
 // Username of the user accessing the server (root is admin)
$dbuser = "root";
 // Password of the user accessing the server
$dbpass = "DynoMonitorFoodPan374$&%";
 // The database name we're accessing
$dbname = "footballApp";
```
Then create the connection object. Essentially a function that will connect to the database. Everytime this variable is called, it connects with the previous variables defined for connecting.
```php
// Create the Connection
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
```
Lastly, test the connection to the database.
* If the connection FAILS:
    * Kill the process, this means all other code further down will NOT run.
* Do NOT echo the error codes in an production environment
```php
// Check Connection, if failed:
if(!$conn) {
    // Kills the process.
    die("Connection Broken: " . mysqli_connect_error());
}
```
Remember that the periods `.` concatenate (link together) the strings and variables together.

Methods:
* **mysqli_connect()** - This is a connection object, it uses four parameters to connect to the database server. The server address, username, password, and database name. Think of this as a function that will take four variables to execute a block of code, in this case, connect to the server.
* **mysqli_connect_error()** - This function returns the error description from the last connection error, if any.

### Important Note
> Don't get confused with `$sql` and `$myVariable`. These are all variables, everything that starts with the dollar sign `$` is a variable. After the sign is the name of the variable. None of these are sql or php statements/methods. Remember that variables are just containers for holding values.

## The HTML form & getting data
Two things are done when forms are submitted
* Data is bundled into a POST-ARRAY
* Client is directed with the "action" attribute to a php file

In a production environment, we always want to use the POST method. All our input elements should have a name so we can access them later in the php file.
```html
<form action="submit.php" method="post">
    <input name="firstName" type="text">
    <input type="submit">
</form>
```
The POST-ARRAY is an associative array, meaning there is a key-value pair.
* i.e. the key would be the what the input name is and the value is the users input value.
* The `firstName` key (or name) would corrospond with the value (or users input) like `Wayne`.
* Note that this is a superglobal variable, meaning they are always accessible inside this file regardless of scope (predefined access control).

To access the POST-ARRAY within php, use the name that was set for the input.
```PHP
$_POST['firstNAME'];
```
To manipulate the data or to send it to a database, we can assign it a variable.
```php
$firstNameVar = $_POST['firstNAME'];
```
Now this can be used anywhere in our PHP file. Most of the time within our SQL statements that will be sent to the database. You'll see later on that you can input these variables in the values of SQL statements.

## Inserting data into the database - Create.r.u.d.
Now that we've confirmed that we can connect to the server, lets start manipulating the data from the data base. First we'll insert data into the database.

**Keywords**
- **INSERT** - This keyword will insert data into the table, appending to the last row in that table
- **INTO** - This informs SQL WHAT table we want to insert into
- **VALUES** - This informs SQL WHAT values we want to put into the selected fields
```php
$sql = "INSERT INTO tableName (fieldName1, fieldName2, fieldName3))
VALUES ('value', 'value', 'value')";
```
Let's break this down

We define the sql variable. Remember that this is a variable, not special SQL or PHP statements.
```php
$sql = "";
```
Then we say what table we want to INSERT INTO.
```php
$sql = "INSERT INTO ";
```
Then define the fields we want to insert into.
- Fields are the columns of the table
- Auto-incrementing fields do NOT have to be specified.
- Enter the field names that you want to change (case-sensitive)
```php
$sql = "INSERT INTO tableName (fieldName1, fieldName2, fieldName3))";
```
Then enter in the values we want to insert those values to.
- Values are the actual data that will be in the table
- Values are in the order that you define the fields
  - i.e field1, field2, field3 corresponds with value1, value2, value3 **or** (field1, field2) VALUES ('value1', 'value2')
  - **If a value is not assigned to a field, it will throw an error**
- You can set values to variables
  - Always make sure to encase all values with single qoutes ''
  - i.e '$myVariable', '123'
```php
$sql = "INSERT INTO tableName (fieldName1, fieldName2, fieldName3))
VALUES ('value', '$myVariable', 'value')";
```
### Important Note:
> Even though this is two lines of code, the semicolon dictates when the line ends. So this is technically just one line of code but separated into two lines. We do this for better code readability, so we can see WHAT we're inserting into and the VALUES we're inserting.

## Reading data in the database - c.Read.u.d
Next, we'll read existing values in the database and display it onto the webpage. To read data, we first have to select the data from the table.

**Keywords**
- **SELECT** - This keyword will select the value inside the table, depending on what is filtered with the WHERE clause.
- **FROM** - Choosing which table to delete from
- **WHERE** - The WHERE clause filters/selects the data by fields and their values. For example, filter by firstName and with values containing 'Liz'.

Selecting ALL data from "myTable" (Used without a WHERE clause)
```php
$sql = "SELECT * FROM myTable";
```
Selecting "firstName", "lastName", and "email" Fields and all their data from "myTable"
```php
$sql = "SELECT firstName, lastName, email FROM myTable";
```
Manipulating specific data by filtering with fields with the WHERE clause
```php
$sql = "WHERE condition";
```
Selects data with data "Wheeler" in field "lastName"
```php
$sql = "SELECT firstName, lastName, email
FROM myTable
WHERE lastName="Wheeler"";
```

### Accepted boolean logics 
These are used for the WHERE clause, selecting data between, greater than or less than, etc. Using this will have much more granular control over what data you want to select.
* =
* \>
* \<
* <=
* \>=
* BETWEEN
* AND | OR - Connecting two statements

Example:

Selects data with data "Wheeler" AND "Wayne" in fields "lastName" AND "firstName"
```php
$sql = "SELECT firstName, lastName, email
FROM myTable
WHERE lastName="Wheeler" AND firstName = "Wayne"";
```
So this will select a row that contains "Wayne Wheeler" in their respective fields. Email can be of any data as it is not filtered by the WHERE clause, only the firstName and lastName.

### Displaying Data
First we need to query the request before we can display it to the user.
We do this by sending a request of our sql query to the database.
```php
$result = mysqli_query($conn, $sql);
```
If there are more than 0 results from our request, do the following code. Else, kill the process.
* Echo the start of the table with table headings
* Inside the while loop
  * For each row, echo the data in each column/field into the table.
* After the while loop
  * End the table tag
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
```
Methods:
* **mysqli_num_rows()** - This returns the number of rows of our resultant query. We can use this number to see if we got any data out of our request.
* **mysqli_fetch_assoc()** - This fetches the next row of our resultant query and stores it as an associative array (An array with key and value pair). We set it as variable $row so we can access it in the loop. Using the brackets, we can select the key (which in this case means the field name) and that would associate to the value of the key (field).

Remember that the periods `.` concatenate (link together) the strings and variables together. Creating a table with table heading and data for the user to see in HTML format.

## Updating data in the database - c.r.Update.d.
Next, we'll update existing values in database.

**Keywords**
- **UPDATE** - This keyword will update the value inside the table, depending on what is filtered with the WHERE clause.
- **SET** - After selecting the table to update, we set the value we want to set to the field name. Depending on the WHERE clause, this can change multiple or one value in the field.
- **WHERE** - The WHERE clause filters/selects the data by fields and their values. For example, filter by firstName and with values containing 'Liz'.

***Using an "update" WITHOUT "WHERE" clause will affect ALL data in the table to the "SET" variable***

```php
$sql = "UPDATE myTableName SET lastName='Hill' WHERE firstName = 'Liz'";
```
Remember that variables can be used for the values here. Always encase your vlues with single qoutes: 'exampleValue'.

## Deleting data in the database - c.r.u.Delete
Lastly, we'll DELETE existing values in the database.
Keywords:
- **DELETE** - This keyword will DELETE the value inside the table, depending on what is filtered with the WHERE clause.
- **FROM** - Choosing which table to delete from
- **WHERE** - The WHERE clause filters/selects the data by fields and their values. For example, filter by firstName and with values containing 'Liz'.
```php
$sql = "DELETE FROM myTableName WHERE fieldName='value'";
```
Remember that variables can be used for the values here. Always encase your vlues with single qoutes: 'exampleValue'.

Best Practices:
- ALWAYS use WHERE clause for deleting data.

## Quering the request
Now that we've understood how to create the sql statements, we have to execute them to actually affect the data on the database.

We've done this for the Reading part of the C.R.U.D. operation but for the rest, we can use the following code to execute the sql statement.
```php
if (mysqli_query($conn, $sql)) {
    echo "Record Updated";
} else {
    echo "Error: " . mysqli_error($conn);
}
```
You can define the mysqli_query and their variables early on and execute all of them at once. This makes it a bit more neat and readable.
```php
$requestOne = mysqli_query($conn, $sql1);
$requestTwo = mysqli_query($conn, $sql2);
$requestThree = mysqli_query($conn, $sql3);

if ($requestOne && $requestTwo && $requestThree) {
    echo "Record Updated";
} else {
    echo "Error: " . mysqli_error($conn);
}
```
Methods:
* **mysqli_query()** - This queries our request to the database and returns a boolean result if the process was able to execute properly. It requires two variables (parameters), first the connection object, then the sql statement.
* **mysqli_error()** - This will output the error when using the connection object. Requires the connection object as a parameter.

## Ending Statements
ALWAYS close the mysqli connection to ensure your queries are executed properly.
```php
mysqli_close();
```
Methods:
* **mysqli_query()** - This will close the mysqli connection.

ALWAYS end the php tag.
```php
?>
```

## Conclusion
Now you should know all the basic crud operations in SQL and basic PHP syntax/operations. If you want to test your knowledge, i've created a quick 10 multiple choice review you can try here.

[Google Form Link](https://forms.google.com)

If you have any other questions or concerns, you can contact me. Otherwise, good luck!


