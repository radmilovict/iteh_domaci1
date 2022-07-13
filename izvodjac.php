<?php 

class Izvodjac {

	private $id;
	private $naziv;
	private $muzika;
	private $album;
	private $brojGremija;
	private $zanr;
	private $kategorija;
	private $poruka;
	

	
	public function __construct()
	{
		
	}
	
	public function ubaciIzvodjace($data,$db){
		
		if($data['naziv'] === '' || $data['muzika'] === '' || $data['album'] === '' || $data['brojGremija'] === ''){
			$this->poruka = 'Potrebno je popuniti polja';
		
		} else {
			if(!(is_numeric($data['brojGremija']))){
				$this->poruka = 'Broj a ne broj string.';
			} else {
				$sacuvano = $db->insert('izvodjac', $data);
			if($sacuvano){
				$this -> poruka = 'Izvodjac je uspesno unet';
			}else{
				$this -> poruka = 'Unos izvodjaca je neuspesan.';
			}
			}
			
		}
		
		
	}
	
	public function getPoruka(){
		
		return $this -> poruka;
	}

}


?>