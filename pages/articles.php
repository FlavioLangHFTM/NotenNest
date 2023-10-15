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
            <div id="itemFilter" class="card shadow-sm">
                Filter
            </div>
        </div>
        <div id="middle" class="col-8">
            <?php
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
                                <div class="col">
                                    
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