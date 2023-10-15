<head>
    <link href="/NotenNest/css/categories.css" rel="stylesheet">
</head>

<style>
    body {
        background-image: linear-gradient(0deg, rgba(215, 215, 217, 1) 20%, rgba(217, 215, 216, 0) 100%), url('./img/background3.jpg');
        background-repeat: no-repeat;
    }
</style>
<br>
<h1>Kategorien</h1>
<br>
<div class="col-sm-12" align="justify">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            <a href="<?php echo $BASE_URL . '/instruments/articles?category=Gitarren' ?>" target="_blank">
                <img class="img-fluid" box-shadow=2px src="./img/guitar.jpg">Gitarren</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <a href="<?php echo $BASE_URL . '/instruments/articles?category=Schlagzeuge' ?>" target="_blank">
                <img class="img-fluid" src="./img/drums.jpg">Schlagzeuge</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <a href="<?php echo $BASE_URL . '/instruments/articles?category=Blasinstrumente' ?>" target="_blank">
                <img class="img-fluid" src="./img/trumpet.jpg">Blasinstrumente</a>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            <a href="<?php echo $BASE_URL . '/instruments/articles?category=Tasteninstrumente' ?>" target="_blank">
                <img class="img-fluid" box-shadow=2px src="./img/keyboard.jpg">Tasteninstrumene</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <a href="<?php echo $BASE_URL . '/instruments/articles?category=Eventtechnik' ?>" target="_blank">
                <img class="img-fluid" src="./img/event.jpg">Eventtechnik</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <a href="<?php echo $BASE_URL . '/instruments/articles?category=DJ equipment' ?>" target="_blank">
                <img class="img-fluid" src="./img/dj.jpg">DJ equipment</a>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>