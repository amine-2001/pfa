<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="../js/contract.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.5.2/web3.min.js"></script>
    <link href='https://www.unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <title>Update Patient</title>
    <link rel="icon" type="image/x-icon" href="../images/Doctor.png">
</head>
<body>
    <div id="headerContainer"></div>
    <div class="main">
        <div class="banner">
            <h1>Update Patient</h1>
        </div>
        <div class="title2">
            <a href="home.html">Home</a><span>/ Update Patient</span>
        </div>
        <section class="form-container">
            <h1 class="heading">Update Patient</h1>
            <form id="updatePatientForm" method="post" action="updatePatient1.php?id=<?php echo $_GET['id']; ?>" onsubmit="updatePatient()">



                <input type="hidden" name="patientId" value="<?php echo $_GET['id']; ?>">



                <div class="input-field">
                    <img src="../images/IdIcone.png" alt="User Icon"  class="img"> 
                    <label for="professionalIDInput">Professional ID:</label>
                    <input type="text" id="professionalIDInput" name="professionalIDInput"><br><br>
                </div>
                <div class="input-field">
                    <img src="../images/NameIcone.png" alt="User Icon"  class="img"> 
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-field">
                    <img src="../images/EmailIcone.png" alt="Email Icon" class="img"> 
                    <label for="emailInput">Email:</label>
                    <input type="text" id="emailInput" name="emailInput" placeholder="write Patient Email"><br><br>
                </div>
                <div class="input-field">
                    <img src="../images/PasswordIcone.png" alt="Password Icone"  class="img"> 
                    <label for="passInput">Password:</label>
                    <input type="text" id="passInput" name="passInput" placeholder="write Patient Password"><br><br>
                </div>
                <div class="input-field">
                    <img src="../images/EegIcone.png" alt="EEG Icon"  class="img"> 
                    <label for="eegInput">EEG Data:</label>
                    <input type="text" id="eegInput" name="eegInput" placeholder="write Patient EEG" ><br><br>
                </div>
                <div class="input-field">
                    <img src="../images/EsgIcone.png" alt="ECG Icon"  class="img"> 
                    <label for="ecgInput">ECG Data:</label>
                    <input type="text" id="ecgInput" name="ecgInput" placeholder="write Patient ECG "><br><br>
                </div>
                <div class="input-field">
                    <img src="../images/Spo2Icone.png" alt="SPO2 Icon"  class="img"> 
                    <label for="SPO2Input">SPO2 Data:</label>
                    <input type="text" id="SPO2Input" name="SPO2Input" value="2024-02-17T00:00" required><br><br>
                </div>
                <div class="input-field">
                    <img src="../images/RapportIcone.png" alt="Report Icon"  class="img"> 
                    <label for="medicalInput">Clinical Report:</label>
                    <textarea id="medicalInput" name="medicalInput" required maxlength="10000" placeholder="write medical assessment"></textarea>
                </div>
                <div class="input-field">
                    <img src="../images/PayementIcone.png" alt="Payment Icon"  class="img"> 
                    <label for="paymentTypeInput">Payment Type:</label><br>
                    <select id="paymentTypeInput" name="paymentTypeInput">
                        <option value="Cash" selected>Cash</option>
                        <option value="Card">Card</option>
                        <option value="Insurance">Insurance</option>
                    </select>
                </div>
                <div class="input-field">
                    <img src="../images/Date.png" alt="Date Icon"  class="img"> 
                    <label for="nextConsultationDateInput">Next Consultation Date:</label>
                    <input type="datetime-local" id="nextConsultationDateInput" name="nextConsultationDateInput" value="2024-02-17T00:00" required><br><br>
                </div>
                <button type="submit" class="btn">Update Patient</button>

            </form>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", async function() {
            const urlParams = new URLSearchParams(window.location.search);
            const patientId = urlParams.get('id');
            if (typeof window.ethereum !== "undefined") {
                window.web3 = new Web3(window.ethereum);
                try {
                    await window.ethereum.request({ method: "eth_requestAccounts" });
                    await connectContract();
                    const userId = sessionStorage.getItem("userId"); // Récupération de l'ID de l'utilisateur en session
                    const userProfile = await contract.methods.getUserProfile(userId).call();
                    const UserBasicInfo = await contract.methods.getUserBasicInfo(userId).call();

                    const patientProfile = await contract.methods.getPatientProfile(patientId).call();
                    const patientBasicProfile = await contract.methods.getPatientBasicInfo(patientId).call();
                    document.getElementById("profileName").innerText =  UserBasicInfo[0]  ;
                    document.getElementById("profileImg").src ="../images/"+ extractFilenameFromPath(userProfile[5]);

                    // Remplir les champs du formulaire avec les données du patient
                    document.getElementById('professionalIDInput').value = patientProfile[0];
                    document.getElementById('name').value = patientBasicProfile[0];
                    document.getElementById('emailInput').value = patientBasicProfile[1];
                    document.getElementById('passInput').value = patientBasicProfile[2];
                    document.getElementById('eegInput').value = patientProfile[1];
                    document.getElementById('ecgInput').value = patientProfile[2];
                    document.getElementById('SPO2Input').value = patientProfile[3];
                    document.getElementById('medicalInput').value =                    patientProfile[4];
                    document.getElementById('nextConsultationDateInput').value = patientProfile[5];

                    document.getElementById('paymentTypeInput').value = patientProfile[6]; // Remplir le champ du type de paiement
                } catch (error) {
                    console.error(error);
                }
            } else {
                console.error("Web3 not found. Please install MetaMask.");
            }
        });

        async function updatePatient() {

            try {
                const patientId = new URLSearchParams(window.location.search).get('id'); // Récupérer l'identifiant du patient depuis l'URL
                const updatedNameElement = document.getElementById('name');
                const updatedEmailElement = document.getElementById('emailInput');
                const updatedPassElement = document.getElementById('passInput');
                const updatedEegElement = document.getElementById('eegInput');
                const updatedecgElement = document.getElementById('ecgInput');
                const updatedMedicalElement = document.getElementById('medicalInput');
                const updatedIDElement = document.getElementById('professionalIDInput');
                const paymentTypeInputElement = document.getElementById('paymentTypeInput');
                const updatedSPO2Element = document.getElementById('SPO2Input');
                const updatedNextConsultationDateElement = document.getElementById('nextConsultationDateInput');

                // Vérifier si les éléments existent avant de récupérer les valeurs
                if (
                    updatedNameElement &&
                    updatedEmailElement &&
                    updatedPassElement &&
                    updatedEegElement &&
                    updatedecgElement &&
                    updatedMedicalElement &&
                    updatedIDElement &&
                    paymentTypeInputElement &&
                    updatedSPO2Element &&
                    updatedNextConsultationDateElement
                ) {
                    const updatedID = updatedIDElement.value;
                    const updatedName = updatedNameElement.value;
                    const updatedEmail = updatedEmailElement.value;
                    const updatedPass = updatedPassElement.value;
                    const updatedEeg = updatedEegElement.value;
                    const updatedEcg = updatedecgElement.value;
                    const updatedSPO2 = updatedSPO2Element.value;
                    const updatedMedical = updatedMedicalElement.value;
                    const paymentTypeInput = paymentTypeInputElement.value; // Récupérer la valeur du champ du type de paiement
                    const updatedNextConsultationDate = updatedNextConsultationDateElement.value;

                    // Appeler la fonction du contrat pour mettre à jour le patient
                    await contract.methods.updatePatient(
                        patientId,
                        updatedID,
                        updatedName,
                        updatedEmail,
                        updatedPass,
                        updatedEeg,
                        updatedEcg,
                        updatedSPO2,
                        updatedMedical,
                        updatedNextConsultationDate,
                        paymentTypeInput
                    ).send({ from: ethereum.selectedAddress });

                    // Fournir un retour à l'utilisateur (par exemple, afficher un message de réussite)
                    swal("Patient updated successfully!", "", "success");
                } else {
                    throw new Error("One or more form elements not found.");
                }
            } catch (error) {
                console.error(error);
                // Gérer les erreurs et fournir un feedback approprié (par exemple, afficher un message d'erreur)
                swal("Error updating patient!", error.message, "error");
            }
        }

        function extractFilenameFromPath(fullPath) {
            var parts = fullPath.split(/[\\\/]/);
            return parts[parts.length - 1];
        }

        // Charger le contenu de l'en-tête depuis le fichier header.html
        window.onload = function() {
            const headerContainer = document.getElementById("headerContainer");
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "header.html", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    headerContainer.innerHTML = xhr.responseText;

                    const header = document.querySelector('header');

                    function fixedNavbar() {
                        header.classList.toggle('scrolled', window.pageYOffset > 0)
                    }

                    fixedNavbar();
                    window.addEventListener('scroll', fixedNavbar);
                    let menu = document.querySelector('#menu-btn');

                    menu.addEventListener('click', function () {
                        let nav = document.querySelector(".navbar");
                        nav.classList.toggle('active');
                    });

                    let userBtn = document.querySelector('#user-btn');
                    userBtn.addEventListener('click', function () {
                        let userBox = document.querySelector('.profile-detail');
                        userBox.classList.toggle('active');
                    });
                }
            };
            xhr.send();
        };
    </script>
    
</body>
</html>

