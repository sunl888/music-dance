<div class="friend_ship">
    <ul>
        <li><span>{!! is_null($type)?'友情链接':$type->display_name !!}：</span></li>
        @foreach($links as $link)
            <li><a href="{!! $link->url !!}" target="_blank"><i><img
                                src="{!! cdn('music/images/i_1.fw.png') !!}"></i>{!! $link->name !!}</a></li>
        @endforeach
    </ul>
</div>