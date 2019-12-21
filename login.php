<!-- 
************************************************************************
Aufgabe: wako_start
Sandro Ropelato, 21. September 2006
Luigi Cavuoti, 19. April 2009
************************************************************************
-->

<div class="standard">

<?php

	echo '<form name="login" method="post" action="index.php?seite=3">';
	
	echo '<b>Login</b>';
	echo '<br><div style="font-size:8"><br></div>';
	echo 'Benutzername:<br>';
	echo '<input type="textfield" name="benutzername" class="form1"/><br><div style="font-size:3"><br></div>';
	echo 'Passwort:<br>';
	echo '<input type="password" name="passwort" class="form1"/><br><div style="font-size:8"><br></div>';
	echo '<input type="submit" name="login" value="Login" class="form1"/>';
	
	echo '</form>';
	
	echo '<a href="index.php?seite=2">Registrieren</a>';

?>

</div>