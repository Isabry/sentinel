@extends('gatekeeper::layouts.default')

@section('styles')
<link rel="stylesheet" href="{{asset('css/map.css')}}">
@stop

@section('content')
<br/>
@include('sentinel::tracker.map')
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=fr&libraries=drawing"></script>
<script src="{{asset('js/gmaps.min.js')}}"></script>
<script src="{{asset('js/map.js')}}"></script>
<script src="{{asset('js/fontawesome-markers.min.js')}}"></script>
@stop
