<?php

function uploadImage(string $base64, string $folder): string
{
    $parts = explode(";base64,", $base64);
    $imageType = explode("image/", @$parts[0])[1];
    $imageBase64 = base64_decode($parts[1]);
    $relativePath = '/public/upload/' . $folder . uniqid() . '.' . $imageType;
    $file = APP_ROOT . $relativePath;
    file_put_contents($file, $imageBase64);

    return $relativePath;
}

