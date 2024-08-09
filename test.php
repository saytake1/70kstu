<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventdb";

// Создать соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверить соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получить данные из формы
$email = $_POST['email'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$website = $_POST['website'];

// Подготовить и выполнить SQL запрос
$sql = "INSERT INTO users (email, name, contact, website) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $email, $name, $contact, $website);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
