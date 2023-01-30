<?php
    session_start();
    
    if (isset($_COOKIE['logged'])) {
        $user_power = $_SESSION['user_power'];

        if($user_power === 'User') {
            header('Location: animals-user.php');
            die();
        }
    }  
    else {
        header('Location: animals-user.php');
        die();
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
    <script src="https://kit.fontawesome.com/3d4aa6afaa.js" crossorigin="anonymous"></script>

    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-image:url('./../media/animals.jpg');">
    <div id="overlay"></div>
    <div class="sidebar hidden">
        <span id="collapse-button"><i class="fa-solid fa-filter"></i></span>
        <div class="sidebar-header">
            <h3 style="text-align: center;">Sort Animal</h3>
        </div>
        <form class="sidebar-content" method="GET">
            <input type="checkbox" class="filters" id="" name='clean'><button class='edit-btn cleanAnimal ' disabled><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-broom"></i></button><br>
            <input type="checkbox" class="filters" id="" name="vet"><button class='edit-btn helpAnimal' disabled><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-suitcase-medical"></i></button><br>
            <input type="checkbox" class="filters" id="" name="water"><button class='edit-btn waterAnimal' disabled><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-glass-water-droplet"></i></button><br>
            <input type="checkbox" class="filters" id="" name="food"><button class='edit-btn feedAnimal' disabled><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-drumstick-bite"></i></button><br>
            <button type="submit" class="btn btn-primary" name="sort">Sort</button>




</form>
    </div>

    <div class="addAnimalFixed" id="addAnimalForm">
        <form method="POST" action="./addAnimal.php" enctype="multipart/form-data" autocomplete="off">
            <h3 style="text-align: center;">Add Animal Form</h3>
            <span class="closebtn" id="add-closebtn" onclick="this.parentElement.parentElement.style.display = 'none';this.parentElement.parentElement.parentElement.firstElementChild.style.display = 'none';">&times;</span>
            <input type="text" id="add-animal-name" name="addName" placeholder="Animal Name" required>
            <input list="types" id="add-animal-type" name="addType" placeholder="Type of animal" required>

            <datalist id="types">
                <?php
                echo ' hahahahah';
                $con = mysqli_connect("localhost", "root", "", "zoo");
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                echo 'haha';
                $sql = 'SELECT type FROM animals GROUP by type;';
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $type = $row['type'];
                        echo <<<"EOD"
                                    <option value="$type">
                                EOD;
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($con);
                ?>
            </datalist>
            <br>
            <h5 style="margin-top: 10px; padding-bottom: 0px">Habitat:</h5>
            <input style="padding-top: 0px" type="radio" id="ocean" name="addHabitat" value="Ocean" required>
            <label style="padding-top: 0px" for="ocean">Ocean</label><br>
            <input type="radio" id="jungle" name="addHabitat" value="Jungle">
            <label for="jungle">Jungle</label><br>
            <input type="radio" id="arctic" name="addHabitat" value="Arctic">
            <label for="arctic">Arctic</label><br>
            <input type="radio" id="forest" name="addHabitat" value="Forest">
            <label for="forest">Forest</label><br>
            <input type="radio" id="desert" name="addHabitat" value="Desert">
            <label for="desert">Desert</label><br>
            <label for="add-animal-age">Age:</label>
            <input type="number" style="width: 5rem;" id="add-animal-age" name="addAge" min=0 required><br>
            <textarea id="add-animal-desc" name="addDescription" rows="4" cols="50" placeholder="Enter description here..." required></textarea>

            <input type="file" id="photos" name="photos[]" accept=".png,.jpg,.jpeg,.jfif" multiple /><br>
            <div class="animal-photos">

            </div>
            <input type="submit" class="btn btn-primary" style="padding: 10px 20px;" value="Submit" name="upload">
        </form>
    </div>
    <div class="editForm" id="editFormFixed">
        <form method="POST" action="./editAnimal.php" enctype="multipart/form-data" autocomplete="off">
            <input type="number" value="" name="id" id="editID" style="display: none;">
            <span class="closebtn" id="edit-closebtn" onclick="this.parentElement.parentElement.style.display = 'none';this.parentElement.parentElement.parentElement.firstElementChild.style.display = 'none'">&times;</span>
            <h3 style="text-align: center;">Edit Animal Form</h3>
            <input type="text" id="edit-animal-name" name="addName" placeholder="Animal Name" required>
            <input list="edit-types" id="edit-animal-type" name="addType" placeholder="Type of animal" required>

            <datalist id="edit-types">
                <?php
                echo ' hahahahah';
                $con = mysqli_connect("localhost", "root", "", "zoo");
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                echo 'haha';
                $sql = 'SELECT type FROM animals GROUP by type;';
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $type = $row['type'];
                        echo "<option value='$type'>";
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($con);
                ?>
            </datalist>
            <br>
            <h5 style="margin-top: 10px; padding-bottom: 0px">Habitat:</h5>
            <input style="padding-top: 0px" type="radio" id="edit-ocean" name="addHabitat" value="Ocean" required>
            <label style="padding-top: 0px" for="edit-ocean">Ocean</label><br>
            <input type="radio" id="edit-jungle" name="addHabitat" value="Jungle">
            <label for="edit-jungle">Jungle</label><br>
            <input type="radio" id="edit-arctic" name="addHabitat" value="Arctic">
            <label for="edit-arctic">Arctic</label><br>
            <input type="radio" id="edit-forest" name="addHabitat" value="Forest">
            <label for="edit-forest">Forest</label><br>
            <input type="radio" id="edit-desert" name="addHabitat" value="Desert">
            <label for="edit-desert">Desert</label><br>
            <label for="edit-animal-age">Age:</label>
            <input type="number" style="width: 5rem;" id="edit-animal-age" name="addAge" min=0 required><br>
            <textarea id="edit-animal-desc" name="addDescription" rows="4" cols="50" placeholder="Enter description here..." required></textarea>

            <input type="file" id="edit-photos" name="photos[]" multiple /><br>
            <div class="animal-photos">

            </div>
            <input type="submit" class="btn btn-light" style="padding: 10px 20px;margin-top: 1rem" value="Submit" name="upload">

        </form>
    </div>


    <div class="animals_panel">
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
                } else
                    echo '<div class="nav-item"><a href="../pages/signup.php">Log In</a></div>';
                ?>
            </div>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

        </nav>

        <div class="animals-inner-panel">
            <form class="search-bar" action="" method="get" autocomplete="off">
                <input type="text" name="name" id="name" placeholder="Animal name...">
                <div style="display: flex; align-items: center;">
                    <p style="margin-bottom: 0; margin-right: 0.5rem;">Animal Habitat:</p>
                    <select name="map" id="maps">
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
                        echo ' hahahahah';
                        $con = mysqli_connect("localhost", "root", "", "zoo");
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        echo 'haha';
                        $sql = 'SELECT type FROM animals GROUP by type;';
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                $type = $row['type'];
                                echo <<<"EOD"
                                <option value="$type">
                                EOD;
                            }
                        } else {
                            echo "0 results";
                        }

                        mysqli_close($con);
                        ?>
                        <!-- <option value="Chocolate">
                        <option value="Coconut">
                            <option value="Mint">
                        <option value="Strawberry">
                        <option value="Vanilla"> -->
                    </datalist>
                </div>
                <input class="btn btn-success" type="submit" value="Search">
                <button type="button" id="add-button" class="btn btn-primary" onclick="addAnimal()">Add Animal</button>
            </form>
            <div class="admin-results">
                <?php
                function displayAdminAnimal($id, $habitat, $name, $type, $age, $vet, $clean, $food, $water)
                {
                    if ($habitat == 'Forest') {
                        $icon = '<i class="fa-solid fa-tree"></i>';
                    } else if ($habitat == 'Jungle') {
                        $icon = '<i class="fa-solid fa-leaf"></i>';
                    } else if ($habitat == 'Ocean') {
                        $icon = '<i class="fa-solid fa-water"></i>';
                    } else if ($habitat == 'Arctic') {
                        $icon = '<i class="fa-sharp fa-solid fa-igloo"></i>';
                    } else if ($habitat == 'Desert') {
                        $icon = '<i class="fa-solid fa-umbrella-beach"></i>';
                    }
                    $now = date('Y-m-d H:i:s', time());

                    if ($food != '') {
                        $actualFood = date('Y-m-d H:i:s', strtotime($food . ' + 6 hours'));
                        if ($now < $actualFood) {
                            $check4 = '';
                        } else {

                            $check4 = 'unchecked';
                        }
                    } else {

                        $check4 = 'unchecked';
                    }

                    $now = date('Y-m-d H:i:s', time());
                    // echo $water;
                    if ($water != '') {
                        $actualWater = date('Y-m-d H:i:s', strtotime($water . ' + 6 hours'));
                        if ($now < $actualWater) {
                            $check3 = '';
                        } else {
                            $check3 = 'unchecked';
                        }
                    } else {
                        $check3 = 'unchecked';
                    }
                    if ($vet == 0) {
                        $check2 = '';
                    } else {
                        $check2 = 'unchecked';
                    }
                    if ($clean == 0) {
                        $check1 = '';
                    } else {
                        $check1 = 'unchecked';
                    }
                    echo <<<"EOD"
                    <div class="admin-animal">
                    <p style="display: none">$id</p>
                    <div class="admin-animal-left">
                    <button type='button' class='viewAnimal btn btn-outline-primary'>View Animal</button>
                    <p class="admin-habitat-icon $habitat">$icon</p>
                    <div>Name: <button type="button" class="btn btn-outline-info" disabled>$name</button></div>
                    <p>Type: $type</p>
                            <p>Age: $age</p>
                        </div>
                        <div class="admin-animal-right">
                        <button class='edit-btn cleanAnimal helperBtn $check1'><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-broom"></i></i></button>
                        <button class='edit-btn helpAnimal helperBtn $check2'><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-suitcase-medical"></i></button>
                        <button class='edit-btn waterAnimal helperBtn $check3'><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-glass-water-droplet"></i></button>
                        <button class='edit-btn feedAnimal helperBtn $check4'><input style='display: none;' type='checkbox' checked><i class="fa-solid fa-drumstick-bite"></i></button>
                        <button class='edit-btn editAnimal'> <i class='fa-solid fa-pen'></i> </button>
                        
                        <button class='edit-btn red-btn deleteAnimal'> <i class="fa-solid fa-trash"></i> </button>
                        </div>

                        </div>
                    EOD;
                }
                $con = mysqli_connect("localhost", "root", "", "zoo");
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = 'SELECT * FROM animals ';
                if (isset($_GET['name'])) {
                    $name = $_GET['name'];
                    $sql = $sql . "WHERE name LIKE '%$name%' ";
                    if ($_GET['map'] != '') {
                        $map = $_GET['map'];
                        $sql = $sql . "AND habitat = '$map' ";
                    }
                    if ($_GET['type'] != '') {
                        $type = $_GET['type'];
                        $sql = $sql . "AND type = '$type'";
                    }
                }
                $order = true;
                if (isset($_GET['sort'])){
                    if(isset($_GET['clean'])){
                        if($order){
                            $sql = $sql . " ORDER BY clean_time DESC";
                            $order = false;
                        } else {
                            $sql = $sql . ", clean_time DESC";
                        }
                    }
                    if(isset($_GET['vet'])){
                        if($order){
                            $sql = $sql . " ORDER BY vet_help DESC";
                            $order = false;
                        } else {
                            $sql = $sql . ", vet_help DESC";
                        }

                    }
                    if(isset($_GET['water'])){
                        if($order){
                            $sql = $sql . " ORDER BY water_time";
                            $order = false;
                        } else {
                            $sql = $sql . ", water_time";
                        }
                    }
                    if(isset($_GET['food'])){
                        if($order){
                            $sql = $sql . " ORDER BY food_time";
                            $order = false;
                        } else {
                            $sql = $sql . ", food_time";
                        }
                    }
                }
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        displayAdminAnimal($row['id'], $row['habitat'], $row['name'], $row['type'], $row['age'], $row['vet_help'], $row['clean_time'], $row['food_time'], $row['water_time']);
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($con);

                ?>



            </div>
            <div id="pagenation" class="pagenation" aria-label="breadcrumb">

            </div>
        </div>
        <button class="di" style="display:block;height: 5px;width:100%;opacity:0" disabled>hahaha
    </div>


    </div>
    <script src="../animal-pagenation.js"></script>
    <script src="../admin-animal.js"></script>
    <script src="../addAnimal.js"></script>
    <script src="../index.js"></script>

</body>

</html>