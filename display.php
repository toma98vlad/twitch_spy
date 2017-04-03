<?php
	if($on_main_page !== 1){
		header('Location: index.php');
		die();
	}

	# If user not found
	if($not_found){
		echo 'User not found';
	}

	# If user is found
	if($not_found !== true){
		# User info
		echo '<div class = "user_info">';
			echo '<div class = "long_subtitle">';
				echo '<span class = "title_bracket">[</span> USER INFO <span class = "title_bracket">]</span>';
			echo '</div>';
			echo '<div class = "user_logo_wrapper">';
				if($user_logo !== null){
					echo '<a target = "_blank" href = "http://twitch.tv/'.$user_name.'"><img class = "user_logo" src = "'.$user_logo.'"></img></a>';
				}else{
					echo '<a target = "_blank" href = "http://twitch.tv/'.$user_name.'"><img class = "user_logo" src = "images/default_user_logo.png"></img></a>';
				}
			echo '</div>';

			echo '<table class = "user_info_table">';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Display name:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $display_name;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'User name:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $user_name;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'User ID:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $user_id;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'User type:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $user_type;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'User created at:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $user_created_at;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Link:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "http://twitch.tv/'.$user_name.'">twitch.tv/'.$user_name.'</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Language:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo ucfirst($broadcaster_language);
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Partner:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo ucfirst($partner);
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Bio:';
					echo '</td>';
					echo '<td class = "td_right" id = "user_bio">';
						echo $user_bio;
					echo '</td>';
				echo '</tr>';
				if($partner == 'true'){
					echo '<tr>';
						echo '<td class = "td_left">';
							echo 'Subscribe:';
						echo '</td>';
						echo '<td class = "td_right">';
							echo '<a target = "_blank" href = "http://twitch.tv/'.$user_name.'/subscribe"><div class = "subscribe_button"><span class = "subscribe_button_subscribe">Subscribe</span><span class = "subscribe_button_price">$4.99</span></div></a>';
						echo '</td>';
					echo '</tr>';
				}
			echo '</table>';
		echo '</div>';
		echo '<hr>';

		#Stream info (if live)
		if($stream_status !== null){
			echo '<div class = "stream_info">';
				echo '<div class = "long_subtitle">';
					echo '<span class = "title_bracket">[</span> '.$display_name.' - '.strtoupper($stream_game).' <span class = "title_bracket">]</span>';
				echo '</div>';
				echo '<div class = "stream_stats">';
					echo 'Viewers: '.$current_viewers;
					echo ' ';
					echo 'Average FPS: '.round($average_fps, 0);
				echo '</div>';
				echo '<div class = "stream_box">';
					echo '<iframe
						src="http://player.twitch.tv/?channel='.$channel_name.'&autoplay=false"
						height="458"
						width="818"
						frameborder="0"
						scrolling="no"
						allowfullscreen="true">
						</iframe>';
				echo '</div>';
			echo '</div>';
		}

		# Channel info
		echo '<div class = "channel_info">';
			echo '<div class = "subtitle">';
				echo '<span class = "title_bracket">[</span> CHANNEL INFO <span class = "title_bracket">]</span>';
			echo '</div>';
			echo '<table class = "channel_info_table">';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Mature:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo ucfirst($mature);
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Title:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $status;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Game:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $game;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Channel ID:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $channel_id;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Channel name:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $channel_name;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Delay:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $delay.'s';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Total views:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $views;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Followers:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $followers;
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Videos (past broadcasts):';
					echo '</td>';
					echo '<td class = "td_right">';
						echo $total_videos;
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</div>';

		# Chat info
		echo '<div class = "chat_info">';
			echo '<div class = "subtitle">';
				echo '<span class = "title_bracket">[</span> CHAT INFO <span class = "title_bracket">]</span>';
			echo '</div>';
			echo '<table class = "chat_info_table">';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Emoticons:';
					echo '</td>';
					echo '<td class = "td_right_emoticons_badges">';
						for($i=0; $i<count($individual_emoticon_logo); $i++){
							echo '<img class = "emoticon_logo" src = "'.$individual_emoticon_logo[$i]['url'].'"></img>';
						}
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Badges:';
					echo '</td>';
					echo '<td class = "td_right_emoticons_badges">';
						for($i=0; $i<count($individual_badge_logo)-1; $i++){
							echo '<img class = "badge_logo" src = "'.$individual_badge_logo[$i]['url'].'"></img>';
						}
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</div>';
		echo '<hr>';

		# Links info
		echo '<div class = "links_info">';
			echo '<div class = "subtitle">';
				echo '<span class = "title_bracket">[</span> LINKS <span class = "title_bracket">]</span>';
			echo '</div>';
			echo '<table class = "links_info_table">';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Commercial:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "'.$commercial_link.'">'.$commercial_link.'</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Chat:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "'.$chat_link.'">'.$chat_link.'</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Subscriptions:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "'.$subscriptions_link.'">'.$subscriptions_link.'</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Editors:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "'.$editors_link.'">'.$editors_link.'</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Teams:';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "'.$teams_link.'">'.$teams_link.'</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class = "td_left">';
						echo 'Videos (past broadcasts):';
					echo '</td>';
					echo '<td class = "td_right">';
						echo '<a target = "_blank" href = "'.$videos_link.'">'.$videos_link.'</a>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</div>';
		echo '<hr>';

		# Feed
			# If has at least one feed
			if($feed_total > 0){
				echo '<div class = "feed_info_wrapper">';
					echo '<div class = "long_subtitle">';
						if($feed_total > 10){
							echo '<span class = "title_bracket">[</span> LATEST 10 NEWS <span class = "title_bracket">]</span>';
						}else{
							echo '<span class = "title_bracket">[</span> NEWS <span class = "title_bracket">]</span>';
						}
					echo '</div>';
					foreach($feed_list as $news){
						$news_time = str_replace('Z', '', explode('T', $news['created_at']));
						echo '<div class = "feed_info">';
							echo '<div class = "feed_title">';
								echo $user_name.' - '.$news_time[0].', '.$news_time[1];
							echo '</div>';
							echo '<div class = "feed_body">';
								echo '<span class = "simple_bracket">[</span> '.$news['body'].' <span class = "simple_bracket">]</span>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
				echo '<hr>';
			}

		# Videos info
			# If has at least one video
			if($total_videos > 0){
				echo '<div class = "videos_info_wrapper">';
					echo '<div class = "long_subtitle">';
						if($total_videos > 10){
							echo '<span class = "title_bracket">[</span> LATEST 10 VIDEOS <span class = "title_bracket">]</span>';
						}else{
							echo '<span class = "title_bracket">[</span> VIDEOS <span class = "title_bracket">]</span>';
						}
					echo '</div>';
					foreach($videos_list as $individual_video){
						echo '<div class = "videos_info">';
							echo '<a target = "_blank" href = "'.$individual_video['url'].'"><img class = "video_preview" src = '.$individual_video['preview'].'></img></a>';
							echo '<br>';
							echo $individual_video['title'];
						echo '</div>';
					}
				echo '<hr>';
				echo '</div>';
			}

		# Followers info
			# If has at least one follower
			if($followers > 0){
				echo '<div class = "followers_info_wrapper">';
					echo '<div class = "long_subtitle">';
						if($followers > 50){
							echo '<span class = "title_bracket">[</span> LATEST 50 FOLLOWERS <span class = "title_bracket">]</span>';
						}else{
							echo '<span class = "title_bracket">[</span> FOLLOWERS <span class = "title_bracket">]</span>';
						}
					echo '</div>';
					foreach($following_people as $individual_follower){
						echo '<div class = "followers_info">';
							if($individual_follower['logo'] !== null){
								echo '<a target = "_blank" href = '.$individual_follower['link'].'><img class = "follower_logo" src = '.$individual_follower['logo'].'></img></a>';
							}else{
								echo '<a target = "_blank" href = '.$individual_follower['link'].'><img class = "follower_logo" src = "images/default_user_logo.png"></img></a>';
							}
							echo '<br>';
							echo $individual_follower['display_name'];
						echo '</div>';
					}
				echo '</div>';
			}
	}
?>