<?php

require_once 'Kalendar.php';
require_once 'Rs.php';	

try{
	$objKalendar = new Kalendar();
	$objKalendar->readData(1, '2019-06-04', '2019-06-04');
	
	$lekce_arr = $objKalendar->getLekce();
	
	//var_dump($lekce_arr);
	
?>

<div class="config">
	Konfigurace:
	<div>Zobrazovat probehle lekce: <?php echo (!empty($objKalendar->getConfig(Kalendar::VIEW_OLD_AKCE)) ? 'ANO' : 'NE') ?></div>
	<div>Pocatecni hodina kalendare: <?=$objKalendar->getConfig(Kalendar::HRS_START)?></div>
	<div>Pocet hodina v kalendari: <?=$objKalendar->getConfig(Kalendar::HRS_COUNT)?></div>
	<div>Nezobrazovat hodiny v kalendari: <?=$objKalendar->getConfig(Kalendar::HRS_NOT_PRINT)?></div>
</div>
<?php
	
	
	if (!empty($lekce_arr)){
		foreach ($lekce_arr as $lekce) {
			?>
<div class="lekce">
	<div>Nazev lekce: <?=$lekce['nazev_lekce']?></div>
	<div>Aktivita: <?=$lekce['aktivita']?></div>
	<div>Cas:  <?=$lekce['datum']?> <?=$lekce['od_cas']?> - <?=$lekce['do_cas']?></div>
	<div>Rezervace: <?=$lekce['pocet_rezervaci']?> <?php echo (!empty($lekce['pocet_rezervaci_nahradnik']) ? ' + ' . $lekce['pocet_rezervaci_nahradnik'] : ''); ?> / <?=$lekce['pocet_volnych_mist']?></div>
	<div>Cena: <?=$lekce['cena']?></div>
	<div>Obtiznost: <?=$lekce['obtiznost']?></div>	
	<div>Kurz: <?php echo (!empty($lekce['kurz']) ? 'ANO' : 'NE') ?></div>
	<div>Cena kurzu: <?=$lekce['cena_kurzu']?></div>
	<div>instruktor: <?=$lekce['firstname']?> <?=$lekce['lastname']?></div>
	<div>instruktor2: <?=$lekce['firstname2']?> <?=$lekce['lastname2']?></div>
	<div>barva aktivity: <?=$lekce['barva_aktivity']?> - barva tela,  <?=$lekce['barva_aktivity_hlavicka']?> - barva hlavicky, <?=$lekce['barva_aktivity_text']?>  - barva textu </div>
	<div>barva lekce: <?php echo (!empty($lekce['barva_lekce']) ? $lekce['barva_lekce'] : 'Nenastavena' )?> - muze byt nastavena >> prebije barvu aktivity</div>
	<div>Popis: <?=$lekce['popis']?></div>
	<div>odkaz na lekci: <a href="<?=Rs::WWW?>akce/zobrazit_akci/<?=$lekce['idakce']?>">link</a></div>
</div>
			<?php
		}
	}
	else
		echo 'Neexistuji zadne lekce';
	
}
 catch (Exception $ex){
	 echo $ex->getMessage();
 }