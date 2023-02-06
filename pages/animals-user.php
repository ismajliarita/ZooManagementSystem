<?php
    session_start();

    if(isset($_COOKIE['logged'])) {
        $user_power = $_SESSION['user_power'];

        if($user_power !== 'User') {
            header('Location: animals.php');
            die();
        }
    }
?>

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

<body id="animals-user-body" style="background-color: burlywood;">
    <div class="animals_panel" id="topOfPage">
    <nav class="nav">

        <img src="../media/logo.png" id="logo" />

        <div class="nav-items">
            <div class="nav-item"><a href="../index.php">Home</a></div>
            <div class="nav-item"><a href="../pages/habitatMap.php">Habitats</a></div>
            <div class="nav-item"><a href="../pages/animalFacts.php">AnimalFacts</a></div>
            <div class="nav-item"><a href="../pages/ticket.php">Tickets</a></div>
            <div class="nav-item"><a href="../pages/about.php">About</a></div>
            <?php
                if (isset($_COOKIE['logged'])) {
                    $user_fname = $_SESSION['user_fname'];
                    $user_power = $_SESSION['user_power'];
                    
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

                    echo "<div class='nav-item'><a href='../pages/account.php'>$user_fname</a></div>";
                }
                else
                    echo '<div class="nav-item"><a href="../pages/signup.php">Log In</a></div>';
            ?>
        </div>

        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

    </nav>

        <div class="animals-main-panel">

            <form class="search-bar" action="" method="get" autocomplete="off">
                <input type="text" name="name" id="name" placeholder="Animal name...">
                <div style="display: flex; align-items: center;">
                    <p style="margin-bottom: 0; margin-right: 0.5rem;">Animal Habitat:</p>
                    <select name="map" id="map">
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
                        
                            $sql = "SELECT type FROM animals GROUP BY type";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $type = $row['type'];
                                    echo "<option value='$type'>";                                    
                                }
                            }else{
                                echo "wrong sth is wroooong";
                            }

                            mysqli_close($conn);
                        ?>
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

                    // $sql = "SELECT * FROM animals";
                    // $result = mysqli_query($conn, $sql);
                    // if(mysqli_num_rows($result) > 0){
                    //     while($row = mysqli_fetch_assoc($result)){
                    //         addCard($row['name'], $row['habitat'], $row['type'], $row['age'], $row['description']);
                    //     }
                    // }
                    // <p class="habitat-icon"><i class="fa-solid fa-water"></i></p>
                    // <i class="fa-solid fa-igloo"></i>



                    function addCard($id, $animalName, $habitat, $animalType, $animalAge, $description, $conn){
                        switch($habitat){
                            case "Forest":
                                $icon = '<i class="fa-solid fa-tree"></i>';
                                break;
                            case "Jungle":
                                $icon = '<i class="fa-solid fa-leaf"></i>';
                                break;
                            case "Arctic":
                                $icon = '<i class="fa-solid fa-igloo"></i>';
                                break;
                            case "Desert":
                                $icon = '<i class="fa-solid fa-sun-plant-wilt"></i>';
                                break;
                            case "Ocean":
                                $icon = '<i class="fa-solid fa-water"></i>';
                                break;
                            default:
                                $icon = '<i class="fa-regular fa-location-question"></i>';
                        }

                        $sql_imgs = "SELECT * FROM images WHERE animal_id = $id";
                        $images = mysqli_fetch_assoc(mysqli_query($conn, $sql_imgs));
                        $image = $images['url'];

                        echo <<<"EOD"
                        
                        <a id="linkNr$id" class="card-container" href="viewAnimal.php?id=$id" style="align-items:center; margin-top: 0;"> 
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="overtext">
                                            <p><strong>$animalName</strong></p>    
                                            <p class="habitat-icon">$icon</p>
                                        </div>
                        EOD;
                            try {
                                echo "<img class='flipcard-image' src='$image'>";
                            }
                            catch (Exception $e) {
                                echo "<img class='flipcard-image' src='../media/flipcard_sample.png'>";
                            }

                        echo <<<"EOD"
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
                        </a>
                        EOD;
                    }
                    
                    $sql = 'SELECT * FROM animals ';
                    if(isset($_GET['name'])) {
                        $name = $_GET['name'];
                        $sql = $sql . "WHERE name LIKE '%$name%'";
                        if($_GET['map'] != ''){
                            $map = $_GET['map'];
                            $sql = $sql . "AND habitat = '$map' ";
                        }
                        if($_GET['type'] != ''){
                            $type = $_GET['type'];
                            $sql = $sql . "AND type = '$type' ";
                        }

                    }

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            addCard($row['id'], $row['name'], $row['habitat'], $row['type'], $row['age'], $row['description'], $conn);
                        }
                    }else{
                        echo "0 results";
                    }

                    mysqli_close($conn);
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
            <br><br>
            <div class="pagenation" id="pagenation" aria-label="breadcrumb">
                
            </div>
            <br>
        </div>
    </div>

<script src="./animals-user.js"></script>
<script src="../index.js"></script>

</body>

</html>