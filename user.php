<?php
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя MySQL
$password = ""; // Замените на ваш пароль MySQL
$dbname = "eventdb"; // Имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL запрос для получения всех пользователей
$sql = "SELECT id, email, name, contact, website FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        table {width: 100%; border-collapse: collapse;}
        table, th, td {border: 1px solid #ddd;}
        th, td {padding: 8px; text-align: left;}
        th {background-color: #f2f2f2;}
    </style>
</head>
<body>

<h2>Registered Users</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Website</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Вывод данных каждой строки
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["contact"]) . "</td><td>" . htmlspecialchars($row["website"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No registered users</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
