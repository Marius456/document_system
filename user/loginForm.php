<?php
if (isset($form) && isset($session) && !$session->logged_in) {
    ?>   
    <form action="process.php" method="POST" class="login">              
        <center style="font-size:18pt;"><b>Prisijungimas</b></center>
        <p style="text-align:left;">Vartotojo vardas:<br>
            <input class ="s1" name="user" type="text" value="<?php echo $form->value("user"); ?>" required/><br>
            <?php echo $form->error("user"); ?>
        </p>
        <p style="text-align:left;">Slaptažodis:<br>
            <input class ="s1" name="password" type="password" value="<?php echo $form->value("password"); ?>" required/><br>
            <?php echo $form->error("password"); ?>
        </p>  
        <p style="text-align:center;">
            <input type="submit" value="Prisijungti"/>
        </p>
        <input type="hidden" name="sublogin" value="1"/>  
    </form>
    <?php
}
?>