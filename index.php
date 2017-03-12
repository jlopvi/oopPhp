<?php
namespace Styde;

require 'src/helpers.php';
require 'vendor/Armor.php';

spl_autoload_register(function ($className) {
  if (strpos($className, 'Styde\\') === 0) {

    $className = str_replace('Styde\\', '', $className);

    if (file_exists("src/$className.php")){
      require "src/$className.php";
    }
  }
});

$armor = new BronceArmor();
$silverA = new SilverArmor();
$legenA = new LegendaryArmor();
$scaliburW= new Scalibur();

$jlopvi = new Soldier('jlopvi');
$jlopvi->setArmor($legenA);

$jeez = new Archer('jeez');
$jeez->setArmor($silverA);

$jlopvi->setWeapon($scaliburW);

$jlopvi->attack($jeez);
$jeez->attack($jlopvi);

 ?>
