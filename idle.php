<?php
	if($on_main_page !== 1){
		header('Location: index.php');
		die();
	}

	# Personal development key
	$client_id = 'API KEY';

	# ----------------------------------------------------------------------------

	# Grab top (Popular)
	$top_url = 'https://api.twitch.tv/kraken/streams?limit=50&client_id='.$client_id;

	$grab_top = curl_init();

	curl_setopt($grab_top, CURLOPT_URL, $top_url);
	curl_setopt($grab_top, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_top, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_top, CURLOPT_HEADER, 0);
	$top_output = curl_exec($grab_top);
	$top_output_decoded = json_decode($top_output, true);

	curl_close($grab_top);

		# Top info
		$total_streams = $top_output_decoded['_total'];
		$top_list = array();
			# Add every (limited) stream to the array
			for($i=0; $i<count($top_output_decoded['streams']); $i++){
				$top_list[] = array(
					'id' => $top_output_decoded['streams'][$i]['_id'],
					'game' => $top_output_decoded['streams'][$i]['game'],
					'viewers' => $top_output_decoded['streams'][$i]['viewers'],
					'average_fps' => $top_output_decoded['streams'][$i]['average_fps'],
					'status' => $top_output_decoded['streams'][$i]['channel']['status'],
					'name' => $top_output_decoded['streams'][$i]['channel']['name'],
					'display_name' => $top_output_decoded['streams'][$i]['channel']['display_name'],
					'url' => $top_output_decoded['streams'][$i]['channel']['url']
				);
			}
	# ----------------------------------------------------------------------------

	$random_top = rand(0, count($top_list) - 1);

	echo '<div class = "long_subtitle">';
		echo '-TRENDING STREAMS-';
	echo '</div>';
	echo '<div class = "stream_info">';
		echo '<div class = "long_subtitle">';
			echo '<span class = "title_bracket">[</span> '.$top_list[$random_top]['display_name'].' - '.$top_list[$random_top]['status'].' <span class = "title_bracket">]</span>';
		echo '</div>';
		echo '<div class = "stream_stats">';
			echo 'Viewers: '.$top_list[$random_top]['viewers'];
			echo ' ';
			echo 'Average FPS: '.round($top_list[$random_top]['average_fps'], 0);
		echo '</div>';
		echo '<div class = "stream_box">';
			echo '<iframe
				src="http://player.twitch.tv/?channel='.$top_list[$random_top]['name'].'&autoplay=false"
				height="458"
				width="818"
				frameborder="0"
				scrolling="no"
				allowfullscreen="true">
				</iframe>';
		echo '</div>';
	echo '</div>';
?>
