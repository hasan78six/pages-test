<?php
namespace App\Common;
/**
 * Developed by Hasan Jack.
 * Email: hasanabbas78six@gmail.com
 * Autour: Hasam Jack
 * Date: 3/11/2023
 * Time: 2:13 AM
 */

class Utils
{
    // Setting up class level variable
    private static $slugs = [];


    /**
     * This function is a recursive function to get slugs of parent
     *
     * @param array $array
     * @return array
     */
    public static function getSegments(array $array)
    {
        self::$slugs[] = $array["slug"];

        if (!empty($array["parent"])) {
            return self::getSegments($array["parent"]);
        }

        $output = self::$slugs;

        self::$slugs =[];

        return array_reverse($output);
    }
}
