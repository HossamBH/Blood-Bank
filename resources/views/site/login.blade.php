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
              'action' => 'Web\AuthController@signin',
              'method' =>'post'
            ]) !!}
        <div class="col-md-12">
            <div class="article-content shadow">
                <p class="content">
                    <img  class="log-logo" src="{{asset('site/imgs/logo.png')}}">
                          <form>
                              {!! Form::text('phone' , $model->phone, [
                                'class' => 'form-control',
                                'id' => 'validationCustom05',
                                'placeholder' => 'رقم الهاتف'
                              ]) !!}
                              <div style="margin-right: 150px">
                                @error('phone')
                                  <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                              </div>
                                
                              {!! Form::password('password',[
                                'class' => 'form-control',
                                
                                'placeholder' => 'كلمة السر'
                              ]) !!}
                              <div style="margin-right: 150px">
                                @error('password')
                                  <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                              </div>

                                <div class="form-check ">
                                  <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">تذكرني</label>
                                  </div>

                 
                                </div>
                                <div class="did-u-forget clearfix">
                                  <a class="forget-pass" href="#"><p class="forget ">هل نسيت كلمة المرور</p></a>
                                  <img class="complian forget"src="{{asset('site/imgs/complain.png')}}">

                                 </div>
                                <div class="form-btns">
                                <button type="submit" class="btn btn-login">دخول </button>
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