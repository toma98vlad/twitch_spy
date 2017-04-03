<?php
	error_reporting(0);

	# If page is accessed directly -> redirect and die
	if($on_main_page !== 1){
		header('Location: index.php');
		die();
	}

	# Personal development key
	$client_id = '';

	# ----------------------------------------------------------------------------

	// # Grab top (Popular)
	// $top_url = 'https://api.twitch.tv/kraken/streams?limit=25&client_id='.$client_id;

	// $grab_top = curl_init();

	// curl_setopt($grab_top, CURLOPT_URL, $top_url);
	// curl_setopt($grab_top, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($grab_top, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($grab_top, CURLOPT_HEADER, 0);
	// $top_output = curl_exec($grab_top);
	// $top_output_decoded = json_decode($top_output, true);

	// curl_close($grab_top);

	// 	# Top info
	// 	$total_streams = $top_output_decoded['_total'];
	// 	$top_list = array();
	// 		# Add every (limited) stream to the array
	// 		for($i=0; $i<count($top_output_decoded['streams']); $i++){
	// 			$top_list[] = array(
	// 				'id' => $top_output_decoded['streams'][$i]['_id'],
	// 				'game' => $top_output_decoded['streams'][$i]['game'],
	// 				'viewers' => $top_output_decoded['streams'][$i]['viewers'],
	// 				'status' => $top_output_decoded['streams'][$i]['channel']['status'],
	// 				'name' => $top_output_decoded['streams'][$i]['channel']['name'],
	// 				'display_name' => $top_output_decoded['streams'][$i]['channel']['display_name'],
	// 				'url' => $top_output_decoded['streams'][$i]['channel']['url']
	// 			);
	// 		}
	# ----------------------------------------------------------------------------

	# Grab user
	$user_url = 'https://api.twitch.tv/kraken/users/'.$user.'?client_id='.$client_id;

	$grab_user = curl_init();

	curl_setopt($grab_user, CURLOPT_URL, $user_url);
	curl_setopt($grab_user, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_user, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_user, CURLOPT_HEADER, 0);
	$user_output = curl_exec($grab_user);
	$user_output_decoded = json_decode($user_output, true);

	curl_close($grab_user);

		# User info
			# If user not found
			if($user_output_decoded['status'] == 404){
				$not_found = true;
			}

		$display_name = $user_output_decoded['display_name'];
		$user_id = $user_output_decoded['_id'];
		$user_name = $user_output_decoded['name'];
		$user_type = $user_output_decoded['type'];
		$user_bio = $user_output_decoded['bio'];
		$user_created_at = $user_output_decoded['created_at'];
		$user_updated_at = $user_output_decoded['updated_at'];
		$user_logo = $user_output_decoded['logo'];
		$user_links = $user_output_decoded['_links']['self'];

	# ----------------------------------------------------------------------------

	# Grab channel
	$channel_url = 'https://api.twitch.tv/kraken/channels/'.$user.'?client_id='.$client_id;

	$grab_channel = curl_init();

	curl_setopt($grab_channel, CURLOPT_URL, $channel_url);
	curl_setopt($grab_channel, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_channel, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_channel, CURLOPT_HEADER, 0);
	$channel_output = curl_exec($grab_channel);
	$channel_output_decoded = json_decode($channel_output, true);

	curl_close($grab_channel);

		# Channel info
		$mature = $channel_output_decoded['mature'];
			$mature = $mature == true ? 'true' : 'false';
		$status = $channel_output_decoded['status'];
		$broadcaster_language = $channel_output_decoded['broadcaster_language'];
		$game = $channel_output_decoded['game'];
		$language = $channel_output_decoded['language'];
		$channel_id = $channel_output_decoded['_id'];
		$channel_name = $channel_output_decoded['name'];
		$delay = $channel_output_decoded['delay'];
			if($delay == null){
				$delay = 0;
			}
		$banner = $channel_output_decoded['banner'];
		$video_banner = $channel_output_decoded['video_banner'];
		$background = $channel_output_decoded['background'];
		$profile_banner = $channel_output_decoded['profile_banner'];
		$profile_banner_background_color = $channel_output_decoded['profile_banner_background_color'];
		$partner = $channel_output_decoded['partner'];
			$partner = $partner == 1 ? 'true' : 'false';
		$url = $channel_output_decoded['url'];
		$views = $channel_output_decoded['views'];
		$followers = $channel_output_decoded['followers'];
		$commercial_link = str_replace(array('api.', '/kraken/channels'), '', $channel_output_decoded['_links']['commercial']);
		$chat_link = str_replace(array('api.', '/kraken'), '', $channel_output_decoded['_links']['chat']);
		$subscriptions_link = str_replace(array('api.', '/kraken/channels'), '', $channel_output_decoded['_links']['subscriptions']);
		$editors_link = str_replace(array('api.', '/kraken/channels'), '', $channel_output_decoded['_links']['editors']);
		$teams_link = str_replace(array('api.', '/kraken/channels'), '', $channel_output_decoded['_links']['teams']);
		$videos_link = str_replace(array('api.', '/kraken/channels'), '', $channel_output_decoded['_links']['videos']);

	# ----------------------------------------------------------------------------

	# Grab chat
	$chat_url = 'https://api.twitch.tv/kraken/chat/'.$user.'?client_id='.$client_id;

	$grab_chat = curl_init();

	curl_setopt($grab_chat, CURLOPT_URL, $chat_url);
	curl_setopt($grab_chat, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_chat, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_chat, CURLOPT_HEADER, 0);
	$chat_output = curl_exec($grab_chat);
	$chat_output_decoded = json_decode($chat_output, true);

	curl_close($grab_chat);

		# Chat info
		$emoticons_link = $chat_output_decoded['_links']['emoticons'];
		$badges_link = $chat_output_decoded['_links']['badges'];

	# ----------------------------------------------------------------------------

	# Grab emoticons
	$emoticons_url = 'https://api.twitch.tv/kraken/chat/'.$user.'/emoticons?client_id='.$client_id;

	$grab_emoticons = curl_init();

	curl_setopt($grab_emoticons, CURLOPT_URL, $emoticons_url);
	curl_setopt($grab_emoticons, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_emoticons, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_emoticons, CURLOPT_HEADER, 0);
	$emoticons_output = curl_exec($grab_emoticons);
	$emoticons_output_decoded = json_decode($emoticons_output, true);

	curl_close($grab_emoticons);

		# Emoticons info
		$individual_emoticon_logo = array();

			# Add every subscriber emoticon to the array
			for($i=0; $i<count($emoticons_output_decoded['emoticons']); $i++){
				if($emoticons_output_decoded['emoticons'][$i]['subscriber_only'] == true){
					$individual_emoticon_logo[] = array(
						'name' => $emoticons_output_decoded['emoticons'][$i]['regex'],
						'url' => $emoticons_output_decoded['emoticons'][$i]['url']
					);
				}
			}

	# ----------------------------------------------------------------------------

	# Grab badges
	$badges_url = 'https://api.twitch.tv/kraken/chat/'.$user.'/badges?client_id='.$client_id;

	$grab_badges = curl_init();

	curl_setopt($grab_badges, CURLOPT_URL, $badges_url);
	curl_setopt($grab_badges, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_badges, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_badges, CURLOPT_HEADER, 0);
	$badges_output = curl_exec($grab_badges);
	$badges_output_decoded = json_decode($badges_output, true);

	curl_close($grab_badges);

		# Badges info
		$individual_badge_logo = array();

			# Add every badge to the array
			foreach($badges_output_decoded as $badge_name){
				$individual_badge_logo[] = array(
					'name' => $badge_name,
					'url' => $badge_name['image']
				);
			}

	# ----------------------------------------------------------------------------

	# Grab videos
	$videos_url = 'https://api.twitch.tv/kraken/channels/'.$user.'/videos?broadcasts=true&client_id='.$client_id;

	$grab_videos = curl_init();

	curl_setopt($grab_videos, CURLOPT_URL, $videos_url);
	curl_setopt($grab_videos, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_videos, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_videos, CURLOPT_HEADER, 0);
	$videos_output = curl_exec($grab_videos);
	$videos_output_decoded = json_decode($videos_output, true);

	curl_close($grab_videos);

		# Videos info
		$total_videos = $videos_output_decoded['_total'];
		$videos_list = array();

			# Add every video to the array
			for($i=0; $i<count($videos_output_decoded['videos']); $i++){
				$videos_list[] = 
				array(
					'title' => $videos_output_decoded['videos'][$i]['title'],
					'views' => $videos_output_decoded['videos'][$i]['views'],
					'url' => $videos_output_decoded['videos'][$i]['url'],
					'preview' => $videos_output_decoded['videos'][$i]['preview'],
					'animated_preview' => $videos_output_decoded['videos'][$i]['animated_preview']
				);
			}

	# ----------------------------------------------------------------------------

	# Grab feed
	$feed_url = 'https://api.twitch.tv/kraken/feed/'.$user.'/posts?limit=10&client_id='.$client_id;

	$grab_feed = curl_init();

	curl_setopt($grab_feed, CURLOPT_URL, $feed_url);
	curl_setopt($grab_feed, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_feed, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_feed, CURLOPT_HEADER, 0);
	$feed_output = curl_exec($grab_feed);
	$feed_output_decoded = json_decode($feed_output, true);

	curl_close($grab_feed);

		# Feed info
		$feed_total = $feed_output_decoded['_total'];
		$feed_cursor = $feed_output_decoded['cursor'];
		$feed_topic = $feed_output_decoded['_topic'];
		$feed_list = array();

			# Loop to add every(limited) feed to the array
			for($i=0; $i<count($feed_output_decoded['posts']); $i++){
				$feed_list[] = array(
					'id' => $feed_output_decoded['posts'][$i]['id'],
					'created_at' => $feed_output_decoded['posts'][$i]['created_at'],
					'deleted' => $feed_output_decoded['posts'][$i]['deleted'],
					'body' => $feed_output_decoded['posts'][$i]['body']
				);
			}

	# ----------------------------------------------------------------------------

	# Grab followers
	$followers_url = 'https://api.twitch.tv/kraken/channels/'.$user.'/follows?limit=50&client_id='.$client_id;

	$grab_followers = curl_init();

	curl_setopt($grab_followers, CURLOPT_URL, $followers_url);
	curl_setopt($grab_followers, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_followers, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_followers, CURLOPT_HEADER, 0);
	$followers_output = curl_exec($grab_followers);
	$followers_output_decoded = json_decode($followers_output, true);

	curl_close($grab_followers);

		# Followers info
		$following_people = array();
			# Loop to add every(limited) follower to the array
			for($i=0; $i<count($followers_output_decoded['follows']); $i++){
				$following_people[] = 
				array(
					'name' => $followers_output_decoded['follows'][$i]['user']['name'],
					'display_name' => $followers_output_decoded['follows'][$i]['user']['display_name'],
					'link' => str_replace(array('api.', 'kraken/users/'), '', $followers_output_decoded['follows'][$i]['user']['_links']['self']),
					'logo' => $followers_output_decoded['follows'][$i]['user']['logo']
				);
			}

	# ----------------------------------------------------------------------------

	# Grab stream
	$stream_url = 'https://api.twitch.tv/kraken/streams/'.$user.'?client_id='.$client_id;

	$grab_stream = curl_init();

	curl_setopt($grab_stream, CURLOPT_URL, $stream_url);
	curl_setopt($grab_stream, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($grab_stream, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($grab_stream, CURLOPT_HEADER, 0);
	$stream_output = curl_exec($grab_stream);
	$stream_output_decoded = json_decode($stream_output, true);

	curl_close($grab_stream);

		# Stream info
		$stream_status = $stream_output_decoded['stream'];
		$stream_game = $stream_output_decoded['stream']['game'];
		$current_viewers = $stream_output_decoded['stream']['viewers'];
		$video_height = $stream_output_decoded['stream']['video_height'];
		$average_fps = $stream_output_decoded['stream']['average_fps'];
?>