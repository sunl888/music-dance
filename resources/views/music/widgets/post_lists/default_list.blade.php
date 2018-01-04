<div class="notice">
    <div class="notice_title">
        <h4 id="tongzhi"><a {!! $category->getPresenter()->linkAttribute() !!}> {!! $category->cate_name !!}</a></h4>
        <span>|</span>
        <h4 id="class_imformation">
            <a {!! $category->getPresenter()->linkAttribute() !!}>{!! $category->description !!}</a></h4>
        <a class="more" {!! $category->getPresenter()->linkAttribute() !!} title="更多">more+</a>
    </div>
    <div class="notice_content">
        <ul id="notice_list">
            @forelse($posts as $post)
                <li><a href="{!! $post->getPresenter()->url() !!}" title="">{!! $post->title !!}
                        <span>{!! $post->published_at->format('Y-m-d') !!}</span></a></li>
            @empty
                <span>没有数据</span>
            @endforelse
        </ul>
    </div>
</div>