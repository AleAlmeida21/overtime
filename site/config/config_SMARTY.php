<?php

/*
 * CONFIG SMARTY  
 */


define('TEMPLATE_DIR', FS_PATH.'templates/');
define('COMPILER_DIR', FS_PATH.'tmp/templates_c/');
define('CONFIG_DIR', FS_PATH.'tmp/configs/');
define('CACHE_DIR', FS_PATH.'tmp/cache/');

require_once(FS_PATH.'includes/libs/Smarty.class.php');
?>