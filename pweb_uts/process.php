<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warnet Astral Registration Success</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #02e728ff; } 
        .container {
             max-width: 600px;
             margin: 20px auto; 
             background: #e1dbf0ff; 
             padding: 30px; 
             border-radius: 8px;
             border: 1px solid #007bff;
             box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
        }
        h2 {
            color: #0056b3; 
            text-align: center;
            margin-bottom: 20px; 
         }
        p {
            line-height: 1.6; 
            margin-bottom: 10px; 
        }
        strong {
            color: #333; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Thank You for Registering at Warnet Astral!</h2>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = isset($_POST['Name']) ? htmlspecialchars($_POST['Name']) : 'Not provided';
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Not provided';
            $package = isset($_POST['package']) ? htmlspecialchars($_POST['package']) : 'Not selected';


            echo "<p><strong>Username:</strong> " . $name . "</p>";
            echo "<p><strong>Email:</strong> " . $email . "</p>";

            $packageDescription = 'Not selected';
            if ($package == 'hemat') {
                $packageDescription = 'Paket Hemat (Rp 10.000 / 3 jam)';
            } elseif ($package == 'juragan') {
                $packageDescription = 'Paket Juragan (Rp 25.000 / 10 jam)';
            } elseif ($package == 'sultan') {
                $packageDescription = 'Paket Sultan (Rp 50.000 / 24 jam)';
            }
            echo "<p><strong>Selected Package:</strong> " . $packageDescription . "</p>";

            echo "<hr>";
            echo "<p><i>Please show this confirmation at the counter to activate your package.</i></p>";

        } else {
            echo "<p>No registration data received. Please submit the form first.</p>";
        }
        ?>
    </div>

</body>
</html>