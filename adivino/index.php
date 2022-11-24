<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.fluid.classless.min.css">
  <link rel="stylesheet" href="../style.css">
  <title>Adivino</title>
</head>

<body>

  <div class="container">
    <h1>Adivina el número</h1>


    <?php

    if (isset($_POST['number'])) {
      $n = $_POST['number'];
      $correct_number = $_POST['random'];

      if (is_numeric($n)) {
        if ($n > 0) {
          if ($n === $correct_number) {
            echo "<p>Has acertado, ¡el número es $correct_number!</p>";
            echo '<a href=".">Vuelve a jugar</a>';
          } else {
            print_form(random_number: $correct_number);

            $error_msg = '';

            if ($n > $correct_number) {
              $error_msg = "$n es demasiado grande";
            } else {
              $error_msg = "$n es demasiado pequeño";
            }

            echo "<p class=\"error\">$error_msg</p>";
          }
        } else {
          print_form(random_number: $correct_number);
          echo "<p class=\"error\">No se ha escrito un número entero positivo.</p>";
        }
      } else {
        print_form(random_number: $correct_number);
        echo "<p class=\"error\">No se ha escrito ningún número.</p>";
      }
    } else {
      print_form(random_number: rand(1, 100));
    }

    function print_form($random_number): void
    {
      echo <<<FORM
          <form method="POST">

            <label>
              Introduce un número entre 1 y 100:
              <input type="number" name="number" id="number" min="1" max="100">
            </label>

            <input type="hidden" name="random" value="$random_number">

            <button>Comprobar número</button>
          </form>
        FORM;
    }
    ?>

    <div><a href="../">Volver</a></div>
  </div>

</body>

</html>