<!DOCTYPE html>
<html lang='cs'>
<head>
    <meta charset='utf-8'>
    <title>Osobní dotazník - formulář</title>
</head>
<body>
    <h1 style="text-align: center">Registrační formulář</h1>
    <form method="POST" action="novyZaznam.php">
        <fieldset>
            <legend><b>Osobní údaje:</b></legend>
            <table>
                <tr>
                    <td>Jméno*:</td>
                    <td><input type="text" name="jmeno" recquired placeholder="jmeno"></td>
                </tr>
                <tr>
                    <td>Příjmení*:</td>
                    <td><input type="text" name="prijmeni" recquired placeholder="prijmeni"></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type=email" name="email" recquired placeholder="@"></td>
                </tr>
                <tr>
                    <td>Pohlaví:</td>
                    <td>
                        <input type="radio" id="muz" name="pohlavi" value="muž" checked="checked">
                        <label for="muz">Muž</label>
                        <input type="radio" id="zena" name="pohlavi" value="žena">
                        <label for="zena">Žena</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="souhlas">Souhlasím se zpracováním osobních údajů</label>
                        <input type="checkbox" id="souhlas" name="souhlas" value="Bike">
                    </td>
                </tr>
                <tr><td><div style="height: 24px"></div></td></tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" name="reset" value="Vymazat" style="margin-right: 24px;">
                        <input type="submit" name="submit" value="Odeslat">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
