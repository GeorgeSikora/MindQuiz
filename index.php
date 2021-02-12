<?php
require($_SERVER["DOCUMENT_ROOT"].'/mindquiz/functions.php');
db_connect();

$user = getOrCreateUser();
$wordsCount = getWordsCount();

db_close();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindQuiz</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
    <?php includeHead() ?>
</head>
<body>

<?php/***** REKLAMY *****/?>
<!--
<a href="http://jurek.tech" target="_blank">
<img src="ads/template.png" style="position: fixed; left: 16px; top: 50%; transform: translateY(-50%); height: 95%;">
</a>

<a href="https://spsehavirov.cz" target="_blank">
<img src="ads/spse.png" style="position: fixed; right: 16px; top: 50%; transform: translateY(-50%); height: 95%;">
</a>
-->

<?php/***** KONTENT *****/?>

<div class="center">

    <div class="heading">
        <p>MindQuiz <i class="fas fa-brain"></i> nauč se pomocí daily questů!</p>
        <br>
        <p class="small">Celkem máme <span class="medium"><?php echo $wordsCount ?></span> slovíček k prozkoušení!</p>
    </div>

    <div class="content">
        
        <?php if (isManager()) include('manager/managerView.php') ?>

        <p class="question">Zvol si téma kvízu</p>

        <p class="question">Anglická slova</p>

        <div class="answers">

            <a href="/mindquiz/quiz.php?category=english&level=1">
                <i class="fas fa-lock-open" style="color: #000a;"></i>
                Úroveň 1 <span class="small">(10 otázek)</span>
            </a>
        
            <a class="disabled">
                <i class="fas fa-wrench" style="color: #fffa;"></i>
                Úroveň 2 <span class="small">(10 otázek)</span>
            </a>

            <a class="disabled">
                <i class="fas fa-wrench" style="color: #fffa;"></i>
                Úroveň 3 <span class="small">(10 otázek)</span>
            </a>
            
            
            <a class="disabled">
                <i class="fas fa-lock" style="color: #000a;"></i>
                BOSS <span class="small">(100 otázek)</span>
            </a>
            
            <!--
            <a href="/mindquiz/quiz.php?category=english&level=boss">
                <i class="fas fa-lock-open" style="color: #000a;"></i>
                BOSS <span class="small">(100 otázek)</span>
            </a>
            -->

        </div>

    </div>


    <?php/***** DOLNÍ TEXT *****/?>

    <div class="bottom-text">

        <p class="title">O projektu:</p>

        <p class="content-text">
            Cílem projektu je zjednodušit náuku a procvičování otázek studentů, 
            dovést je ke správným odpovědím a zarýt si dané věci, témata a termíny do paměti efektivním systémem opakování a plnění denních cvičení, 
            které by zabíraly pár sekund, ať už na počítači, notebooku, tabletu, či mobilu. 
            Na algoritmu systému ještě pracuji, zatím jsou ještě kvízy ve fázi klasického procvičování, tudíž neberou ohled na minulé odpovědi, z kterých by čerpaly
            a podle statistik vyhodnocovaly jestli danou věc žák, nebo student ovládá natolik, aby se systém zaobíral opakováním této věci.
        </p>
        
        <p class="signature">
            Sikora 10.2.2021 <a href="https://github.com/GeorgeSikora" target="_blank" style="color: #fff">GitHub</a>
        </p>
    </div>

</div>

</body>
</html>