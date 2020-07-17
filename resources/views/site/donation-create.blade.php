@extends('site.layouts')
@inject('model','App\Models\DonationRequest')
@inject('bloodType','App\Models\BloodType')
@inject('client','App\Models\Client')
@inject('cities','App\Models\City')
@section('content')
      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item">الرئيسية</li>
                              <li class="breadcrumb-item active" aria-current="page">انشاء تبرع جديد</li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
            {!! Form::model($model,[
              'action' => 'Web\DonationController@donationCreateSave',
              'method' => 'post'
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
              
                    {!! Form::text('age' , $model->age, [
                      'class' => 'form-control',
                      'id' => 'validationCustom02',
                      'placeholder' => 'العمر',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('age')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::select('blood_type_id',$bloodType->pluck('blood_type', 'id')->toArray(), null, [
                      'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                      'placeholder' => 'اختر الفصيله',
                      'id' => 'validationCustom04',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('blood_type_id')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::text('bags_num' , $model->bags_num, [
                      'class' => 'form-control',
                      'id' => 'validationCustom01',
                      'placeholder' => 'عدد اكياس الدم المطلوبة',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('bags_num')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::text('hospital_name' , $model->hospital_name, [
                      'class' => 'form-control',
                      'id' => 'validationCustom01',
                      'placeholder' => 'اسم المستشفي',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('hospital_name')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::text('hospital_location' , $model->hospital_location, [
                      'class' => 'form-control',
                      'id' => 'validationCustom01',
                      'placeholder' => 'عنوان المستشفي',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('hospital_location')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!!Form::select('city_id', $cities->pluck('name', 'id')->toArray(), null, [
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'placeholder' => 'اختر المدينة',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('city_id')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    {!! Form::text('client_id' , $model->client_id, [
                      'class' => 'form-control',
                      'id' => 'validationCustom01',
                      'placeholder' => 'الاسم المرافق',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('client_id')
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

                     {!! Form::text('notes' , $model->notes, [
                      'class' => 'form-control',
                      'id' => 'validationCustom01',
                      'placeholder' => 'ملاحظات',
                    ]) !!}
                    <div style="margin-right: 150px">
                      @error('notes')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
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

@endsection