<?php
echo <<<EOD
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Films</title>
    <style>
    body, html{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: #47289d;
    }
      h1{
        display: block;
        text-align: center;
        color: #fdfdfd;
        font-family: Arial;
      }
      .container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
      }

      .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        width: 200px;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
        background: #ddd;
      }

      .card h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
      }

      .card p {
        margin: 5px 0;
      }
    </style>
  </head>
  <body>
EOD;
$students = [
    [
        "name" => "Joan",
        "surname" => "Joanson",
        "year" => 2005,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5,
        ],
    ],
    [
        "name" => "Jack",
        "surname" => "Smith",
        "year" => 2003,
        "marks" => [
            "PHP" => 3,
            "JS" => 3,
            "HTML" => 4,
        ],
    ],
    [
        "name" => "Martin",
        "surname" => "Miller",
        "year" => 2004,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5,
        ],
    ],
    [
        "name" => "Max",
        "surname" => "Lord",
        "year" => 2007,
        "marks" => [
            "PHP" => 2,
            "JS" => 3,
            "HTML" => 5,
        ],
    ],
    [
        "name" => "Angelina",
        "surname" => "Shevchenko",
        "year" => 2000,
        "marks" => [
            "PHP" => 4,
            "JS" => 5,
            "HTML" => 5,
        ],
    ],
    [
        "name" => "Anastasia",
        "surname" => "Kravchuck",
        "year" => 2009,
        "marks" => [
            "PHP" => 5,
            "JS" => 5,
            "HTML" => 5,
        ],
    ],
    [
        "name" => "Vladislav",
        "surname" => "Litvinov",
        "year" => 2007,
        "marks" => [
            "PHP" => 4,
            "JS" => 4,
            "HTML" => 3,
        ],
    ],
    [
        "name" => "Bogdan",
        "surname" => "Yakovlev",
        "year" => 2010,
        "marks" => [
            "PHP" => 4,
            "JS" => 4,
            "HTML" => 5,
        ],
    ],
];
function name($a, $b)
{
    return ($a["name"] <=> $b["name"]);
}
echo "<h1>По імені</h1><br/>";
echo "<div class='container'>";
uasort($students, "name");
array_walk($students, "print_students");
echo "</div>";

function surname($a, $b)
{
    return ($a["surname"] <=> $b["surname"]);
}
echo "<h1>По прізвищу</h1><br/>";
echo "<div class='container'>";
uasort($students, "surname");
array_walk($students, "print_students");
echo "</div>";
function year($a, $b)
{
    return ($a["year"] <=> $b["year"]);
}
echo "<h1>По року народження</h1><br/>";
echo "<div class='container'>";
uasort($students, "year");
array_walk($students, "print_students");
echo "</div>";
function mark($a, $b)
{
    return ($a["marks"]["PHP"] + $a["marks"]["JS"] + $a["marks"]["HTML"] <=> $b["marks"]["PHP"] + $b["marks"]["JS"] + $b["marks"]["HTML"]);
}
function print_students($student)
{
    $average_mark = ($student["marks"]["PHP"] + $student["marks"]["JS"] + $student["marks"]["HTML"]) / 3;
    $result = "<div class='card'>
    <h2>{$student["name"]} {$student["surname"]}</h2>
    <p>Рік народження: {$student["year"]}</p>
    <p>Середній бал: " . round($average_mark, 2) . "</p></div>\n";

    echo $result;
}
echo "<h1>По середньому балу</h1><br/>";
echo "<div class='container'>";
uasort($students, "mark");
array_walk($students, "print_students");
echo "</div>";
$split = array_chunk($students, 4);
echo "<h1>Chunk</h1>";
$counter = 0;
foreach ($split as $group) {
    echo "<h1>Група №$counter</h1><br/>";
    echo "<div class='container'>\n";
    foreach ($group as $student) {
        print_students($student);
    }
    echo "</div><br/><br/>";
    $counter++;
}
echo "</div>";
echo <<<EOD
</body>
</html>
EOD;
