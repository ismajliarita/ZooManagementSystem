<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>

    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: burlywood;">
    <div class="animals_panel">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="#">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="#">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
                <?php
                if (isset($_COOKIE['user_fname'])) {
                    $user_fname = $_COOKIE['user_fname'];
                    echo "<div class='nav-item'><a href='../pages/account.php'>$user_fname</a></div>";
                } else
                    echo '<div class="nav-item"><a href="../pages/signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="animals-main-panel">

            <form class="search-bar" action="" method="get" autocomplete="off">
                <input type="text" name="name" id="name" placeholder="Animal name...">
                <div style="display: flex; align-items: center;">
                    <p style="margin-bottom: 0; margin-right: 0.5rem;">Animal Habitat:</p>
                    <select name="maps" id="maps">
                        <option value=""></option>
                        <option value="ocean">Ocean</option>
                        <option value="jungle">Jungle</option>
                        <option value="arctic">Arctic</option>
                        <option value="forest">Forest</option>
                        <option value="desert">Desert</option>
                    </select>
                </div>
                <div>
                    <input list="types" id="type" name="type" placeholder="Type of animal">

                    <datalist id="types">
                        <option value="Chocolate">
                        <option value="Coconut">
                        <option value="Mint">
                        <option value="Strawberry">
                        <option value="Vanilla">
                    </datalist>
                </div>
                <input class="btn btn-success" type="submit" value="Submit">
            </form>
            
            
            <div class="results">
                <?php 
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, 'zoo');
                    
                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                    // echo "Connected successfully";

                    $sql = "SELECT * FROM animals";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            addCard($row['name'], $row['habitat'], $row['type'], $row['age'], $row['description']);
                        }
                    }


                    function addCard($animalName, $habitat, $animalType, $animalAge, $description){
                        echo <<<"EOD"
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="overtext">
                                            <p><strong>$animalName</strong></p>    

                                            <p class="habitat-icon"><i class="fa-solid fa-water"></i></p>
                                        </div>
                                        <img class="flipcard-image" src="../media/flipcard_sample.png">
                                        
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="flipback-header">
                                            <div class="name">
                                                <div style="font-size: 1.5rem; margin-bottom: -5px;"><strong>$animalName</strong></div>
                                                <div class="type-kitty">$animalType</div>
                                            </div>
                                            <div class="age">
                                                <div class="age-nr"><strong>$animalAge</strong></div> 
                                                <div class="yrs">years old</div>
                                            </div>
                                        </div>
                                        <div class="flipback-rest">
                                            <p>From the $habitat</p>
                                            <p>$description</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        EOD;
                    }
                


                ?>
            <!--                 
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="overtext">
                                <p><strong>Name</strong></p>    
                                <p class="habitat-icon"><i class="fa-solid fa-water"></i></p>
                            </div>
                            <img class="flipcard-image" src="../media/flipcard_sample.png">
                            sdfbhwrgtnsafdsvads
                        </div>
                        <div class="flip-card-back">
                            <div class="flipback-header">
                                <div class="name">
                                    <div style="font-size: 1.5rem; margin-bottom: -5px;"><strong>Animal Name</strong></div>
                                    <div class="type-kitty">Hello Kitty</div>
                                </div>
                                <div class="age">
                                    <div class="age-nr"><strong>800</strong></div> 
                                    <div class="yrs">years old</div>
                                </div>
                            </div>
                            <div class="flipback-rest">
                                <p>Lives in New York (his friends at least)</p>
                                <p>Description or sth: Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim cumque magni ipsa, officiis reiciendis ullam dolor vero optio modi doloremque, omnis, asperiores recusandae ab illo ducimus illum quisquam. Obcaecati, nulla?  
                                    <br>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae similique dignissimos sint accusantium est praesentium, eum, accusamus dolorum doloribus assumenda eveniet nostrum beatae. Porro dolorum commodi laborum tenetur optio aspernatur!</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
             -->






            </div>
            <div class="pagenation">
                    
            </div>
        </div>


    </div>



</body>

</html>