<?php
class Util{
	 public static function renderJSONDATA($options) {
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($options['data']);
    }
    
     public static function renderJSON($data) {
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($data);
    }
}