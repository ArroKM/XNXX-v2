<?php
class Sex {
	public function __construct() {
		system("clear");
	}
	var $logo = "   ___ ___
  (   Y   ).-----..--.--..--.--.
   \  1  / |     ||_   _||_   _|
   /  _  \ |__|__||__.__||__.__|
  /:  |   \  Coded By: Asecx Gans
 (::. |:.  ) Github  : ArroKM
  `--- ---' \n";
	var $pag, $urk, $men, $last;
	public function car() {
		$this->last = 50;
		$this->pag = 1;
		$this->men = "\n[ {S} Pencarian\n[ {N} Untuk Ke Halaman Berikutnya\n[ {P} Untuk Ke Halaman Sebelumnya\n[ {E} Untuk Keluar\n[ {#} Untuk Lompat Ke Halaman Tertentu\n[ Note : Ex( #12 ) untuk lompat ke Halaman Tertentu\n\n";
		echo $this->logo;
		echo "\n(?) Search : ";
		$cari = trim(fgets(STDIN));
		$url = "https://api.asecx.site/v1/xnxx.php?search={$cari}&page={$this->pag}";
		$this->urk = $url;

		self::curl_get($cari);
	}
	public function curl_get($cari) {
	    while (true) {
		$fil = file_get_contents($this->urk);
		$data = json_decode($fil, true);
		system("clear");
		echo $this->logo;
		echo $this->men;
		$link = array();
		$key = 0;
		foreach ($data["data"] as $val) {
			$key += 1;
			$link[] = array(
				"link" => $val["UrlVidioLow"],
				"lik" => $val["UrlVidioHigh"],
				"name" => $val["title"],
				);
			echo "({$key}) ".$val["title"]."\n";
		}
		$bo = json_encode($link);
		$kep = json_decode($bo, true);
		echo "\n(<<( {$this->pag}/{$this->last} )>>) ";
		$pil = trim(fgets(STDIN));
		if (is_string($pil)) {
			if ($pil == "N" or $pil == "n") {
				if ($this->pag == 50) {
					echo "[*] Mentok Goblok...\n";
				} else {
					unset($this->urk);
					$pg = $this->pag += 1;
					$this->urk = "https://api.asecx.site/v1/xnxx.php?search={$cari}&page={$pg}";
				}
			} elseif ($pil == "P" or $pil == "p") {
				if ($this->pag == 1) {
					echo "[*] Mentok goblok..\n";
				} else {
					unset($this->urk);
					$pg = $this->pag -= 1;
					$this->urk = "https://api.asecx.site/v1/xnxx.php?search={$cari}&page={$pg}";
				}
			} elseif ($pil == "E" or $pil == "e") {
				exit("[*] Kamu Sangat Berdosa Sekali\n");
			} elseif (strpos($pil, "#") == "#") {
				unset($this->urk);
				unset($this->pag);
				$ps = str_replace("#","",$pil);
				$this->pag = $ps;
				$this->urk = "https://api.asecx.site/v1/xnxx.php?search={$cari}&page={$this->pag}";
			} elseif ($pil == "S" or $pil == "s") {
				$this->bak = new Sex();
				$this->bak->car();
			} else {
				self::down($kep, $pil);
			}
		} else {
			echo "[!] Pilihan tidak ada..\n";
		}
	    }
	}
	public function down($kep, $pil) {
		$no = 0;
                foreach ($kep as $ur) {
			$no += 1;
			if ($no >= (int)$pil) {
	                	echo "[*] Sedang Men-download....\n";
	                	$dow = $ur["link"];
				$dom = $ur["lik"];
				if ($dom == null) {
             				$ch = curl_init($dow);
			     		$file = "$HOME/storage/shared/xnxx-v2/".str_replace(" ","-",$ur["name"]).".mp4";
		             		$fp = fopen($file, 'wb');
	        	     		curl_setopt_array($ch, array(
	               		    		CURLOPT_FILE => $fp,
	                      		        CURLOPT_HEADER => 0,
	                                	));
			                curl_exec($ch);
		        	        curl_close($ch);
	        	                fclose($fp);
				} else {
					$ch = curl_init($dom);
                                        $file = "$HOME/storage/shared/xnxx-v2/".str_replace(" ","-",$ur["name"]).".mp4";
                                        $fp = fopen($file, 'wb');
                                        curl_setopt_array($ch, array(
                                                CURLOPT_FILE => $fp,
                                                CURLOPT_HEADER => 0,
                                                ));
                                        curl_exec($ch);
                                        curl_close($ch);
                                        fclose($fp);
				}
	                        echo "[*] Download Selesai...\n";
	                        echo "[*] Saved = ".$file."\n\n";
		                break;
	                }
		}
	}
}
class Pages extends Sex {
	public function main() {
		echo "Author : Asecx Gans";
	}
}
$tess = new Pages();
echo $tess->car();
?>
