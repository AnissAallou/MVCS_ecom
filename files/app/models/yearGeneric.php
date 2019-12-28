	<form action="<?php echo $page ?>" method="post" style="margin-left:10px; margin-right:auto;">
		<select name="annee">
				<option value="2016" <?php if($annee == '2016') echo 'selected'; ?> id="annee">2016</option>
				<option value="2017" <?php if($annee == '2017') echo 'selected'; ?>  id="annee">2017</option>
				<option value="2018" <?php if($annee == '2018') echo 'selected'; ?>  id="annee">2018</option>
		</select>
		<button class="btn_blue" style="margin-left:auto; margin-right:auto;">Générer le graphe</button>
	</form>

	<div id="php1" style="margin-left:10px; margin-top:45px;">
		<strong>Min</strong> : <?php	echo $resultsStats["min"];	?><br>
		<strong>Max</strong> : <?php	echo $resultsStats["max"];	?><br>
		<strong>Moyenne</strong> : <?php	echo $resultsStats["moy"];	?><br>
		<strong>Total</strong> : <?php	echo $resultsStats["sum"];	?>
	</div>
