<div class="row"> 

	@foreach( $videos->chunk(2) as $chunk )
		
		<div class="row">

			@foreach( $chunk as $video )

				<div class="col-md-6">
					
					<div class="card">

						<img class="card-img-top" 
							src="{{ $video->screen }}" 
							alt="{{ $video->name }}" 
							title="{{ $video->name }}"
						>

						<div class="card-body">
							<h5 class="card-title">{{ $video->name }}</h5>
							<p class="card-text">{{ $video->description }}</p>
							<a href="{{ route( 'video.show', $video->slug ) }}" class="btn btn-primary">Go to Video</a>
						</div>

					</div>

				</div>

			@endforeach

		</div>

	@endforeach

</div>