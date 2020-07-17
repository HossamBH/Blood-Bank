@extends('site.layouts')

@section('page_title')
    اتصل بنا
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
          <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">الرئيسية</li>
                    <li class="breadcrumb-item active " aria-current="page">تواصل معنا  </li>
                  </ol>
                </nav>

    </div>
  </div>
  <div class="row some-breathing-room">

    <div class="col-md-6">
      <div class="call-us-div shadow">
          <div class="div-bg"><p>اتصل بنا </p></div>
          <img class="logo-in-call" src="{{asset('site/imgs/logo.png')}}">
          <hr class="line">
          <ul class="list-call">
              <li>الجوال:{{$setting->phone}}</li>
              <li>البريد الاكتروني :{{$setting->email}}</li>
          </ul>
          <p class="call-us-head2">تواصل معنا</p>
          <div class="social-icons">
                  <a href="{{$setting->fb_link}}"><i class="fab fa-facebook-square hvr-forward"></i></a>
                  <a href="{{$setting->twitter_link}}"><i class="fab fa-twitter-square hvr-forward"></i></a>
                  <a href="{{$setting->youtube_link}}"><i class="fab fa-youtube-square hvr-forward"></i></a>
                  <a href="{{$setting->gmail_link}}"><i class="fab fa-google-plus-square hvr-forward"></i></a>
          </div>
      </div>

    </div>
    <div class="col-md-6">
      <div class="call-us-div shadow">
    <div class="div-bg"><p>اتصل بنا </p></div>
     {!! Form::open([
          'action' => ['Web\MainController@setting'],
          'method' => 'post'
        ]) !!}
            <form>
                <div class="form-group some-space">
                 
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="الاسم">
                  @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">

                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="البريد الاكتروني">
                  @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">

                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" placeholder="الجوال">
                  @error('phone')
                    <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">

                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="subject" placeholder="عنوان الرساله">
                  @error('subject')
                    <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
            
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="message" placeholder="نص الرساله" rows="3"></textarea>
                  @error('message')
                    <small class="form-text text-danger">{{$message}}</small>
                  @enderror

                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
               <button type="submit" class="btn btn-send-call hvr-float">ارسال</button>
                  </form>
            {!! Form::close() !!}
      </div>
  </div>
  </div>
@endsection