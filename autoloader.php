<?php
/**
 * @package Mezon
 * @subpackage Autoloader
 * @author Dodonov A.A.
 * @version v.1.0 (2019/12/24)
 * @copyright Copyright (c) 2019, aeon.org
 */
spl_autoload_register(function ($Class) {
    $Class = str_replace('Mezon\\', '', $Class);
    $Class[0] = strtolower($Class[0]);

    for ($i = 1; $i < strlen($Class); $i ++) {
        if (ctype_upper($Class[$i])) {
            $Class = substr_replace($Class, '-' . strtolower($Class[$i]), $i, 1);
        }
    }

    $Class = str_replace('\\-', '\\vendor\\', $Class);

    // make sure this is the directory with your classes
    $BaseDir = rtrim(__DIR__, '\\/');
    $ClassName = explode('\\', $Class);
    $ClassName = array_pop($ClassName);

    $File = $BaseDir . '/' . $ClassName . '.php';

    if (file_exists($File)) {
        require ($File);
    }
});
?>