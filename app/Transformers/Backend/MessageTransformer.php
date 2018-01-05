<?php

namespace App\Transformers\Backend;

use App\Models\Message;
use League\Fractal\TransformerAbstract;

class MessageTransformer extends TransformerAbstract
{
    public function transform(Message $message)
    {
        return [
            'id' => $message->id,
            'mail' => $message->mail,
            'nick_name' => $message->nick_name,
            'content' => $message->content,
            'reply' => $message->reply,
            'user_id' => $message->user_id,
            'created_at' => $message->created_at->toDateTimeString(),
            'updated_at' => $message->updated_at->toDateTimeString()
        ];
    }
}
