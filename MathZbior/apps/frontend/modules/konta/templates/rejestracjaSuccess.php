<div id="main">
  <div id="head">
    <h2>Pracka - rejestracja</h2>
  </div>
  <div id="content">

  <div id="form_login">
    <div style="margin-bottom: 10px;"><span class="bold_font">Rejestracja</span></div>
    <form id="login" action="<?php echo url_for('konta/wykRejestracja')?>" method="post">

      <div class="input_line">
        <div class="caption">Login:</div>
        <input class="input_box" type="text" name="login"/>
      </div>

      <div class="input_line">
        <div class="caption">Hasło:</div>
        <input class="input_box" type="password" name="haslo"/>
      </div>

      <div class="input_line">
        <div class="caption">E-mail:</div>
        <input class="input_box" type="text" name="email"/>
      </div>

      <div class="input_line">
        <div class="caption">Imię:</div>
        <input class="input_box" type="text" name="imie"/>
      </div>

      <div class="input_line">
        <div class="caption">Nazwisko:</div>
        <input class="input_box" type="text" name="nazwisko"/>
      </div>

      <input type="submit" value="Rejestruj" id="logowanie_submit">
    </form>
  </div>

  <div class="login_content">
    <div style="height: 8ex;"></div>
    <div id="rejestracja">
      <?php print $reg_error ?>
    </div>
  </div>

  </div>  <!--content-->
</div>

