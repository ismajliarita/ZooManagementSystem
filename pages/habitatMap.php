<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" href="../media/logo.png">
    <title>Habitat Map</title>
</head>
<body style="
    background-color: rgb(30, 31, 55);
    background-position: 100% 100%;">
    <div class="panelHabitatMap">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="../index.php">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="./ticket.php">Tickets</a></div>
                <div class="nav-item"><a href="./about.php">About</a></div>
                <div class="nav-item"><a href="./signup.html">Sign Up</a></div>
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
        </nav>
        <div class="habitatMap">
            <div class="habitatMap_innerPannel">
                <div class="imgTop">
                    <img src="../media/a-waterAreaNoBckg.png" alt="" class="image" id="waterHabitat">
                    <div class="jungle-map">
                        <img src="../media/a-jungleAreaNoBckg.png" alt="" class="image" id="jungleHabitat">
                    </div>
                    <img src="../media/a-iceAreaNoBckg.png" alt="" class="image" id="iceHabitat">
                </div>
                <div class="imgBot">
                    <img src="../media/a-forestNoBkg.png" alt="" class="image" id="forestHabitat">
                    <img src="../media/a-desertNoBckg.png" alt="" class="image" id="desertHabitat">
                </div>
            </div>
        </div>
    </div>

    <script src="../index.js"></script>
</body>
</html>