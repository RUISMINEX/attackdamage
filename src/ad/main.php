<?php


use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Effect;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\level\particle\CriticalParticle;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
      this->getServer()->getLogger()->info("Attack by TheCGaming loaded");
      $this->getServer()->getPluginManager()->registerEvents($this,$this);
}
//increase attack damage
public function e_damage(EntityDamageEvent $event){

  if(!($event instanceof EntityDamageByEntityEvent) or !($event->getDamager() instanceof Player)) return;

  $player = $event->getDamager();

  $player1 = $event->getEntity();

$event->setKnockBack(0.3);

  $block = $player->getLevel()->getBlock($player->subtract(0, 1));

  if($player->speed->y < 0){

    // player is attacking in air





$event->setKnockBack(0.4);



$center = new Vector3($player1->getX(),$player1->getY(),$player1->getZ());



                $radius = 1;



                $count = 3;



                $particle = new CriticalParticle($center);



                for($yaw = 2, $y = $center->y; $y < $center->y + 1; $yaw += (M_PI * 2) / 5, $y += 1 / 4){



  $x = -sin($yaw) + $center->x;



  $z = cos($yaw) + $center->z;



  $particle->setComponents($x, $y, $z);



  $event->getEntity()->getLevel()->addParticle($particle);



   }
                   $group = $this->getServer()->getPluginManager()->getPlugin("PurePerms")->getUserDataMgr()->getGroup($player);

        $groupname = $group->getName();
	$_damage = 1;
	//you may edit group names here
	switch($groupname){
		case "guest": //group 1
		$_damage = $_damage + 3;
		break;
		case "user": //group 2
		$_damage = $_damage + 1.5;
		break;
		case "gamer": //group 3
		$_damage = $_damage + 2;
		break;
		case "member": //group 4
		$_damage = $_damage + 3.5;
		break;
		case "vip": //group 5
		$_damage = $_damage + 2.5;
		break;
          case "membervip": //group 6
    $_damage = $_damage + 3.5;
    break;
	}
    $event->setDamage((int) ($event->getDamage() + $_damage));

  

}