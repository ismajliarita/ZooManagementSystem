function goLogin() {
	let signup_overlay = document.getElementById("signup-overlay");
	let login_overlay = document.getElementById("login-overlay");

	signup_overlay.style.display = "flex";
	login_overlay.style.display = "none";
}

function editOverlay(overlayId) {
	let update_overlay = document.getElementById(overlayId);
	let overlays = document.getElementsByName("update-overlay");
	overlays.forEach(overlay =>
		overlay.style.display = "none"
	);

	update_overlay.style.display = "flex";
}

function checkRepeatPass(inputID, checkID) {
	let password = document.getElementById(inputID).value;

	let box = document.getElementById(checkID);
	let repeatPassword = document.getElementById("cpass-input").value;

	if (password != repeatPassword) {
		box.style.backgroundColor = "rgba(255, 99, 71, 0.3)";
		return false;
	}
	else {
		box.style.backgroundColor = "rgba(255, 255, 255, 0)";
	}

	return true;
}

const hamburger = document.querySelector(".hamburger");
const navItems = document.querySelector(".nav-items");

hamburger.addEventListener("click", () => {
	hamburger.classList.toggle("active");
	navItems.classList.toggle("active");
	console.log("click")
})

document.querySelectorAll(".nav-item").forEach(n => n.addEventListener("click", () => {
	hamburger.classList.remove("acitve");
	navItems.classList.remove("active")
}))

        // let animals = []
        // let resultDiv;



function animalFact() {
	let slogan = document.getElementById('sloggan');
	let input = document.getElementById('animal-name')
	let resultDiv = document.getElementById("results");

	console.log(input.value)
	fetch(`https://api.api-ninjas.com/v1/animals?name=${input.value}`, {
		method: 'GET', // or 'PUT'
		headers: {
			'X-Api-Key': 'Pur9eqmmJr015qIRkmq2sg==3E5SKV3pvhXJANTU',
		}
	})
		.then(response => response.json())
		.then(data => {
			// animals = data;
			console.log('Success:', data);
			// slogan.innerHTML = data;
			resultDiv.innerHTML = ''
			for(let i = 0; i < data.length; i++){
				createCard(data[i])
			}

			// data.map(
			//     createCard()
			// )
		})
		.catch((error) => {
			console.error('Error:', error);
		});
}

console.log("outside" + data);



function createCard(animal) {

	// Add the HTML code as a child of the result div
	let resultDiv = document.getElementById("results");

	resultDiv.innerHTML +=
		`<div class="animal" >
			<h1 class="animal-name" style="margin-top: 1rem;">${animal.name}</h1>
			<p class="animal-info">
			<p>Slogan: ${animal.characteristics.slogan}</p>
			<p>Top Speed: ${animal.characteristics.top_speed}</p>
			<p>Origin: ${animal.characteristics.origin}</p>
			<p>Name of Young: ${animal.characteristics.name_of_young}</p>
			<p>Habitat: ${animal.characteristics.habitat}</p>
			<p>Weight: ${animal.characteristics.weight}</p>
			<p>Kingdom: ${animal.taxonomy.Kingdom}</p></p>
		</div>`;
	}

        // createCard();