require "curl.videoaz.php";

$videoAz = new videoAz();

$videolist = $videoAz->search_list($url);

print_r($videolist);
