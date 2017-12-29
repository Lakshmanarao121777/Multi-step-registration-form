 <?php
$servername = "localhost";
$username = "root";
$password = "hubadmin@ece";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE reg_users";
    // use exec() because no results are returned
    $conn->exec($sql);

    $conn = new PDO("mysql:host=$servername;dbname=reg_users", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to create table
    $sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(30) NOT NULL,
    dob VARCHAR(30) NOT NULL,
    uname VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
    }
catch(PDOException $e)
    {
    echo  "<br>" . $e->getMessage();
    }

$conn = null;
?> 