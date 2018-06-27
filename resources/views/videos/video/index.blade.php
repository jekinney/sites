@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Videos</div>

                    <div class="card-body">
                        
                        @include( 'videos.video.partials.list' )

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
