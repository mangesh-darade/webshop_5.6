<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function replace_placeholders($template, $data) {
    foreach ($data as $placeholder => $value) {
        $placeholder_with_brackets = "{#" . $placeholder . "#}";
        $template = str_replace($placeholder_with_brackets, $value, $template);
    }
    return $template;
}
?>
