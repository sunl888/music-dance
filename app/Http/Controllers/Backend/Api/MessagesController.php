<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\ApiController;
use App\Models\Message;
use App\Transformers\Backend\MessageTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessagesController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Message::query();
        if ($request->has('has_been_reply'))
            $query->whereNotNull('reply_at');
        elseif ($request->has('no_reply')) {
            $query->whereNull('reply_at');
        }
        $messages = $query->latest()->paginate($this->perPage());
        return $this->response()->paginator($messages, new MessageTransformer());
    }

    public function show(Message $message)
    {
        return $this->response()->item($message, new MessageTransformer());
    }

    public function replay(Message $message, Request $request)
    {
        $data = $this->validate($request, [
            'reply' => ['required', 'string', 'min:1', 'max:500'],
        ]);
        $message->reply = e($data['reply']);
        $message->reply_at = Carbon::now();
        $message->save();
        return $this->response()->noContent();
    }
}
