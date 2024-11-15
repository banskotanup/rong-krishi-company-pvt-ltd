@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">All Notifications</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            @foreach($getRecords as $value)
            <div class="card-header">
                @if($value->is_read == 1)
                <h3 class="card-title"><span style="color: #D0342C;">(Date: {{$value->created_at}})</span> : <span style="color: gray;">{{$value->message}} </span></h3>
                <a href="{{$value->url}}?noti_id={{$value->id}}" style="float: right;">Click to view details</a>
                @else
                <h3 class="card-title"><span style="color: #D0342C;">(Date: {{$value->created_at}})</span> : <span>{{$value->message}} </span></h3>
                <a href="{{$value->url}}?noti_id={{$value->id}}" style="float: right;">Click to view details</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection