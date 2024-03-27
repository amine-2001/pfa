<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfa";

// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$name = $_POST['nameInput'];
$email = $_POST['emailInput'];
$pass = $_POST['passInput'];
$specialty = $_POST['specialtyInput'];
$phoneNumber = $_POST['phoneInput'];
$address = $_POST['addressInput'];
$region = $_POST['regionInput'];
$id = $_POST['idInput'];
$photo = $_POST['photoInput'];
$startHour = $_POST['starthoursInput'];
$endHour = $_POST['endhoursInput'];
$fees = $_POST['feesInput'];

// Ajoutez les données à la base de données
$sql = "INSERT INTO doctors (name, email, pass, specialty, phoneNumber, professionalAddress, countryRegion, professionalID, photo, consultationStartHours, consultationEndHours, fees)
        VALUES ('$name', '$email', '$pass', '$specialty', '$phoneNumber', '$address', '$region', '$id', '$photo', '$startHour', '$endHour', '$fees')";


if ($conn->query($sql) === TRUE) {
    // Redirection vers Connect.html
    header("Location: Connecte.html");
    exit();
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}

// Fermez la connexion à la base de données
$conn->close();
?>
