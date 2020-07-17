@extends('layouts.app')
@inject('cities','App\Models\City')
@inject('bloodTypes','App\Models\BloodType')
@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Donations
        <small>list</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

        
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Show Donations</h3>
        </div>

        <div>

                    {!! Form::open([

                    'method' => 'get'

                    ]) !!}

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                {!! Form::text('name',request()->input('name'),[

                                'placeholder' => 'Name',

                                'class' => 'form-control'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                {!! Form::text('hospital_name',request()->input('hospital_name'),[

                                'placeholder' => 'Hospital Name',

                                'class' => 'form-control'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                {!! Form::select('blood_type_id',$bloodTypes->pluck('blood_type','id')->toArray(),request()->input('blood_type_id'),[

                                'class' => 'select2 form-control',

                                'placeholder' => 'Blood Type'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),request()->input('city_id'),[

                                'class' => 'select2 form-control',

                                'placeholder' => 'city'

                                ]) !!}

                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-group">

                                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-search"></i></button>

                            </div>

                        </div>

                    </div>

                    {!! Form::close() !!}

        </div>
        <div class="box-body">
          @include('flash::message')
          @if(count($donations))
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Blood Type</th>
                  <th>City</th>
                  <th>Hospital</th>
                  <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($donations as $donation)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td><a href="{{url(route('donations.show', $donation->id))}}">{{$donation->name}}</a></td>
                      <td>{{$donation->blood_type->blood_type}}</td>
                      <td>{{$donation->city->name}}</td>
                      <td>{{$donation->hospital_name}}</td>
                      <td>
                          {!! Form::open([
                            'action' => ['Admin\DonationController@destroy', $donation->id],
                            'method' => 'delete'
                          ]) !!}
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                          {!! Form::close() !!}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="alert alert-danger" role="alert">
              No data
            </div>
          @endif
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
