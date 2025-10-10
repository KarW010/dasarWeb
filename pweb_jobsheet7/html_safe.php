<!DOCTYPE html>
<html>
<head>
    <title>Safe HTML & Validation</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        $safe_input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        echo "<h3>Sanitized Input:</h3>" . $safe_input . "<hr>";
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<h3>Email Status:</h3>";
            echo "Email **" . htmlspecialchars($email) . "** is valid. Processing safely.";
        } else {
            echo "<h3>Email Status:</h3>";
            echo "Email **" . htmlspecialchars($email) . "** is **invalid**. Please enter a correct format.";
        }
    }
}
?>

<form method="post" action="">
    <h4>Input Sanitation Check:</h4>
    <label for="user_input">Input :</label>
    <input type="text" name="input" id="user_input" required><br><br>
    
    <h4>Email Validation Check:</h4>
    <label for="user_email">Email :</label>
    <input type="text" name="email" id="user_email" required>
    <input type="submit" value="Submit">
</form>

</body>
</html>