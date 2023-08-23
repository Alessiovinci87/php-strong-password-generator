<?php
session_start();

if (isset($_SESSION['generated_password'])) {
    $generated_password = $_SESSION['generated_password'];
    unset($_SESSION['generated_password']); // Rimuovi la password dalla sessione
} else {
    header("Location: index.php"); // Reindirizza se la password non è disponibile
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Password Generata</title>
</head>
<body>
<div class="container">
    <h1 class="text">Password Generata</h1>
    <p class="text-pass">La tua password generata è: <?php echo $generated_password; ?></p>
</div>
</body>
</html>
