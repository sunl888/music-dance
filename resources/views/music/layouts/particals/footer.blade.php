<!-- 底部开始 -->
<footer class="bottom_box">
    <div class="bottom container">
        @widget('link', ['type' => 'index_friend_links','view' => 'links.friendship_link'])
    </div>
    <div class="bottom_line"></div>
    <div class="bottom_font_box container ">
        <div class="bottom_font">
            <p>版权所有：淮南师范学院音乐与舞蹈学院 All Rights Reserved</p>
            @inject('visitor', 'App\Services\VisitorService')
            <p>powered by
                E8net<span> 您是第<span>{{$visitor->getPVUVByDateWithoutCache(\Carbon\Carbon::today())['page_view']}}</span>位光临本站！</span>
            </p>
        </div>
    </div>
</footer>