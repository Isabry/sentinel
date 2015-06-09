<div class="row">
	<div class="col-md-2">
		<div class="list-group">
		@foreach($devices as $device)
			<div class="clearfix list-group-item" onclick="routes({!!$device->id!!})">
			{!!$device->name!!}
			<span class="badge">{!!$device->id!!}</span>
			</div>
		@endforeach
		</div>
		<div onclick="drawing()">drawing</div>
		<div id="instructions"></div>
	</div>
	<div class="col-md-10">
		<div id="map"></div>
	</div>
</div>