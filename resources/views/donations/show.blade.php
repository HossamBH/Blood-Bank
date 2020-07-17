@extends('layouts.app')
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
        <div class="box-body">
          @include('flash::message')
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Blood Type</th>
                  <th>City</th>
                  <th>Hospital</th>
                  <th>Location</th>
                  <th>Helper</th>
                  <th>Phone Number</th>
                  <th>Notes</th>
                  <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                      <td>{{$donation->name}}</td>
                      <td>{{$donation->age}}</td>
                      <td>{{$donation->blood_type->blood_type}}</td>
                      <td>{{$donation->city->name}}</td>
                      <td>{{$donation->hospital_name}}</td>
                      <td>{{$donation->hospital_location}}</td>
                      <td>{{$donation->client->name}}</td>
                      <td>{{$donation->phone}}</td>
                      <td>{{$donation->notes}}</td>
                      <td>
                          {!! Form::open([
                            'action' => ['Admin\DonationController@destroy', $donation->id],
                            'method' => 'delete'
                          ]) !!}
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                          {!! Form::close() !!}
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
