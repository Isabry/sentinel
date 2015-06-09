<div class="row">
	<div class="col-md-2">
		<div class="list-group">
		@foreach($zones as $zone)
			<div class="clearfix list-group-item" onclick="zones({!!$zone->id!!})">
			{!!$zone->name!!}
			<span class="badge">{!!$zone->id!!}</span>
			</div>
		@endforeach
		</div>
		<input id="toggle_drawtools" type="checkbox" checked data-toggle="toggle" 
		data-width="100%" data-size="mini" 
		data-on="Draw Tools enable" data-off="Draw Tools disable" data-onstyle="success" data-offstyle="default">
		<br/><br/>
		<button class="btn btn-default" onclick="store()">Save</button>
		<div id="instructions"></div>
	</div>
	<div class="col-md-10">
		<div id="map"></div>
	</div>
</div>