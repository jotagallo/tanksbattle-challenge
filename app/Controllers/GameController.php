<?php

namespace TanksBattle\Controllers;
use TanksBattle\Entities\Player;
use TanksBattle\Entities\Tank;

class GameController extends BaseController
{
  public function index(): void
  {
    print $this->twig->render('index.html.twig');
  }

  public function prepare(): void
  {
    // Check number of games parameter
    $num = isset($_GET['games']) ? (int) htmlspecialchars($_GET['games']) : 1;
    if ($num === 0) { http_response_code(404); return; }
    // Variables and entities
    $germans = $soviets = $games = [];
    $pe = new Player();
    $players = $pe->getAll();
    $te = new Tank();
    $tanks = $te->getAll();
    // Separate players
    array_walk($players, function($p, $k) use(&$germans, &$soviets){
      if ((bool) $p->german) { $germans[$k] = $p; }
      if ((bool) $p->soviet) { $soviets[$k] = $p; }
    });
    // Random players for each side
    for ($i=1;$i<=$num;$i++) {
      $player1 = $player2 = NULL;
      do {
        $player1 = array_rand($germans);
        $player2 = array_rand($soviets);
      } while ($player1 === $player2);
      $games[] = ['players' => [
        $player1 => $germans[$player1],  
        $player2 =>$soviets[$player2]
      ]];
    }
    print $this->twig->render('prepare.html.twig', ['games' => $games, 'tanks' => $tanks]);
  }

  public function run(): void
  {
    dump($_POST);
    print $this->twig->render('game.html.twig');
  }

  public function api(): void
  {
    print 'API PATH !';
  }
}