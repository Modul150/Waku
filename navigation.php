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
<div class="navigation">

<script type="text/javascript">
		
	Normal1 = new Image();
	Normal1.src = "./bilder/b1a.jpg";    
	Highlight1 = new Image();
	Highlight1.src = "./bilder/b1b.jpg"; 

	Normal2 = new Image();
	Normal2.src = "./bilder/b2a.jpg";    
	Highlight2 = new Image();
	Highlight2.src = "./bilder/b2b.jpg"; 

	Normal3 = new Image();
	Normal3.src = "./bilder/b3a.jpg";    
	Highlight3 = new Image();
	Highlight3.src = "./bilder/b3b.jpg"; 

	/*Normal4 = new Image();
	Normal4.src = "./bilder/b4a.jpg";    
	Highlight4 = new Image();
	Highlight4.src = "./bilder/b4b.jpg"; 

	Normal5 = new Image();
	Normal5.src = "./bilder/b5a.jpg";    
	Highlight5 = new Image();
	Highlight5.src = "./bilder/b5b.jpg";*/

	Normal10 = new Image();
	Normal10.src = "./bilder/b10a.jpg";    
	Highlight10 = new Image();
	Highlight10.src = "./bilder/b10b.jpg"; 

	Normal11 = new Image();
	Normal11.src = "./bilder/b11a.jpg";    
	Highlight11 = new Image();
	Highlight11.src = "./bilder/b11b.jpg"; 


	function changeimage(imagenr,imageobj)
	{
		window.document.images[imagenr+2].src = imageobj.src;
	}

</script>


<?php

	function tabulator($anzahl){
		for($i=0; $i<$anzahl; $i++)
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		}
	}

	//Datenbankverbindung �ffnen
	include("dbconnect.inc");
	
	echo '<table border="0" cellpadding="0" cellspacing="0">';

	//Startseite
	echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
	echo '<tr>';
		echo '<td colspan="4"><a href="index.php?seite=0"';
			echo 'onMouseOver="changeimage(0,Highlight1)"';
			echo 'onMouseOut="changeimage(0,Normal1)">';
			echo '<img src="./bilder/b1a.jpg" border="0" alt="Startseite"/>';
		echo '</a></td>';
	echo '</tr>';


	//Angebote
	echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
	echo '<tr>';
		echo '<td colspan="4"><a href="index.php?seite=1000"';
			echo 'onMouseOver="changeimage(1,Highlight2)"';
			echo 'onMouseOut="changeimage(1,Normal2)">';
			echo '<img src="./bilder/b2a.jpg" border="0" alt="Angebote"/>';
		echo '</a></td>';
	echo '</tr>';
	
	if(isset($_GET['seite'])){
		$seite = $_GET['seite'];
	
		if($seite >= 0 && $seite < 1000)
			$menu[0] = true;
		if($seite >= 1000 && $seite < 2000)
			$menu[1] = true;
		if($seite >= 2000 && $seite < 3000)
			$menu[2] = true;
		if($seite >= 3000 && $seite < 4000)
			$menu[3] = true;
		if($seite >= 4000 && $seite < 5000)
			$menu[4] = true;

		if($seite >= 10000 && $seite < 11000)
			$menu[10] = true;
		if($seite >= 11000 && $seite < 12000)
			$menu[11] = true;
	

		if($menu[1] == true)
		{

			echo '<tr>';
				echo '<td background="./bilder/button_menu.jpg" colspan="4">';
					echo '<div style="font-size:8">&nbsp;</div>';
				echo '</td>';
			echo '</tr>';

			$sql = 'select * from Kategorien order by Kategorien_ID';
			$result = mysqli_query($connection, $sql);
			while($row = mysqli_fetch_array($result))
			{
				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						tabulator(1);
						echo '<a href="index.php?seite=1000&kategorie='.$row['Kategorien_ID'].'">'.utf8_encode($row['Kategorien_Bezeichnung']).'</a>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B">&nbsp;&nbsp;&nbsp;</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						echo '<div style="font-size:5">&nbsp;</div>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B"/>';
				echo '</tr>';
			}

			echo '<tr>';
				echo '<td background="./bilder/button_menu.jpg" colspan="4">';
					echo '<div style="font-size:8">&nbsp;</div>';
				echo '</td>';
			echo '</tr>';
		}


		
		
		if($_SESSION['status']==1)
		{
			if($menu[10]==true)
			{

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						tabulator(1);
						echo '<a href="index.php?seite=10100">Meine Auftr&auml;ge</a>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B">&nbsp;&nbsp;&nbsp;</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';
			}

		}

		if($_SESSION['status']==2)
		{
			//Adminbereich
			echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
			echo '<tr>';
				echo '<td colspan="4"><a href="index.php?seite=11000"';
					echo 'onMouseOver="changeimage(2,Highlight11)"';
					echo 'onMouseOut="changeimage(2,Normal11)">';
					echo '<img src="./bilder/b11a.jpg" border="0" alt="Adminbereich"/>';
				echo '</a></td>';
			echo '</tr>';

			if($menu[11]==true)
			{

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						tabulator(1);
						echo '<a href="index.php?seite=11400">Kunden verwalten</a>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B">&nbsp;&nbsp;&nbsp;</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						tabulator(1);
						echo '<a href="index.php?seite=11100">Produkte verwalten</a>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B">&nbsp;&nbsp;&nbsp;</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						tabulator(1);
						echo '<a href="index.php?seite=11200">Kategorien verwalten</a>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B">&nbsp;&nbsp;&nbsp;</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';

				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="3" align="center">';
						tabulator(1);
						echo '<a href="index.php?seite=11300">Auftr&auml;ge verwalten</a>';
					echo '</td>';
					echo '<td bgcolor="#FECA5B">&nbsp;&nbsp;&nbsp;</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td background="./bilder/button_menu.jpg" colspan="4">';
						echo '<div style="font-size:8">&nbsp;</div>';
					echo '</td>';
				echo '</tr>';
			}


		}
	}


		//Trennlinie
		echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
		echo '<tr>';
			echo '<td colspan="4"><img src="./bilder/linie.jpg"/></td>';
		echo '</tr>';


		//Warenkorb
		echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
		echo '<tr>';
			echo '<td colspan="4" align="center">';
				include("warenkorb.php");
			echo '</td>';
		echo '</tr>';


		//Trennlinie
		echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
		echo '<tr>';
			echo '<td colspan="4"><img src="./bilder/linie.jpg"/></td>';
		echo '</tr>';

		//Login
		echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
		echo '<tr>';
			echo '<td colspan="4" align="center">';
				include("login.php");
			echo '</td>';
		echo '</tr>';

		//Trennlinie
		echo '<tr height="0"><td><div style="font-size:10">&nbsp;</div></td></tr>';
		echo '<tr>';
			echo '<td colspan="4"><img src="./bilder/linie.jpg"/><br>&nbsp;</td>';
		echo '</tr>';

		echo '<tr><td align="center">2006&nbsp;&copy;&nbsp;Sandro Ropelato</td></tr>';

	echo '</table>';
?>
</div>