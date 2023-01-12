function goLogin() {
	let signup_overlay = document.getElementById("signup-overlay");
	let login_overlay = document.getElementById("login-overlay");

	signup_overlay.style.display = "none";
	login_overlay.style.display = "flex";
}

function editOverlay(overlayId) {
	let update_overlay = document.getElementById(overlayId);
	let overlays = document.getElementsByName("update-overlay");
	overlays.forEach(overlay =>
		overlay.style.display = "none"
	);

	update_overlay.style.display = "flex";
}

function checkRepeatPass() {
	let box = document.getElementById("cpass-input");
	let password = document.getElementById("pass-input").value;
    let repeatPassword = document.getElementById("cpass-input").value;

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
