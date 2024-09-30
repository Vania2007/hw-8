<?php
function merge_dictionaries($dict1, $dict2)
{
    foreach ($dict2 as $key => $value) {
        if (array_key_exists($key, $dict1)) {
            $dict1[$key] = array_merge((array) $dict1[$key], (array) $value);
        } else {
            $dict1[$key] = $value;
        }
    }
    return $dict1;
}

$dict1 = [
    "apple" => "яблуко",
    "key" => "ключ",
    "book" => "книга",
    "table" => "стіл",
];

$dict2 = [
    "pen" => "ручка",
    "table" => "таблиця",
    "key" => "розгадка",
];
$result = merge_dictionaries($dict1, $dict2);
print_r($result);
