<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('DEBUG', FALSE);

class ImgList{
	
	/**
	 *
	 * @var ImgList
	 */
	private static $instance = NULL;
	
	/**
	 * Seznam aktivit a jejich obrazku
	 * @var array
	 */
	private $list = [];
	
    private function __construct() {
		$this->readDataFromCache();
    }

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }

	
	/**
	 * Vraci jiz jednou naceteny obrazek
	 * @param type $idaktivita
	 * @return boolean
	 */
	public function getImg($idaktivita){
		
		if (!empty($this->list) && !empty($this->list[$idaktivita])){
			return 	$this->list[$idaktivita];
		}
		else{
			return FALSE;
		}
	}
	
	/**
	 * Ulozim si obrazek
	 * @param type $idaktivita
	 * @param type $img
	 */
	public function addImg($idaktivita, $img) {
		$this->list[$idaktivita] = $img;		
	}
	
	/**
	 * Nacitame obrazky z cache
	 */
	private function readDataFromCache() {
		
		$file = __DIR__ . Rs::ADR_CACHE . 'aktivity_img.txt';
		
				
		if (file_exists($file)){
			
			if (filemtime($file) < strtotime('- 1 days')){				
				@unlink($file);				
			}
			else{
				
				$data_cache = file_get_contents($file);
				$lines = explode(';', $data_cache);
				if (!empty($lines)){
					foreach ($lines as $line) {
						list($id, $url) = explode('|', $line);
						$id = (int)$id;
						if (!empty($id) && !empty($url) && preg_match('/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/', $url)){
							$this->list[$id] = $url;
						}
					}
				}
			}
		}
				
		
	}
	
	/**
	 * Prodaveme novy obrazek do cache
	 * @param type $idaktivita
	 * @param type $img
	 */
	public function addToCache($idaktivita, $img) {
		$file =  __DIR__ . Rs::ADR_CACHE . 'aktivity_img.txt';
		
		$data = file_get_contents($file);
		
		if (!empty($data))
			$data .= ';';
		
		$data .= $idaktivita.'|'.$img;

		
		file_put_contents($file, $data);
		
	}

	public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }
	
}

/**
 * Description of AktivitaImg
 *
 * @author HMIRAM
 */
class AktivitaImg {
	//put your code here
	
	
	/**
	 * Vraci obrazek pro aktivitu
	 * 
	 * @param type $lekce
	 * @return string
	 */
	public static function getImg($lekce){
		
		if (!empty($lekce) ){
			
			if (!empty($lekce['aktivita_img'])){
				
				$img = ImgList::getInstance()->getImg($lekce['idaktivita']);
				
				if ($img === FALSE){
					
					$imgname = $lekce['idaktivita'] . '.' . self::getExtension($lekce['aktivita_img']);
					
					$file = __DIR__ . Rs::ADR_IMG . $imgname;
					$url = Rs::ADR . Rs::ADR_IMG . $imgname;
					
					
					if (file_exists($file)){		
						if (DEBUG) echo 'soubor';
						ImgList::getInstance()->addImg($lekce['idaktivita'], $url);
						return $url;
								
					}
					else{
						
						// stahujeme obrazek
						if (self::downloadImg($lekce, $file)){
							if (DEBUG) echo 'downloadImg';
							ImgList::getInstance()->addImg($lekce['idaktivita'], $file);
							ImgList::getInstance()->addToCache($lekce['idaktivita'], $url);
							return $url;
						}
						else{
							if (DEBUG) echo 'default';
							ImgList::getInstance()->addToCache($lekce['idaktivita'], self::getDefaultImg());
							return self::getDefaultImg();
						}
					}
					
				}
				else{
					if (DEBUG) echo 'from cache';
					return $img;
				}
				
			}
			else{
				
				// defaultni obrazek
				return self::getDefaultImg();
			}
			
			
		}
		else {
			return self::getDefaultImg();
			
		}
		
		
	}
	
	/**
	 * Vraci vami pozadovany defaultni obrazek pro lekci
	 * @return string
	 */
	private function getDefaultImg(){
		return Rs::ADR_IMG . Rs::DEFAULT_IMG_AKTIVITA;
	}


	/**
	 * Vraci pripono pro obrazek
	 * @param type $aktivita_img
	 * @return type
	 */
	private static function getExtension($aktivita_img) {
		if (!empty($aktivita_img)){
			list($extension, $no) = explode('?', $aktivita_img);
			
			return $extension;
		}
		else{
			return NULL;
		}
	}
	
	/**
	 * Stahneme soubor s aktivitou k sobe
	 * 
	 * @param type $lekce
	 * @param type $file
	 * @return boolean
	 */
	private static function downloadImg($lekce, $file) {
		$img_name = $lekce['idaktivita'] . '_mini.' . self::getExtension($lekce['aktivita_img']);
		
		$url_img = Rs::WWW . 'public/images/aktivity/' . Rs::NAME . '/' . $img_name;
		
		$img = file_get_contents($url_img);
						
		if ($img !== FALSE){
			if (file_put_contents($file, $img) === FALSE){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
		else {
			return FALSE;
		}
		
	}
	
	
}
