<!DOCTYPE html>
<?php
include("db.php");
include("izvodjac.php");

$db= new MysqliDb('localhost','root','','artists');
$zanr=$db->get('zanr');
$kategorija=$db->get('kategorija');
$poruka = '';

if(isset( $_POST['dodaj'] )){
	
	$naziv=$_POST['naziv'];
	$muzika=$_POST['muzika'];
	$album=$_POST['album'];
	$brojGremija=$_POST['brojGremija'];
	$zr=$_POST['zanr'];
	$kategorija=$_POST['kategorija'];
	
	
	$data = Array (
				"naziv" => $naziv, 
				"muzika" => $muzika,
				"album" => $album,	
				"brojGremija" => $brojGremija,					
				"idZanra" => $zr,
				"idKategorije" => $kategorija
		);	

		$izvodjac = new Izvodjac();
		
		$izvodjac->ubaciIzvodjace($data,$db);
		
		$poruka = $izvodjac->getPoruka();

}

 ?>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Grammys</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="style.css">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Grammys</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="prikazIzvodjaca.php">Artists</a>
          <a class="nav-item nav-link" href="ajax.php">Search</a>
          <a class="nav-item nav-link" href="kontakt.php">Contact</a>
        </div>
      </div>
    </nav>

		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		
	</head>
	<body>
    <div class="container">
      <h1>Dodaj izvodjaca: </h1>
      <?php if($poruka != ''){ ?>
        <div class="well"><?php echo $poruka ?></div>
      <?php } ?>

      <form class="form-horizontal" method="post" action="" role="form">
      <div class="form-group">
        <label class="control-label col-sm-2" for="naziv">Naziv:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Unesite naziv">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="muzika">Muzika:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="muzika" id="muzika" placeholder="Unesite muziku">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="album">Album:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="album" id="album" placeholder="Unesite album">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="brojGremija">Broj gremija:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="brojGremija" id="brojGremija" placeholder="Unesite broj gremija">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="zanr">Žanr:</label>
        <div class="col-sm-4">
          <select class="form-control" name="zanr" id="zanr">
          <?php foreach($zanr as $d): ?>
          <option value="<?php echo $d['idZanra'];?>"><?php echo $d['nazivZanra'];?></option>
          <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="kategorija">Kategorija:</label>
        <div class="col-sm-4">
          <select class="form-control" name="kategorija" id="kategorija">
          <?php foreach($kategorija as $t): ?>
            <option value="<?php echo $t['idKategorije'];?>"><?php echo $t['nazivKategorije'];?></option>
          <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-10">
          <button type="submit" id="dodaj" name="dodaj" class="btn btn-outline-light">Dodaj</button>
        </div>
      </div>
      </form>

      <?php if($poruka != ''){ ?>
      <div class="well"><?php echo $poruka ?></div>
      <?php } ?>
    </div>
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	</body>
</html>