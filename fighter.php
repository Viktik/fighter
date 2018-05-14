<?php

class Fighter

{
    public $name;
    public $power;
    public $health;
    function __construct($name, $power, $health)
    {
        $this->name = $name;
        $this->power = $power;
        $this->health = $health;
    }
    function setDamage($damage){
        $this->health = $this->health - $damage;
        echo "HP of " . $this->name . " - ".$this->health ."<br>";
    }
    function hit(Fighter $enemy, $point){
        $damage = $point * $this->power;
        $enemy->setDamage($damage);
    }
}

class ImprovedFighter extends Fighter{
    function doubleHit(Fighter $enemy, $point){
        $point = $point*2;
        parent::hit($enemy, $point);
    }
}

$fig1 = new Fighter("Bob", 2, 1000);
$fig2 = new ImprovedFighter("Bill", 1, 500);

function fight(Fighter $fighter1, Fighter $fighter2, array $point){
    $i = 0;
    while ($fighter1->health and $fighter2->health >0){
        $i = Hitter($i,$point,$fighter1,$fighter2);
        $i = Hitter($i,$point,$fighter2,$fighter1);
    }
    echo "One of the fighters is dead";
}

function Hitter($i, array $point,Fighter $fighter1,Fighter $fighter2){
    if ($i> count($point)-1) {
        $i = 0;
    }
    $fighter1->hit($fighter2,$point[$i]);
    $i++;
    return $i;
}
fight($fig1,$fig2,[6,2,3,1,25]);
