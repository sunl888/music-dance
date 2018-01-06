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
            {{--@widget('post_list', ['category' => '通知公告', 'view' => 'post_lists.notice_list', 'limit' => 3])--}}
            @php
                $categoryRepository = app(App\Repositories\CategoryRepository::class);
                $notice = $categoryRepository->findByCateName('通知公告');
                $course = $categoryRepository->findByCateName('课程信息');
                $special = $categoryRepository->findByCateName('课程专题');
                $video = $categoryRepository->findByCateName('视频专区');
            @endphp
            <div class="notice">
                <div class="notice_title">
                    <h4 id="tongzhi"><a href="javascript:;" id="gonggao">{!! $notice->cate_name !!}</a></h4>
                    <span>|</span>
                    <h4 id="kecheng" id="class_imformation"><a href="javascript:;"
                                                               id="kechengxinxi"> {!! $course->cate_name !!}</a></h4>
                    <a id="frist_more" class="more"
                       {!! $notice->getPresenter()->linkAttribute() !!} title="更多">more+</a>
                    <a id="frist_more_two" {!! $course->getPresenter()->linkAttribute() !!} class="more_two">more++</a>
                </div>
                <div class="notice_content notice_content_active ">
                    <ul id="notice_list">
                        @foreach(Facades\App\Widgets\PostList::mergeConfig(['category'=>$notice,'limit'=>3])->getData()['posts'] as $post)
                            <li><a href="{!! $post->getPresenter()->url() !!}" title="">{!! $post->title !!}
                                    <span>{!! $post->published_at->format('Y-m-d') !!}</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="notice_content_hid  notice_content_chose">
                    <ul id="notice_list_two">
                        @foreach(Facades\App\Widgets\PostList::mergeConfig(['category'=>$course,'limit'=>3])->getData()['posts'] as $post)
                            <li><a href="{!! $post->getPresenter()->url() !!}" title="">{!! $post->title !!}
                                    <span>{!! $post->published_at->format('Y-m-d') !!}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{--@widget('post_list', ['category' => '课程专题', 'view' => 'post_lists.topic_list', 'limit' => 3])--}}
            <div class="notice_two">
                <div class="Course_topics">
                    <h4 id="tongzhi_two"><a href="javascript:;" id="kechengzhuanti">{!! $special->cate_name !!}</a></h4>
                    <span>|</span>
                    <h4 id="video"><a href="javascript:;" id="shipingzhuanqu">{!! $video->cate_name !!}</a></h4>
                    <a id="frist_more_three" class="more" {!! $special->getPresenter()->linkAttribute() !!} title="更多">more+</a>
                    <a id="frist_more_four" class="more_three"
                       {!! $video->getPresenter()->linkAttribute() !!} title="更多">more++</a>
                </div>
                <div class="notice_content notice_content_active_two ">
                    <ul id="notice_list">
                        @foreach(Facades\App\Widgets\PostList::mergeConfig(['category'=>$special,'limit'=>3])->getData()['posts'] as $post)
                            <li><a href="{!! $post->getPresenter()->url() !!}" title="">{!! $post->title !!}
                                    <span>{!! $post->published_at->format('Y-m-d') !!}</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="notice_content_hid  notice_content_chose_three">
                    <ul id="notice_list_two">
                        @foreach(Facades\App\Widgets\PostList::mergeConfig(['category'=>$video,'limit'=>3])->getData()['posts'] as $post)
                            <li><a href="{!! $post->getPresenter()->url() !!}" title="">{!! $post->title !!}
                                    <span>{!! $post->published_at->format('Y-m-d') !!}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
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
