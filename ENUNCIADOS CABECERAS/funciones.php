<?php

function sanear($dato) {
    return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,"utf-8");
}

function validar($url) {
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return $url;
    } else {
        return 1;
    }
}

?>