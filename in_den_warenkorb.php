<?php
session_start();

error_reporting(E_ERROR);

include("dbconnect.inc");

if (isset($_GET['Produkt'])) {
    $produktId = $_GET['Produkt'];

    // Select für Produkte info
    $stmt = $connection->prepare("SELECT Produkte_Name, Produkte_Preis FROM produkte WHERE Produkte_ID = ?");
    $stmt->bind_param("i", $produktId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $_SESSION['produktId'] = $produktId;
    $_SESSION['produktPreis'] = $row['Produkte_Preis'];

    echo "<form action='index.php' method='post'>";

    echo "<h4>Produkt in den Warenkorb legen</h4>";

    echo "<table cellspacing='8'>";

    echo "<tr>";

    echo "<td>Produktname: </td>";
    echo "<td>" . utf8_encode($row['Produkte_Name']) . "</td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Preis pro Stück: </td>";
    echo "<td>CHF " . $row['Produkte_Preis'] . "</td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Menge: </td>";
    echo "<td><input type='number' id='produktMenge' name='produktMenge' min='0' max='99' style='width: 4em;' ></td>";

    echo "</tr>";

    echo "<tr>";

    echo "<td>Preis total: </td>";
    echo "<td id='totalKosten'>CHF 0</td>";

    echo "</tr>";

    echo "</table>";

    echo "<input type='submit' value='in den Warenkorb'>";

    echo "</form>";

    echo '<script>
            document.getElementById("produktMenge").onchange = function() {berechnen(' . $row['Produkte_Preis'] . ')};

            function berechnen(price) {
                var menge = document.getElementById("produktMenge");
                var total = document.getElementById("totalKosten");
                
                total.innerText = "CHF " + price * menge.value;
            }
          </script>';
} else {
    echo "<h4>Da ist ein Fehler unterlaufen bitte versuchs noch ein mal.</h4>";
}
//Datenbankverbindung schliessen
mysqli_close($connection);
