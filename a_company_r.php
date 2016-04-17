<?php include "base.php"; ?>

<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/a_home.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>



    <title>Webpage</title>
</head>


<body>


<?php
if(!empty($_POST['reg_nr']) && !empty($_POST['nosaukums'])){
    // echo "Preparing to log in";
    $reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
    $nosaukums = mysqli_real_escape_string($con, $_POST['nosaukums']);
    // $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    $checregister = mysqli_query($con ,"SELECT Reģ_nr, Nosaukums FROM uznemums 
        WHERE Reģ_nr = '".$reg_nr."' AND Nosaukums = '".$nosaukums."'");
     
    if(mysqli_num_rows($checregister) == 1)
    {
        echo "<p>Tāds uzņēmums jau eksistē</p>";
    }
    else{
        // $name = mysqli_real_escape_string($con, $_POST['name']);
        // $surname = mysqli_real_escape_string($con, $_POST['surname']);
        // $u_level = 2;
        $reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
        $nosaukums = mysqli_real_escape_string($con, $_POST['nosaukums']);

        $ties_forma = mysqli_real_escape_string($con, $_POST['ties_forma']);
        $tiesforma = mysqli_query($con ,"SELECT ID FROM uzn_tiesiska_forma 
            WHERE Pilns_nosaukums = '".$ties_forma."'");
        if(mysqli_num_rows($tiesforma) == 1){
            $run_ties_forma = mysqli_fetch_array($tiesforma);
            $ties_formas_id = $run_ties_forma['ID'];          
        }

        $jurid_adrese = mysqli_real_escape_string($con, $_POST['jurid_adrese']);

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
        $registercompany = mysqli_query($con, 
            "INSERT INTO uznemums (Reģ_nr, Nosaukums, Tiesiskās_formas_ID, Juridiskā_adrese, Darbības_veida_ID, Tel_nr_kods, Tel_nr, Epasts, Mates_uzn_ID, Uzņ_parole) 
            VALUES('".$reg_nr."', '".$nosaukums."', '".$ties_formas_id."', '".$jurid_adrese."', '".
                $darbveids_id."','+371', '".$tel_nr."', '".$epasts."', '".$mates_uzn_id."', '".$uzn_parole."');");
        if($registercompany)
        {
            echo "<p style='color:red'>Uzņēmums veiksmīgi saglabāts!</p>"; 
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please try again.</p>";    
        } 
    }
}else{
    echo "AIZPILDIET LAUKUS";
}
?>
    <div id="register-wrapper-up" class="wrapper-up">
        <div id="register-wrapper-div" class="register-div">
            <div class="register-div-center">
                <form method="post" action="a_company_r.php" name="admin-form" id="admin-form" class="address-form">
                    <fieldset>
                        <label for="reg_nr">Reģ. numurs:</label>
                        <input type="text" id="reg_nr" class="register-input" name="reg_nr" placeholder="Reģ. numurs">
                    </fieldset>
                    <fieldset>
                        <label for="nosaukums">Nosaukums:</label>
                        <input type="text" id="nosaukums" class="register-input" 
                        name="nosaukums" placeholder="Nosaukums">
                    </fieldset>
                    <fieldset>
                        <label for="ties_forma">Tiesiskā forma:</label>
                        <input type="text" list="t_f_list" id="ties_forma" class="register-input" 
                        name="ties_forma" placeholder="Tiesiskā forma">
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
                    </fieldset>
                    <fieldset>
                        <label for="jurid_adrese">Juridiskā adrese:</label>
                        <input type="text" id="jurid_adrese" class="register-input" 
                        name="jurid_adrese" placeholder="Juridiskā adrese">
                    </fieldset>
                    <fieldset>
                        <label for="darb_veids">Darbības veids:</label>
                        <input type="text" list="d_v_list" id="darb_veids" class="register-input" 
                        name="darb_veids" placeholder="Darbības veids">
                        <datalist id="d_v_list">
                            <?php
                            $list_query = mysqli_query($con, "SELECT * FROM uzn_darbibas_veids");
                            while($run_list = mysqli_fetch_array($list_query)){
                                // $id = $run_list['ID'];
                                $nace_kods = $run_list['NACE_kods'];
                                $nozares_nos = $run_list['Nozares_nos'];
                            ?>
                            <option><?php echo $nozares_nos; ?></option>
                            <?php } ?>
                        </datalist>
                    </fieldset>
                    <fieldset>
                        <label for="tel_nr">Telefona numurs:</label>
                        <input type="text" id="tel_nr" class="register-input" 
                        name="tel_nr" placeholder="Telefona numurs">
                    </fieldset>
                    <fieldset>
                        <label for="epasts">E-pasts:</label>
                        <input type="text" id="epasts" class="register-input" 
                        name="epasts" placeholder="Epasts">
                    </fieldset>
                    <fieldset>
                        <label for="mates_uzn">Mātes uzņēmums:</label>
                        <input type="text" id="mates_uzn" class="register-input" 
                        name="mates_uzn" placeholder="Mates uzņēmums">
                    </fieldset>
                    <fieldset>
                        <label for="uzn_parole">Uzņēmuma parole:</label>
                        <input type="password" id="uzn_parole" class="register-input" 
                        name="uzn_parole" placeholder="Uzņēmuma parole">
                    </fieldset>




<!--                     <fieldset>
                        <label for="email">Epasts:</label>
                        <input type="text" id="email" class="register-input" 
                        name="email" placeholder="E - pasts">
                    </fieldset> -->
<!--                     <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" id="password" class="register-input" 
                        name="password" placeholder="Parole">
                    </fieldset> -->
                    <button type="submit" name="a-submit-register" id="a-submit-register" 
                    class="a_buttons">Reģistrēt</button>
                </form>
                <a href="a_home.php"><button class="a_back">Atpakaļ</button></a>

            </div>
        </div>
    </div>

</body>

</html>
