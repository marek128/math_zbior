<div id="main">
  <div id="head">
    <h2>Mat Zbiór - rejestracja</h2>
  </div>
  <div id="content">

  <div id="lewa_kolumna">
    <div style="margin-bottom: 10px;"><span style="font-weight: bold;">Rejestracja</span></div>
    <form id="login" action="<?php echo url_for('konta/wykRejestracja')?>" method="post">

      <div class="input_line">
        <div class="caption">Login:</div>
        <input class="input_box" type="text" name="login" value="<?php print $login; ?>"/>
      </div>

      <div class="input_line">
        <div class="caption">Hasło:</div>
        <input class="input_box" type="password" name="haslo"/>
      </div>

      <div class="input_line">
        <div class="caption">E-mail:</div>
        <input class="input_box" type="text" name="email" value="<?php print $email; ?>"/>
      </div>

      <div class="input_line">
        <div class="caption">Imię:</div>
        <input class="input_box" type="text" name="imie" value="<?php print $imie; ?>"/>
      </div>

      <div class="input_line">
        <div class="caption">Nazwisko:</div>
        <input class="input_box" type="text" name="nazwisko" value="<?php print $nazwisko; ?>"/>
      </div>

      <input type="submit" value="Rejestruj" id="logowanie_submit">
    </form>
  </div>

  <div id="prawa_kolumna">
    <div style="height: 8ex;"></div>
    <div id="komunikat">
      <?php print $reg_error ?>
    </div>
  </div>

  </div>  <!--content-->
</div>

