<?php

function show($message)
{
  echo "<p> $message </p>";
}
abstract class Unit {
  protected $name;
  protected $hp = 40;
  protected $armor;
  protected $attackCount = 0;
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

  public function setArmor(Armor $armor = null)
  {
    $this->armor = $armor;
  }

  protected function absorbDamage($damage)
  {
    if($this->armor instanceof LegendaryArmor && $this->attackCount < 2)
    {
      $damage = 0;
      ++$this->attackCount;
      show("{$this->attackCount}");
    } elseif($this->armor)
    {
      $damage = $this->armor->absorbDamage($damage);
    }
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

  public function attack(Unit $opponent)
  {
    echo "<p>{$this->name} ataca con la espada a {$opponent->getName()}</p>";

    $opponent->takeDamage($this->damage);
  }

  // protected function absorbDamage($damage)
  // {
  //   if ($this->armor)
  //   {
  //     $damage = $this->armor->absorbDamage($damage);
  //   }
  //   return $damage;
  // }
}

class Archer extends Unit {
  protected $damage = 20;
  protected $armor;
  public function attack(Unit $opponent)
  {
    show("{$this->name} lanza flechas a {$opponent->getName()}");

    $opponent->takeDamage($this->damage);
  }
  // protected function absorbDamage($damage)
  // {
  //   if(rand(0, 1) == 1)
  //   {
  //     if($this->armor)
  //     {
  //       $damage = $this->armor->absorbDamage($damage);
  //     }
  //     return $damage;
  //   }else {
  //     show("{$this->name} ha esquivado el ataque");
  //   }
  //
  //
  // }


}

interface Armor
{
  public function absorbDamage($damage);
}

class BronceArmor implements Armor
{
  public function absorbDamage($damage)
  {
    return $damage / 2;
  }
}

class SilverArmor implements Armor
{
  public function absorbDamage($damage)
  {
    return $damage / 3;
  }
}

class LegendaryArmor implements Armor
{
  public function absorbDamage($damage)
  {
    return $damage / 5;
  }
}

$armor = new BronceArmor();
$silverA = new SilverArmor();
$legenA = new LegendaryArmor();

$jlopvi = new Soldier('jlopvi');
// $jlopvi->move('el norte');
$jlopvi->setArmor($legenA);

$jeez = new Archer('jeez');
$jeez->setArmor($silverA);

$jeez->attack($jlopvi);
$jeez->attack($jlopvi);

$jlopvi->attack($jeez);
$jeez->attack($jlopvi);
 ?>
