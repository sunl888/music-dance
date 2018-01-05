@extends(THEME_NP.'layouts.app')
@section('title'){{ setting('site_name') }}@endsection

@section('content')
<div class="share_box">
    <img src="images/share_photo.jpg" alt="">
    <div class="title">
        <div class="mask"></div>
        <h2>互动专区</h2>
    </div>
</div>
</div>
<!-- 互动专区内容 -->
<div class="share_content_box container">
    <div class="head_title">
        <h2 class="share_title">互动专区</h2>
        <ol class="breadcrumb">
            <li class="active_now">
                <a href="javascript:;" class="active">最新</a>
            </li>
            <li><a href="javascript:;">热门</a></li>
            <li><a href="javascript:;">未回复</a></li>
            <li><a href="javascript:;">已回复</a></li>
        </ol>
    </div>
    <div class="share_center_box" >
        <div class="share_center">
            <ul>
                @foreach()
                <li class="share_list">
                    <div class="user_photo">
                        <img src="images/user.jpg" alt="">
                    </div>
                    <div class="user_content">
                        <p>请问老师您对于学习合唱这一块有什么好的意见吗？请问老师您对于学习合唱这一块有什么好的意见吗？<a class="reset" href="javascript:;" title="">回复</a></p>
                        <div class="user_imformation">
                            <a href="javascript:;" title=""><span class="theme">主题</span></a>
                            <a href="javascript:;" class="theam">赞</a>
                            <ul>
                                <li><p class="user_detalies">虚心的求学者</p></li>
                                <li><span class="Release_time">发布时间：2017-12-29</span></li>
                                <li><a href="javascript:;"><span class="Fabulous">112赞</span></a></li>
                            </ul>
                        </div>
                        <div class="admin_box">
                            <div class="admin_photobox">
                                <img src="images/admin.jpg" alt="">
                            </div>
                            <div class="admin_reset">
                                <h5>教师回复：</h5>
                                <p> 我的建议就是好好的学习基础知识然后进行专业的训练然后进行专业的训练然后进行专业  .</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <form class="add" method="post" role="form">
        <h3>添加新留言</h3>
        <textarea name="" placeholder="请在这里留言..."></textarea>
        <input type="input" name="" placeholder="称呼： 必填">
        <button type="submit">提交</button>
    </form>
</div>
@endsection