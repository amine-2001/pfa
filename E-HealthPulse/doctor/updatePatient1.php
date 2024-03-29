<?php
session_start(); // Démarrer la session pour accéder aux variables de session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfa";

// Créez une connexion PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration de PDO pour générer des exceptions en cas d'erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les données du formulaire
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

// Préparer la requête SQL
$sql = "UPDATE patients 
        SET professionalID = :professionalID, 
            name = :name, 
            email = :email, 
            pass = :pass, 
            eegData = :eegData, 
            ecgData = :ecgData, 
            spo2Data = :spo2Data, 
            medicalReport = :medicalReport, 
            paymentType = :paymentType, 
            nextConsultationDate = :nextConsultationDate 
        WHERE id = :patientId+1";

try {
    // Préparation de la requête
    $stmt = $conn->prepare($sql);

    // Liaison des valeurs
    $stmt->bindParam(':professionalID', $professionalID);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':eegData', $eegData);
    $stmt->bindParam(':ecgData', $ecgData);
    $stmt->bindParam(':spo2Data', $spo2Data);
    $stmt->bindParam(':medicalReport', $medicalReport);
    $stmt->bindParam(':paymentType', $paymentType);
    $stmt->bindParam(':nextConsultationDate', $nextConsultationDate);
    $stmt->bindParam(':patientId', $patientId);

    // Exécution de la requête
    $stmt->execute();

    // Redirection vers une autre page ou affichage d'un message de succès
    header("Location: Patients.html");
    exit(); // Assurez-vous de quitter le script après la redirection
} catch(PDOException $e) {
    echo "Erreur lors de la mise à jour des données du patient : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;
?>
