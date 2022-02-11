<?php

namespace DidntPot;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\AnimatePacket;

class EventListener implements Listener
{
    /**
     * @param DataPacketReceiveEvent $ev
     * @return void
     */
    public function onDataPacketReceive(DataPacketReceiveEvent $ev): void
    {
        if ($ev->getPacket()->pid() === AnimatePacket::NETWORK_ID) {
            $ev->getOrigin()->getPlayer()->getServer()->broadcastPackets($ev->getOrigin()->getPlayer()->getViewers(), [$ev->getPacket()]);
            $ev->cancel();
        }
    }
}