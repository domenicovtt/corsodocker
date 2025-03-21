<?php
$servername = "db";
$username = "root";
$password = "password";
$dbname = "studenti";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT id, nome, cognome, eta FROM studenti";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizza Studenti</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        nav { text-align: center; margin-bottom: 20px; }
        nav a { margin: 0 10px; text-decoration: none; padding: 8px 16px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Inserisci Studente</a>
        <a href="visualizza.php">Visualizza Studenti</a>
    </nav>
    <h2>Elenco Studenti</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Età</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["cognome"]. "</td><td>" . $row["eta"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nessun studente trovato</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>