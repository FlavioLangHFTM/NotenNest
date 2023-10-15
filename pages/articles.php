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

<link href="../css/articles.css" rel="stylesheet" />


<div id="pageContainer" class="row p-4">
    <div id="pageHeader" class="row">
        <div class="col-8 offset-2">
            <h1 class="mx-auto h-0"><?php echo $category ?></h1>
        </div>

    </div>
    <div id="pageContent" class="row">
        <div id="leftBar" class="col p-2">
            <div id="itemFilter" class="card shadow-sm">
                Filter
            </div>
        </div>
        <div id="middle" class="col-8 p-2">
                <?php
                foreach ($items as $item) {
                    ?>
                    <div class="row itemCard card shadow-sm hover-shadow p-2 d-flex flex-row">
                        <div class="col-3 imageContainer">
                            <img src="https://placehold.co/250x250/tomato/cornsilk?text=ItemName\nPlaceholder" alt="Image" width="250" height="250">
                        </div>
                        <div class="col border border-2 border-danger">
                            Content
                        </div>
                    </div>
                    <?php
                }
                ?>
        </div>
        <div id="rightBar" class="col border border-2 border-danger">
            Right
        </div>
    </div>
</div>