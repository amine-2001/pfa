// Contenu de contract.js
const connectContract = async () => {

const ABI =[
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_professionalID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_email",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pass",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_eegData",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_ecgData",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_spo2Data",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_medicalHistory",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_nextConsultationDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_paymentType",
				"type": "string"
			}
		],
		"name": "addPatient",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_email",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pass",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_specialty",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_phoneNumber",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_professionalAddres",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_countryRegion",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_professionalID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_photo",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_consultationHours",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_fees",
				"type": "string"
			}
		],
		"name": "addUser",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "_professionalID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_email",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pass",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_eegData",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_ecgData",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_spo2Data",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_medicalHistory",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_nextConsultationDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_paymentType",
				"type": "string"
			}
		],
		"name": "updatePatient",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "newFees",
				"type": "string"
			}
		],
		"name": "updateUserFees",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			}
		],
		"name": "getPatientBasicInfo",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			}
		],
		"name": "getPatientProfile",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			}
		],
		"name": "getUserBasicInfo",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			}
		],
		"name": "getUserProfile",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "index",
				"type": "uint256"
			}
		],
		"name": "getUserSchedule",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"name": "patients",
		"outputs": [
			{
				"internalType": "string",
				"name": "professionalID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "email",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pass",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "eegData",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "ecgData",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "spo2Data",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "medicalHistory",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "nextConsultationDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "paymentType",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "patientsLength",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"name": "users",
		"outputs": [
			{
				"internalType": "string",
				"name": "name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "email",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pass",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "specialty",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "phoneNumber",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "professionalAddress",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "countryRegion",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "professionalID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "photo",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "consultationHours",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "fees",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "usersLength",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
]; 
const address = "0x5C6976F971B06200C28D0357B45392860efCFfb4";
window.web3 = await new Web3(window.ethereum);
            contract = await new window.web3.eth.Contract(ABI, address);
			return contract;

        }

        