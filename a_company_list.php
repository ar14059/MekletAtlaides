<?php require "a_header.php"; ?>




    <div id="register-wrapper-div" class="register-div">
        <div class="register-div-center">
        <h3><?php echo $greeting_text; ?></h3>


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
    if(mysqli_num_rows($ownerquery) > 0){
        while($run_list = mysqli_fetch_array($ownerquery)){
            $own_c_id = $run_list['Uzn_ID'];
            $list_query = mysqli_query($con, "SELECT * FROM uznemums WHERE ID=".$own_c_id); 
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
    }else{
?>
        <tr><td colspan="3" class="td-center">Jūs neesat reģistrēts ne pie viena uzņēmuma</td></tr>
<?php
    }
?>
            <tr><td colspan="3" class="no_padding">
                <button class="add_btn flip 1" flip-id="1">Pievienot uzņēmumu sarakstam</button>
                <div class="panel 1" panel-id="1">
                    <section class="address-form">
                        <fieldset>
                            <label for="reg_nr">Reģ. numurs:</label>
                            <input type="text" id="reg_nr" class="register-input" name="reg_nr" placeholder="Reģ. numurs">
                        </fieldset>
                        <fieldset>
                            <label for="uzn_parole">Uzņēmuma parole:</label>
                            <input type="password" id="uzn_parole" class="register-input" 
                            name="uzn_parole" placeholder="Uzņēmuma parole">
                        </fieldset>
                        <button name="a-submit-register" id="a-append-company" 
                        class="a_buttons" onclick="window.location.reload();">Pievienot</button>
                    </section>
                </div>
            </td></tr>
<?php

}
?>
	</table>


<!--         <h3>The Cruff Bucket</h3>
        Enter the food you would like to order!
        <input type="text" id="userInput">
        <div id="underInput"></div> -->

    <div class="btn_div"><div class="btn_div_center"><a href="a_home.php">
        <button class="a_buttons">Atpakaļ</button></a></div></div>
        </div>
    </div>










</body>


<?php require "a_footer.php"; ?>











