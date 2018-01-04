@php
    $count = $banners->count();
@endphp
@if($count>0)
    <!-- 轮播图开始 -->
    <div class="flexslider">
        <ul class="slides">
            @php
                // 当banner小于4个时前端轮播图会出现问题，因此在这里手动复制一个banner
                if($count < 4){
                    for ($i = 1; $i <= 4-$count; $i++) {
                        $banners->push($banners[$i-1]);
                    }
                }
            @endphp
            @foreach($banners as $banner)
                <li style="background:url({!! image_url($banner->image, ['w'=>1920, 'h'=>400]) !!}) 50% 0 no-repeat;">
                    <div class="label">
                        <span class="cs_title"><span class="cs_wrapper">{!! $banner->title !!}</span></span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- 轮播结束 -->

    @push('js')
        <script type="text/javascript" src="{!! cdn('music/js/jquery.flexslider-min.js') !!}"></script>
    @endpush
@endif