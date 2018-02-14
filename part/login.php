<?php echo isset($_SESSION['NOTICE']) ? $_SESSION['NOTICE'] : '' ;

var_dump($_SESSION['NOTICE']);
?>
<form class="login"  method="post">
    <div class="group">
        <label for="username" id="username" class="label">
            Username 
        </label>

        <input type="text" placeholder="username" name="username" id="username">
    </div>
    <div class="group">
        <label for="password" id="password" class="label">
            Password 
        </label>

        <input type="password" name="password" placeholder="password" id="password">
    </div>
    <div class="group">
        <input type="submit" name="login" id="login" value="Login">
    </div>
</form>

