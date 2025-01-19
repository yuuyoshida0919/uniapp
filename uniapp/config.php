<?php 

$uri = $_SERVER['REQUEST_URI'];
define('CURRENT_URI', $_SERVER['REQUEST_URI']);
if(preg_match("/(.+(uniapp))/i", CURRENT_URI, $match)) {
    define('BASE_CONTEXT_PATH', $match[0] . '/');
}
define('BASE_IMAGE_PATH', BASE_CONTEXT_PATH . 'images/');
define('BASE_CSS_PATH', BASE_CONTEXT_PATH . 'css/' );
define('SOURCE_BASE', __DIR__ . '/php/');

define('GO_HOME', 'home');
define('GO_REFERER', 'referer');

define('DEBUG', true);


?>