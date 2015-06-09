@extends('gatekeeper::layouts.default')

@section('styles')
@stop

@section('content')
@include('sentinel::devices.list')
{!! $devices !!}
@endsection

@section('scripts')
@stop