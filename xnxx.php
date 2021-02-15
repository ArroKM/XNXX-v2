<?php
//Coded by AseCx
//XiuzCode (Open Source Team)
include "simple_html_dom.php";
include "data/getData.php";
include "data/result.php";
class Sex {
	public function __construct() {
		system("clear");
	}
	var $logo = "             \x1b[31;1m_  __ \x1b[35;1m_   __\x1b[31;1m_  __\x1b[35;1m_  __
            \x1b[31;1m| |/ /\x1b[35;1m/ | / /\x1b[31;1m |/ /\x1b[35;1m |/ / \x1b[100m\x1b[32;1m:: A ::\x1b[0m
            \x1b[31;1m|   /\x1b[35;1m/  |/ /\x1b[31;1m|   /\x1b[35;1m|   / \x1b[100m\x1b[32;1m:: S ::\x1b[0m
           \x1b[31;1m/   |\x1b[35;1m/ /|  /\x1b[31;1m/   |\x1b[35;1m/   | \x1b[100m\x1b[32;1m:: E ::\x1b[0m
          \x1b[31;1m/_/|_/\x1b[35;1m_/ |_/\x1b[31;1m/_/|_/\x1b[35;1m_/|_|\x1b[100m\x1b[32;1m:: X ::\x1b[0m
 \x1b[32;1m─────────────────────────────────────────────────────";
	var $pag, $urk, $men, $last, $link;
	public function car() {
		$this->last = 50;
		$this->pag = 1;
		$this->men = "\n\x1b[32;1m| \x1b[31;1m{\x1b[36;1mS\x1b[31;1m} \x1b[36;1mPencarian                                       \x1b[32;1m|\n\x1b[32;1m| \x1b[31;1m{\x1b[36;1mN\x1b[31;1m} \x1b[36;1mUntuk Ke Halaman Berikutnya                     \x1b[32;1m|\n\x1b[32;1m| \x1b[31;1m{\x1b[36;1mP\x1b[31;1m} \x1b[36;1mUntuk Ke Halaman Sebelumnya                     \x1b[32;1m|\n\x1b[32;1m| \x1b[31;1m{\x1b[36;1mE\x1b[31;1m} \x1b[36;1mUntuk Keluar                                    \x1b[32;1m|\n\x1b[32;1m| \x1b[31;1m{\x1b[36;1m#\x1b[31;1m} \x1b[36;1mUntuk Lompat Ke Halaman Tertentu                \x1b[32;1m|\n\x1b[32;1m| \x1b[31;1mNote : \x1b[36;1mEx\x1b[32;1m( \x1b[31;1m#\x1b[36;1m12 \x1b[32;1m) \x1b[36;1muntuk lompat ke Halaman Tertentu   \x1b[32;1m|\n \x1b[32;1m─────────────────────────────────────────────────────\n";
		echo $this->logo;
		echo "\n\x1b[32;1m(\x1b[36;1m*\x1b[32;1m) \x1b[36;1mSearch : \x1b[32;1m";
		$cari = trim(fgets(STDIN));
		$urll = "https://www.xn01-app.com/search";
		$url = "{$urll}/{$cari}/{$this->pag}";
		$this->urk = $url;
		$this->link = $urll;

		self::curl_get($cari);
	}
	public function curl_get($cari) {
	    $poli = new xnxx();
	    while (true) {
		$poli->bahan($this->urk);
		$data = json_decode($poli->result, true);
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
			echo "\x1b[32;1m(\x1b[36;1m{$key}\x1b[32;1m) \x1b[36;1m".$val["title"]."\n";
		}
		$bo = json_encode($link);
		$kep = json_decode($bo, true);
		echo "\x1b[32;1m(\x1b[31;1m<<\x1b[32;1m( \x1b[36;1m{$this->pag}\x1b[32;1m/\x1b[36;1m{$this->last} \x1b[32;1m)\x1b[31;1m>>\x1b[32;1m) \x1b[36;1m";
		$pil = trim(fgets(STDIN));
		if (is_string($pil)) {
			if ($pil == "N" or $pil == "n") {
				if ($this->pag == 50) {
					echo "\x1b[32;1m(\x1b[31;1m!\x1b[32;1m) \x1b[31;1mMentok Goblok...\n";
				} else {
					unset($this->urk);
					$pg = $this->pag += 1;
					$this->urk = "{$this->link}/{$cari}/{$pg}";
				}
			} elseif ($pil == "P" or $pil == "p") {
				if ($this->pag == 1) {
					echo "\x1b[32;1m(\x1b[31;1m!\x1b[32;1m) \x1b[31;1mMentok goblok..\n";
				} else {
					unset($this->urk);
					$pg = $this->pag -= 1;
					$this->urk = "{$this->link}/{$cari}/{$pg}";
				}
			} elseif ($pil == "E" or $pil == "e") {
				exit("\x1b[32;1m(\x1b[36;1m*\x1b[32;1m) \x1b[36;1mKamu Sangat Berdosa Sekali\n");
			} elseif (strpos($pil, "#") == "#") {
				unset($this->urk);
				unset($this->pag);
				$ps = str_replace("#","",$pil);
				$this->pag = $ps;
				$this->urk = "{$this->link}/{$cari}/{$this->pag}";
			} elseif ($pil == "S" or $pil == "s") {
				$this->bak = new Sex();
				$this->bak->car();
			} else {
				self::down($kep, $pil);
			}
		}
	    }
	}
	public function down($kep, $pil) {
		$no = 0;
		if ((int)$pil == 0) {
			echo "\x1b[32;1m(\x1b[31;1m!\x1b[32;1m) \x1b[31;1mPilihan tidak ada..\n";
		} else {
                    foreach ($kep as $ur) {
			$no += 1;
			if ($no >= (int)$pil) {
	                	echo "\x1b[32;1m(\x1b[37;1m*\x1b[32;1m) \x1b[36;1mSedang Men-download....\n";
	                	$dow = $ur["link"];
				$dom = $ur["lik"];
				$dosa = str_replace(" ","-", $ur["name"]);
				if (strlen($ur["name"]) >= 40) {
					$cewe = explode(" ", $ur["name"]);
					$dosa = implode("-", array_slice($cewe,0,8));
				}
				if ($dom == null) {
             				$chh = curl_init($dow);
			     		$fille = "/data/data/com.termux/files/home/storage/shared/XNXX-v2/".$dosa.".mp4";
		             		$fpp = fopen($fille, 'wb');
	        	     		curl_setopt_array($chh, array(
	               		    		CURLOPT_FILE => $fpp,
	                      		        CURLOPT_HEADER => 0,
	                                	));
			                curl_exec($chh);
		        	        curl_close($chh);
	        	                fclose($fpp);
				} else {
					$chh = curl_init($dom);
                                        $fille = "/data/data/com.termux/files/home/storage/shared/XNXX-v2/".$dosa.".mp4";
                                        $fpp = fopen($fille, 'wb');
                                        curl_setopt_array($chh, array(
                                                CURLOPT_FILE => $fpp,
                                                CURLOPT_HEADER => 0,
                                                ));
                                        curl_exec($chh);
                                        curl_close($chh);
                                        fclose($fpp);
				}
	                        echo "\x1b[32;1m(\x1b[37;1m+\x1b[32;1m) \x1b[36;1mDownload Selesai...\n";
	                        echo "\x1b[32;1m(\x1b[37;1m+\x1b[32;1m) \x1b[36;1mSaved = \x1b[32;1m".$fille."\n\n";
		                break;
	                }
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
