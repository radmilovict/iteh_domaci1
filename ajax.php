<!DOCTYPE html>
<?php
include("db.php");
include("izvodjac.php");

$db= new MysqliDb('localhost','root','','artists');
$kategorije=$db->get('kategorija');


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
	          <a class="nav-item nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
	          <a class="nav-item nav-link" href="prikazIzvodjaca.php">Artists</a>
	          <a class="nav-item nav-link active" href="ajax.php">Search</a>
	          <a class="nav-item nav-link" href="kontakt.php">Contact</a>
	        </div>
	      </div>
	    </nav>
		<script>
		
			function pronadji(){
			
			var pretraga = $("#kategorija").val();
			//alert(pretraga);
			$.ajax({url: "pretraga.php",data: "idKategorije="+pretraga, success: function(result){
				//alert(result);
				var nalepi = '<table class="table table-hover"><thead><tr><th>Naziv</th><th>Muzika</th><th>Album</th><th>Broj gremija</th><th>Žanr</th><th>Kategorija</th></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					nalepi += '<tr>';
					nalepi += '<td>'+val.naziv+'</td>';
					nalepi += '<td>'+val.muzika+'</td>';
					nalepi += '<td>'+val.album+'</td>';
					nalepi += '<td>'+val.brojGremija+'</td>';
					nalepi += '<td>'+val.nazivZanra+'</td>';
					nalepi += '<td>'+val.nazivKategorije+'</td>';
					nalepi += '</tr>';
					
					});
					
					nalepi+='</tbody></table>';
					//alert(nalepi);
					$('#output').html(nalepi);
			}});
			}
		
		</script>
		
		<style type="text/css">
			th {
				color: white;
			}

			td {
				color: white;
			}

			#katLab {
				margin-top: 10px;
				margin-bottom: 10px;
			}

			#dodaj {
				margin-top: 10px;
			}
		</style>
	</head>
	<body>  
		<div class="container">
			<div class="form-group">
				<label class="control-label col-sm-2" for="kategorija" id="katLab">Kategorija:</label>
				<div class="col-sm-10">
					<select class="form-control" name="kategorija" id="kategorija">
				    <?php foreach($kategorije as $t): ?>
					<option value="<?php echo $t['idKategorije'];?>"><?php echo $t['nazivKategorije'];?></option>
					<?php endforeach; ?>
					</select>
			 	</div>
			    <div class="col-sm-2">
			    	<button type="button" id="dodaj" name="dodaj" class="btn btn-outline-light" onclick="pronadji()">Pronadji</button>
			    </div>
			</div>
		    
			<div id="output"></div>  

		</div>

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>