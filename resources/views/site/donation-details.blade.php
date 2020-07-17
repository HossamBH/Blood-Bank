@extends('site.layouts')

@section('page_title')
    تفاصيل الحالة
@endsection

@section('content')
  <div class="row">
              <div class="col-md-12" style="padding: 0;">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">طلب التبرع:احمد محمد</li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row bg-for-details">
          <div class="col-md-6">

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">الاسم</div>
                </div>
                <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->name}}" disabled>
              </div>
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">العمر</div>
                  </div>
                  <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->age}}" disabled>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">المشفي</div>
                    </div>
                    <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->hospital_name}}" disabled>
                  </div>
          </div>

          <div class="col-md-6">
           
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">فصيلة الدم</div>
                  </div>
                  <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->blood_type->blood_type}}" disabled>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">عدد الاكياس المطلوبة</div>
                    </div>
                    <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->bags_num}}" disabled>
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">رقم الجوال</div>
                      </div>
                      <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->phone}}" disabled>
                    </div>
            </div>
          </div>
<div class="row bg-white">
  <div class="col-md-12">
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <div class="input-group-text">عنوان المشفي </div>
      </div>
      <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donation->hospital_location}}" disabled>
    </div>
</div>

<div class="form-group">
    <div id="us1" style="width: 500px; height: 400px;"></div>
</div>

<div class="row bg-white">
  <div class="col-md-12 map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3418.5968985886584!2d31.358067984893236!3d31.03747868153201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79c2e965f2a2b%3A0xe40902f36db95a15!2sStoneYard+Cafe!5e0!3m2!1sar!2seg!4v1562774242900!5m2!1sar!2seg" width="1110" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

  </div>
</div>

</div>

@push('scripts')
   <script>
      $('#us1').locationpicker({
          location: {
              latitude: 46.15242437752303,
              longitude: 2.7470703125
          },
          radius: 300,
          markerIcon: 'http://www.iconsdb.com/icons/preview/tropical-blue/map-marker-2-xl.png'
      });
  </script>
@endpush
@endsection