<?php
	//Session starten
	session_start();
	
	error_reporting(E_ERROR);
?>
<!--
************************************************************************
Aufgabe: wako_start
v. 1.0 Sandro Ropelato, 21. September 2006
v. 1.1 Luigi Cavuoti, 19. April 2009
v. 1.2 Andrea Casauro, 1. Juni 2018
************************************************************************
-->
<div class="standard">

	<?php

		if(isset($_GET['seite'])){
			$seite = $_GET[seite];
			switch ($seite) {
				case 0:
					include("startseite.php");        
					break;
				case 1000:
					include("angebote.php");
					break;
				case 1100:
					include("angebote_mehr.php");
				
					break;
				case 1200:
					include("in_den_warenkorb.php");
				
					break;
				case 10:
					print ("Aufgabe 4: Hier die Warenkorb-�bersicht anzeigen!");
					include("warenkorb_uebersicht.php");
					break;
				case 11:
					print("Aufgabe 5: Hier die Warenkorb Bearbeitung realisieren!");
					include("warenkorb_bearbeiten.php");
				
					break;
				case 12:
					print("Aufgabe 6: Hier Produkte im Warenkorb loeschen realisieren");
				
					include("warenkorb_loeschen.php");
				
					break;
				case 13:
					print("Aufgabe 7: Hier Bestellung - absenden realisieren!");
					include("bestellung_absenden.php");
				
					break;
				case 2:
					print ("Aufgabe 8: Hier Benutzer registrieren!");
					include("registrieren.php");
					break;			
				case 3:
					print ("Aufgabe 9: Hier Benutzer anmelden (login.php erweitern)!");
					include("login.php");
					break;
				case 1:
					print ("Aufgabe 10: Hier Benutzer abmelden (logout)!");
					include("logout.php");
					break;
				case 20:
					print("Aufgabe 11: Hier Suchresultate anzeigen!");
					include("suche_resultate.php");
					break;
			}
		} else {
            include("startseite.php");
        }
	?>
</div>
