function goLogin() {
	let signup_overlay = document.getElementById("signup-overlay");
	let login_overlay = document.getElementById("login-overlay");

	signup_overlay.style.display = "none";
	login_overlay.style.display = "flex";
}

function checkRepeatPass() {
	let box = document.getElementById("reg-cpass-input");
	let password = document.getElementById("reg-pass-input").value;
    let repeatPassword = document.getElementById("reg-cpass-input").value;

    if (password != repeatPassword) {
        box.style.backgroundColor = "rgba(255, 99, 71, 0.3)";
        return false;
    }
	else {
		box.style.border = "none";
		box.style.borderBottom = "1px solid #757575";
		box.style.backgroundColor = "rgba(255, 255, 255, 0)";
	}

    return true;
}