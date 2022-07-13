<!DOCTYPE html>
<?php 
include("db.php");
include("izvodjac.php");
$id=$_GET['id'];

$db= new MysqliDb('localhost','root','','artists');

$izvodjac=$db->rawQuery('SELECT * FROM izvodjac i JOIN zanr d ON i.idZanra = d.idZanra JOIN kategorija t ON i.idKategorije = t.idKategorije WHERE idIzvodjaca = '.$id);
//var_dump($izvodjac);
$zanr=$db->get('zanr');
$kategorija=$db->get('kategorija');
$poruka = '';

if(isset($_POST['izmeni'] )){

$naziv=$_POST['naziv'];
$muzika=$_POST['muzika'];
$album=$_POST['album'];
$brojGremija=$_POST['brojGremija'];
$zanr=$_POST['zanr'];
$kategorija=$_POST['kategorija'];


$params = Array($naziv, $muzika, $album, $brojGremija,$zanr,$kategorija, $id);
$db->rawQuery('UPDATE izvodjac SET naziv=?,muzika=?,album=?,brojGremija=?,idZanra=?,idKategorije=? WHERE idIzvodjaca=?',$params);

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
        <a class="nav-item nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="prikazIzvodjaca.php">Artists</a>
        <a class="nav-item nav-link" href="ajax.php">Search</a>
        <a class="nav-item nav-link" href="kontakt.php">Contact</a>
        </div>
      </div>
    </nav>
  </head>
  <body>
    <div class="container">
    <h1>Izmeni: </h1>
      <?php if($poruka != ''){ ?>
        <div class="well"><?php echo $poruka ?></div>
      <?php } ?>

      <form class="form-horizontal" method="POST" action="" role="form">
        <div class="form-group">
          <label class="control-label col-sm-2" for="naziv">Naziv:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="naziv" id="naziv" value="<?php echo $izvodjac[0]['naziv']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="muzika">Muzika:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="muzika" id="muzika" value="<?php echo $izvodjac[0]['muzika']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="album">Album:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="album" id="album" value="<?php echo $izvodjac[0]['album']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="brojGremija">Broj gremija:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="brojGremija" id="brojGremija" value="<?php echo $izvodjac[0]['brojGremija']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="zanr">Žanr:</label>
          <div class="col-sm-10">
            <select class="form-control" name="zanr" id="zanr">
              <option value="<?php echo $izvodjac[0]['idZanra'];?>"><?php echo $izvodjac[0]['idZanra'];?></option>

              <?php foreach($zanr as $d): ?>
                <option value="<?php echo $d['idZanra'];?>"><?php echo $d['nazivZanra'];?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="kategorija">Kategorija:</label>
          <div class="col-sm-10">
            <select class="form-control" name="kategorija" id="kategorija">
              <option value="<?php echo $izvodjac[0]['idKategorije'];?>"><?php echo $izvodjac[0]['idKategorije'];?></option>
                <?php foreach($kategorija as $t): ?>
              <option value="<?php echo $t['idKategorije'];?>"><?php echo $t['nazivKategorije'];?></option>
                <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" id="izmeni" name="izmeni" class="btn btn-outline-light">Izmeni</button>
          </div>
        </div>
      </form>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>