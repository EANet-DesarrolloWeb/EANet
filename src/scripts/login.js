const usuario = {
    'estudiante@universidadean.edu.co': 'ean1234'
}

const email = document.getElementById('email').value;
const contraseña = document.getElementById('contraseña').value;
    
document.getElementById('inicioSesion').addEventListener('submit', function (e) {
    e.preventDefault();

    if (usuario[email] && usuario[email] === contraseña){
        window.location.href = '../pages/dashboard.html';
    }
    else {
        alert('Email o contraseña incorrectos. Ingrese nuevamente los datos');
    }
})

document.getElementById('restablecerContraseña').addEventListener('submit', function (e) {
    e.preventDefault();

    if(usuario[email]) {
        document.getElementById('mensaje').innerText = 'Se ha enviado un enlace de restablecimiento a ' + email;
    } 
    else {
        document.getElementById('mensaje').innerText = 'El email no esta registrado.'
    }
})

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import {getAuth, sendPasswordResetEmail} from "firebase/auth"

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDuX7Fd5cl7irpYEtWgL_wCS7TArs0T-ko",
  authDomain: "eanet-ba7cb.firebaseapp.com",
  projectId: "eanet-ba7cb",
  storageBucket: "eanet-ba7cb.firebasestorage.app",
  messagingSenderId: "683086083205",
  appId: "1:683086083205:web:8d738efcb00e0ffd3c65ec",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

document.getElementById('inicioSesion').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const contraseña = document.getElementById('contraseña').value;
    
    signInWithEmailAndPassword(auth, email, contraseña)
     .then((userCredential) => {
     const user = userCredential.user;
     window.location.href = "../pages/dashboard.html";
     })
     .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;
     });
})

document.getElementById('restablecerContraseña').addEventListener('submit', function (e) {
    e.preventDefault();

    sendPasswordResetEmail(auth, email)
    .then(() => {
        document.getElementById('mensaje').innerText = 'Se ha enviado un enlacede restablecimiento a ' + email;
    })
    .catch((error) => {
        const error = error.code;
        const errorMessage = error.message;
        document.getElementById('mensaje').innerText = errorMessage;
    });
});