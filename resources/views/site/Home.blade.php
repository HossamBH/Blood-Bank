@extends('site.layouts')
@section('page_title')
    الصفحة الرئيسية
@endsection

@section('content')
 <!-- Header-->
      <header id="header">
        <div class="container-fluid">
          <div class="header-text">
          <h1 class="head-text">بنك الدم نمضى قدماً لصحة افضل</h1>
          <p class="follow-text">هذا النص هو مثال لنص يمكن أن يستبدل
              في نفس المساحة،<br> لقد تم توليد هذا النص
              من مولد النص العرب</p>
              <a href="#"><button class="btn login-btn">المزيد</button></a>
              </div>
        </div>
      </header>
	<section id="about">
	<div class="container-fluid">
	<p class="about-text">بنك الدم هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
	  يطلع على صورة حقيقية لتصميم الموقع
	  </p>
	</div>
	</section>

	   <!-- articles -->
	<section id="articles">
	<h2 class="articles-head">المقالات </h2>
	<div class="container custom" style="direction: ltr">
	  <div class="owl-carousel owl-theme" id="owl-articles">
	  	@foreach($posts as $post)
	    <div class="item">
	      <div class="card" style="width: 22rem;">
	        <i id="{{$post->id}}" onclick="toggleFavourite(this)"  class="fab fa-gratipay 
	        	{{$post->is_favourite ? 'second-heart' : 'first-heart'}}
	        	"></i>

	        <img class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap">
	        <div class="card-body">
	          <h5 class="card-title">{{$post->title}}</h5>
	          <a href="{{url('user/article-details/' . $post->id)}}"><button class="btn details-btn">التفاصيل </button></a>
	        </div>
	      </div>

		</div>
	 	@endforeach
	</section>
<h2 class="donations-head horizntal-line">طلبات التبرع </h2>

 <!-- Donations offers  -->
 <section id="donations">
    <div class="container custom-position">
    {!! Form::open([

                    'method' => 'get'

                    ]) !!}

                    <div class="row dropdown">

                        <div class="col-md-5">

                            <div class="form-group">

                                {!! Form::select('blood_type_id',$bloodTypes->pluck('blood_type','id')->toArray(),request()->input('blood_type_id'),[

                                'class' => 'select2 custom-select',

                                'placeholder' => 'اختر فصيلة الدم'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="form-group">

                                {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),request()->input('city_id'),[

                                'class' => 'select2 custom-select',

                                'placeholder' => 'اختر مدينة'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="col-md-2 search">
        <div class="circle search-icon"><button type="submit"><i class="fas fa-search search-icon"></i></button></div>
      </div>
                        </div>

                    </div>

                    {!! Form::close() !!}
    @foreach($donations as $donation)
    <div class="row background-div ">
      <div class="col-lg-2">
        <div class="blood-type border-circle">
          <div class="blood-txt">
            {{$donation->blood_type->blood_type}}
          </div>

        </div>
      </div>
          <div class="col-lg-7">
            <ul class="order-details">
              <li class="cutom-display"> اسم الحالة:</li>
                <span class="cutom-display">{{$donation->name}}</span> <br>
              <li class="cutom-display custom-padding" >  مستشفي:</li>
                <span class="cutom-display custom-padding">{{$donation->hospital_name}}</span> <br>
              <li class="cutom-display ">  المدينة:</li>
                <span class="cutom-display ">{{$donation->city->name}}</span>
            </ul>
          </div>
        <div class="col-lg-3">
        <a href="{{url('user/donation-details/' . $donation->id)}}"><button class="btn more2-btn">التفاصيل </button></a>
      </div>
    </div>
    @endforeach  
     </div>
</section>

	   <!-- call us section  -->
	   <section id="call-us">
	    <h3 class="call-us-head">اتـــصل بنا</h3>
	    <P class="call-us-follow-text">يمكنكم الاتصال بنا للاستفسار عن المعلومات وسيتم التواصل معكم فوراً </P>
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-12">
	        <div class="whatsup">
	          <p id="number">{{isset($setting->phone) ? $setting->phone : null}}</p>
	          <img class="whats-logo" src="{{asset('site/imgs/whats.png')}}">


	        </div>
	      </div>

	      </div>
	    </div>
	   </section>
@endsection