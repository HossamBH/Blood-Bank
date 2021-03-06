@extends('layouts.app')
@inject('client','App\Models\Client')
@inject('donationRequest','App\Models\DonationRequest')
@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BloodBank
        <small>statistics</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-user"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Clients</span>
                <span class="info-box-number">{{$client->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-chart"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Donation Requests</span>
                <span class="info-box-number">{{$donationRequest->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
        </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                    You are logged in!
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
