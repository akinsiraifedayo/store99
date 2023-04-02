<?php
// establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juniorproduct";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// receive and validate form data
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$product_type = $_POST['product_type'];
$product_attributes = '';
$value = '';

switch ($product_type) {
    case 'dvd':
        $product_attributes = 'Size (MB)';
        $value = $_POST['size_mb'];
        break;
    case 'book':
        $product_attributes = 'Weight (Kg)';
        $value = $_POST['weight'];
        break;
    case 'furniture':
        $product_attributes = 'Dimensions (cm)';
        $value =  $_POST['height'] . ' x ' . $_POST['width'] . ' x ' . $_POST['length'];
        break;
}

// insert the data into the database
$sql = "INSERT INTO products (sku, name, price, product_type, product_attributes, value) 
        VALUES ('$sku', '$name', $price, '$product_type', '$product_attributes', '$value')";

if ($conn->query($sql) === TRUE) {
    echo "Product saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


