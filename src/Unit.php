<?php

namespace Styde;

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
