<div id="main">
  <div id="head">
    <h2>Pracka - logowanie</h2>
  </div>
  <div id="content">

  <div id="form_login">
    <div style="margin-bottom: 10px;"><span class="bold_font">Zaloguj się</span></div>
    <form id="login" action="<?php echo url_for('konta/wykLogowanie')?>" method="post">

      <div class="input_line">
        <div class="caption">Login:</div>
        <input class="input_box" type="text" name="login"/>
      </div>

      <div class="input_line">
        <div class="caption">Hasło:</div>
        <input class="input_box" type="password" name="haslo"/>
      </div>

      <input type="submit" value="Logowanie" id="logowanie_submit">
    </form>
  </div>
  
  <div class="login_content">
    <div style="height: 8ex;"></div>
    <div id="rejestracja">
      Jeśli nie posiadasz jeszcze konta kliknij link poniżej.<br/><br/>
      <a href="<?php echo url_for('konta/rejestracja')?>">Rejestracja</a>
    </div>
  </div>

  
  </div>  <!--content-->

</div>

