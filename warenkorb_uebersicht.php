<?php
//Session starten
session_start();

error_reporting(E_ERROR);
?>

<?php
//Datenbankverbindung einbinden
include("dbconnect.inc");


    // Select für den Kategorien Name
    $kundeId = 1;
    $stmt = $connection->prepare("SELECT * FROM warenkorb WHERE KundeId=?");
    $stmt->bind_param("i", $kundeId);
    $stmt->execute();
    $result = $stmt->get_result();


    echo "<h4>Mein Warenkorb</h4>";


    // Tabelle für die Ausgabe wird erstellt
    echo "<table cellspacing='8'>";
    echo "<th>Produkt:</th>";
    echo "<th>Menge:</th>";
    echo "<th>Preis Total:</th>";

    // Die Daten werden in einer Tabelle ausgegeben
    while($rowProdukte = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width: 320px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: left; 
                         padding: 5px;'>" .utf8_encode($rowProdukte["ProduktName"]); "</td>";
        echo "<td style='width: 100px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: left; 
                         padding: 5px;'>" .utf8_encode($rowProdukte["Menge"]); "</td>";
        echo "<td style='width: 100px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: center; 
                         padding: 5px;'> CHF " .utf8_encode($rowProdukte["Preis"]); "</td>";
        echo '<td style="width: 40px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: center;"> <a href="index.php?seite=11&Produkt='.$rowProdukte['Id'] .'"><img src="./bilder/bearbeiten.bmp"></a>';
        echo '<td style="width: 40px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: center"> <a href="index.php?seite=12&WarenkorbId='.$rowProdukte['Id'] .'"><img src="./bilder/loeschen.bmp"></a>';
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";
    echo "<br>";
    echo "<a href='index.php?seite=13&Id=".$kundeId ."'>Bestellung absenden</a>";



//Datenbankverbindung schliessen
mysqli_close($connection);
?>