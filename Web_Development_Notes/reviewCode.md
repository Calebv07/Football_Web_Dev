```php

$sqlStateOne = "INSERT INTO employeeName (firstName, lastName)
VALUES ('Alice', 'Sequoia')";
$sqlStateTwo = "UPDATE employeeInfo SET employeeID = 2
WHERE firstName = 'Alice'";

$requestOne = mysqli_query($conn, $sqlStateOne);
$requestTwo = mysqli_query($conn, $sqlStateTwo);

if ($requestOne && $requestTwo) {
    echo "Record Updated";
} else {
    echo "Error: " . mysqli_error($conn);
}

```
```php

$sql = "SELECT firstName, lastName, email, age
FROM profileInfo
WHERE age BETWEEN 18 AND 25";

```
```php

$firstNameVar = $_POST['firstNAME'];

$sql = "INSERT INTO employeeName (firstName)
VALUES ('$firstNameVar')";

if (mysqli_query($conn, $sql)) {
    echo "Record Updated";
} else {
    echo "Error: " . mysqli_error($conn);
}

```

```php

$query = "SELECT productName FROM products WHERE productID = 123";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $productName = $row['productName'];
    echo "The product name is: " . $productName;
}

```

```php

$employeeName = "John Doe";
$employeeID = 123;
$insert_query = "INSERT INTO employees (name, id)
VALUES ('$employeeName', $employeeID)";
mysqli_query($conn, $insert_query);


```