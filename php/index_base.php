<?php
$servername = "db"; // Nome del servizio MySQL in docker-compose.yml
$username = "root";
$password = "password";
$dbname = "studenti";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    $sql = "INSERT INTO studenti (nome, cognome, eta) VALUES ('$nome', '$cognome', $eta)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuovo record inserito con successo";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserimento Studente</title>
</head>
<body>
    <h2>Inserisci i dati dello studente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nome: <input type="text" name="nome"><br><br>
        Cognome: <input type="text" name="cognome"><br><br>
        Età: <input type="number" name="eta"><br><br>
        <input type="submit" value="Invia">
    </form>
</body>
</html>