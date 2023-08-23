<?php
session_start();

include __DIR__ . '/functions.php'; // Includi il file functions.php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['lunghezza'])) {
    $caratteri_selezionati = isset($_GET['caratteri']) ? $_GET['caratteri'] : []; // Array vuoto se nessuna selezione
    $ripetizione = isset($_GET['ripetizione']) ? true : false;

    $_SESSION['generated_password'] = generaPassword(intval($_GET['lunghezza']), $caratteri_selezionati, $ripetizione);
    header("Location: show_password.php"); // Reindirizza a show_password.php
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>PHP Strong Password Generator</title>
</head>
<body>
<div class="container">
    <h1 class="text">PHP STRONG PASSWORD GENERATOR</h1>
    <h2>Genera una password sicura</h2>

    <div class="form-container">
        <form class="text" action="index.php" method="GET">
            <div class="form-group row">
                <label for="lunghezza" class="col-sm-4 col-form-label">Lunghezza della password:</label>
                <div class="col-sm-8">
                    <input type="number" id="lunghezza" name="lunghezza" class="form-control" min="6" max="20" required>
                </div>
            </div>

            <div class="form-group">
                <p>Consenti ripetizione di uno o più caratteri:</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ripetizione" value="1" id="ripetizioneSi">
                    <label class="form-check-label" for="ripetizioneSi">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ripetizione" value="0" id="ripetizioneNo" checked>
                    <label class="form-check-label" for="ripetizioneNo">No</label>
                </div>
            </div>

            <div class="form-group">
                <p>Scegli i caratteri:</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="caratteri[]" value="numeri" id="caratteriNumeri">
                    <label class="form-check-label" for="caratteriNumeri">Numeri</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="caratteri[]" value="lettere" id="caratteriLettere">
                    <label class="form-check-label" for="caratteriLettere">Lettere</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="caratteri[]" value="simboli" id="caratteriSimboli">
                    <label class="form-check-label" for="caratteriSimboli">Simboli</label>
                </div>
            </div>

            <div class="button-section">
                <button class="btn btn-primary" type="submit">Invia</button>
                <button class="btn btn-secondary" type="button">Annulla</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
