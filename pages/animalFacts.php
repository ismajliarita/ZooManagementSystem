<?php
if (isset($_COOKIE['user_fname']))
    session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zoo Manegment</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>
    <script src="../index.js"></script>
</head>

<body>
    <div class="panel" style="background-image: url('../media/Safari.png');">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="#">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="./ticket.php">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
                <?php
                if (isset($_COOKIE['user_fname'])) {
                    $user_fname = $_COOKIE['user_fname'];
                    $user_power = $_COOKIE['user_power'];

                    switch ($user_power) {
                        case "User":
                            echo "<i class='user-icon user fa-solid fa-user'></i>";
                            break;
                        case "Helper":
                            echo "<i class='user-icon helper fa-solid fa-shield-halved'></i>";
                            break;
                        case "Admin":
                            echo "<i class='user-icon admin fa-solid fa-crown'></i>";
                            break;
                    }

                    echo "<div class='nav-item'><a href='./account.php'>$user_fname</a></div>";
                } else
                    echo '<div class="nav-item"><a href="./signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="inner-panel" style="overflow-y: scroll; display: flex; justify-content: center">
            <div class="result-container">
                <p class="main-content">Enter an animal name to get facts about it.</p>
                <div class="search-bar">
                    <input type="text" placeholder="Enter Animal" id="animal-name">
                    <button onclick="animalFact()" id="search-btn">Submit</button>
                </div>
                <div id="results">
                    


                    
                </div> <!-- Resi;t Div Close Below here -->




            </div>
        </div>


    </div>
    <script>
        // let animals = []
        let resultDiv = document.getElementById("results");



        function animalFact() {
            let slogan = document.getElementById('sloggan');
            let input = document.getElementById('animal-name')
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


    </script>

</body>

</html>