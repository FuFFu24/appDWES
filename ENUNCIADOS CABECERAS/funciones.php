<?php

function sanearTexto($dato) {
    return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,"utf-8");
}

function validarURL($url) {
    if (!empty($url) && filter_var($url, FILTER_VALIDATE_URL)) {
        return $url;
    } else {
        return 1;
    }
}

?>