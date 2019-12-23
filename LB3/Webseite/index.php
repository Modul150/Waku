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
<html>
	<head>
		<title>M150 - Beispielwebshop</title>
		<link type="text/css" rel="stylesheet" href="style1.css"/>
        <meta charset="utf-8">
		<?php
			function ausrichten()
			{
				echo '&nbsp;&nbsp;';
			}

			function einruck_start()
			{
				echo '<table border="0" cellspacing="5" cellpadding="8">';
					echo '<tr>';
						echo '<td>';
			}

			function einruck_stop()
			{
						echo '</td>';
					echo '</tr>';
				echo '</table>';
			}
		?>
	</head>

	<body>
		<div class="standard">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><img src="./bilder/titel_links.jpg"/></td>
					<td>&nbsp;&nbsp;</td>
					<td><img src="./bilder/titel_rechts.jpg"/></td>
				</tr>
				<form name="suche_formular" method="post" action="index.php?seite=20">
					<tr valign="center" height="30">
						<td bgcolor="#FD932B">&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td bgcolor="#8E6FCD" align="right">
								<div style="color:#FFFFFF">SUCHE:
									<input name="suche" type="text" size="20" class="form3a"/>
									<input type="submit" name="submit" value="suche" class="form3b"/>
									&nbsp;
								</div>

						</td>
					</tr>
				</form>
				<tr height="500" valign="top">
					<td bgcolor="#FFBC7A">
						<?php
							//Navigation einbinden
							include("navigation.php");
						?>
					</td>
					<td/>
					<td>
						<div style="font-size:10"><br></div>
						<?php
							//Hauptseite einbinden
							include("hauptseite.php");
						?>
						<br><br>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>

<?php		
	//Datenbankverbindung schliessen
	include("dbconnect.inc");

	if (isset($_SESSION['produktId'])
        && isset($_POST['produktMenge'])
    ) {
	    $bestellung = array($_SESSION['produktId'] => [
	            "menge" => $_POST['produktMenge'],
                "produktPreis" => $_SESSION['produktPreis']
        ]);

	    $_SESSION['totalPreis'] += $_POST['produktMenge'] * $_SESSION['produktPreis'];
	    $_SESSION['bestellung'] .= json_encode($bestellung);

	    unset($_SESSION['produktId']);
    }

	//Pr�fen, ob Benutzer zum ersten Mal auf der Seite ist
	if(!isset($_SESSION['besucher']))
	{
		$sql = 'select * from besucher';
		$result = mysqli_query($connection, $sql);
		$id_max = 0;
		while($row = mysqli_fetch_array($result))
		{
			if($row['Besucher_ID'] > $id_max)
			{
				$id_max = $row['Besucher_ID'];
			}
		}

		$besucher_id = $id_max + 1;
		$zeit = date("Y-m-d H:i:s");

		$sql = 'insert into Besucher(Besucher_ID, Besucher_Zeit) values('.$besucher_id.', "'.$zeit.'")';
		mysqli_query($connection, $sql) or die("Ein Fehler beim Erstellen eines neuen Benutzers ist aufgetreten:<br>".mysqli_error());

//		$sql = 'select * from Warenkoerbe';
//		$result = mysqli_query($connection, $sql);
//		$id_max = 0;
//		while($row = mysqli_fetch_array($result))
//		{
//			if($row['Warenkoerbe_ID'] > $id_max)
//			{
//				$id_max = $row['Warenkoerbe_ID'];
//			}
//		}
//		$warenkoerbe_id = $id_max+1;
//
//		$sql = 'insert into Warenkoerbe(Warenkoerbe_ID, Besucher_ID) values(' . $warenkoerbe_id . ', ' . $besucher_id . ')';
//		mysqli_query($connection, $sql) or die("Ein Fehler beim Erstellen eines neuen Warenkorbes ist aufgetreten:<br>" . mysqli_error());

		$_SESSION['besucher'] = $besucher_id;
	}
	else
	{
		$zeit = date("Y-m-d H:i:s");
		$sql = 'update Besucher set Besucher_Zeit = "' . $zeit . '" where Besucher_ID like ' . $_SESSION['besucher'];
		mysqli_query($connection, $sql) or die("Ein Fehler beim Aktualisieren der Besucher-Zeit ist aufgetreten:<br>".mysqli_error());
	}

	//Logout
	if($_GET[logout]==1)
	{
		$_SESSION['status'] = 0;
		$_SESSION['benutzer'] = 0;
	}
		
	//Datenbankverbindung schliessen
	mysqli_close($connection);	
?>