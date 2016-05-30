<?php require "a_header.php"; ?>

<!--1 Glabājas POST dati, kas tika nosūtīti no faila "a_company_info.php"-->
<?php
if(isset($_POST['edit_reg_nr']) && isset($_POST['edit_nosaukums']) && isset($_POST['edit_ties_forma']) 
&& isset($_POST['edit_darb_veids']) && isset($_POST['edit_tel_nr']) && 
isset($_POST['edit_epasts']) && isset($_POST['uzn_edit'])){
    $edit_reg_nr = $_POST['edit_reg_nr'];
    $edit_nosaukums = $_POST['edit_nosaukums'];
    $edit_ties_forma = $_POST['edit_ties_forma'];
    $edit_jurid_adrese = $_POST['edit_jurid_adrese'];
    $edit_darb_veids = $_POST['edit_darb_veids'];
    $edit_tel_nr = $_POST['edit_tel_nr'];
    $edit_epasts = $_POST['edit_epasts'];
    $edit_mates_uzn = $_POST['edit_mates_uzn'];
    $edit_uzn_parole = $_POST['edit_uzn_parole'];

    $uzn_edit = $_POST['uzn_edit'];


    $edit_pasta_indekss = $_POST['edit_pasta_indekss'];
    $edit_novads = $_POST['edit_novads'];
    $edit_pilseta = $_POST['edit_pilseta'];
    $edit_pagasts = $_POST['edit_pagasts'];
    $edit_ciems = $_POST['edit_ciems'];
    $edit_iela = $_POST['edit_iela'];
    $edit_ek_nr = $_POST['edit_ek_nr'];
    $edit_dzivoklis = $_POST['edit_dzivoklis'];   
}else{
    $edit_reg_nr = '';
    $edit_nosaukums = '';
    $edit_ties_forma = '';
    $edit_jurid_adrese = '';
    $edit_darb_veids = '';
    $edit_tel_nr = '';
    $edit_epasts = '';
    $edit_mates_uzn = '';
    $edit_uzn_parole = '';

    $uzn_edit = 'nē';

    $edit_pasta_indekss = '';
    $edit_novads = '';
    $edit_pilseta = '';
    $edit_pagasts = '';
    $edit_ciems = '';
    $edit_iela = '';
    $edit_ek_nr = '';
    $edit_dzivoklis = '';   
}
?>
<!--1-->

