@extends(THEME_NP.'layouts.app')
@section('keywords'){!! $category->getKeywords() !!}@endsection

@section('description'){!! $category->getDescription() !!}@endsection

@section('title'){{ Breadcrumbs::pageTitle(' - ', 'category', $category) }}@endsection

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
                    {!! Breadcrumbs::render('category', $category) !!}
                </div>
                <div class="body_box">
                    <h3>{!! $page->title !!}</h3>
                    {!! $page->postContent->content !!}
                </div>
            </div>
        </div>
    </div>

    @include(THEME_NP.'layouts.particals.footer')
@endsection
