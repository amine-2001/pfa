// SPDX-License-Identifier: MIT
pragma solidity ^0.8.7;

contract Test9 {
    struct User {
        string name;
        string email;
        string pass;
        string specialty;
        string phoneNumber;
        string professionalAddress;
        string countryRegion;
        string professionalID;
        string photo;
        string consultationHours;
        string fees;
    }
 struct Patient {
        string professionalID; // Champ pour référencer l'identifiant professionnel du médecin
        string name;
        string email;
        string pass;
        string eegData ;
        string ecgData; 
        string spo2Data; 

        string medicalHistory;
        string nextConsultationDate;
        string paymentType;
    }
    User[] public users;
    Patient[] public patients;

    function addUser(
        string memory _name, 
        string memory _email, 
        string memory _pass,
        string memory _specialty, 
        string memory _phoneNumber, 
        string memory _professionalAddres,
        string memory _countryRegion,
        string memory _professionalID,
        string memory _photo,
        string memory _consultationHours, 
        string memory _fees
    ) external {
        User memory newUser = User(
            _name,
            _email,
            _pass,
            _specialty,
            _phoneNumber,
            _professionalAddres,
            _countryRegion,
            _professionalID,
            _photo,
            _consultationHours,
            _fees
        );
        users.push(newUser);
    }

    function addPatient(
        string memory _professionalID, 
        string memory _name,
        string memory _email,
        string memory _pass,
        string memory _eegData,
       string memory _ecgData, 
       string memory _spo2Data, 
        string memory _medicalHistory,
        string memory _nextConsultationDate, 
        string memory _paymentType
    ) external {
        Patient memory newPatient = Patient(
            _professionalID, // Attribution de l'identifiant professionnel du médecin            
            _name,
            _email,
            _pass,
            _eegData,
            _ecgData,
            _spo2Data,
            _medicalHistory,

            _nextConsultationDate, // Date de la prochaine consultation
            _paymentType // Type de paiement
        );
        patients.push(newPatient);
    }

    function updateUserFees(uint256 index, string memory newFees) external {
        require(index < users.length, "Index out of bounds");
        users[index].fees = newFees;
    }
    
  
    function updatePatient(
        uint256 index,
        string memory _professionalID,
        string memory _name,
        string memory _email,
        string memory _pass,
        string memory _eegData,
       string memory _ecgData,
       string memory _spo2Data,       
        string memory _medicalHistory,
        string memory _nextConsultationDate,
        string memory _paymentType
    ) external {
        require(index < patients.length, "Index out of bounds");
        patients[index] = Patient(
            _professionalID,
            _name,
            _email,
            _pass,
            _eegData,
           _ecgData,
           _spo2Data,
            _medicalHistory,
            _nextConsultationDate,
            _paymentType
        );
    }




    function getUserBasicInfo(uint256 index) external view returns (string memory, string memory, string memory) {
        require(index < users.length, "Index out of bounds");
        return (users[index].name, users[index].email, users[index].pass);
    }

    function getUserProfile(uint256 index) external view returns (string memory, string memory, string memory, string memory, string memory, string memory) {
        require(index < users.length, "Index out of bounds");
        return (users[index].specialty, users[index].phoneNumber, users[index].professionalAddress, users[index].countryRegion, users[index].professionalID, users[index].photo);
    }

    function getUserSchedule(uint256 index) external view returns (string memory, string memory) {
        require(index < users.length, "Index out of bounds");
        return (users[index].consultationHours, users[index].fees);
    }
    
   
    function getPatientBasicInfo(uint256 index) external view returns ( string memory, string memory,string memory) {
        require(index < patients.length, "Index out of bounds");
        return (patients[index].name, patients[index].email,patients[index].pass);
    }

    function getPatientProfile(uint256 index) external view returns (string memory, string memory,string memory, string memory, string memory, string memory,string memory) {
        require(index < patients.length, "Index out of bounds");
        return ( patients[index].professionalID,patients[index].eegData,patients[index].ecgData,patients[index].spo2Data, patients[index].medicalHistory,  patients[index].nextConsultationDate, patients[index].paymentType);
    }

    function patientsLength() external view returns (uint256) {
        return patients.length;
    }
    
  


    function usersLength() external view returns (uint256) {
        return users.length;
    }
}
