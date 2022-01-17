<?php
namespace Mezon\Utils;

/**
 * Class Fs
 *
 * @package Utils
 * @subpackage Fs
 * @author Dodonov A.A.
 * @version v.1.0 (2022/01/17)
 * @copyright Copyright (c) 2022, aeon.su
 */

/**
 * Common utilities
 */
class Fs
{

    /**
     * Method return true is the directory is empty
     *
     * @param string $path
     *            path to the checking directory
     * @return bool true if the directory is empty, false otherwise
     */
    public static function isDirectoryEmpty(string $path): bool
    {
        if (! is_readable($path)) {
            throw (new \Exception('Path "' . $path . '" is not directory', - 1));
        }

        return count(scandir($path)) == 2;
    }
}
