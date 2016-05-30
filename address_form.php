
<!--1 Papildus reģistrācijas forma, kurā jāievada adreses dati  -->

    <div id="register-wrapper-up" class="wrapper-up hidden">
        <div id="register-wrapper-div" class="register-div hidden">
            <div id="register-div-center" class="register-div-center">
                <button id="wrapper-register-close" class="close"></button>
                <form name="address-form" id="address-form" >
                    <fieldset>
                        <label for="pasta_indekss">Pasta indekss</label>
                        <input type="text" id="pasta_indekss" class="register-input" 
                        name="pasta_indekss" placeholder="Pasta indekss">
                        <p id="pasta_indekss_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="novads">Novads:</label>
                        <input type="text" id="novads" class="register-input" 
                        name="novads" placeholder="Novads" value="">
                        <p id="novads_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="pilseta">Pilsēta:</label>
                        <input type="text" id="pilseta" class="register-input" 
                        name="pilseta" placeholder="Pilsēta">
                        <p id="pilseta_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="pagasts">Pagasts:</label>
                        <input type="text" id="pagasts" class="register-input" 
                        name="pagasts" placeholder="Pagasts">
                        <p id="pagasts_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="ciems">Ciems:</label>
                        <input type="text" id="ciems" class="register-input" 
                        name="ciems" placeholder="Ciems">
                        <p id="ciems_e" class="err_m_register hidden"></p>
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
                        <p id="iela_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="ek_nr">Ēkas nr./Nos:</label>
                        <input type="text" id="ek_nr" class="register-input" 
                        name="ek_nr" placeholder="Ēkas nr./Nos">
                        <p id="ek_nr_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="dzivoklis">Dzīvoklis:</label>
                        <input type="text" id="dzivoklis" class="register-input" 
                        name="dzivoklis" placeholder="Dzīvoklis/korpuss">
                        <p id="dzivoklis_e" class="err_m_register hidden"></p>
                    </fieldset>
                </form>
                <button name="reg-submit-address" id="reg-submit-address" 
                class="reg-submit-address">Saglabāt</button>
            </div>
        </div>
    </div>

<!---->