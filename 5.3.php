<?php
$students = [
    "Іванов" => 2007,
    "Петров" => 2002,
    "Яковлєв" => 2008,
    "Шевченко" => 1998,
];

ksort($students);
echo "Сортування за ключами:\n";
print_r($students);

asort($students);
echo "\nСортування без втрачі ключей:\n";
print_r($students);

sort($students);
echo "\nСортування за значенням:\n";
print_r($students);
