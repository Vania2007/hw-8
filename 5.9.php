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

$films = [
    "Oppenheimer" => ["Christopher Nolan", 2023, ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr."]],
    "Fast X" => ["Louis Leterrier", 2023, ["Vin Diesel", "Michelle Rodriguez", "Tyrese Gibson", "Chris \"Ludacris\" Bridges"]],
    "The Hunger Games" => ["Gary Ross", 2008, ["Jennifer Lawrence", "Josh Hutcherson", "Liam Hemsworth", "Woody Harrelson"]],
    "The Terminator" => ["James Cameron", 1984, ["Arnold Schwarzenegger", "Michael Biehn", "Linda Hamilton", "Paul Winfield"]],
    "Top Gun: Maverick" => ["Joseph Kosinski", 2022, ["Tom Cruise", "Miles Teller", "Jennifer Connelly", "Jon Hamm"]],
    "Crazy wedding" => ["Vladislav Klymchuk", 2018, ["Назар Задніпровський", "Поліна Василина", "Джиммі Воха-Воха", "Леся Самаєва"]],
];

function print_films($info, $film)
{
    $result = "<div class='card'>
            <h2>$film</h2>
            <p>Автор: $info[0]</p>
            <p>Рік: $info[1]</p>";
    $actors = implode(", ", $info[2]);
    $result .= "<p>Актори: $actors</p>";
    $result .= "</div>\n";
    echo $result;
}

echo "<h1>По назві</h1><br/>";
echo "<div class='container'>";
ksort($films);
array_walk($films, "print_films");
echo "</div>";

function author($a, $b)
{
    return ($a[0] <=> $b[0]);
}

echo "<h1>По автору</h1><br/>";
echo "<div class='container'>";
uasort($films, "author");
array_walk($films, "print_films");
echo "</div>";

function year($a, $b)
{
    return ($a[1] <=> $b[1]);
}

echo "<h1>По року</h1>";
echo "<div class='container'>";
uasort($films, "year");
array_walk($films, "print_films");
echo "</div>";
echo <<<EOD
</body>
</html>
EOD;
