<?php
$servername = "db";
$username = "root";
$password = "password";
$dbname = "studenti";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    $sql = "INSERT INTO studenti (nome, cognome, eta) VALUES ('$nome', '$cognome', $eta)";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='color: green; text-align: center; margin-top: 20px;'>Nuovo record inserito con successo</div>";
    } else {
        echo "<div style='color: red; text-align: center; margin-top: 20px;'>Errore: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserimento Studente</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 400px; margin: 50px auto; }
        input[type=text], input[type=number] { width: 100%; padding: 10px; margin: 5px 0 22px 0; border: 1px solid #ddd; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; border: none; cursor: pointer; width: 100%; }
        nav { text-align: center; margin-bottom: 20px; }
        nav a { margin: 0 10px; text-decoration: none; padding: 8px 16px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Inserisci Studente</a>
        <a href="visualizza.php">Visualizza Studenti</a>
    </nav>
    <div class="container">
        <h2>Inserisci i dati dello studente</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nome: <input type="text" name="nome" required><br>
            Cognome: <input type="text" name="cognome" required><br>
            Età: <input type="number" name="eta" required><br>
            <input type="submit" value="Invia">
        </form>
    </div>
</body>
</html>