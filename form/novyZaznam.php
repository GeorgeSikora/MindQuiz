<!DOCTYPE html>
<html lang='cs'>
<head>
    <meta charset='utf-8'>
    <title>Osobní dotazník - odesláno</title>
</head>
<body>
    <h1 style="text-align: center">Registrační formulář</h1>
    <?php
    /* V případě že daný argument v postu chybí */
    if (!isset($_POST['jmeno'], $_POST['prijmeni'], $_POST['email'])) die('Stala se chyba při vyplňování!');

    $jmeno      = $_POST['jmeno'];
    $prijmeni   = $_POST['prijmeni'];
    $email      = $_POST['email'];
    $pohlavi    = $_POST['pohlavi'];
    $date       = date("d.m.Y");

    if (isset($_POST['souhlas'])) {
        /* Uložení nového záznamu */
        $file = fopen("registrace.txt", "a") or die("Nelze otevřít soubor s uživateli!");
        fwrite($file, "--------------------------------------\n");
        fwrite($file, "Jméno a příjmení: $jmeno $prijmeni\n");
        fwrite($file, "E.mail: $email\n");
        fwrite($file, "Pohlaví: $pohlavi\n");
        fwrite($file, "--------------------------------------\n");
        fclose($file);
        /* Vypsání nového záznamu */
        echo "Vaše kontaktní údaje byly přidány do systému dne $date<br>";
        echo "================================================================<br><br>";
        echo "Jméno: $jmeno<br>";
        echo "Příjmení: $prijmeni<br>";
        echo "E-mail: $email<br>";
        echo "Pohlaví: $pohlavi<br>";
    } else {
        /* V případě nesouhlasu */
        echo "Nesouhlasil(a) jste se zpracováním údajů, proto jste <b>nebyl(a) zaregistrován(a)</b> do našeho systému!";
    }
    ?>
</body>
</html>