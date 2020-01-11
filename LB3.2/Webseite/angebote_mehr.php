<div>
    <meta charset="utf-8">
    <?php
        //Session starten und DB verbindung holen
        session_start();
        require_once('dbconnect.inc');
        //Session von Angebote holen
        $_SESSION["Produkte_ID"] = $_GET["Produkt"];
        $ID = $_SESSION["Produkte_ID"];
        //DB Verbindung überprüfen
        if ($connection->connect_error) { die("Connection failed: " . $connection->connect_error);}
        //DB Abfrage
        $stmt = $connection -> prepare('SELECT Produkte_ID, Produkte_Name, Produkte_Bestellnr, Produkte_Beschreibung, Produkte_Preis, Produkte_Geloescht,  Produkte_Bildpfad, Kategorien_ID FROM produkte WHERE Produkte_ID = ? LIMIT 1');
       if (
            $stmt &&
            $stmt -> bind_param("s", $ID) &&
            $stmt -> execute() &&
            $stmt -> store_result() &&
            $stmt -> bind_result($ID, $Name, $Bestellnr, $Beschreibung, $Preis, $Geloescht, $Bildpfad, $Kategorien_ID ) &&
            $stmt -> fetch()
        ){
           //Passende Kategorie anzeigen
            $stmt2 = $connection->prepare("SELECT Kategorien_Bezeichnung FROM kategorien WHERE Kategorien_ID=?");
           if(
            $stmt2 &&
            $stmt2->bind_param("i", $Kategorien_ID) &&
            $stmt2 -> execute() &&
            $stmt2 -> store_result() &&
            $stmt2 -> bind_result($Kategorien_Bezeichnung) &&
            $stmt2 -> fetch()
               ){
    ?>
    <!--Titel-->
    <h1>Angebote -
        <?php echo utf8_encode($Kategorien_Bezeichnung); ?> -
        <?php echo utf8_encode($Name); ?>
    </h1>
    <!--Produkte Beschreibung-->
    <?php echo utf8_encode($Beschreibung); ?>
    <br>
    <!--Preis des Produkts-->
    <p>
        CHF <?php echo $Preis; ?>
    </p>
    <!--Bild des Produkts-->
    <img style="float:right; margin-right: 10%; margin-block: -50px; " src="<?php echo $Bildpfad ?>">
    <?php
      }}else {
	echo 'Prepared Statement Error';
       }
    //Array in Session speichern
        $arr= [$ID, $Preis, $Name];
        $_Session['Produkte_ID']=$arr;
        $stmt->close();
        $connection->close();
    ?>
    <!--Warenkorb Icon mit link zum Warenkorb-->
    <?php
        echo '<a href="index.php?seite=1200&Produkt='.$ID .'"><img src="./bilder/warenkorb.bmp"></a>';
    ?>
    <br>
    <br>
    <br>
    <br>
    <!--Zurück zum Hauptmenü-->
    <a href="./index.php?seite=0">Zurück</a>
</div>