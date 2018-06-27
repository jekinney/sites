<?php

namespace App\Videos\Controllers;

use App\Videos\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Video $video)
    {
        return view( 'videos.video.index' )
            ->withVideos( $video->list( $request ) );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request, Video $video)
    {
        return view( 'videos.video.dashboard' )
            ->withVideos( $video->dashboardList( $request ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {
        $data = $video->createOrUpdate();

        return view( 'videos.video.index' )
            ->withSeries( $data['series'] )
            ->withCategories( $data['categories'] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Video $video)
    {
        $video->store( $request );

        session()->flash( 'success', 'New video has been created.' );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Videos\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view( 'videos.video.show' )
            ->withVideo( $video->show() );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Videos\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $data = $video->createOrUpdate();

        return view( 'videos.video.edit' )
            ->withVideo( $video->edit() )
            ->withSeries( $data['series'] )
            ->withCategories( $data['categories'] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Videos\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $video->renew( $request );

        session()->flash( 'success', 'Video has been updated.' );

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Videos\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->remove();

        session()->flash( 'success', 'Video has been removed.' );

        return back();
    }
}
