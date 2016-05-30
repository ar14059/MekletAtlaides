<?php require "a_header.php"; ?>

<!--1 Tiek saņemts uzņēmuma nosaukums, kas nosaka, kura uzņēmuma dati tiks parādīti -->
<?php 
    if(isset($_GET['comp_name'])){
        $c_name = $_GET['comp_name'];
    }else{
        header("location: a_home.php"); 
    }
?>
<!--1-->

<div id="register-wrapper-div" class="register-div">
    <div id="a_comp_list_center" class="register-div-center">
        <h3><?php echo $greeting_text; ?></h3>
        <!--2 Kods, kas atrod datubāzē informāciju uzņēmumam, kura nosaukums glabājas mainīgajā "$c_name"  -->
        <?php
        if($c_name !== 'null' && $c_name != ''){
            $find_company = mysqli_query($con, "SELECT * FROM uznemums WHERE Nosaukums='".$c_name."'");
            if(mysqli_num_rows($find_company)==1){
                $company_details = mysqli_fetch_array($find_company);

                $id = $company_details['ID'];
                $reg_nr = $company_details['Reģ_nr'];
                $ties_formas_id = $company_details['Tiesiskās_formas_ID'];
                $find_ties_forma = mysqli_query($con, "SELECT * FROM uzn_tiesiska_forma WHERE ID='".$ties_formas_id."'");
                if(mysqli_num_rows($find_ties_forma)==1){
                    $ties_forma_info = mysqli_fetch_array($find_ties_forma);
                    $tf_abr = $ties_forma_info['Abreviatura'];
                    $tf_pilns_nos = $ties_forma_info['Pilns_nosaukums'];

                }
                $jur_adr_id = $company_details['Jur_adreses_ID'];
                $find_jurid_adrese = mysqli_query($con, "SELECT * FROM lietotaja_adrese WHERE ID='".$jur_adr_id."' AND Īpašnieks='uzņēmums'");
                if(mysqli_num_rows($find_jurid_adrese)==1){
                    $jurid_adrese_info = mysqli_fetch_array($find_jurid_adrese);
                    $c_pilna_adrese = $jurid_adrese_info['Pilna_adrese'];

                    $c_pasta_indekss = $jurid_adrese_info['Pasta_indekss'];
                    $c_novads = $jurid_adrese_info['Novads'];
                    $c_pilseta = $jurid_adrese_info['Pilsēta'];
                    $c_pagasts = $jurid_adrese_info['Pagasts'];
                    $c_ciems = $jurid_adrese_info['Ciems'];
                    $c_iela = $jurid_adrese_info['Iela'];
                    $c_ek_nr = $jurid_adrese_info['Ēkas_nr'];
                    $c_dzivoklis = $jurid_adrese_info['Dzīvokļa_nr'];
                }
                $darb_veida_id = $company_details['Darbības_veida_ID'];
                $find_darb_veids = mysqli_query($con, "SELECT * FROM uzn_darbibas_veids WHERE ID='".$darb_veida_id."'");
                if(mysqli_num_rows($find_darb_veids)==1){
                    $darb_veids_info = mysqli_fetch_array($find_darb_veids);
                    $c_nace_kods = $darb_veids_info['NACE_kods'];
                    // $c_nozares_nos = mysqli_real_escape_string($con, $darb_veids_info['Nozares_nos']);
                    $c_nozares_nos = $darb_veids_info['Nozares_nos'];
                }
                $tel_nr_kods = $company_details['Tel_nr_kods'];
                $tel_nr = $company_details['Tel_nr'];
                $epasts = $company_details['Epasts'];
                $mates_uzn_id = $company_details['Mates_uzn_ID'];
                if($mates_uzn_id == 0){
                    $mates_uzn_id_nos = "Nav";
                }else{
                    $mates_uzn_id_nos = $mates_uzn_id;
                }
                $uzn_parole = $company_details['Uzņ_parole'];
                $pieslegts = $company_details['Pieslegts'];
                if($pieslegts==1){
                    $pieslegts_nos='Pieejams sistēmā';
                }else if($pieslegts==0){
                    $pieslegts_nos='Nepieejams sistēmā';
                }
            }
        }
        ?>
        <!--2-->
        <!--3 Forma, kura attēlo uzņēmuma datus un nosūta tos uz failu "a_company_r.php" -->
        <form method="post" action="a_company_r.php" id="a-c-edit-form" class="address-form">
            <fieldset>
                <label for="reg_nr">Reģ. numurs:</label>
                <span><?php echo $reg_nr; ?></span>
            </fieldset>
            <fieldset>
                <label for="nosaukums">Nosaukums:</label>
                <span><?php echo $tf_abr.' "'.$c_name.'" '; ?></span>
            </fieldset>
            <fieldset>
                <label for="jurid_adrese">Juridiskā adrese:</label>
                <span><?php echo $c_pilna_adrese; ?></span>
            </fieldset>
            <fieldset>
                <label for="darb_veids">Darbības veids:</label>
                <span><?php echo $c_nozares_nos." ( ".$c_nace_kods." )"; ?></span>
            </fieldset>
            <fieldset>
                <label for="tel_nr">Telefona numurs:</label>
                <span><?php echo $tel_nr_kods.' '.$tel_nr; ?></span>
            </fieldset>
            <fieldset>
                <label for="epasts">E-pasts:</label>
                <span><?php echo $epasts; ?></span>
            </fieldset>
            <fieldset>
                <label for="mates_uzn">Mātes uzņēmums:</label>
                <span><?php echo $mates_uzn_id_nos; ?></span>
            </fieldset>
            <fieldset>
                <label for="pieslegts">Uzņēmuma statuss:</label>
                <span><?php echo $pieslegts_nos; ?></span>
            </fieldset>
            <fieldset class="hidden">
                <input type="text" id="edit_reg_nr" name="edit_reg_nr" value="<?php echo $reg_nr; ?>">
                <input type="text" id="edit_nosaukums" name="edit_nosaukums" value="<?php echo $c_name; ?>">
                <input type="text" id="edit_ties_forma"name="edit_ties_forma" value="<?php echo $tf_pilns_nos; ?>">
                <input type="text" id="edit_jurid_adrese" name="edit_jurid_adrese" value="<?php echo $c_pilna_adrese; ?>">
                <input type="text" id="edit_darb_veids" name="edit_darb_veids" value="<?php echo $c_nozares_nos; ?>">
                <input type="text" id="edit_tel_nr" name="edit_tel_nr" value="<?php echo $tel_nr; ?>">
                <input type="text" id="edit_epasts" name="edit_epasts" value="<?php echo $epasts; ?>">
                <input type="text" id="edit_mates_uzn" name="edit_mates_uzn" value="<?php echo $mates_uzn_id; ?>">
                <input type="password" id="edit_uzn_parole" name="edit_uzn_parole"  value="<?php echo $uzn_parole; ?>">
                <input type="text" id="uzn_edit" name="uzn_edit" value="jā">
            </fieldset>
            <fieldset class="hidden">
                <input type="text" id="edit_pasta_indekss" name="edit_pasta_indekss" value="<?php echo $c_pasta_indekss; ?>">
                <input type="text" id="edit_novads" name="edit_novads" value="<?php echo $c_novads; ?>">
                <input type="text" id="edit_pilseta" name="edit_pilseta" value="<?php echo $c_pilseta; ?>">
                <input type="text" id="edit_pagasts" name="edit_pagasts" value="<?php echo $c_pagasts; ?>">
                <input type="text" id="edit_ciems" name="edit_ciems" value="<?php echo $c_ciems; ?>">
                <input type="text" id="edit_iela" name="edit_iela" value="<?php echo $c_iela; ?>">
                <input type="text" id="edit_ek_nr" name="edit_ek_nr" value="<?php echo $c_ek_nr; ?>">
                <input type="text" id="edit_dzivoklis" name="edit_dzivoklis" value="<?php echo $c_dzivoklis; ?>">
            </fieldset>
            <a href="a_company_r.php"><button type="submit" name="a-company-info" id="a-company-info" 
            class="a_buttons">Rediģēt</button></a>
        </form>
        <!--3-->
        <a href="a_company_list.php"><button class="a_back">Atpakaļ</button></a>
    </div>
</div>














</body>


<?php require "a_footer.php"; ?>











