<?php
global $DB_SERVICE;

$id = getUrlParamOrEmptyString('id');
$available = getUrlParamOrEmptyString('available');

if ($id == '' || $available == '') {
    header("Location: " . $BASE_URL);
    die();
}

$DB_SERVICE->setAvailabilityForItem($id, $available);
header("Location: " . $BASE_URL . '/instruments/article?id=' . $id);
die();


?>