<?php 
session_start(); // Démarrer la session pour accéder aux variables de session

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

// Récupérez les données du formulaire
$patientId = $_POST['patientId'];
$professionalID = $_POST['professionalIDInput'];
$name = $_POST['name'];
$email = $_POST['emailInput'];
$pass = $_POST['passInput'];
$eegData = $_POST['eegInput'];
$ecgData = $_POST['ecgInput'];
$spo2Data = $_POST['SPO2Input'];
$medicalReport = $_POST['medicalInput'];
$paymentType = $_POST['paymentTypeInput'];
$nextConsultationDate = $_POST['nextConsultationDateInput'];

// Mettez à jour les données dans la base de données pour le patient spécifié
$sql = "UPDATE patients 
        SET professionalID = '$professionalID', 
            name = '$name', 
            email = '$email', 
            pass = '$pass', 
            eegData = '$eegData', 
            ecgData = '$ecgData', 
            spo2Data = '$spo2Data', 
            medicalReport = '$medicalReport', 
            paymentType = '$paymentType', 
            nextConsultationDate = '$nextConsultationDate' 
        WHERE id = $patientId";

if ($conn->query($sql) === TRUE) {
    // Redirection vers une autre page ou affichage d'un message de succès
    header("Location: profil.html");
    exit(); // Assurez-vous de quitter le script après la redirection
} else {
    echo "Erreur lors de la mise à jour des données du patient : " . $conn->error;
}

// Fermez la connexion à la base de données
$conn->close();
?>
