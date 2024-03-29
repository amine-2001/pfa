const express = require("express");
const path = require("path");

const app = express();
const PORT = 8088; // Changer le port si nécessaire

// Servir les fichiers statiques depuis le répertoire public
app.use(express.static(path.join(__dirname)));

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "principal.html"));
});

// Nouvelle route pour servir login.html
app.get("/E-HealthPulse%20-%20Copie%20-%20Copie/doctor/Connecte.html", (req, res) => {
    res.sendFile(path.join(__dirname, "../doctor/Connecte.html"));
});

// Nouvelle route pour servir dashboard.html
app.get("/dashboard", (req, res) => {
    res.sendFile(path.join(__dirname, "../doctor/dashboard.html"));
});

const server = app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
