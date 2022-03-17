<?php

use danog\MadelineProto\EventHandler as BaseEventHandler;

class EventHandler extends BaseEventHandler
{
    public function getReportPeers()
    {
        return '@Piagrammist';
    }

    public function onUpdateNewChannelMessage(array $update)
    {
        return $this->onUpdateNewMessage($update);
    }

    public function onUpdateNewMessage(array $update)
    {
        if ($update['message']['_'] !== 'message') {
            return;
        }

        $text = $update['message']['message'] ?? null;
        if ($text === '.ping') {
            yield $this->messages->sendMessage([
                'peer'    => $update,
                'message' => 'PONG',
            ]);
        }
    }
}
