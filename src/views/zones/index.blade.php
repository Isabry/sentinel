@extends('gatekeeper::layouts.default')

@section('styles')
<link rel="stylesheet" href="{{asset('css/map.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap-toggle.min.css')}}">
@stop

@section('content')
<br/>
@include('sentinel::zones.map')
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=fr&libraries=drawing"></script>
<script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('js/gmaps.min.js')}}"></script>
<script src="{{asset('js/map.js')}}"></script>
<script src="{{asset('js/fontawesome-markers.min.js')}}"></script>
<script>
	$('#toggle_drawtools').change(function() { drawtools() })
</script>
@stop
