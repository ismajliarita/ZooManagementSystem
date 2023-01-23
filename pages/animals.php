<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

        <div class="animals-inner-panel" style="display: flex; justify-content: center; margin-top: 50px;">
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

            </div>
            <div class="pagenation">

            </div>
        </div>


    </div>



</body>

</html>