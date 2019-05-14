<?php if(isset($_SESSION['username'])){
    $currentUser = $_SESSION['username'];
    echo 'Logged in as:'." ".$currentUser;
    echo '<form>
          <button id="logout" type="submit" name="logout-submit"> Logout </button>
          <p id="form-mesage"></p>
          </form>';
    }
    else {
    echo '
    <form>
    <label for="username">Username:</label>
    <input id="username" type="text" id="username" name="username">
    <label for="password">Password:</label>
    <input id="password" type="password" id="password" name="password">
    <button id="submit" type="submit" value="Login">Submit</button>
    </form>
     <a href="signup.php"><p id="signup">Signup</p></a>';
    }
    ?>

