<?php require "a_header.php"; ?>


        <div id="register-wrapper-div" class="register-div">
            <div class="register-div-center">
                <h3><?php echo $greeting_text; ?></h3>


                <div class="btn_div"><div class="btn_div_center"><a href="a_user_list.php"><button name="users_table" id="users_table" 
                class="a_buttons">Lietotāju saraksts</button></a></div></div>

                <div class="btn_div"><div class="btn_div_center"><a href="a_company_list.php"><button name="create_concern" id="create_concern" 
                class="a_buttons">Uzņēmumu saraksts</button></a></div></div>

                <?php if($u_level==3){ ?>

                <div class="btn_div"><div class="btn_div_center"><a href="a_register.php"><button name="create_concern" id="create_concern" 
                class="a_buttons">Reģistrēt uzņ vadītāju</button></a></div></div>

                <?php 
                } else{
                ?>

                <div class="btn_div"><div class="btn_div_center"><a href="a_company_r.php"><button name="create_company" id="create_company" 
                class="a_buttons">Reģistrēt uzņēmumu</button></a></div></div>

                <?php
                }
                ?>
                <div class="btn_div"><div class="btn_div_center"><a href="a_logout.php"><button name="create_concern" id="create_concern" 
                class="a_buttons">Log Out</button></a></div></div>         
            </div>
        </div>

</body>

<?php require "a_footer.php"; ?>