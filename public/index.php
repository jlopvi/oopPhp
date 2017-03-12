<?php
namespace Styde;

require '../vendor/autoload.php';
require '../src/helpers.php';

$armor = new Armors\BronceArmor();
$silverA = new Armors\SilverArmor();
$legenA = new Armors\LegendaryArmor();
$scaliburW= new Scalibur();

$jlopvi = new Soldier('jlopvi');
$jlopvi->setArmor($legenA);

$jeez = new Archer('jeez');
$jeez->setArmor($silverA);

$jlopvi->setWeapon($scaliburW);

$jlopvi->attack($jeez);
$jeez->attack($jlopvi);

 ?>
