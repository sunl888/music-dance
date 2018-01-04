@extends(THEME_NP.'layouts.app')

@section('keywords'){{ setting('default_keywords') }}@endsection

@section('description'){{ setting('default_description') }}@endsection

@section('title'){{ setting('site_name') }}@endsection

@section('content')
    <!-- 导航栏 -->
    @widget('navigation_bar', ['view' => 'navigation_bars.nav'])
    <!-- 轮播图 -->
    @widget('banner', ['type' => 'index_top_pic','view' => 'banners.banner'])
    <!-- 正文 -->
    <div class="content container">
        <div class="notice_box col-lg-4">
            @widget('post_list', ['category' => '通知公告', 'view' => 'post_lists.notice_list', 'limit' => 3])
            @widget('post_list', ['category' => '课程专题', 'view' => 'post_lists.topic_list', 'limit' => 3])
        </div>
        <!-- 中间 -->
        <div class="middel col-lg-4">
            <div class="photo_box">
                @widget('banner', ['type' => 'index_middle_pic','view' => 'banners.middle'])
                <div>
                    <div class="check">
                        <p>信息检索</p>
                        <div class="search">
                            <form id="search_form" action="{{route('frontend.web.search')}}" method="GET">
                                <input id="search_input" name="keywords" placeholder="请输入关键字.." type="text">
                                <i onclick="this.parentElement.submit()" class="search_icon" title="点击查询"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 中间部分完成 -->
        <!-- 右边部分开始 -->
        <div class="right_box col-lg-4">
            @widget('post_list', ['category' => '学术动态', 'view' => 'post_lists.default_list', 'limit' => 3])
            @widget('post_list', ['category' => '资料下载', 'view' => 'post_lists.default_list', 'limit' => 3])
        </div>
    </div>
    <!-- 中间部分结束 -->
    @include(THEME_NP.'layouts.particals.footer')
@endsection
