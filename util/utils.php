<?php
    function getUrlParamOrEmptyString($param) {
        if(isset($_GET[$param])) {
            return $_GET[$param];
        } else {
            return '';
        }
    }
?>