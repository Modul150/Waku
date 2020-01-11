<?php
//Session starten
session_start();

error_reporting(E_ERROR);
?>
<h4>Bestellung absenden</h4>
<br>
<?php
include("dbconnect.inc");
// Select in die Datenbank um die Produkte nach Kategorie abzurufen
$id = $_GET['Id'];
$stmt = $connection->prepare("SELECT * FROM warenkorb WHERE KundeId=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {

$id = $row['KundeId'];
$preis = $row['Preis'];
    $stmt = $connection->prepare("INSERT INTO bestellungen (Kunden_Id,Bestellungen_Preis_Total) VALUE (?,?)");
    $stmt->bind_param("ii",$id, $preis );
    $stmt->execute();

    $wkid = $row['Id'];
    $stmt = $connection->prepare("DELETE FROM warenkorb WHERE Id=?");
    $stmt->bind_param("i", $wkid);
    $stmt->execute();
}


?>
<p>Ihre Bestellung wurde abgesndet</p>