<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "contact_messages";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = validateEmail($_POST["email"]);
    $message = $_POST["message"];
    $date = date("Y-m-d H:i:s");

    if ($email) {
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $message, $date);

        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid email";
    }
}

$conn->close();

function validateEmail($email) {
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $email ? $email : false;
}
?>
