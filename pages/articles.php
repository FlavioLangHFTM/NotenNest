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


<div id="pageContainer" class="row p-4 items-stretch h-full">
    <div id="pageHeader" class="row">
        <div class="col-8 offset-2">
            <h1 class="mx-auto h-0"><?php echo $category ?></h1>
        </div>

    </div>
    <div id="pageContent" class="row h-full">
        <div id="leftBar" class="col border border-2 border-success">
            Left
        </div>
        <div id="content" class="col-8 border border-2 border-warning p-2">
                <?php
                foreach ($items as $item) {
                    ?>
                    <div class="itemCard card shadow-sm hover-shadow mb-2 p-2 w-full">
                        <div class="col col-1 border border-2 border-success">
                            <img src="https://placehold.co/250x250/tomato/cornsilk?text=ItemName\nPlaceholder" alt="Image">
                        </div>
                        <div class="col-8">
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