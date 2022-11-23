<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="examen.css"> -->
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.fluid.classless.min.css">
  <link rel="stylesheet" href="../style.css">
  <title>Pares y nones</title>
</head>

<body>
  <div class="container">
    <h1>Pares y nones</h1>

    <?php
    $n1 = rand(0, 5);
    $n2 = rand(0, 5);

    print_game($n1, $n2);

    function print_game(int $n1, int $n2): void
    {
      $total = $n1 + $n2;
      $player_one = $total % 2 === 0 ? 'gana.svg' : 'pierde.svg';
      $player_two = $total % 2 === 0 ? 'pierde.svg' : 'gana.svg';

      echo <<<GAME
        <table>
          <tr>
            <th colspan="2">Jugador 1 (pares)</th>
            <th colspan="2">Jugador 2 (impares)</th>
          </tr>
          <tr>
            <td><img src="img/$player_one" alt="Gana" height="100"></td>
            <td><img src="img/$n1.svg" alt="3" height="200"></td>
            <td><img src="img/$n2.svg" alt="5" height="200"></td>
            <td><img src="img/$player_two" alt="Pierde" height="100"></td>
          </tr>
        </table>
        <a href=".">Nueva partida</a>
      GAME;
    }
    ?>

    <div>
      <a href="../">Volver</a>
    </div>
  </div>
</body>

</html>