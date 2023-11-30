<?php

namespace JustTim\PLProfil;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class PlProfil extends Command {

    public function __construct() {
        parent::__construct("plugininformation", "Get information about the plugin", "/plugininformation", ["plinfo"]);
        $this->setPermission("pluginprofil.cmd.plinfo");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if (isset($args[0])) {
            $plName = $args[0];
            $pl = Server::getInstance()->getPluginManager()->getPlugin($plName);

            if ($pl !== null) {
                $sender->sendMessage("§6- - - - - - - - - - - - - - - - - -");
                $sender->sendMessage("Name: " . $pl->getDescription()->getName());
                $sender->sendMessage("Description: " . $pl->getDescription()->getDescription());
                $sender->sendMessage("Author: " . implode(", ", $pl->getDescription()->getAuthors()));
                $sender->sendMessage("Version: " . $pl->getDescription()->getVersion());
                $sender->sendMessage("§6- - - - - - - - - - - - - - - - - -");
            } else {
                $sender->sendMessage("Plugin not found");
            }
        } else {
            $sender->sendMessage("§cUsage: /plugininformation <plugin-name>");
        }
    }
}