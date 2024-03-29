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

$professionalID = $_POST['professionalIDInput'];
$name = $_POST['nameInput'];
$email = $_POST['emailInput'];
$pass = $_POST['passInput'];
$eegData = $_POST['eegInput'];
$ecgData = $_POST['ecgInput'];
$spo2Data = $_POST['spo2Input'];
$medicalReport = $_POST['medicalInput'];
$paymentType = $_POST['paymentTypeInput'];
$nextConsultationDate = $_POST['nextConsultationDateInput'];

// Ajoutez les données à la base de données
$sql = "INSERT INTO patients (professionalID, name, email, pass, eegData, ecgData, spo2Data, medicalReport, paymentType, nextConsultationDate)
        VALUES ('$professionalID', '$name', '$email', '$pass', '$eegData', '$ecgData', '$spo2Data', '$medicalReport', '$paymentType', '$nextConsultationDate')";



if ($conn->query($sql) === TRUE) {
    // Redirection vers Connect.html
    header("Location: addPatient.html");
    exit();
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}
// Fermez la connexion à la base de données
$conn->close();
?>
