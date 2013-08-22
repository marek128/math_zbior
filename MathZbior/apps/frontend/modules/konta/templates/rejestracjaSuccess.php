<div id="main">
  <div id="head">
    <h2>Pracka - rejestracja</h2>
  </div>
  <div id="content">

	<div id="div_input">
	<form id="login" action="<?php echo url_for('konta/wykRejestracja')?>" method="post">
	<div class="to_left">
		<span class="caption2">Login:</span><br/>
		<span class="caption2">Hasło:</span><br/>
		<span class="caption2">Imię:</span><br/>
		<span class="caption2">Nazwisko:</span><br/>
	</div>
	<div class="to_left">
		<input type="text" name="login">
		<input type="password" name="haslo">
		<input type="text" name="imie">
		<input type="text" name="nazwisko">
	</div>
<div>
		<input type="submit" value="Rejestruj">
		</div>
	</form>
	</div>
  </div>
</div>

