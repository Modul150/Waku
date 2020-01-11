<?php
session_start();

error_reporting(E_ERROR);

include("dbconnect.inc");

if (isset($_GET['Produkt'])) {
    $warenkorbId = $_GET['Produkt'];
    $_SESSION['produktId'] = $warenkorbId;

    // Select für Produkte info
    $stmt = $connection->prepare("SELECT ProduktId, ProduktName, Menge, Preis FROM warenkorb WHERE Id= ?");
    $stmt->bind_param("i", $warenkorbId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $produktName = $row['ProduktName'];
    $menge = $row['Menge'];
    $produktId = $row['ProduktId'];


    $stmt = $connection->prepare("SELECT Produkte_Preis FROM produkte WHERE Produkte_ID = ?");
    $stmt->bind_param("i", $row['ProduktId']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $_SESSION['produktPreis'] = $row['Produkte_Preis'];

    echo "<form action='index.php?seite=10' method='post'>";

    echo "<h4>Produkt in den Warenkorb legen</h4>";

    echo "<table cellspacing='8'>";

    echo "<tr>";

    echo "<td>Produktname: </td>";
    echo "<td>" . utf8_encode($produktName) . "</td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Preis pro Stück: </td>";
    echo "<td>CHF " . $row['Produkte_Preis'] . "</td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Menge: </td>";
    echo "<td><input type='number' id='produktMenge1' name='produktMenge1' value='" . $menge . "' min='1' max='99' style='width: 4em;' ></td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Preis total: </td>";
    echo "<td id='totalKosten'>CHF ". $row['Produkte_Preis'] * $menge ."</td>";

    echo "</tr>";
    
    echo "<tr>";
    
    echo "<td> </td>";
    echo "<td><input type='submit' value='Änderungen Übernehmen'></td>";
    
    echo "</tr>";
    
    echo "</table>";

    echo "</form>";

    echo "<a href='./index.php?seite=1100&Produkt=" . $produktId . "'>Zurück</a>";

    echo '<script>
            document.getElementById("produktMenge1").onchange = function() {berechnen(' . $row['Produkte_Preis'] . ')};

            function berechnen(price) {
                var menge = document.getElementById("produktMenge1");
                var total = document.getElementById("totalKosten");
                
                total.innerText = "CHF " + price * menge.value;
            }
          </script>';
} else {
    echo "<h4>Da ist ein Fehler unterlaufen bitte versuchs noch ein mal.</h4>";
}
//Datenbankverbindung schliessen
mysqli_close($connection);