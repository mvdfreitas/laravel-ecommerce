<?php

namespace App\Helpers;

class Slug
{
    public static function makeSlug($value)
    {
        $slug = trim($value); // trim the string
        $slug = preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
        $slug = str_replace(' ','-', $slug); // replace spaces by dashes
        $slug = strtolower($slug);  // make it lowercase
        return $slug;
    }
}
