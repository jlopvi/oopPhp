<?php

class Person {
  protected $firstName;
  protected $lastName;
  protected $nickName;
  protected $changedNickname = 0;
  protected $birthday;
  public function __construct($firstName, $lastName, $birthday) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->birthday = $birthday;
  }

  public function getFullName() {
    return $this->firstName .' '. $this->lastName;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public  function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function setNickname($nickName) {
    if(strlen($nickName) <= 2){
      throw new Exception("El nickName debe ser mayor a 2 caracteres");

    }
    if($this->changedNickname >= 2){
      throw new Exception(
        "No puedes cambiar el nick mas de 2 veces"
      );
    }
    if (! empty ($nickName)) {
        $this->nickName = $nickName;
        $this->changedNickname++;
    }

  }

  public function getNickname() {
    return strtolower($this->nickName);
  }

  public function getBirthday() {
    return $this->birthday;
  }
  public function getAge() {
    $from = new DateTime($this->birthday);
    $to = new DateTime('today');

    return $from->diff($to)->y;

  }
}

$person1 = new Person('Jesus', 'Lopez','21-11-1992');
$person2 = new Person('Violeta', 'Mejia','15-03-1994');

$person1->setFirstName('Alberto');
$person1->setNickname('JlopVi');




echo "Hola {$person1->getFullName()} @{$person1->getNickname()} naciste en {$person1->getBirthday()} y tiene {$person1->getAge()} anos";
