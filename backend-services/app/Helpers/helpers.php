<?php

if (!function_exists('generateStringID')) {

    function generateStringID($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('generateSlug')) {
    function generateSlug($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

if (!function_exists('filterArtistProfile')) {
    function filterArtistProfile($artist, $artistProfile)
    {
        $filteredArtistProfile = [
            'id'            => $artist['id'],
            'username'      => $artist['name'],
            'email'         => $artist['email'],
        ];

        if (isset($artistProfile)) {
            $filteredArtistProfile = array_merge($filteredArtistProfile,  $artistProfile);
            $filteredArtistProfile['user_avatar'] = asset(config('file-upload-paths.profile') . '/' . $filteredArtistProfile['user_avatar']);
            $filteredArtistProfile['cover_image'] = asset(config('file-upload-paths.profile-cover') . '/' . $filteredArtistProfile['cover_image']);
        }
        return $filteredArtistProfile;
    }
}

if (!function_exists('addFullPathToUploadedImage')) {
    function addFullPathToUploadedImage($imagePath, $imageName)
    {
        return asset(config($imagePath).'/'.$imageName);
    }
}