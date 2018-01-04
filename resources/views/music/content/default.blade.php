@extends(THEME_NP.'layouts.app')
@section('keywords'){!! $post->category->getKeywords() !!}@endsection

@section('description'){!! $post->category->getDescription() !!}@endsection

@section('title'){{ $post->title }}@endsection

@section('content')
    <!-- 导航栏 -->
    @widget('navigation_bar', ['view' => 'navigation_bars.nav'])
    <!-- 题图 -->
    @include(THEME_NP.'layouts.particals.curtain',['category'=>$post->category])
    <!-- 正文 -->
    <div class="content_warrper">
        <div class="container content_box">
            <div class="head_title">
                <!-- 面包屑导航 -->
                {!! Breadcrumbs::render('post', $post) !!}
            </div>
            <div class="content_center">
                <h3>{!! $post->title !!}</h3>
                <p class="info">
                    <span>作者:{!! isset($post->user->nick_name)?$post->user->nick_name:$post->user->user_name !!}</span>
                    <span>时间:{!! $post->published_at->format('Y-m-d')!!}</span>
                    <span>阅读量:{!! $post->views_count !!}</span>
                </p>
                <div class="content_img_box">
                    <p>{!! $post->postContent->content !!}</p>
                    {{--<span class="Reading">阅读量:{!! $post->views_count !!}</span>--}}
                </div>
            </div>
        </div>
    </div>

    @include(THEME_NP.'layouts.particals.footer')
@endsection
