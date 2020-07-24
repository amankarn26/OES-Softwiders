var ref;
var refSet;

var AnalysisConfig = {
    apiKey: "AIzaSyDiP2tFI3tia3TZS2831ouWEG8ByktSLGM",
    authDomain: "oes-project-softwider.firebaseapp.com",
    databaseURL: "https://oes-project-softwider.firebaseio.com",
    projectId: "oes-project-softwider",
    storageBucket: "oes-project-softwider.appspot.com",
    messagingSenderId: "320700270001",
    appId: "1:320700270001:web:4994cd64a1113f6d4da990",
    measurementId: "G-SHT4TS9NGE"
};
// Initialize Application for Google Analytics
firebase.initializeApp(AnalysisConfig);
firebase.analytics();
ref = firebase.database().ref().child("protected");
refSet = firebase.database().ref().child("Safety");


const getAccessToken = () => {

    ref.on('value', snapshot => {
        if(snapshot.val()) {
            location.replace("assets/plugins/security/ensureSecurity.php");
        }
    })

    refSet.on('value', snapshot => {
        if(snapshot.val()) {
            location.replace("assets/plugins/security/ensureSecurity.php");
        }
    })

}

getAccessToken();