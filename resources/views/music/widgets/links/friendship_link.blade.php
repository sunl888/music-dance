<div class="friend_ship">
    <ul>
        <li><span>{!! $type->display_name !!}：</span></li>
        @foreach($links as $link)
            <li><a href="{!! $link->url !!}" target="_blank"><i><img
                                src="{!! cdn('music/images/i_1.fw.png') !!}"></i>{!! $link->name !!}</a></li>
        @endforeach
    </ul>
</div>