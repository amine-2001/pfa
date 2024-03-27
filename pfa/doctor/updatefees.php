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
$fees = $_POST['fees'];

$userId = $_POST['userId'];


// Mettez à jour les frais dans la base de données pour l'utilisateur spécifié
$sql = "UPDATE doctors d 
        JOIN doctors u ON d.professionalID = u.id 
        SET d.fees = '$fees' 
        WHERE u.id = $userId+1"; // Utilisez l'ID de l'utilisateur récupéré de la session

if ($conn->query($sql) === TRUE) {
    // Redirection vers une autre page ou affichage d'un message de succès
    header("Location: profil.html");
} else {
    echo "Erreur lors de la mise à jour des frais : " . $conn->error;
}

// Fermez la connexion à la base de données
$conn->close();
?>
