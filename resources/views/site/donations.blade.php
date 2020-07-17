@extends('site.layouts')
@inject('cities','App\Models\City')
@inject('bloodTypes','App\Models\BloodType')
@section('page_title')
    طلبات التبرع 
@endsection

@section('content')

<!-- breedcrumb-->

<section id="breedcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">الرئيسية</li>
                  <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                </ol>
              </nav>
            </div>
        </div>
        </div>
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

                                'placeholder' => 'Blood Type'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="form-group">

                                {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),request()->input('city_id'),[

                                'class' => 'select2 custom-select',

                                'placeholder' => 'city'

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
@endsection