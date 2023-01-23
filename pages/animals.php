<?php
if (isset($_COOKIE['user_id'])) {
    session_start();
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
    <div class="animals_panel">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div id="animal-nav" class="nav-items">
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
                <input class="btn btn-success" type="submit" value="Submit">
            </form>
            <div class="admin-results">
                <?php
                function displayAdminAnimal($habitat, $name, $type, $age)
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
                    echo <<<"EOD"
                    <div class="admin-animal">
                        <div class="admin-animal-left">
                            <p class="admin-habitat-icon $habitat">$icon</p>
                            <div>Name: <button type="button" class="btn btn-outline-info" disabled>$name</button></div>
                            <p>Type: $type</p>
                            <p>Age: $age</p>
                        </div>
                        <div class="admin-animal-right">
                        <button class='edit-btn'> <i class='fa-solid fa-pen'></i> </button>
                        
                        <button class='edit-btn red-btn'> <i class="fa-solid fa-trash"></i> </button>
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
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        displayAdminAnimal($row['habitat'], $row['name'], $row['type'], $row['age']);
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
        <button class="di" style="display:block;height: 5px;width:100%;opacity:0" disabled>hahaha</div>


    </div>
    <script src="./../animal-pagenation.js"></script>

</body>

</html>