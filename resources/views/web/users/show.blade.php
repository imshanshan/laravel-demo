@extends('web.layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg col-lg-3 col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="card-img-top img-thumbnail"
                 src="http://t10.baidu.com/it/u=3231763905,141461724&fm=173&app=25&f=JPEG?w=553&h=440&s=38B0CC135CB37D98B49903FF0300E02E"
                 width="300px" height="300px"
                 alt="个人头像">
            <hr>
            <h5 class="card-title">个人简介</h5>
            <p class="card-text">豆子：可爱的小姐姐</p>
            <hr>
            <h5><strong>来源于</strong></h5>
            <p>创造101</p>
          </div>
        </div>
      </div>
      <div class="col-lg col-lg-9 col-md-9 col-sm-12">
        <div class="card">
          <div class="card-body">
            李子璇
            <small>豆子@qq.com</small>
          </div>
        </div>

        <div class="card mx-auto">
          <div class="card-body">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a href="{{ route('users.show', $user->id) }}"
                   class="nav-link active">Ta 的话题</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}"
                   class="nav-link ">Ta 的回复</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection