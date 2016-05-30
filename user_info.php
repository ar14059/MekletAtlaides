<?php include "base.php"; ?>

<html>
<head>
    
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <title>Webpage</title>
</head>
<body>


<link rel="stylesheet" type="text/css" href="css/registracija.css">

    <section class="body-welcome">
        <header class="main-nav">
            <div class="header-right">
                <a href="index.php"><button id="nav-right-button-back" class="button_nav"></button></a>
                <!-- <button id="nav-right-button-back" class="button_nav"></button> -->
            </div>
        </header>
        <section id="body-content">
        <?php require "address_form.php"; ?>

        <?php
            $ID = $_SESSION['ID'];
            $find_user = mysqli_query($con, "SELECT * FROM lietotajs WHERE ID='".$ID."'");
            if(mysqli_num_rows($find_user)==1){
                $user_details = mysqli_fetch_array($find_user);
                $vards = $user_details['Vards'];
                $uzvards = $user_details['Uzvards'];
                $epasts = $user_details['Epasts'];
                if($_SESSION['Lietotaja_limenis']==0){
                    $adreses_id = $user_details['Adreses_ID'];
                    $find_lietotaja_adrese = mysqli_query($con, "SELECT * FROM lietotaja_adrese WHERE ID='".$adreses_id."'");
                    if(mysqli_num_rows($find_lietotaja_adrese)==1){
                        $adrese_info = mysqli_fetch_array($find_lietotaja_adrese);
                        $adrese = $adrese_info['Pilna_adrese'];
                    }
                }
                if($_SESSION['Lietotaja_limenis']==1){
                    $adreses_id = $user_details['Adreses_ID'];
                    $find_lietotaja_uzn = mysqli_query($con, "SELECT * FROM uznemums_lietotajs WHERE Lietotaja_ID='".$ID."'");
                    if(mysqli_num_rows($find_lietotaja_uzn)==1){
                        $uzn_lietotajs_info = mysqli_fetch_array($find_lietotaja_uzn);
                        $uzn_ID=$uzn_lietotajs_info['Uzn_ID'];
                        $find_uzn = mysqli_query($con, "SELECT * FROM uznemums WHERE ID='".$uzn_ID."'");
                        if(mysqli_num_rows($find_uzn)==1){
                            $uzn_info=mysqli_fetch_array($find_uzn);
                            $uzn_nos = $uzn_info['Nosaukums'];
                            $uzn_ties_f_ID = $uzn_info['Tiesiskās_formas_ID'];
                            $find_ties_f = mysqli_query($con, "SELECT * FROM uzn_tiesiska_forma WHERE ID='".$uzn_ties_f_ID."'");
                            if(mysqli_num_rows($find_ties_f)==1){
                                $uzn_t_f_info=mysqli_fetch_array($find_ties_f);
                                $t_f_abr = $uzn_t_f_info['Abreviatura'];
                            }else{
                                echo "<h1>Nesanāca2</h1>";
                            }
                        }else{
                            echo "<h1>Nesanāca</h1>";
                        }
                    }
                }             
                $limenis = $user_details['Lietotaja_limenis'];
                if($limenis==0){
                    $limenis="Pircējs";
                }else if($limenis==1){
                    $limenis="Publicētājs";
                }
            }else{
                header("location: index.php"); 
            }

        ?>



            <section id="userinfo" class="registracija">
                <div id="userinfo_content">
                    <form name="registerform" id="registerform" class="content">
                        <fieldset>
                            <label>Vards:</label>
                            <span><?php echo $vards; ?></span>
                        </fieldset>
                        <fieldset>
                            <label>Uzvards:</label>
                            <span><?php echo $uzvards; ?></span>
                        </fieldset>
                        <fieldset>
                            <label>E-pasts:</label>
                            <span><?php echo $epasts; ?></span>
                        </fieldset>
                        <?php if($_SESSION['Lietotaja_limenis']==0){  ?>
                        <fieldset>
                            <label>Adrese</label>
                            <span><?php echo $adrese; ?></span>
                        </fieldset>
                        <?php } ?> 
                        <?php if($_SESSION['Lietotaja_limenis']==1){ ?>
                        <fieldset>
                            <label>Uzņ.nosaukums</label>
                            <span><?php echo $t_f_abr.' "'.$uzn_nos.'"'; ?></span>
                        </fieldset>
                        <?php } ?>
                        <fieldset>
                            <label>Grupa:</label>
                            <span><?php echo $limenis; ?></span>
                        </fieldset>


                    </form>

                </div>
            </section>

        </section>
    </section>

<!--1-->



</body>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/javascript.js"></script>


</html>

