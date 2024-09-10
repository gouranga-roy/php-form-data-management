<?php

/**
 * Create a alert for my validation
 * @param $msg
 * @param $type
 */
function createAlert($msg, $type="danger") {
    return "<p class=\"alert alert-{$type} d-flex justify-content-between\" data-bs-dismiss=\"alert\">{$msg}<span class=\"btn-close\"></span></p>";
}

/**
 * Get old value form input
 * @param $filed_val
 */
function oldValue($filed_val){
    return $_POST[$filed_val] ?? '';
}

/**
 * Reset form
 */
function reset_form() {
    return $_POST = [];
}

// Form Required Filed
function checkRequired($filed_name) {
    if( $_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST[$filed_name])){
            return  "<p class=\"text-danger\">required*</p>";
        } else {
            return "";
        }
    }
}

?>