<!DOCTYPE html>
<?php
include("db.php");
include("izvodjac.php");
$order = '';

$db= new MysqliDb('localhost','root','','artists');
if(isset($_GET['sortiranje'])){
	if($_GET['sortiranje'] === 'rastuce'){

		$order=' order by brojGremija asc';
	}else{
		if($_GET['sortiranje'] === 'opadajuce'){
		$order=' order by brojGremija desc';
		}
	}
}

$izvodjaci=$db->rawQuery('SELECT * from izvodjac i join zanr d on i.idZanra = d.idZanra join kategorija t on i.idKategorije= t.idKategorije '.$order);

 ?>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>GRAMMYS</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	    <link rel="stylesheet" type="text/css" href="style.css">
	    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	      <a class="navbar-brand" href="#">GRAMMYS</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	        <div class="navbar-nav">
	          <a class="nav-item nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
	          <a class="nav-item nav-link active" href="prikazIzvodjaca.php">Artists</a>
	          <a class="nav-item nav-link" href="ajax.php">Search</a>
	          <a class="nav-item nav-link" href="kontakt.php">Contact</a>
	        </div>
	      </div>
	    </nav>
 		<style type="text/css">
 			th {
 				color: white;
 			}

 			td {
 				color: white;
 			}
 		</style>
	</head>
	<body>
 		<div class="container">  
			<div id="sortiranje">
				<a href="prikazIzvodjaca.php?sortiranje=rastuce">Rastuće</a>
				<a href="prikazIzvodjaca.php?sortiranje=opadajuce">Opadajuće</a>
			</div>

			<table class="table table-striped" >
				<thead>
					<tr>
						<th>Naziv</th>
						<th>Muzika</th>
						<th>Album</th>
						<th>Broj gremija</th>
						<th>Žanr</th>
						<th>Kategorije</th>
						<th>Opcije</th>

					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($izvodjaci as $izvodjac):

					?>
						<tr>
						<td><?php echo $izvodjac['naziv'];?></td>
						<td><?php echo $izvodjac['muzika'];?></td>
						<td><?php echo $izvodjac['album'];?></td>
						<td><?php echo $izvodjac['brojGremija'];?></td>
						<td><?php echo $izvodjac['nazivZanra'];?></td>
						<td><?php echo $izvodjac['nazivKategorije'];?></td>
						<td><a href="obrisi.php?id=<?php echo $izvodjac['idIzvodjaca']?>"><img src="assets/obrisi.png" width="20px" height="20px"/></a><a href="izmeni.php?id=<?php echo $izvodjac['idIzvodjaca']?>"><img src="assets/izmeni.png" width="20px" height="20px"/></a></td>
						</tr>

					<?php endforeach; ?> 

				</tbody>
			</table>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>