<?php

namespace HuHoBot\events;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\lang\Translatable;
use pocketmine\utils\Terminal;
use pocketmine\utils\TextFormat;
use function explode;
use function str_replace;
use function trim;

class RunCommandSender extends ConsoleCommandSender{

	public string $result = "";

	public function getResult() : string{
		return $this->result;
	}

	public function sendMessage(Translatable|string $message) : void{
		if($message instanceof Translatable){
			$message = $this->getLanguage()->translate($message);
		}

		foreach(explode("\n", trim($message)) as $line){
			$line = str_replace('qq.com', '[违禁词]', $line);
			$this->result .= TextFormat::clean($line)."\n";
		}
	}

	public function getName() : string{
		return "HuHo bot";
	}
}