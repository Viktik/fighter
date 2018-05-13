<?php

class Fighter

{
    public $name ='';
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
        echo $this->health . "<br>";
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

function fight(Fighter $fighter1, ImprovedFighter $fighter2, array $point){
    $i = 0;
    while ($fighter1->health and $fighter2->health >0){
        if ($i> count($point)-1)
            $i=0;
        $fighter1->hit($fighter2,$point[$i]);
        $i++;
        if ($i> count($point)-1)
            $i=0;
        $fighter2->hit($fighter1,$point[$i]);
        $i++;
    }
}
fight($fig1,$fig2,[1,2,3]);
