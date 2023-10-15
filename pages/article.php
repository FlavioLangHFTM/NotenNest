<link href="/NotenNest/css/article.css" rel="stylesheet" />


<?php

global $DB_SERVICE;

$item = null;

$itemId = getUrlParamOrEmptyString('id');

if ($itemId !== '') {
    $item = $DB_SERVICE->getProductById($itemId);
    if ($item == null) {
        header("Location: " . $BASE_URL);
        die();
    }
} else {
    header("Location: " . $BASE_URL);
    die();
}

?>

<div id="pageContainer" class="p-4">
    <div class="row">
        <div class="col-10 offset-1">
            <h1 class="h0">
                <?php echo $item->getName() ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3 offset-1">
            <img src="https://placehold.co/400x400/tomato/cornsilk?text=<?php echo $item->getName() ?>\nPlaceholder"
                alt="Image" width="400" height="400">
        </div>
        <div class="col-7">
            <?php echo $item->getDescription() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5 offset-4">
            <?php
            if ($item->isAvailable()) {
                ?>
                <div class="bg-success border rounded">
                    <p class="text-center text-white font-bold m-0">Verfügbar</p>
                </div>
                <?php
            } else {
                ?>
                <div class="bg-danger border rounded">
                    <p class="text-center text-white font-bold m-0">Nicht Verfügbar</p>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-2">
            <?php echo $item->getPrice() ?>CHF / Tag
            <form action="<?php echo $BASE_URL . '/instruments/rent' ?>">
                <input name="id" type="hidden" id="id" value="<?php echo $item->getId() ?>"/>
                <input name="available" type="hidden" id="available" value="<?php if(!$item->isAvailable()) echo 'true'; else echo 'false' ?>"/>
                <button <?php if(!$item->isAvailable()) echo 'disabled' ?>
                    class="ml-10 btn border-1 border border-success hover-shadow w-full">Mieten</button>
            </form>
        </div>
    </div>
</div>