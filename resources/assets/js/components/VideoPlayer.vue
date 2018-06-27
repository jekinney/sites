<template>
	<div class="embed-responsive embed-responsive-16by9">
        <div class="embed-responsive-item">
			<video  
				class="video-js vjs-default-skin vjs-big-play-centered vjs-big-play-button" 
				:width="width" 
				:height="height"
				:muted="muted"
				ref="video"
			>
	  			<p>Video Playback Not Supported</p>
			</video>
 		</div>
 	</div>
</template>

<script>
	import videojs from 'video.js'
	require( 'videojs-vimeo' );

	export default {
		name: 'video-player',
		props: {
			path: {
				type: String,
				required: true
			},
			width: {
				type: Number,
				default: 640
			},
			height: {
				type: Number,
				default: 360
			},
			muted: {
				type: Boolean,
				default: false
			}
		}, 
		data () {
			return {
				options: { 
					"controls": true,
					"preload": "auto",
					"techOrder": ["vimeo"], 
					"sources": [{
						"type": "video/vimeo",
						"src": this.path
					}],
					"vimeo": { "ytControls": 2 }
				}
			}
		},
		mounted () {
			this.setup()
		},
		methods: {
			setup () {
				videojs( this.$refs.video, this.options ).ready()
			}
		}
		
	}

</script>