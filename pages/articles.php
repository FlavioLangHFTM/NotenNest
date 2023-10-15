<?php
global $DB_SERVICE;
global $BASE_URL;

$items = [];
$category = getUrlParamOrEmptyString('category');
$manufacturerFilter = getUrlParamOrEmptyString('manufacturer');
$priceFilter = getUrlParamOrEmptyString('price');

if ($category != '') {
    $items = $DB_SERVICE->getProductsByCategory($category, $manufacturerFilter, $priceFilter);
    $manufacturers = $DB_SERVICE->getManufacturerForProductCategory($category);
} else {
    header("Location: " . $BASE_URL);
    die();
}
?>

<link href="/NotenNest/css/articles.css" rel="stylesheet" />


<div id="pageContainer" class="row p-4">
    <div id="pageHeader" class="row">
        <div class="col-8 offset-2">
            <h1 class="mx-auto h-0">
                <?php echo $category ?>
            </h1>
        </div>

    </div>
    <div id="pageContent" class="row gap-2">
        <div id="leftBar" class="col" align="center">
            <div id="itemFilter" class="card shadow-sm p-2 col">
                <h4 class="text-center">Filter</h4>
                <form action="<?php echo $BASE_URL . '/instruments/articles' ?>" class="container gap-2">
                    <input name="category" id="category" type="hidden" value="<?php echo $category ?>" />
                    <div class="row mb-3">
                        <label for="manufacturer">Hersteller:</label>
                        <select name="manufacturer" id="manufacturer">
                            <option value="all">alle</option>
                            <?php
                            foreach ($manufacturers as $manufacturer) {
                                ?>
                                <option <?php if ($manufacturer->getId() == $manufacturerFilter)
                                    echo 'selected' ?>
                                        value="<?php echo $manufacturer->getId() ?>">
                                    <?php echo $manufacturer->getName() ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <label for="cars">Preis:</label>
                        <select name="price" id="price">
                            <option value="all">alle</option>
                            <option <?php if ($priceFilter == '1-10')
                                echo 'selected' ?> value="1-10">1CHF - 10CHF
                                </option>
                                <option <?php if ($priceFilter == '11-20')
                                echo 'selected' ?> value="11-20">11CHF - 20CHF
                                </option>
                                <option <?php if ($priceFilter == '21-40')
                                echo 'selected' ?> value="21-40">21CHF - 40CHF
                                </option>
                                <option <?php if ($priceFilter == '41-100')
                                echo 'selected' ?> value="41-100">41CHF - 100CHF
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Filter anwenden</button>
                    </form>

                </div>
            </div>
            <div id="middle" class="col-8">
                <?php

                            if (count($items) < 1) {
                                echo '<p class="text-center font-bold">Keine Produkte gefunden!</p>';
                            }

                            /* @var $item InventoryItem */
                            foreach ($items as $item) {
                                ?>
                <div class="row itemCard card shadow-sm hover-shadow mb-2 p-2 d-flex flex-row">
                    <div class="col-3 imageContainer">
                        <img src="https://placehold.co/250x250/tomato/cornsilk?text=<?php echo $item->getName() ?>\nPlaceholder"
                            alt="Image" width="250" height="250">
                    </div>
                    <div class="col">
                        <div class="container">
                            <div class="row">
                                <div class="col text-start">
                                    <h3 class="text-start">
                                        <?php echo $item->getName() ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="row h-48" style="min-height: 160px;">
                                <div class="col">
                                    <p>
                                        <?php echo $item->getDescription() ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
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

                                <div class="col-6">
                                    <?php echo $item->getPrice() ?>CHF / Tag
                                </div>

                                <?php if ($item->isAvailable()) {
                                    ?>
                                    <div class="col items-stretch">
                                        <a <?php if ($item->isAvailable())
                                            echo 'href="' . $BASE_URL . '/instruments/article?id=' . $item->getId() . '"'; ?>
                                            class="ml-10 btn border-1 border border-success hover-shadow w-full">Mieten</a>
                                    </div>
                                    <?php
                                } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                            ?>
        </div>
        <div id="rightBar" class="col">
            <!-- GOOGLE ADS -->
        </div>
    </div>
</div>