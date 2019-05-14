    <nav class="navbar-main">
        <a class="logo" href="index.php">togglE</a>
        <div class="spacing">
            <?php
            if(isset($_SESSION["username"])){                   
            echo '<span id="user">';
            echo 'Welcome  '.$_SESSION["username"];
            echo '</span>';
            } ?>
        </div>
        <div class="navbar-items">
            <ul>
                <li>
                <a href="mapPage.php">Map</a>
                <a href="devicesPage.php">Devices</a>
                <?php
                if(isset($_SESSION["username"])){
                    echo '<a id="logout" type="submit" value="Login">Logout</a>';
                }else{
                    echo '<a href="signupPage.php">Signup</a>'; 
                    echo '<a href="loginPage.php">Login</a>'; 
                }
                ?>
                </li>
            </ul>
        </div>
    </nav>