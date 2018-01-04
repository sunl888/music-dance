<div class="left_box col-lg-3">
    <ul>
        <li @if($navigation->getActiveNav()->is($navigation->getActiveTopNav()))class="current_list"@endif>
            <a {!! $navigation->getActiveTopNav()->getPresenter()->linkAttribute() !!}>{!! $navigation->getActiveTopNav()->cate_name !!}</a><span></span>
        </li>
        @foreach($navigation->getActiveChildrenNav() as $childNav)
            <li @if($childNav->equals($navigation->getActiveNav()))class="current_list"@endif>
                <a {!! $childNav->getPresenter()->linkAttribute() !!}>{!! $childNav->cate_name !!}</a><span></span>
            </li>
        @endforeach
    </ul>
</div>