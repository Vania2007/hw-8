<?php
$countries = [
    [
        "name" => "France",
        "capital" => "Paris",
        "area" => 640679,
        "population" => [
            "2000" => 59278000,
            "2010" => 59278000,
        ],
    ],
    [
        "name" => "England",
        "capital" => "London",
        "area" => 130395,
        "population" => [
            "2000" => 58800000,
            "2010" => 63200000,
        ],
    ],
    [
        "name" => "German",
        "capital" => "Berlin",
        "area" => 357021,
        "population" => [
            "2000" => 82260000,
            "2010" => 81752000,
        ],
    ],
    [
        "name" => "Ukraine",
        "capital" => "Kyiv",
        "area" => 603628,
        "population" => [
            "2000" => 49180000,
            "2010" => 45870000,
        ],
    ],
    [
        "name" => "Canada",
        "capital" => "Ottawa",
        "area" => 9984670,
        "population" => [
            "2000" => 30690000,
            "2010" => 34000000,
        ],
    ],
    [
        "name" => "Respublic of Poland",
        "capital" => "Warsaw",
        "area" => 312696,
        "population" => [
            "2000" => 38260000,
            "2010" => 38040000,
        ],
    ],
];
function name($a, $b)
{
    return ($a["name"] <=> $b["name"]);
}
function capital($a, $b)
{
    return ($a["capital"] <=> $b["capital"]);
}
function area($a, $b)
{
    return ($a["area"] <=> $b["area"]);
}
function average($a, $b)
{
    return ($a["population"]["2000"] + $a["population"]["2010"] <=> $b["population"]["2000"] + $b["population"]["2010"]);
}

function print_country($country, $key_country)
{
    foreach ($country as $key => $value) {
        if (!is_array($value)) {
            echo "$key: $value\t";
        } else {
            echo "$key: ";
            foreach ($value as $k => $v) {
                echo "[{$k} рік. - $v] ";
            }

        }
    }
    echo "Average population: " . array_sum($country['population']) / count($country['population']);
    echo "\n";

}
echo "По назві\n";
uasort($countries, "name");
echo "№  Назва\tСтолиця\t\tПлоща\t\tНаселення\n";
array_walk($countries, "print_country");

echo "\n\nПо столиці\n";
uasort($countries, "capital");
echo "№  Назва\tСтолиця\t\tПлоща\t\tНаселення\n";
array_walk($countries, "print_country");

echo "\n\nПо площі\n";
uasort($countries, "area");
echo "№  Назва\tСтолиця\t\tПлоща\t\tНаселення\n";
array_walk($countries, "print_country");

echo "\n\nПо середньому населенню\n";
uasort($countries, "average");
echo "№  Назва\tСтолиця\t\tПлоща\t\tНаселення\n";
array_walk($countries, "print_country");
