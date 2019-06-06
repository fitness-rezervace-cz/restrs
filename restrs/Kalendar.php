<?php

require_once 'Rs.php';
require_once 'AktivitaImg.php';

/**
 * Description of Kalendar
 *
 * @author HMIRAM
 */
class Kalendar {	
	
	/**
	 * Nazev REST akce
	 */
	const KALENDAR_AKCE = 'kalendar';
	
	/**
	 * 1/0 - jestli se budou zobrazovat starsi lekce
	 */
	const VIEW_OLD_AKCE = 'VIEW_OLD_AKCE';
	
	/**
	 * pocatecni hodina kalendare
	 */
	const HRS_START = 'HRS_START';
	
	/**
	 * Pocet zobrazovanycho hodnin v kalendari
	 */
	const HRS_COUNT = 'HRS_COUNT';
	
	/**
	 * hodiny, ktere se nebudou v kalendari tisknoout
	 */
	const HRS_NOT_PRINT = 'HRS_NOT_PRINT';
	
	/**
	 * Pole konfiguracnich hodnot
	 * @var array
	 */
	private $config = NULL;
	
	/**
	 * vsechny nactene lekce
	 * @var array
	 */
	private $lekce = NULL;
	
	function __construct() {
		;
	}
			
	
	/**
	 * Nacitame data z kalendare
	 * 
	 * @param int $idmistnost
	 * @param string $dt_od - datum od - format yyyy-mm-ddd
	 * @param string $dt_do - datum do - format yyyy-mm-ddd
	 * @throws Exception
	 */
	public function readData($idmistnost, $dt_od, $dt_do) {
		
		$idmistnost = (int)$idmistnost;
		
		if (empty($idmistnost) || empty($dt_od) || empty($dt_do))
			throw new Exception('Musi byt nastaveny vsechny parametry');
		
		if (!is_numeric($idmistnost))
			throw new Exception('idmistnost neni cislo');
		
		if (!$this->validateDate($dt_do) || !$this->validateDate($dt_od))
			throw new Exception('dt error');
		
		$url = Rs::URL . self::KALENDAR_AKCE .  Rs::DS . Rs::TOKEN . Rs::DS . $idmistnost . Rs::DS . $dt_od . Rs::DS . $dt_do;
		
		//echo $url;
		
		// defaultne ma curl nastavenou metodu GET - takze nastavovat
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		$data = curl_exec($ch); 
		
		if ($data === FALSE)
			throw new Exception(curl_error($ch));
		
		curl_close($ch);
		
		$arr = json_decode($data, TRUE);
		
		if (!empty($arr['error'])){
			throw new Exception($arr['txt']);
		}
		
		
		$this->lekce = $arr['data'];
		$this->setConfig($arr['config']);
		
	}
	
	/**
	 * Jenom si zlepsim pristup do konfigurace
	 * @param array $config_arr
	 */
	private function setConfig($config_arr) {
		
		if (!empty($config_arr)){
			foreach ($config_arr as $config_value) {
				$this->config[$config_value['nazev_define']] = $config_value['hodnota'];
			}
		}
		
	}
	
	
	/**
	 * Vraci hodnotu vstupni konfig hodnoty
	 * @param string $value
	 * @return string
	 * @throws Exception
	 */
	public function getConfig($value){
		if (empty($this->config))
			throw new Exception('Neexistuji data pro konfig');				
		
		if (!array_key_exists($value, $this->config))
			throw new Exception(sprintf('Neexistuje nastaveni pro %s', $value));
		
		
		return $this->config[$value];
	}
	
	/**
	 * Vraci vsechny nactene lekce
	 * @return array
	 */
	public function getLekce() {
		return $this->lekce;
	}
	
	
	/**
	 * Validace datumu
	 * @param string $date
	 * @param string $format
	 * @return bool
	 */
	private function validateDate($date, $format = 'Y-m-d'){
		
		$d = DateTime::createFromFormat($format, $date);
		
		return $d && $d->format($format) == $date;
	}
	
}
