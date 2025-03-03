import { initializeApp } from "firebase/app";
import { getAuth, RecaptchaVerifier, signInWithPhoneNumber, GoogleAuthProvider, signInWithPopup, isSignInWithEmailLink, signInWithEmailLink } from "firebase/auth";

const firebaseConfig = {
    apiKey: "AIzaSyCYdMl2RLYeKEDJMmHMJ-opMm3qk9MSia4",
    authDomain: "sprykerauth.firebaseapp.com",
    projectId: "sprykerauth",
    storageBucket: "sprykerauth.firebasestorage.app",
    messagingSenderId: "1077909412616",
    appId: "1:1077909412616:web:4c74e3a1fe8748efe72abd",
    measurementId: "G-5QNEYJEEC3"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const provider = new GoogleAuthProvider();
let confirmationResult;
let recaptchaVerifier = null;

function setupRecaptcha() {
    if (!recaptchaVerifier) {
        recaptchaVerifier = new RecaptchaVerifier(auth, 'recaptcha-container', {
            size: 'invisible',
            callback: () => console.log('reCAPTCHA verified')
        });
        recaptchaVerifier.render();
    }
}

async function sendOTP() {
    const phoneNumber = document.getElementById("phone-number").value.trim();
    if (!phoneNumber) {
        alert("Please enter a valid phone number.");
        return;
    }

    setupRecaptcha();
    try {
        confirmationResult = await signInWithPhoneNumber(auth, phoneNumber, recaptchaVerifier);
        alert("OTP sent successfully!");
        document.getElementById("otp-container").style.display = "block";
        document.getElementById("send-otp").style.display = "none";
    } catch (error) {
        console.error("Error sending OTP:", error);
        alert("Failed to send OTP. Please try again.");
    }
}

function verifyOTP() {
    const otpCode = document.getElementById("otp-code").value.trim();
    if (!otpCode) {
        alert("Please enter the OTP code.");
        return;
    }

    confirmationResult.confirm(otpCode)
        .then((result) => {
            console.log("User authenticated:", result.user);
            alert("Login successful!");
            document.getElementById("customAuthForm_mobile_number").value = document.getElementById("phone-number").value.trim();
            document.forms["customAuthForm"].submit();
        })
        .catch((error) => {
            console.error("Error verifying OTP:", error);
            alert("Invalid OTP. Please try again.");
        });
}

document.getElementById('gmail-signin')?.addEventListener('click', async function() {
    try {
        const result = await signInWithPopup(auth, provider);
        console.log('Gmail login successful:', result.user);
        document.getElementById("customAuthFormSocial_email_id").value = result.user.email;
        console.log(document.getElementById("customAuthFormSocial_email_id").value);
        document.forms["customAuthFormSocial"].submit();
    } catch (error) {
        console.error('Gmail login error:', error);
        alert('Gmail login failed. Please try again.');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.login-tabs__nav-item').forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.login-tabs__nav-item, .login-tabs__panel').forEach(el => el.classList.remove('is-active'));
            this.classList.add('is-active');
            const target = document.querySelector(this.dataset.target);
            if (target) target.classList.add('is-active');
        });
    });
});

if (isSignInWithEmailLink(auth, window.location.href)) {
    let email = window.localStorage.getItem('emailForSignIn') || prompt('Please provide your email for confirmation');
    if (email) {
        signInWithEmailLink(auth, email, window.location.href)
            .then(() => window.localStorage.removeItem('emailForSignIn'))
            .catch((error) => console.error('Error completing sign-in:', error));
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("send-otp")?.addEventListener("click", sendOTP);
    document.getElementById("verify-otp")?.addEventListener("click", verifyOTP);
});
