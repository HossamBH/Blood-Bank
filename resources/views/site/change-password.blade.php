@extends('site.layouts')
@inject('model','App\Models\Client')
@section('content')
     <!-- breedcrumb-->

      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول </li>
                      </ol>
                  </nav>
              </div>
          </div>
          <div class="row">
            {!! Form::model($model,[
              'action' => 'Web\ChangePasswordController@changePasswordSave',
              'method' =>'put'
            ]) !!}
        <div class="col-md-12">
            <div class="article-content shadow">
                <p class="content">
                    <img  class="log-logo" src="{{asset('site/imgs/logo.png')}}">
                          <form>
                            <div>
                              {!! Form::password('password',[
                                'class' => 'form-control',
                                'placeholder' => 'كلمة المرور الحالية'
                              ]) !!}
                              <div style="margin-right: 100px">
                                @error('password')
                                  <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                              </div>
                              </br>
                              {!! Form::password('new_password',[
                                'class' => 'form-control',
                                'placeholder' => 'كلمة المرور الجديدة'
                              ]) !!}
                              </br>
                              <div style="margin-right: 100px">
                                @error('password')
                                  <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                              </div>
                              {!! Form::password('password_confirmation',[
                                'class' => 'form-control',
                                'placeholder' => 'تأكيد كلمة المرور'
                              ]) !!}
                              <div style="margin-right: 100px">
                                @error('password')
                                  <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                              </div>
                            </div>
                                <div class="form-btns">
                                <button type="submit" class="btn btn-login">تعديل</button>
                              </div>
                          </form>
                          @include('flash::message')
                </p>
            </div>

        </div>
             {!! Form::close() !!}
      </div>
</section>
@endsection