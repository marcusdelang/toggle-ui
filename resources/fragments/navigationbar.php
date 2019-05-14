    <nav class="navbar-main">
        <div class="logo">togglE</div>
        <div class="spacing"></div>
        <div class="navbar-items">
            <ul>
                <li>
                <a href="index.php">Home</a>
                <a href="mapPage.php">Map</a>
                <a href="devicesPage.php">Devices</a>
                <?php
                if(isset($_SESSION["username"])){

                    echo '<a href="#">$_SESSION["username"];</a>';
                }else{
                    echo '<a href="loginPage.php">Login</a>'; 
                }
                ?>
                </li>
            </ul>
        </div>
    </nav>