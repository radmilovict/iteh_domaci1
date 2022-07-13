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
			$this->poruka = 'Potrebno je popuniti sva polja!';
		
		} else {
			if(!(is_numeric($data['brojGremija']))){
				$this->poruka = 'Uneli ste string umesto broja!';
			} else {
				$sacuvano = $db->insert('izvodjac', $data);
			if($sacuvano){
				$this -> poruka = 'Uspešno ste uneli izvođača.';
			}else{
				$this -> poruka = 'Unos izvođača je neuspešan!';
			}
			}
			
		}
		
		
	}
	
	public function getPoruka(){
		
		return $this -> poruka;
	}

}


?>