<!--2 Šeit glabājas kods, kas ir domāts jauna uzņēmuma reģistrēšanai/esoša uzņēmuma datu rediģēšanai-->
<?php
if(!empty($_POST['reg_nr']) && !empty($_POST['nosaukums']) && !empty($_POST['ties_forma']) 
&& !empty($_POST['jurid_adrese']) && !empty($_POST['darb_veids']) && !empty($_POST['tel_nr']) 
&& !empty($_POST['epasts'])){
 
    $uzn_edit = mysqli_real_escape_string($con, $_POST['uzn_edit_hide']);
    $reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
    $nosaukums = mysqli_real_escape_string($con, $_POST['nosaukums']);

    //3 Šī koda daļa saglabā jaunu uzņēmumu datubāzē
    if($uzn_edit=="nē"){
        $checkregister = mysqli_query($con ,"SELECT Reģ_nr, Nosaukums FROM uznemums 
            WHERE Reģ_nr = '".$reg_nr."' AND Nosaukums = '".$nosaukums."'");
        if(mysqli_num_rows($checkregister) == 1)
        {
            echo "<p>Tāds uzņēmums jau eksistē</p>";
        }
        else{
            $reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
            $nosaukums = mysqli_real_escape_string($con, $_POST['nosaukums']);

            $ties_forma = mysqli_real_escape_string($con, $_POST['ties_forma']);
            $tiesforma = mysqli_query($con ,"SELECT ID FROM uzn_tiesiska_forma 
                WHERE Pilns_nosaukums = '".$ties_forma."'");
            if(mysqli_num_rows($tiesforma) == 1){
                $run_ties_forma = mysqli_fetch_array($tiesforma);
                $ties_formas_id = $run_ties_forma['ID'];          
            }

            $pasta_indekss = mysqli_real_escape_string($con, $_POST['pasta_indekss_hide']);
            $novads = mysqli_real_escape_string($con, $_POST['novads_hide']);
            $pilseta = mysqli_real_escape_string($con, $_POST['pilseta_hide']);
            $pagasts = mysqli_real_escape_string($con, $_POST['pagasts_hide']);
            $ciems = mysqli_real_escape_string($con, $_POST['ciems_hide']);
            $iela = mysqli_real_escape_string($con, $_POST['iela_hide']);
            $ek_nr = mysqli_real_escape_string($con, $_POST['ek_nr_hide']);
            $dzivoklis = mysqli_real_escape_string($con, $_POST['dzivoklis_hide']);
            $pilna_adrese = mysqli_real_escape_string($con, $_POST['jurid_adrese']);
            $darb_veids = mysqli_real_escape_string($con, $_POST['darb_veids']);
            $darbveids = mysqli_query($con ,"SELECT ID FROM uzn_darbibas_veids 
                WHERE Nozares_nos = '".$darb_veids."'");  
            if(mysqli_num_rows($darbveids) == 1){
                $run_darbveids = mysqli_fetch_array($darbveids);
                $darbveids_id = $run_darbveids['ID'];        
            }else echo "<h1>kluda</h1>";
            $tel_nr = mysqli_real_escape_string($con, $_POST['tel_nr']);
            $epasts = mysqli_real_escape_string($con, $_POST['epasts']);
            $mates_uzn_id = mysqli_real_escape_string($con, $_POST['mates_uzn']);
            $uzn_parole = md5(mysqli_real_escape_string($con, $_POST['uzn_parole']));


            $registeraddress = mysqli_query($con, 
                "INSERT INTO lietotaja_adrese (Pasta_indekss, Novads, Pilsēta, Pagasts, Ciems, Iela, Ēkas_nr, Dzīvokļa_nr, Pilna_adrese, Īpašnieks) 
                VALUES('".$pasta_indekss."', '".$novads."', '".$pilseta."', '".$pagasts."', '".$ciems."', '".$iela."', '".$ek_nr."', '".$dzivoklis."', '".$pilna_adrese."', 'uzņēmums');"); 
            if ($registeraddress) {
                $last_id = mysqli_insert_id($con);
            } else {
                echo "Error: " . $registeraddress . "<br>" . mysqli_error($con);
            }
            $registercompany = mysqli_query($con, 
                "INSERT INTO uznemums (Reģ_nr, Nosaukums, Tiesiskās_formas_ID, Jur_adreses_ID, Darbības_veida_ID, Tel_nr_kods, Tel_nr, Epasts, Mates_uzn_ID, Uzņ_parole) 
                VALUES('".$reg_nr."', '".$nosaukums."', '".$ties_formas_id."', '".$last_id."', '".
                    $darbveids_id."','+371', '".$tel_nr."', '".$epasts."', '".$mates_uzn_id."', '".$uzn_parole."');");
            if($registercompany)
            {
                echo "<p style='color:green'>Uzņēmums veiksmīgi saglabāts!</p><br>"; 
                $user_id = $_SESSION['ID'];
                $company_id = mysqli_insert_id($con);
                $registerowners = mysqli_query($con, 
                    "INSERT INTO uznemums_lietotajs (Lietotaja_ID, Uzn_ID) 
                    VALUES('".$user_id."', '".$company_id."');");
                if($registerowners)
                {
                    echo "<p style='color:green'>Uzņēmuma īpašnieks veiksmīgi saglabāts!</p><br>"; 
                }else{
                    echo "<p style='color:red'>Uzņēmuma īpašnieks netika reģistrēts!</p><br>";
                }
            }
            else
            {
                
            }            
        } 
    //3
    //4 Šī koda daļa rediģē esošā uzņēmuma datus un saglabā izmaiņas datubāzē    
    }else if($uzn_edit=="jā"){
        $edit_reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr_hide']);
        $edit_nosaukums = mysqli_real_escape_string($con, $_POST['nosaukums_hide']);
        $checkregister = mysqli_query($con ,"SELECT Reģ_nr, Nosaukums FROM uznemums 
                WHERE Reģ_nr = '".$edit_reg_nr."' AND Nosaukums = '".$edit_nosaukums."'");
        if(mysqli_num_rows($checkregister) == 1)
        {
            $reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
            $nosaukums = mysqli_real_escape_string($con, $_POST['nosaukums']);

            $ties_forma = mysqli_real_escape_string($con, $_POST['ties_forma']);
            $tiesforma = mysqli_query($con ,"SELECT ID FROM uzn_tiesiska_forma 
                WHERE Pilns_nosaukums = '".$ties_forma."'");
            if(mysqli_num_rows($tiesforma) == 1){
                $run_ties_forma = mysqli_fetch_array($tiesforma);
                $ties_formas_id = $run_ties_forma['ID'];          
            }

            $pasta_indekss = mysqli_real_escape_string($con, $_POST['pasta_indekss_hide']);
            $novads = mysqli_real_escape_string($con, $_POST['novads_hide']);
            $pilseta = mysqli_real_escape_string($con, $_POST['pilseta_hide']);
            $pagasts = mysqli_real_escape_string($con, $_POST['pagasts_hide']);
            $ciems = mysqli_real_escape_string($con, $_POST['ciems_hide']);
            $iela = mysqli_real_escape_string($con, $_POST['iela_hide']);
            $ek_nr = mysqli_real_escape_string($con, $_POST['ek_nr_hide']);
            $dzivoklis = mysqli_real_escape_string($con, $_POST['dzivoklis_hide']);
            $pilna_adrese = mysqli_real_escape_string($con, $_POST['jurid_adrese']);


            $darb_veids = mysqli_real_escape_string($con, $_POST['darb_veids']);
            $darbveids = mysqli_query($con ,"SELECT ID FROM uzn_darbibas_veids 
                WHERE Nozares_nos = '".$darb_veids."'");  
            if(mysqli_num_rows($darbveids) == 1){
                $run_darbveids = mysqli_fetch_array($darbveids);
                $darbveids_id = $run_darbveids['ID'];        
            }else echo "<h1>kluda</h1>";
            $tel_nr = mysqli_real_escape_string($con, $_POST['tel_nr']);
            $epasts = mysqli_real_escape_string($con, $_POST['epasts']);
            $mates_uzn_id = mysqli_real_escape_string($con, $_POST['mates_uzn']);
            $uzn_parole = mysqli_real_escape_string($con, $_POST['uzn_parole']);
            if($uzn_parole == ''){
                $uzn_parole = mysqli_real_escape_string($con, $_POST['uzn_parole_hide']);
            }else{
                $uzn_parole = md5(mysqli_real_escape_string($con, $_POST['uzn_parole']));
            }
            $checkcompany = mysqli_query($con, "SELECT ID, Jur_adreses_ID FROM uznemums 
                WHERE Reģ_nr='".$edit_reg_nr."'");
            if(mysqli_num_rows($checkcompany)==1){
                $checkcompany_data = mysqli_fetch_array($checkcompany);
                $c_id = $checkcompany_data['ID'];
                $c_jurid_adr_id = $checkcompany_data['Jur_adreses_ID'];
                $registeraddress = mysqli_query($con, "UPDATE lietotaja_adrese 
                    SET Pasta_indekss='".$pasta_indekss."', Novads='".$novads."', Pilsēta='".$pilseta."', 
                    Pagasts='".$pagasts."', Ciems='".$ciems."', Iela='".$iela."', Ēkas_nr='".$ek_nr."', 
                    Dzīvokļa_nr='".$dzivoklis."', Pilna_adrese='".$pilna_adrese."'
                    WHERE ID='".$c_jurid_adr_id."'");
                if($registeraddress){
                    $updatecompany = mysqli_query($con, 
                        "UPDATE uznemums SET Reģ_nr='".$reg_nr."', Nosaukums='".$nosaukums."', Tiesiskās_formas_ID='".
                        $ties_formas_id."', Jur_adreses_ID='".$c_jurid_adr_id."', Darbības_veida_ID='".$darbveids_id."', Tel_nr='".
                        $tel_nr."', Epasts='".$epasts."', Mates_uzn_ID='".$mates_uzn_id."', Uzņ_parole='".$uzn_parole."' 
                        WHERE ID='".$c_id."'");
                    if($updatecompany)
                    {
                        echo "<p style='color:green'>Uzņēmums veiksmīgi rediģēts!</p><br>"; 
                        header("location: http://localhost/MekletAtlaides/a_company_info.php?comp_name=".$nosaukums);
                    }
                    else
                    {
                        // echo "<p style='color:red'>Problēma1</p><br>";
                    }                     
                }else{
                    // echo "<p style='color:red'>Problēma2</p><br>";
                }
            }else{
                // echo "<p style='color:red'>Problēma3</p><br>";
            }
        }
        else{
            // echo "<p>Nevar atrast šī uzņēmuma datus</p>";           
        }      
    }
    //4



}else{

}
?>
<!--5 Reģistrācijas/datu rediģēšanas forma -->
        <?php require "address_form.php"; ?>
        <div id="regaddr-wrapper-div" class="register-div">
            <div class="register-div-center">
                <h3><?php echo $greeting_text; ?></h3>
                <form method="post" action="a_company_r.php" name="admin-form" id="admin-form" class="address-form">
                    <fieldset>
                        <label for="reg_nr">Reģ. numurs:</label>
                        <input type="text" id="reg_nr" class="register-input" name="reg_nr" 
                        placeholder="Reģ. numurs" value="<?php echo $edit_reg_nr; ?>">
                        <p id="reg_nr_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="nosaukums">Nosaukums:</label>
                        <input type="text" id="nosaukums" class="register-input" 
                        name="nosaukums" placeholder="Nosaukums" value="<?php echo $edit_nosaukums; ?>">
                        <p id="nosaukums_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="ties_forma">Tiesiskā forma:</label>
                        <input type="text" list="t_f_list" id="ties_forma" class="register-input" 
                        name="ties_forma" placeholder="Tiesiskā forma" value="<?php echo $edit_ties_forma; ?>">
                        <datalist id="t_f_list">
                            <?php
                            $list_query = mysqli_query($con, "SELECT * FROM uzn_tiesiska_forma");
                            while($run_list = mysqli_fetch_array($list_query)){
                                $id = $run_list['ID'];
                                $abreviatura = $run_list['Abreviatura'];
                                $pilns_nos = $run_list['Pilns_nosaukums'];
                            ?>
                            <option><?php echo $pilns_nos; ?></option>
                            <?php } ?>
                        </datalist>
                        <p id="ties_forma_e" class="err_m_register hidden"></p>
                    </fieldset>


                    <fieldset>
                        <label for="jurid_adrese">Juridiskā adrese:</label>
                        <div class="address-div">
                            <input type="text" id="jurid_adrese" class="register-input" 
                            name="jurid_adrese" placeholder="Juridiskā adrese" value="<?php echo $edit_jurid_adrese; ?>" readonly>
                            <div id="address-edit">Mainīt</div>
                            <div id="address_form_btn" class="address_form_btn">
                                <p class="a_f_b_title">Aizpildi adreses laukus</p>
                            </div>
                        </div>
                        <p id="jurid_adrese_e" class="err_m_register hidden"></p>
                    </fieldset>


                    <fieldset>
                        <label for="darb_veids">Darbības veids:</label>
                        <input type="text" list="d_v_list" id="darb_veids" class="register-input" 
                        name="darb_veids" placeholder="Darbības veids" value="<?php echo $edit_darb_veids; ?>">
                        <datalist id="d_v_list">
                            <?php
                            $list_query = mysqli_query($con, "SELECT * FROM uzn_darbibas_veids");
                            while($run_list = mysqli_fetch_array($list_query)){
                                $nace_kods = $run_list['NACE_kods'];
                                $nozares_nos = $run_list['Nozares_nos'];
                            ?>
                            <option><?php echo $nozares_nos; ?></option>
                            <?php } ?>
                        </datalist>
                        <p id="darb_veids_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="tel_nr">Telefona numurs:</label>
                        <input type="text" id="tel_nr" class="register-input" 
                        name="tel_nr" placeholder="Telefona numurs" value="<?php echo $edit_tel_nr; ?>">
                        <p id="tel_nr_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="epasts">E-pasts:</label>
                        <input type="text" id="epasts" class="register-input" 
                        name="epasts" placeholder="Epasts" value="<?php echo $edit_epasts; ?>">
                        <p id="epasts_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="mates_uzn">Mātes uzņēmums:</label>
                        <input type="text" id="mates_uzn" class="register-input" 
                        name="mates_uzn" placeholder="Mates uzņēmums" value="<?php echo $edit_mates_uzn; ?>">
                        <p id="mates_uzn_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="uzn_parole">Uzņēmuma parole:</label>
                        <input type="password" id="uzn_parole" class="register-input" 
                        name="uzn_parole" placeholder="Uzņēmuma parole">
                        <p id="uzn_parole_e" class="err_m_register hidden"></p>
                    </fieldset>

                    <fieldset class="hidden">
                        <input type="text" name="pasta_indekss_hide" id="pasta_indekss_hide" value="<?php echo $edit_pasta_indekss; ?>">
                        <input type="text" name="novads_hide" id="novads_hide" value="<?php echo $edit_novads; ?>" />
                        <input type="text" name="pilseta_hide" id="pilseta_hide" value="<?php echo $edit_pilseta; ?>">
                        <input type="text" name="pagasts_hide" id="pagasts_hide" value="<?php echo $edit_pagasts; ?>">
                        <input type="text" name="ciems_hide" id="ciems_hide" value="<?php echo $edit_ciems; ?>">
                        <input type="text" name="iela_hide" id="iela_hide" value="<?php echo $edit_iela; ?>">
                        <input type="text" name="ek_nr_hide" id="ek_nr_hide" value="<?php echo $edit_ek_nr; ?>">
                        <input type="text" name="dzivoklis_hide" id="dzivoklis_hide" value="<?php echo $edit_dzivoklis; ?>">

                        <input type="text" name="uzn_parole_hide" id="uzn_parole_hide" value="<?php echo $edit_uzn_parole; ?>">

                        <input type="text" id="uzn_edit_hide" name="uzn_edit_hide" value="<?php echo $uzn_edit; ?>">
                    </fieldset>
                    <fieldset class="hidden">
                        <input type="text" name="reg_nr_hide" id="reg_nr_hide" value="<?php echo $edit_reg_nr; ?>">
                        <input type="text" name="nosaukums_hide" id="nosaukums_hide" value="<?php echo $edit_nosaukums; ?>" />
                    </fieldset>
                    <?php
                        if($uzn_edit=="nē"){
                            $submit_btn_caption = "Reģistrēt uzņēmumu";
                        }else if($uzn_edit=="jā"){
                            $submit_btn_caption = "Saglabāt izmaiņas";
                        }
                    ?>
                    <button type="submit" name="a-submit-register" id="a-submit-register" 
                    class="a_buttons"><?php echo $submit_btn_caption; ?></button>
                </form>
                <a href="a_company_list.php"><button class="a_back">Atpakaļ</button></a>

            </div>
        </div>
<!--5-->
</body>


<?php require "a_footer.php"; ?>