require "curl.videoaz.php";

$videoAz = new videoAz();

$videolist = $videoAz->search_list($url);

	foreach($videolist as $row){
	
		$url = $row["url"];
		$title = $row["title"];
		$image = $row["image"];
		$see = $row["see"];
		$duration = $row["duration"];
		
	}
