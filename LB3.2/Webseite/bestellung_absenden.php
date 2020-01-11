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
$preisTotal = 0;
$bestellDatum = new DateTime();
$bestellDatum = $bestellDatum->format('Y-m-d H:i:s');
while ($row = $result->fetch_assoc()) {
    $preisTotal += $row['Preis'];
}

$stmt = $connection->prepare("INSERT INTO bestellungen (Kunden_Id,Bestellungen_Preis_Total,Bestellungs_Datum) VALUE (?,?,?)");
$stmt->bind_param("ids",$id, $preisTotal, $bestellDatum );
$stmt->execute();

$stmt = $connection->prepare("SELECT Bestellungen_ID FROM bestellungen WHERE Bestellungs_Datum=?");
$stmt->bind_param("s",$bestellDatum);
$stmt->execute();
$bestellId = 0;
$temp = $stmt->get_result();
$bestellId = $temp->fetch_assoc();
$bestellId = $bestellId['Bestellungen_ID'];

$stmt = $connection->prepare("SELECT * FROM warenkorb WHERE KundeId=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
$id = $row['KundeId'];
$producktId = $row['ProduktId'];
$menge = $row['Menge'];
$preis = $row['Preis'];
    $stmt = $connection->prepare("INSERT INTO bestellungen_positionen (Bestellungen_Id,Produkte_Id,Menge) VALUE (?,?,?)");
    $stmt->bind_param("iii",$bestellId, $producktId, $menge );
    $stmt->execute();

    $wkid = $row['Id'];
    $stmt = $connection->prepare("DELETE FROM warenkorb WHERE Id=?");
    $stmt->bind_param("i", $wkid);
    $stmt->execute();
}


?>
<p>Ihre Bestellung wurde abgesndet</p>