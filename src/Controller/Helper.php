<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 22/03/2018
 * Time: 20:25
 */

namespace App\Controller;

Trait Helper
{
    /**
     * Permet de générer un Slug à partir d'un String
     * @param $text
     * @return String Slug
     *
     */
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}