<div id="main">
  <div id="head">
    <h2>Pracka - logowanie</h2>
  </div>
  <div id="content">
  <span class="login1">Zaloguj się:</span>
  <form id="login" action="<?php echo url_for('konta/logowanie')?>" method="post">
    <span class="caption">Login:</span>
    <input type="text" name="login"><br/>
    
    <span class="caption">Hasło:</span>
    <input type="password" name="haslo">
    
    <input type="submit" value="Logowanie">
  </form>

  <div id="rejestracja">
    Jeśli nie posiadasz jeszcze konta kliknij link poniżej.<br/><br/>
    <a href="<?php echo url_for('konta/rejestracja')?>">Rejestracja</a>
  </div>
  
  
  </div>
</div>

