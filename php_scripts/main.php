<!DOCTYPE html>
<html>
<head>
<title>User Data Collection</title>
</head>
<body>
<?php
// MySQL database configuration
$servername = "192.168.0.153";
$username = "udc123";
$password ="Root@123";
$dbname = "udc";
// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Collect user data
$name = $_POST["name"];
$age = $_POST["age"];
$country = $_POST["country"];
// Insert data into the MySQL database
$sql = "INSERT INTO users (name, age, country) VALUES ('$name', $age, '$country')";
if ($conn->query($sql) === TRUE) {
echo "User data has been successfully stored in the database.<br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
// Handle file upload
$uploadDir = '/var/udc/uploads/';
$uploadFile = $uploadDir . basename($_FILES['userfile']['name']);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
echo "File is valid, and it has been successfully uploaded.<br>";
} else {
echo "File upload failed.<br>";
}
}
?>
<h2>Enter User Information</h2>
<form method="post" enctype="multipart/form-data">
Name: <input type="text" name="name"><br>
Age: <input type="number" name="age"><br>
Country: <input type="text" name="country"><br>
File Upload: <input type="file" name="userfile"><br>
<input type="submit" value="Submit">
</form>
<?php
// Close the database connection
$conn->close();
?>
</body>
</html>
