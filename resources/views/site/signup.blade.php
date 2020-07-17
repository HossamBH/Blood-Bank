@extends('site.layouts')
@inject('model','App\Models\Client')
@inject('bloodType','App\Models\BloodType')
@section('content')
      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                      </ol>
                    </nav>
              </div>
          </div>
          <div class="row">
            {!! Form::model($model,[
              'action' => 'Web\AuthController@signup'
            ]) !!}
        <div class="col-md-12 signup-form">
            <form class="needs-validation" novalidate>
                <div class="form-row">

                    {!! Form::text('name' , $model->name, [
                      'class' => 'form-control',
                      'id' => 'validationCustom01',
                      'placeholder' => 'الاسم',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::text('email' , $model->email, [
                      'class' => 'form-control',
                      'id' => 'validationCustom02',
                      'placeholder' => 'البريد الالكتروني',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('email')
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

                    {!! Form::password('password_confirmation' ,[
                     'class' => 'form-control',
                      'placeholder' => 'تأكيد كلمة السر',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                  </br>
                  </br>
                    <div>
                      <label for="validationCustom10">تاريخ الميلاد</label>
                      {!! Form::date('birth_date' , $model->birth_date, [
                        'id' => 'validationCustom10',
                      ]) !!}
                      <div style="margin-right: 150px">
                        @error('birth_date')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>

                    {!!Form::select('governorate_id', $governorates->pluck('name', 'id')->toArray(), null, [
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id' => 'governorates',
                        'placeholder' => 'اختر المحافظة',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('governorate_id')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!!Form::select('city_id',[], null, [
                        'class' => 'custom-select custom-select-lg mb-2 mt-3 custom-width',
                        'id' => 'cities',
                        'placeholder' => 'اختر المدينة',
                    ]) !!}
                     <div style="margin-right: 150px">
                      @error('city_id')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::select('blood_type_id',$bloodType->pluck('blood_type', 'id')->toArray(), null, [
                        'class'=> 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'placeholder' => 'اختر الفصيله',
                        'id' => 'validationCustom04',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('blood_type_id')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::text('phone' , $model->phone, [
                        'class' => 'form-control',
                        'id' => 'validationCustom05',
                        'placeholder' => 'رقم الهاتف',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('phone')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    <div>
                      <label for="validationCustom03">آخر تاريخ تبرع</label>
                      {!! Form::date('last_donate' , $model->last_donate, [
                        'id' => 'validationCustom03',
                      ]) !!}
                    
                      <div style="margin-right: 150px">
                        @error('last_donate')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>
                    
                </div>  
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
                <button class="btn btn-create shadow" type="submit">انــشاء  </button>
              </form>
                 {!! Form::close() !!}
              
              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              </script>

        </div>

          </div>
      </div>
</section>
@push('scripts')
    <script>
      $("#governorates").change(function(e){
        e.preventDefault();

        var governorate_id = $("#governorates").val();
        if(governorate_id)
        {
          $.ajax({
            url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
            type : 'get',
            success : function(data){
              if(data.status == 1)
              {
                $("#cities").empty();
                $("#cities").append('<option value="">اختر المدينة</option');
                $.each(data.data, function(index, city){
                $("#cities").append('<option value="'+city.id+'">'+city.name+'</option');
                });
              }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                  alert(errorMessage);
            }
          });
        }
        else
        {
          $("#cities").empty();
          $("#cities").append('<option value="">اختر المدينة</option');
        }
      });
    </script>
@endpush
@endsection