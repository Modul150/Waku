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

    $_SESSION['produktPreis'] = $row['Preis'];

    echo "<form action='index.php' method='post'>";

    echo "<h4>Produkt in den Warenkorb legen</h4>";

    echo "<table cellspacing='8'>";

    echo "<tr>";

    echo "<td>Produktname: </td>";
    echo "<td>" . utf8_encode($row['ProduktName']) . "</td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Preis pro Stück: </td>";
    echo "<td>CHF " . $row['Preis'] . "</td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Menge: </td>";
    echo "<td><input type='number' id='produktMenge1' name='produktMenge1' value='" . $row['Menge'] . "' min='0' max='99' style='width: 4em;' ></td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Preis total: </td>";
    echo "<td id='totalKosten'>CHF 0</td>";

    echo "</tr>";

    echo "</table>";

    echo "<input type='submit' value='in den Warenkorb'>";

    echo "</form>";

    echo "<a href='./index.php?seite=1100&Produkt=" . $row['ProduktId'] . "'>Zurück</a>";

    echo '<script>
            document.getElementById("produktMenge1").onchange = function() {berechnen(' . $row['Preis'] . ')};

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