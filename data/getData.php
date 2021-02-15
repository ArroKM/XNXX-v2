<?php
class data {
	public $get;
	public function search($url) {
		$head = array("Host: www.xn01-app.com","Connection: keep-alive","Cache-Control: max-age=0","Upgrade-Insecure-Requests: 1","Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9","X-Requested-With: com.nkl.xnxx.app");
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_FOLLOWLOCATION => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_REFERER => "https://www.xn01-app.com/",
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => $head,
			CURLOPT_USERAGENT => "Mozilla/5.0 (Linux; Android 6.0; A1601 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.185 Mobile Safari/537.36 XXXAndroidApp/0.55",
			));
		$this->get = curl_exec($ch);
		curl_close($ch);
	}
}
?>
