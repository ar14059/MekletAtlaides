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
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{ 
    $_SESSION['activation']='company';
    $activation=$_SESSION['activation'];
    $u_level = $_SESSION['Lietotaja_limenis'];
    if($u_level>=2){
    ?>
        <h3>Welcome, <?php echo $_SESSION['Vards'];?> 
            <?php echo $_SESSION['Uzvards'];?> 
            <?php echo $_SESSION['Lietotaja_limenis'];?></h3>
    <?php      
    }
    else
    {
        header("location: home.php"); 
    }
}else{
    header("location: a_login.php"); 
}
?>




<div id="register-wrapper-up" class="wrapper-up">
    <div id="register-wrapper-div" class="register-div">
        <div class="register-div-center">



	<table>
		

        
<?php
if($_SESSION['Lietotaja_limenis']==3){
?>
    <tr><th>Reģistrācijas numurs</th><th>Uzņēmuma nosaukums</th><th>Statuss</th></tr>
<?php
    $list_query = mysqli_query($con, "SELECT * FROM uznemums
        ORDER BY Nosaukums");
    while($run_list = mysqli_fetch_array($list_query)){
        $c_id = $run_list['ID'];
        $nosaukums = $run_list['Nosaukums'];
        $reg_nr = $run_list['Reģ_nr'];
        $pieslegts = $run_list['Pieslegts'];
?>
<tr><td><?php echo $reg_nr; ?></td><td><?php echo $nosaukums; ?></td><td>
<?php
    if($pieslegts == 1){
        echo "<a href='profile_active.php?c_id=$c_id&pieslegts=$pieslegts&activation=$activation'>Deactivate</a>";
    }else{
        echo "<a href='profile_active.php?c_id=$c_id&pieslegts=$pieslegts&activation=$activation'>Activate</a>";
    }
?>
</td></tr>
<?php
    }
}else if($_SESSION['Lietotaja_limenis']==2){
?>
    <tr><th>Reģistrācijas numurs</th><th>Uzņēmuma nosaukums</th><th>Statuss</th></tr>
<?php
    
    $user_id = $_SESSION['ID'];
    $ownerquery = mysqli_query($con, "SELECT * FROM uznemums_lietotajs 
        WHERE Lietotaja_ID=".$user_id);  
    while($run_list = mysqli_fetch_array($ownerquery)){
        $qwn_c_id = $run_list['Uzn_ID'];
        $list_query = mysqli_query($con, "SELECT * FROM uznemums WHERE ID=".$qwn_c_id); 
        while($run_list = mysqli_fetch_array($list_query)){
            $c_id = $run_list['ID'];
            $nosaukums = $run_list['Nosaukums'];
            $reg_nr = $run_list['Reģ_nr'];
            $pieslegts = $run_list['Pieslegts'];
?>
            <tr><td><?php echo $reg_nr; ?></td><td><?php echo $nosaukums; ?></td><td>
<?php
            if($pieslegts == 1){
                echo "<a href='profile_active.php?c_id=$c_id&pieslegts=$pieslegts&activation=$activation'>Deactivate</a>";
            }else{
                echo "<a href='profile_active.php?c_id=$c_id&pieslegts=$pieslegts&activation=$activation'>Activate</a>";
            }
?>
            </td></tr>
            
<?php
        }
    }
?>
            <tr><td colspan="3" class="no_padding"><button class="add_btn">Pievienot uzņēmumu sarakstam</button></td></tr>
<?php
}
?>
	</table>

    <div class="btn_div"><div class="btn_div_center"><a href="a_home.php">
        <button class="a_buttons">Atpakaļ</button></a></div></div>





        </div>
    </div>
</div>




<!--     }else if($_SESSION['Lietotaja_limenis']==2){
        $user_id = $_SESSION['Lietotaja_limenis'];
        $ownerquery = mysqli_query($con, "SELECT * FROM uznemums_lietotajs WHERE Lietotaja_ID = $user_id 
            ORDER BY Nosaukums"); 
        while($run_company = mysqli_fetch_array($ownerquery)){
            $own_c_id = $run_list['Uzn_ID'];         
            $list_query = mysqli_query($con, "SELECT * FROM uznemums WHERE ID=$own_c_id
                ORDER BY Nosaukums");
        }
    } -->





</body>

</html>







