<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Formulář</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="contact" class="contact">
        <!--  onsubmit="return validateForm()" -->
        <form name="form" method="POST">
            <p class="text-header">Máš zájem o práci ?</p><p class="text-subheader">Kontaktuj nás <span class="text-small">(povinné <span class="required">*</span>)</span></p>
            <div class="form-group"><p>Jméno <span class="required">*</span></p><input class="form-control" type="text" name="fname" placeholder="Pavel" required></div>
            <div class="form-group"><p>Příjmení <span class="required">*</span></p><input class="form-control" type="text" name="lname" placeholder="Novák" required></div>
            <div class="form-group"><p>Telefon</p><input class="form-control" type="tel" name="telephone" placeholder="123456789" pattern="[0-9]{9}"></div>
            <div class="form-group"><p>Datum narození <span class="required">*</span></p><input class="form-control" type="date" name="birthday" placeholder="Datum narození" required></div>
            <div class="form-group"><p>Město</p><input class="form-control" type="text" name="residence" placeholder="Praha"></div>
            <div class="form-group">
                <p>Práce</p>
                <select class="form-control" name="job" style="width:30%">
                    <option value="" disabled selected>Vyber pozici</option>
                    <option value="moderator">Moderátor</option>
                    <option value="redaktor">Redaktor</option>
                    <option value="technik">Technik</option>
                </select>
            </div>
            <div class="form-group"><p>Zpráva</p><textarea class="form-control" name="message" placeholder="umím.. pracoval jsem.. zajímam se o.." rows="14"></textarea></div>
            <input type="checkbox" id="knowledge" name="knowledge" value="true">
            <label for="knowledge"> Umím alespoň jeden cizí jazyk</label><br>
            <div class="form-group"><button class=" btn btn-primary" type="submit">POSLAT</button></div>

            <?php

                /* WORK IN PROGRESS */
                if (isset($_POST['fname'], $_POST['lname'], $_POST['telephone'], $_POST['birthday'], $_POST['residence'], $_POST['job'], $_POST['message'])) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $tel = $_POST['telephone'];
                    $birthday = $_POST['birthday'];
                    $residence = $_POST['residence'];
                    $job = $_POST['job'];
                    $message = $_POST['message'];

                    $knowledge = isset($_POST['knowledge']) ? 'true' : 'false';
                
                    saveUser($fname, $lname, $tel, $birthday, $residence, $job, $message, $knowledge);
                }
                
                loadUsers();

                function loadUsers() {
                    $file = fopen("users.txt", "r") or die("Nelze otevřít soubor s uživateli!");
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Jméno</th>';
                    echo '<th>Příjmení</th>';
                    echo '<th>Telefon</th>';
                    echo '<th>Datum narození</th>';
                    echo '<th>Bydliště</th>';
                    echo '<th>Práce</th>';
                    echo '<th>Zpráva</th>';
                    echo '<th>Knowledge</th>';
                    echo '</tr>';

                    while ($user = fgets($file)) {
                        echo '<tr>';
                        $splitted = explode("#", $user);

                        foreach ($splitted as $arg) {
                            echo '<td>'.$arg.'</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                    fclose($file);
                }

                function saveUser($fname, $lname, $tel, $birthday, $residence, $job, $message,$knowledge) {
                    $file = fopen("users.txt", "a") or die("Nelze otevřít soubor s uživateli!");
                    fwrite($file, $fname.'#'.$lname.'#'.$tel.'#'.$birthday.'#'.$residence.'#'.$job.'#'. $message.'#'.$knowledge."\n");
                    fclose($file);
                }

                function logVar($name, $value) {
                    echo $name . ': ' . $value . '<br>';
                }
            ?>

        </form>    
    </div>
</body>
</html>