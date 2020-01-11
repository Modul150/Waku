<?php
//Session starten
session_start();

error_reporting(E_ERROR);
?>

<?php
//Datenbankverbindung einbinden
include("dbconnect.inc");

// Kategorien werden abgefragt
if(isset($_GET['kategorie'])) {
    $kategorie = $_GET['kategorie'];

    // Select für den Kategorien Name
    $stmt = $connection->prepare("SELECT * FROM kategorien WHERE Kategorien_ID=?");
    $stmt->bind_param("i", $kategorie);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Der ausgelesene Kategorien Name wird in eine Variable gespeichert
    $kategorieName = utf8_encode($row["Kategorien_Bezeichnung"]);
    // Kategorien Name wird ausgegeben
    echo "<h4>Angebote - " .$kategorieName ."</h4>";

    // Select in die Datenbank um die Produkte nach Kategorie abzurufen
    $stmt = $connection->prepare("SELECT * FROM produkte WHERE Kategorien_ID=?");
    $stmt->bind_param("s",$kategorie);
    $stmt->execute();
    $result = $stmt->get_result();

    // Tabelle für die Ausgabe wird erstellt
    echo "<table cellspacing='8'>";

    // Die Daten werden in einer Tabelle ausgegeben
    while($rowProdukte = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width: 320px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: left; 
                         padding: 5px;'>" .utf8_encode($rowProdukte["Produkte_Name"]); "</td>";
        echo "<td style='width: 80px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: center; 
                         padding: 5px;'> CHF " .utf8_encode($rowProdukte["Produkte_Preis"]); "</td>";
        echo '<td style="width: 40px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: center;"> <a href="index.php?seite=1100&Produkt='.$rowProdukte['Produkte_ID'] .'"><img src="./bilder/mehr.bmp"></a>';
        echo '<td style="width: 40px; 
                         height: 45px; 
                         background-color: lightsteelblue; 
                         text-align: center"> <a href="index.php?seite=1200&Produkt='.$rowProdukte['Produkte_ID'] .'"><img src="./bilder/warenkorb.bmp"></a>';
        echo "</tr>";
    }

    echo "</table>";

}
else {
    // Wenn keine Kategorie gewählt wurde
    echo "<h4>Bitte eine Kategorie wählen</h4>";
}
//Datenbankverbindung schliessen
mysqli_close($connection);
?>