<?php

namespace App\Http\Controllers\Frontend\Web;


use App\Events\PostHasBeenRead;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Post;
use App\Services\Alert;
use Illuminate\Http\Request;
use Auth;


class MessagesController extends Controller
{

    public function index(Request $request)
    {
        $messages = Message::whereNotNull('reply_at')
            ->latest()->with('user')->paginate($this->perPage())->appends($request->all());
        return view(THEME_NP . 'message', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nick_name' => ['required', 'string', 'between:2,20'],
            'mail' => ['required', 'string', 'email'],
            'content' => ['required', 'string', 'between:2,500'],
        ]);
        $data['nick_name'] = strip_tags($data['nick_name']);
        $data['content'] = e($data['content']);
        Message::create($data);
        app(Alert::class)->setSuccess('留言成功，等待老师回复！');
        return redirect()->route('frontend.web.messages');
    }

    /**
     * 搜索
     */
    public function search(Request $request)
    {
        $keywords = $request->get('keywords');
        $posts = Post::withSimpleSearch($keywords, ['title', 'excerpt'])
            ->applyFilter(collect(['status' => Post::STATUS_PUBLISH]))
            ->with('user')
            ->paginate($this->perPage())->appends($request->all());
        return view(THEME_NP . 'search.search', ['posts' => $posts, 'keywords' => $keywords]);
    }
}
