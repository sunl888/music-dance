@extends(THEME_NP.'layouts.app')

@section('keywords'){{ setting('default_keywords') }}@endsection

@section('description'){{ setting('default_description') }}@endsection

@section('title'){{ setting('site_name') }}@endsection

@section('content')
    <!-- 导航栏 -->
    @widget('navigation_bar', ['view' => 'navigation_bars.nav'])
    <!-- 题图 -->
    @include(THEME_NP.'layouts.particals.curtain')

    <div class="warrper_box">
        <div class="warrper container">
            @widget('navigation_bar', ['view' => 'navigation_bars.side_nav'])
            <div class="right_box col-lg-9">
                <div class="head_title">
                    <!-- 面包屑导航 -->
                    {{ Breadcrumbs::render('category', $category) }}
                </div>
                <ul class="news_box">
                    @forelse($posts as $post)
                        <li class="news_box list_chose">
                            @isset($post->cover)
                                <a href="javascript:;" class="cover"><img
                                            src="{!! image_url($post->cover, ['w'=>100, 'h'=>170]) !!}">
                                </a>
                            @endisset
                            <div class="info {!! !isset($post->cover) ? 'none_photo' : '' !!} ">
                                <a href="{!! $post->getPresenter()->url() !!}">
                                    {!! $post->isTop()? '<span class="zhiding">置顶</span>':''!!}
                                    <h3>{!! $post->title !!}</h3>
                                    <p>{!! $post->excerpt !!}</p>
                                    <div class="listnews_box">
                                        <span>{!! $post->published_at->format('Y-m-d H:m:s')!!}</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @empty
                        <span>没有数据</span>
                    @endforelse
                    {{--分页--}}
                    <nav aria-label="Page navigation" class="page_chose">
                        {{$posts->links()}}
                    </nav>
                </ul>
            </div>
        </div>
    </div>

    @include(THEME_NP.'layouts.particals.footer')
@endsection
