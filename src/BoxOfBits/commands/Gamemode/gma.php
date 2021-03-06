<?php

/*
*  ____             ____   __ ____  _ _       
* |  _ \           / __ \ / _|  _ \(_) |      
* | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
* |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
* | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
* |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
* 
* The growing plugin with so many features
*
* @author BoxOfDevs Team
* @link http://boxofdevs.x10host.com/
* 
*/

namespace BoxOfBits\Commands\Gamemode;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\Server;

class gma extends Loader{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "gma")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(TF::DARK_RED."Usage: /gma [playername] - [playername] required when run from console!");
                }else{
                    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
                        if($player->getGamemode() == 2){
							$name = $player->getName();
							$sender->sendMessage(TF::DARK_RED."$name is already in Adventure");
				        }else{
							$player->setGamemode(2);
							$player->sendMessage(TF::GREEN."You are now in Adventure");
							$name = $player->getName();
							$sender->sendMessage(TF::GREEN."$name is now in Adventure");
							$line = "\n";
							$message = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
		          		}else{
				            $sender->sendMessage(TF::DARK_RED."Player not found");
			         	}
                    }
				}
            }elseif($sender instanceof Player){
                if(!isset($args[0])){
				    if($sender->getGamemode() == 2){
				        $sender->sendMessage(TF::DARK_RED."You are already in Adventure");
                    }else{
				        $sender->setGamemode(2);
				        $sender->sendMessage(TF::GREEN."You are now in Adventure");
                        $name = $player->getName();
                        $line = "\n";
                        $message = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("GamemodeChangePopup"));
                        $this->getServer()->broadcastPopup($message);
				    }
				}
                if(isset($args[0])){
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        if($player->getGamemode() == 2){
				            $name = $player->getName();
				            $sender->sendMessage(TF::DARK_RED."$name is already in Adventure");
				        }else{
				            $player->setGamemode(2);
				            $player->sendMessage(TF::GREEN."You are now in Adventure");
				            $name = $player->getName();
				            $sender->sendMessage(TF::GREEN."$name is now in Adventure");
				            $line = "\n";
				            $message = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("GamemodeChangePopup"));
				            $this->getServer()->broadcastPopup($message);
				        }
				    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
				    }				        
				}
            }
        }
        return true;
    }

}

?>
