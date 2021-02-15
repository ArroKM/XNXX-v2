<?php
class xnxx {
	public function bahan($url) {
		$out = array();
		$jav = new data();
		$jav->search($url);
		$html = str_get_html($jav->get);
		$dat2 = $html->find("div[class=mozaique]", 0);
		$tes = $dat2->find("div[class=thumb-block]");
		foreach ($tes as $val) {
		    $tes = $val->find("div[class=thumb-under]", 0);
		    $tit = $tes->find("a", 0)->href;
		    $tut = $tes->find("a", 0)->innertext;
		    $out[] = array(
		    	     "title" => $tut,
		             "url" => $tit,
		              );
		}
		$json = json_encode($out);
		$json2 = json_decode($json, true);
		self::resul($json2);
	}
	public $result;
	public function resul($json2) {
		$output = array();
		$output["author"] = "Asecx Gans";
		$jav = new data();
		foreach ($json2 as $ul) {
			$url = "https://www.xn01-app.com".$ul["url"];
			$jav->search($url);
			$htm = str_get_html($jav->get);
			preg_match("/html5player.setVideoTitle(.*+)/",$htm,$tesss);
			preg_match("/html5player.setVideoUrlLow(.*+)/",$htm,$tess);
			preg_match("/html5player.setVideoUrlHigh(.*+)/",$htm,$to);
			preg_match("/html5player.setUploaderName(.*+)/",$htm,$up);
			$pl2 = str_replace(["('", "');"], ["",""], $up);
			$jud2 = str_replace(["('", "');"], ["",""], $tesss);
			$vido2 = str_replace(["('", "');"], ["",""], $to);
			$vid2 = str_replace(["('", "');"], ["",""], $tess);
			$output["data"][] = array(
				"UploadBy" => $pl2[1],
				"title" => $jud2[1],
				"UrlVidioHigh" => $vido2[1],
				"UrlVidioLow" => $vid2[1],
				);
		}
		header("Content-Type: application/json");
		$this->result = json_encode($output, JSON_PRETTY_PRINT);
	}
}
?>
