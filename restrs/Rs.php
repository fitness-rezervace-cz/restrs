<?php

/**
 * Description of Rs
 *
 * @author HMIRAM
 */
class Rs {
	
	/**
	 * adresar v kterem se nachazi tento a dalsi soubory
	 */
	const  ADR = 'restrs';
	
	/**
	 * Nazev RS - dostanete od rezervacniho systemu
	 */
	const  NAME = '****ZAZADAT*****';

	/**
	 * WWW adresa pro RS - musi koncit lomitkem (/)
	 */
	const WWW = 'http://VASE_URL.inrs.cz/';		
	
	/**
	 * URL pro REST API
	 */
	const URL = 'http://46.28.111.31:3000/';		
	
	/**
	 * Prideleny token
	 */
	const TOKEN = '****ZAZADAT*****';
	
	/**
	 * oddelovac
	 */
	const DS = '/';
	
	/**
	 * Adresar pro cache obrazku
	 */
	const ADR_IMG = '/public/img/';
	
	/**
	 * Adresar pro textovy cache
	 */
	const ADR_CACHE = '/cache/';
	
	/**
	 * Defaultni obrazek, pokud se nepodarilo nacist obrazek pro aktivity
	 * umisteni obrazku je v ADR_IMG
	 */
	const DEFAULT_IMG_AKTIVITA  = 'default_aktivita.jpg';
	
	
}
