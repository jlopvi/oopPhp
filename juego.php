<?php

function show($message)
{
  echo "<p> $message </p>";
}
abstract class Unit {
  protected $name;
  protected $hp = 40;
  public function __construct($name)
  {
      $this->name = $name;
  }

  public function move($direction)
  {
    show("{$this->name} avanza hacia $direction");
  }

  public function attack(Unit $opponent)
  {
    show("{$this->name} ataca a $opponent");
  }

  public function getName()
  {
    return $this->name;
  }

  public function dies()
  {
    show("{$this->name} a muerto....");
    exit();
  }

  public function getHp()
  {
    return $this->hp;
  }

  public function takeDamage($damage)
  {
    $this->hp = ($this->hp - $this->absorbDamage($damage));
    show("Ahora {$this->name} tiene {$this->hp} puntos de vida");
    if($this->hp <= 0)
    {
      $this->dies();
    }
  }

  protected function absorbDamage($damage)
  {
    return $damage;
  }


}

class Soldier extends Unit {

  protected $damage = 40;
  protected $armor;

  public function __construct($name)
  {
    parent::__construct($name);
  }

  public function setArmor(Armor $armor = null)
  {
    $this->armor = $armor;
  }

  public function attack(Unit $opponent)
  {
    echo "<p>{$this->name} ataca con la espada a {$opponent->getName()}</p>";

    $opponent->takeDamage($this->damage);
  }



  protected function absorbDamage($damage)
  {
    if ($this->armor)
    {
      $damage = $this->armor->absorbDamage($damage);
    }
    return $damage;
  }
}

class Archer extends Unit {
  protected $damage = 20;
  public function attack(Unit $opponent)
  {
    show("{$this->name} lanza flechas a {$opponent->getName()}");

    $opponent->takeDamage($this->damage);
  }

  protected function absorbDamage($damage)
  {
    if(rand(0, 1) == 1)
    {
      if($this->armor)
      {
        $damage = $this->armor->absorbDamage($damage);
      }
      return $damage;
    }else {
      show("{$this->name} ha esquivado el ataque");
    }


  }


}

class Armor
{
  public function absorbDamage($damage)
  {
    return $damage / 2;
  }
}

$armor = new Armor();

$jlopvi = new Soldier('jlopvi');
// $jlopvi->move('el norte');

$jeez = new Archer('jeez');
$jeez->attack($jlopvi);

$jlopvi->setArmor($armor);

$jeez->attack($jlopvi);

$jlopvi->attack($jeez);
 ?>
