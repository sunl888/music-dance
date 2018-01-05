@extends(THEME_NP.'layouts.app')
@section('title'){{ setting('site_name') }}@endsection

@section('content')
    <!-- 导航栏 -->
    @widget('navigation_bar', ['view' => 'navigation_bars.nav'])
    <div class="share_box">
        <img src="{!! cdn('music/images/share_photo.jpg') !!}">
        <div class="title">
            <div class="mask"></div>
            <h2>互动专区</h2>
        </div>
    </div>
    </div>
    <!-- 互动专区内容 -->
    <div class="share_content_box container">
        <div class="head_title">
            <h2 class="share_title">互动专区</h2>
        </div>
        <div class="share_center_box">
            <div class="share_center">
                <ul>
                    @foreach($messages as $message)
                        <li class="share_list">
                            <div class="user_photo">
                                <img src="images/user.jpg" alt="">
                            </div>
                            <div class="user_content">
                                <p>{!! $message->content !!}</p>
                                <div class="user_imformation">
                                    <a href="javascript:;" title=""><span class="theme">主题</span></a>
                                    <ul>
                                        <li><p class="user_detalies">{!! $message->nick_name !!}</p></li>
                                        <li>
                                            <span class="Release_time">发布时间：{!! $message->created_at->format('Y-m-d H:m:s') !!}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="admin_box">
                                    <div class="admin_photobox">
                                        <img src="{!! image_url($message->user->avatar, ['w' => 50, 'h' => 50], cdn('static/images/default_avatar.jpg')) !!}">
                                    </div>
                                    <div class="admin_reset">
                                        <h5>教师回复：</h5>
                                        <p>{!! $message->reply !!}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>


                <div class="page">
                    {{--分页--}}
                    <nav aria-label="Page navigation" class="page_chose">
                        {{$messages->links()}}
                    </nav>
                </div>
            </div>
        </div>

        <form class="add" action="{!! route('frontend.web.messages') !!}" method="post" role="form">
            {!! csrf_field() !!}
            <h3>添加新留言</h3>
            <div class="form-group{{ $errors->has('nick_name') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="nick_name" value="{{ old('nick_name') }}" required
                           autofocus placeholder="称呼： 必填">
                    @if ($errors->has('nick_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('nick_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input type="email" class="form-control" name="mail" value="{{ old('mail') }}" required
                           placeholder="邮箱： 必填">
                    @if ($errors->has('mail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('mail') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <textarea name="content" class="form-control" placeholder="请在这里留言...">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <button type="submit">提交留言</button>
        </form>


    </div>
@endsection