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

<b>Warenkorb</b>
<br><br>

	<?php
		include('dbconnect.inc');

		if(isset($_SESSION['besucher'])){
			$besucher = $_SESSION['besucher'];

			$sql = 'select * from warenkorb where KundeId = 1';
			$result = mysqli_query($connection, $sql);
			while($row = mysqli_fetch_array($result))
			{
				$warenkorb = $row['Id'];
			}


			if($warenkorb>0)
			{
				$produkte = 0;
				$sql = 'select * from warenkorb where KundeId = 1';
				$result = mysqli_query($connection, $sql);
				while($row = mysqli_fetch_array($result))
				{
					$produkte++;
				}
			}

			echo '<table border="0" cellspacing="0" cellpadding="0"><tr><td width="200" align="center">';
			if($produkte==0)
			{
				echo 'Es befinden sich<br>keine Bestellungen<br>in Ihren Warenkorb.';
			}
			elseif($produkte==1)
			{
				echo 'Es befindet sich<br>1 Bestellung<br>in Ihren Warenkorb.';
			}
			else
			{
				echo 'Es befinden sich<br>' . $produkte . ' Bestellungen<br>in Ihrem Warenkorb.';
			}

			if($produkte > 0)
			{
				echo '<div style="font-size:10"><br></div>';
				echo '<a href="index.php?seite=10">zur &Uuml;bersicht</a>';
			}

			echo '</td></tr></table>';
		}	
	?>
</div>