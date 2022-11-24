<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.fluid.classless.min.css">
  <link rel="stylesheet" href="../style.css">
  <title>Muestra cartas</title>
</head>

<body>
  <div class="container">
    <h1>Muestra cartas</h1>

    <?php
    if (isset($_POST['number'], $_POST['type'])) {
      if (!empty($_POST['number'])) {
        print_new_hand($_POST['number'], $_POST['type']);
      } else {
        echo "<p>No has enviado ningún número.</p>";
        echo '<a href=".">Volver al formulario.</a>';
      }
    } else {
      print_form();
    }

    function print_form(): void
    {
      echo <<<FORM
      <form method="POST">
        <p>Elige un número de cartas y un palo</p>

        <label>
          Número de cartas:
          <input type="number" name="number" id="number" min="3" max="12" required />
        </label>

        <select name="type">
          <option value="c">Corazones</option>
          <option value="d">Diamantes</option>
          <option value="p">Picas</option>
          <option value="t">Tréboles</option>
        </select>

        <input type="submit" value="Contar" />
        <input type="reset" value="Borrar"/>
      </form>
    FORM;
    }
    function print_new_hand(int $n, string $type): void
    {
      $type_name = ['c' => 'corazones', 'd' => 'diamantes', 'p' => 'picas', 't' => 'tréboles'];
      $result = "<h2>$n cartas de $type_name[$type]</h2><p>";
      $new_cards = [];

      for ($i = 0; $i < $n; $i++) {
        $r = rand(1, 10);
        $new_cards[$i] = $r;
        $result .= "<img src=\"./img/$type$r.svg\" alt=\"$r\" width=\"100\">";
      }

      $result .= '</p>';

      if (are_cards_in_a_row($new_cards)) {
        $result .= '<p>Hay cartas iguales seguidas.</p>';
      }

      echo $result;

      echo '<a href=".">Volver al formulario.</a>';
    }

    function are_cards_in_a_row(array &$cards): bool
    {
      for ($i = 0; $i < count($cards) - 1; $i++) {
        if ($cards[$i] === $cards[$i + 1]) {
          return true;
        }
      }

      return false;
    }
    ?>
    <div>
      <a href="../">Volver</a>
    </div>
  </div>
</body>

</html>