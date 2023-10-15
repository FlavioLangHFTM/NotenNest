<?php
global $DB_SERVICE;

$items = [];
$category = getUrlParamOrEmptyString('category');

if ($category != '') {
    $items = $DB_SERVICE->getProductsByCategory($category);
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
        <div id="leftBar" class="col">
            <div id="itemFilter" class="card shadow-sm p-2 col">
                <h4 class="text-center">Filter</h4>
                <form class="container gap-2">
                    <div class="row mb-3">
                        <label for="manufacturer">Hersteller:</label>
                        <select name="manufacturer" id="manufacturer">
                            <option value="Fender">Fender</option>
                            <option value="Gibson">Gibson</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <label for="cars">Preis:</label>
                        <select name="price" id="price">
                            <option value="1-10">1CHF - 10CHF</option>
                            <option value="11-20">10CHF - 20CHF</option>
                            <option value="21-40">20CHF - 40CHF</option>
                            <option value="41-100">41CHF - 100CHF</option>
                        </select>
                    </div>

                </form>

            </div>
        </div>
        <div id="middle" class="col-8">
            <?php
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

                                <div class="col items-stretch">
                                    <button
                                        class="ml-10 btn border-1 border border-success hover-shadow w-full">Mieten</button>
                                </div>
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