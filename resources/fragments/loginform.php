<?php if($this->session->get('isLoggedIn') == FALSE){
    echo 
    '<form action="Login" method="post">
        <input type="text" name="username" placeholder="Email/Username..">
        <input type="password" name="password" placeholder="Enter your password..">
        <button class="login" type="submit"> Login </button>
    </form>
    <a href="SignupPage"><p class="signup">Signup</p></a>';
    }else {    
    echo 'Logged in as:'." ".$this->session->get('username');
    echo '<form action="Logout" method="post">
          <button class="logut" type="submit"> Logout </button>
         </form>';
    }
    ?>

