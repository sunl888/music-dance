@php
    $count = $banners->count();
@endphp
@if($count>0)
    <div id="banner">
        <div id="banner_bg"></div>
        <!--标题背景-->
        <div id="banner_info"></div>
    @php
        // 当banner小于4个时前端轮播图会出现问题，因此在这里手动复制一个banner
        if($count < 4){
            for ($i = 1; $i <= 4-$count; $i++) {
                $banners->push($banners[$i-1]);
            }
        }
    @endphp
    <!--标题-->
        <ul>
            @foreach($banners as $banner)
                <li @if ($loop->first) class="on" @endif>{{$loop->iteration}}</li>
            @endforeach
        </ul>
        <div id="banner_list">
            @foreach($banners as $banner)
                <a href="{!! $banner->url !!}" target="_blank"><img
                            src="{!! image_url($banner->image, ['w'=>348, 'h'=>230]) !!}" title="{{$loop->iteration}}"
                            alt="{!! $banner->title !!}"/></a>
            @endforeach
        </div>
    </div>
@endif