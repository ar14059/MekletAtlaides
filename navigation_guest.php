
        <?php
            if($curr_location!="/MekletAtlaides/index.php"){
        ?>
        <a href="index.php"><button id="nav-right-button-back" class="button_nav"></button></a>
        <?php
            }
        ?>
        <button id="hidden_button_login" class="button_nav"></button>
        <div id="loginContainer">
            <button id="nav-right-button-login" class="button_nav"></button>
            <div id="loginBox">   
                <form method="post" action="<?php echo  $curr_location; ?>" name="loginForm" id="loginForm">
                <hr>  
                    <fieldset id="body">
                        <fieldset>
                            <label for="email">E-pasts:</label>
                            <input type="text" name="email" id="email" />
                        </fieldset>
                        <fieldset>
                            <label for="password">Parole:</label>
                            <input type="password" name="password" id="password" />
                        </fieldset>
                        <a href="#" class="aizmirsi_l_p">Aizmirsi paroli?</a>
                        <button type="submit" name="login" id="login" value="Login"></button>
                    </fieldset>
                </form>
            </div>            
        </div>
        <div id="registerContainer">
            <button id="nav-right-button-register" class="button_nav"></button>
            <div id="registerBox">   
                <form method="post" action="index.php" name="registerForm" id="registerForm">
                    <?php
                    echo "<a href='check_user_level.php?u_level=0' id='msb_pircejs' class='rsb_p'>Pircējs</a>";
                    echo "<a href='check_user_level.php?u_level=1' id='msb_uznemums' class='rsb_p'>Publicētājs</a>";
                    ?>
            </div>            
        </div>