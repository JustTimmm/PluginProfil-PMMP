<?php

namespace JustTim\PLProfil;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase {
    use SingletonTrait;

    protected function onEnable(): void {
        $this->getLogger()->info("{$this->getDescription()->getName()} ✔️");

        $this::setInstance($this);

        $this->getServer()->getCommandMap()->register("", new PlProfil());
    }
}