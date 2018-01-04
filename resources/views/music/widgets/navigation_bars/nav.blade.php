<!-- 头部开始 -->
<header>
    <!-- 动态文字 -->
    <p id="welcome">今天是{!! \Carbon\Carbon::now(config('app.timezone'))->format('Y年m月d日') !!}，欢迎您光临音乐与舞蹈学院网站！</p>
    <div class="container head_left">
        <div class="photo_box">
            <div class="logo_box">
                <img src="{!! cdn('music/images/logo.jpg') !!}" alt="">
                <img src="{!! cdn('music/images/logo_font.jpg') !!}" alt="">
            </div>
            <div class="school_photo">
                <img src="{!! cdn('music/images/black_school.jpg') !!}" alt="">
            </div>
        </div>
        <!-- 导航部分 -->
        <div class="nav">
            <ul id="nav_sub">
                <li class="Block_li">
                    <a {!! is_null($navigation->getActiveTopNav())?' class="active"':'' !!} href="{!! route('frontend.web.index')!!}">首页</a>
                </li>
                @foreach($allNav as $category)
                    <li class="Block_li">
                        <a title="{!! $category->cate_name !!}" {!! $category->is($navigation->getActiveTopNav())?' class="active"':'' !!} {!! $category->getPresenter()->linkAttribute() !!}>{!! $category->cate_name !!}</a>
                        @if($category->hasChildren())
                            <div class="hid_list">
                                <ul>
                                    @foreach($category->children as $children)
                                        <li>
                                            <a {!! $children->getPresenter()->linkAttribute() !!}>{!! $children->cate_name !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>
<div class="line"></div>

@push('js')
    <script type="text/javascript">
        (function () {
            var p_width = $('#welcome').width();
            var total_width = $(window).width();
            var wrap = document.getElementById('welcome');
            var timer = window.setInterval(move, 10);
            wrap.onmouseover = function () {
                window.clearInterval(timer);
            };
            wrap.onmouseout = function () {
                timer = window.setInterval(move, 10);
            };

            function move() {
                wrap.style.left = wrap.offsetLeft + 1 + 'px';
                if (wrap.offsetLeft >= total_width) {
                    wrap.style.left = 0;
                }
            }
        })();
    </script>
@endpush