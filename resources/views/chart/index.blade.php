@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i>
               pie Chart report
            </div>
            <div class="card-body">
              @include('chart.pie');
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-line me-1"></i>
                line Chart report
            </div>
            <div class="card-body">
              @include('chart.userchart')
            </div>
        </div>
    </div>
</div>

@endsection
