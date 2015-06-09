<h1>Devices List</h1>

<div class="list-group">
	<div class="clearfix list-group-item active visible-md visible-lg">
		<span class="col-xs-2  col-sm-1  col-md-1  col-lg-1"></span>
		<span class="col-xs-7  col-sm-4  col-md-3  col-lg-2">Name</span>
		<span class="hidden-xs col-sm-5  col-md-3  col-lg-2">SN</span>
		<span class="hidden-xs hidden-sm col-md-3  col-lg-2">Users</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2">Memeber Since</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2">Last Update</span>
		<span class="col-xs-3  col-sm-2  col-md-2  col-lg-1"></span>  	
	</div>

	@foreach($devices as $device)
	<div class="clearfix list-group-item">
		<span class="col-xs-2  col-sm-1  col-md-1  col-lg-1">
			{!! Form::open(['route' => ['devices.enable', $device->id], 'class'=>'form-horizontal']) !!} 
			{!! Form::token() !!}
			{!! Form::hidden('enable', $device->enable ) !!}
			{!! Form::hidden('page', Input::get("page", 1) ) !!}
			<button type="submit" class="btn btn-circle btn-default btn-xs">
				<i class="fa fa-toggle-{{$device->enable?'on':'off'}}"></i>
			</button>
			{!! Form::close() !!} 
		</span>
		<span class="col-xs-7  col-sm-4  col-md-3  col-lg-2 {{$device->enable?'enable':'disable'}}">{!! $device->name !!}</span>
		<span class="hidden-xs col-sm-5  col-md-3  col-lg-2 {{$device->enable?'enable':'disable'}}">{!! $device->sn !!}</span>
		<span class="hidden-xs hidden-sm col-md-3  col-lg-2 {{$device->enable?'enable':'disable'}}">
		@if( count($device->users) )
			{!! $device->users[0]->name !!}
		@else
			?
		@endif
		</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2 {{$device->enable?'enable':'disable'}}">{!! $device->created_at !!}</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2 {{$device->enable?'enable':'disable'}}">{!! $device->updated_at !!}</span>
		<span class="col-xs-3  col-sm-2  col-md-2  col-lg-1">
			<a role="button" href="/groups/{{$device->id}}" class="btn btn-success btn-xs"><i class="fa fa-cogs "></i> Options</a>
		</span>
	</div>
	@endforeach
</div>
