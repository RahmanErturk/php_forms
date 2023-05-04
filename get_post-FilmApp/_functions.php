<?php

function addFilm(&$films, string $name, string $description, string $time = "0", string $likes = "0") {
    $new_item[count($films)] = [
        "name" => $name,
        "description" => $description,
        "time" => $time,
        "likes" => $likes
    ];

    $films = array_merge($films, $new_item);
    return $films;
}

?>