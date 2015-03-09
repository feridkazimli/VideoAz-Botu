<?php 
/**
* Class VideoAz
* @author Kazımov Fərid
* @blog http://www.feridkazimov.blogspot.com
* @mail ferid.kazimli@gmail.com
* @date 09.02.2015
*/
	class videoAz {

		static $data = array();
		/*

		Parametre : $url 

		Bosluqlari silmek

		*/
			function search_list($url = NULL) {

				if($url != NULL){

					$curlOpen = self::Curl("http://www.video.az/az/search/?q=".$url); 

					$patternDefault  = '@<a href="http://www.video.az/az/video/(.*?)/(.*?)" title="(.*?)">';
					$patternDefault .= '<img src="(.*?)"@';
					$patternSee 	 = '@<div class="views"><i class="icon-eye-open icon-white"></i> (.*?)</div>@';
					$patternDuration = '@<span class="duration">(.*?)</span>@';
					preg_match_all($patternDefault,$curlOpen,$resultDefault);
					preg_match_all($patternSee,$curlOpen,$resultSee);
					preg_match_all($patternDuration,$curlOpen,$resultDuration);
					for($x=1;$x<count($resultSee[1]);$x++){
						$link_id     = $resultDefault[1][$x];
						$link        = $link_id;
						$title       = $resultDefault[3][$x];
						$image       = $resultDefault[4][$x];
						$see         = $resultSee[1][$x];
						$duration    = $resultDuration[1][$x];

						self::$data[ ] = array (
						'url' => $link,
						'title' => $title,
						'image' => $image,
						'see' => $see,
						'duration' => $duration,
						);
					}

				}
			
			return self::$data;
			
			}
			
		
		/*

		Parametre : $url

		*/
		private function Curl($url){

			$setopt = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER=>false,
			CURLOPT_TIMEOUT=>30
			);

			$curlaz = curl_init($url); // Sessiyanı başlat

			curl_setopt_array($curlaz,$setopt);

			$body = curl_exec($curlaz); // Sessiyanı işə sal

			curl_close($curlaz); // Sessiyanı sonlandır ve məlumatları sərbəst burax

			return $body; // bodyni geri döndər

		}
	}

?>
