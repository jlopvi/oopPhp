<?php

function show($message)
{
  echo "<p> $message </p>";
}
abstract class Unit {
  protected $name;
  protected $hp = 40;
  protected $armor;
  protected $weapon;
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
    if($this->weapon)
    {
      $damage = $this->damage * 2;
      show("{$this->name} ataca con {$this->weapon->getName()} a {$opponent->name} cusando un dano de $damage");
    }else{
      $damage = $this->damage;
    }
    $opponent->takeDamage($damage);
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

  public function setWeapon(Weapon $weapon = null)
  {
    $this->weapon = $weapon;
  }

  protected function incrementeAttack($damage)
  {
    if($this->weapon)
    {
      $damage = $this->weapon->incrementeAttack($damage);
      show("Tu poder se ha incrementado a $damage");
    }
    return $damage;
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
<<<<<<< HEAD
=======

  public function attack(Unit $opponent)
  {
    echo "<p>{$this->name} ataca con la espada a {$opponent->getName()}</p>";

    $opponent->takeDamage($this->damage);
  }
>>>>>>> 488d6e8e726cfb15c861ce54454d1756aeb0e000
}

class Archer extends Unit {
  protected $damage = 20;
  protected $armor;
  public function attack(Unit $opponent)
  {
    show("{$this->name} lanza flechas a {$opponent->getName()}");

    $opponent->takeDamage($this->damage);
  }
}

interface Armor
{
  public function absorbDamage($damage);
}

interface Weapon
{
  public function incrementeAttack($damage);
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

class Scalibur implements Weapon
{
  protected $name = 'Scalibur';

  public function incrementeAttack($damage)
  {
    $damage = $damage * 2;
    return $damage;
  }

  public function getName()
  {
    return $this->name;
  }
}

$armor = new BronceArmor();
$silverA = new SilverArmor();
$legenA = new LegendaryArmor();
$scaliburW= new Scalibur();

$jlopvi = new Soldier('jlopvi');
<<<<<<< HEAD
$jlopvi->setArmor($silverA);
$jlopvi->setWeapon($scaliburW);
=======

$jlopvi->setArmor($legenA);
>>>>>>> 488d6e8e726cfb15c861ce54454d1756aeb0e000

$jeez = new Archer('jeez');
$jeez->setArmor($silverA);

$jlopvi->attack($jeez);



 ?>
