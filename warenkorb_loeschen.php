<div>
    <meta charset="utf-8">
    <?php
        //Session starten und DB verbindung holen
        session_start();
        require_once('dbconnect.inc');
        //Session von Angebote holen
        $_SESSION["WarenkorbId"] = $_GET["WarenkorbId"];
        $Id = $_SESSION["WarenkorbId"];
    
    if ($connection->connect_error) { 
        die("Connection failed: " . $connection->connect_error);
    }
        //DB Abfrage
        $stmt = $connection -> prepare('SELECT ProduktName FROM warenkorb WHERE Id = ?');
            $stmt &&
            $stmt -> bind_param("i", $Id) &&
            $stmt -> execute() &&
            $stmt -> store_result() &&
            $stmt -> bind_result($ProduktName) &&
            $stmt -> fetch()
         ?>
    <!--Titel-->
    <h1>Bestellung bearbeiten</h1>
    <br>
    <!--Abfrage an Nutzer-->
    <p>Sind Sie sicher, dass Sie '<?php echo utf8_encode($ProduktName); ?>' aus Ihrem Warenkorb entfernen möchten?</p>
    <br>
    <!--Statement Ausführung bei "Ja"-->
    <!--Abfrage an Nutzer mit einer Verlinkung zurück-->
    <?php
   echo '<a href="./index.php?seite=12&WarenkorbId='.$Id.'&action=delete&Id=$Id">Ja</a>';
        if(($_GET['action'] == 'delete') && isset($_GET['Id'])) { 
            $stmt = $connection->prepare("DELETE FROM warenkorb WHERE Id = ?");
            $stmt->bind_param("i", $_SESSION["WarenkorbId"]);
            $stmt->execute();
     ?>
    <!--Verlinkung zurück auf Übersicht, nach löschung-->
      <script type="text/javascript">location.href = './index.php?seite=10';</script>
    <?php 
        }
    ?>
    <!--Verlinkung zurück, ohne löschen des Datensatzes-->
    <a href='./index.php?seite=10'>Nein</a>

    <!--Verbindung schliessen-->
    <?php
    $stmt->close();
    $connection->close();
    ?>
</div>