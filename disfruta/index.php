<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.fluid.classless.min.css">
  <link rel="stylesheet" href="../style.css">
  <title>Disfruta</title>
</head>

<body>

  <div class="container">
    <h1>Disfruta</h1>

    <?php
    print_fruits();

    function print_fruits()
    {
      // Generación de las frutas.
      $first_fruit = 127815;
      $last_fruit = 127827;
      $number_of_fruits = rand(7, 20);
      $fruits_frequency = [];

      $fruits = "<h2>$number_of_fruits frutas</h2><div style=\"font-size: 7rem\">";

      for ($i = 0; $i < $number_of_fruits; $i++) {
        $random_fruit = rand($first_fruit, $last_fruit);
        $fruits .= "&#$random_fruit;";

        // Guarda la fruta
        if (isset($fruits_frequency[$random_fruit])) {
          $fruits_frequency[$random_fruit]++;
        } else {
          $fruits_frequency[$random_fruit] = 1;
        }
      }

      $fruits .= '</div>';
      echo $fruits;

      // Resultados

      $results = '<h2>Resultados</h2>';

      foreach ($fruits_frequency as $fruit => $frequency) {

        if ($frequency === 1) {
          $results .= "<p>La fruta <span style=\"font-size: 2rem\">&#$fruit;</span> está <strong>$frequency</strong> vez en la lista.</p>";
        } else {
          $results .= "<p>La fruta <span style=\"font-size: 2rem\">&#$fruit;</span> está <strong>$frequency</strong> veces en la lista.</p>";
        }
      }

      echo $results;
    }

    ?>

    <a href=".">Disfruta otra vez</a>
    <div><a href="../">Volver</a></div>
  </div>

</body>

</html>