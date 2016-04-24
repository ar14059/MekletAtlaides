<!-- Papildus reģistrācijas forma, kurā jāievada adreses dati  -->
<!--___________________________________________________________-->
    <div id="register-wrapper-up" class="wrapper-up hidden">
        <div id="register-wrapper-div" class="register-div hidden">
            <div class="register-div-center">
<!--                 <button class="star_fill"></button> -->
                <button id="wrapper-register-close" class="close"></button>
                <form name="address-form" id="address-form" >
                <?php
                if($_SERVER['SCRIPT_NAME']=='/MekletAtlaides/registracija.php'){
                ?>
                    <fieldset>
                        <label for="pasta_indekss">Pasta indekss</label>
                        <input type="text" id="pasta_indekss" class="register-input" 
                        name="pasta_indekss" placeholder="Pasta indekss">
                    </fieldset>
                    <fieldset>
                        <label for="novads">Novads:</label>
                        <input type="text" id="novads" class="register-input" 
                        name="novads" placeholder="Novads" 
                        value="">
                    </fieldset>
                    <fieldset>
                        <label for="pilseta">Pilsēta:</label>
                        <input type="text" id="pilseta" class="register-input" 
                        name="pilseta" placeholder="Pilsēta">
                    </fieldset>
                    <fieldset>
                        <label for="pagasts">Pagasts:</label>
                        <input type="text" id="pagasts" class="register-input" 
                        name="pagasts" placeholder="Pagasts">
                    </fieldset>
                    <fieldset>
                        <label for="ciems">Ciems:</label>
                        <input type="text" id="ciems" class="register-input" 
                        name="ciems" placeholder="Ciems">
                    </fieldset>
                    <fieldset>
                        <label for="iela">Iela:</label>
                        <input type="text" id="iela" class="register-input" 
                        name="iela" placeholder="Iela">
                        <select id="iela_abr">
                            <option value=""></option>
                        <?php
                        $address_abr = mysqli_query($con, "SELECT * FROM ielas_abr");
                        while($address_abr_run = mysqli_fetch_array($address_abr)){
                            $abr_nos = $address_abr_run['Nosaukums'];
                        ?>
                            <option value="<?php echo $abr_nos ?>"><?php echo $abr_nos ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="ek_nr">Ēkas nr./Nos, korpuss:</label>
                        <input type="text" id="ek_nr" class="register-input" 
                        name="ek_nr" placeholder="Ēkas nr./Nos, korpuss">
                    </fieldset>
                    <fieldset>
                        <label for="dzivoklis">Telpu grupa (dzīvoklis):</label>
                        <input type="text" id="dzivoklis" class="register-input" 
                        name="dzivoklis" placeholder="Telpu grupa (dzīvoklis)">
                    </fieldset>
                <?php
                }else if($_SERVER['SCRIPT_NAME']=='/MekletAtlaides/a_company_r.php'){
                ?>
                    <fieldset>
                        <label for="pasta_indekss_a">Pasta indekss</label>
                        <input type="text" id="pasta_indekss_a" class="register-input" 
                        name="pasta_indekss_a" placeholder="Pasta indekss">
                    </fieldset>
                    <fieldset>
                        <label for="novads_a">Novads:</label>
                        <input type="text" id="novads_a" class="register-input" 
                        name="novads_a" placeholder="Novads" 
                        value="">
                    </fieldset>
                    <fieldset>
                        <label for="pilseta_a">Pilsēta:</label>
                        <input type="text" id="pilseta_a" class="register-input" 
                        name="pilseta_a" placeholder="Pilsēta">
                    </fieldset>
                    <fieldset>
                        <label for="pagasts_a">Pagasts:</label>
                        <input type="text" id="pagasts_a" class="register-input" 
                        name="pagasts_a" placeholder="Pagasts">
                    </fieldset>
                    <fieldset>
                        <label for="ciems_a">Ciems:</label>
                        <input type="text" id="ciems_a" class="register-input" 
                        name="ciems_a" placeholder="Ciems">
                    </fieldset>
                    <fieldset>
                        <label for="iela_a">Iela:</label>
                        <input type="text" id="iela_a" class="register-input" 
                        name="iela_a" placeholder="Iela">
                        <select id="iela_abr_a">
                            <option value=""></option>
                        <?php
                        $address_abr = mysqli_query($con, "SELECT * FROM ielas_abr");
                        while($address_abr_run = mysqli_fetch_array($address_abr)){
                            $abr_nos = $address_abr_run['Nosaukums'];
                        ?>
                            <option value="<?php echo $abr_nos ?>"><?php echo $abr_nos ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="ek_nr_a">Ēkas nr./Nos, korpuss:</label>
                        <input type="text" id="ek_nr_a" class="register-input" 
                        name="ek_nr_a" placeholder="Ēkas nr./Nos, korpuss">
                    </fieldset>
                    <fieldset>
                        <label for="dzivoklis_a">Telpu grupa (dzīvoklis):</label>
                        <input type="text" id="dzivoklis_a" class="register-input" 
                        name="dzivoklis_a" placeholder="Telpu grupa (dzīvoklis)">
                    </fieldset>
                <?php
                }
                ?>
                </form>
                <button name="reg-submit-address" id="reg-submit-address" 
                class="reg-submit-address">Saglabāt</button>
            </div>
        </div>
    </div>