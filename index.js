function goLogin() {
	let signup_overlay = document.getElementById("signup-overlay");
	let login_overlay = document.getElementById("login-overlay");

	signup_overlay.style.display = "none";
	login_overlay.style.display = "flex";
}

function register_auth() {
	// Store the URL of the JSON from which we want to retrieve data
	var requestURL = 'register_user.php';

	// Create a new request object instance from the XMLHttpRequest constructor, using the new keyword
	var request = new XMLHttpRequest();

	// Open the request using the open() method. At least two parameters are needed.
	// The HTTP method to use when making the network request. In this case GET is fine, as we are just retrieving some simple data.
	// The URL to make the request to. This is the URL of the JSON file that we stored earlier.
	request.open('POST', requestURL);
    
	// Set the responseType to JSON, so that XHR knows that the server will return JSON (should be converted behind the scenes into a JavaScript object)
	request.responseType = 'php';
    
	// Send the request
	request.send();

	// Wrap the code in an event handler that runs when the load event fires on the request object (onload)
	// This is because the load event fires when the response has successfully returned; doing it this way guarantees that request.response will be available to process.
	// In other words, wait for the request to complete successfully and then execute the (callback) function.
	request.onload = function() {
	// Store the response to the request (available in the response property) in a variable called theSuperHeroes
	// var theSuperHeroes = request.response;
    // document.getElementById("teamname").innerHTML = theSuperHeroes.teamName;
    };
}