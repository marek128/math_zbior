<div id="main">
  <div id="head">
    <h2>Mat Zbiór - logowanie</h2>
  </div>
  <div id="content">

  <div id="lewa_kolumna">
    <div style="margin-bottom: 10px;"><span class="bold_font">Zaloguj się</span></div>
    <form id="login" action="<?php echo url_for('konta/wykLogowanie')?>" method="post">

      <div class="input_line">
        <div class="caption">Login:</div>
        <input class="input_box" type="text" name="login" value="<?php print $login; ?>"/>
      </div>

      <div class="input_line">
        <div class="caption">Hasło:</div>
        <input class="input_box" type="password" name="haslo"/>
      </div>

      <input type="submit" value="Logowanie" id="logowanie_submit">
    </form>
  </div>
  
  <div id="prawa_kolumna">
<!--     <div style="height: 8ex;"></div> -->
    <div id="komunikat">
      <?php print $logowanie_error; print "<br/><br/>" ?>
      Jeśli nie posiadasz jeszcze konta kliknij link poniżej.<br/><br/>
      <a href="<?php echo url_for('konta/rejestracja')?>">Rejestracja</a>
    </div>
  </div>

  
  </div>  <!--content-->

</div>

