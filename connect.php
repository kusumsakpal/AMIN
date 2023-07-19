<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $msg = $_POST['msg'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'amin');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into contact (firstName, email, tel, msg) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $email, $tel, $msg);
        
        if ($stmt->execute()) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>