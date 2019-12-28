	<nav class="navbar navbar-default" id="navbarMed">
	<!-- <nav class="navbar navbar-default" style="background: linear-gradient(to right, blue, goldenrod);"> -->
			<div class="container-fluid">
					<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<button class="btn_green" onclick="self.location.href='../../../../../web/home/stats.php'">Retour</button>
						<button class="btn_green" onclick="self.location.href='../../../../../web/home/deconnexion.php'">Déconnexion</button>

					<ul class="nav navbar-nav navbar-right" id="navMed">
						<?php if($vViewMainGraph == true) {?>
							<li><button onclick="self.location.href='<?php echo $linkGraph ?>'"><h8>Graphe basique</h8>  <img src="../../../../../web/home/assets/img/ecomnewsmed.png" height="30" width="30"></button></li>
						<?
						}?>
						<!-- <li><button onclick="self.location.href='graphchart.php'" style="background: linear-gradient(to right, blue, goldenrod);"><h8 style="color:white;">Graphe basique</h8>  <img src="img/ecomnewsmed.png" height="30" width="30"></button></li> -->
						<?php if($vViewMainGraphColumn == true) {?>
						<li><button onclick="self.location.href='<?php echo $linkGraphColumn ?>'"><h8>Graphe en bâtonnets</h8>  <img src="../../../../../web/home/assets/img/ecomnewsmed.png" height="30" width="30"></button></li>
						<?
						}?>
						<!-- <li><button onclick="self.location.href='graphcolumninteractive.php'" style="background: linear-gradient(to right, blue, goldenrod);"><h8 style="color:white;">Graphe en bâtonnets</h8>  <img src="img/ecomnewsmed.png" height="30" width="30"></button></li> -->
						<?php if($vViewMainGraphArea == true) {?>
						<li><button onclick="self.location.href='<?php echo $linkGraphArea ?>'"><h8>Aire Graphique</h8> <img src="../../../../../web/home/assets/img/ecomnewsmed.png" height="30" width="30"></button></li>
						<?
						}?>
						<!-- <li><button onclick="self.location.href='graphareabasic.php'" style="background: linear-gradient(to right, blue, goldenrod);"><h8 style="color:white;">Aire Graphique</h8> <img src="img/ecomnewsmed.png" height="30" width="30"></button></li> -->
						<?php if($vViewMainGraphInverted == true) {?>
						<li><button onclick="self.location.href='<?php echo $linkGraphInverted ?>'"><h8>Graphe ordonné</h8>  <img src="../../../../../web/home/assets/img/ecomnewsmed.png" height="30" width="30"></button></li>
						<?
						}?>
						<!-- <li><button onclick="self.location.href='graph.php'" style="background: goldenrod;"><h8 style="color:white;">Graphe ordonné</h8>  <img src="img/ecomnewsmed.png" height="30" width="30"></button></li> -->
					</ul>
				<!-- <ul class="nav navbar-nav navbar-right">
					<li><button style="background: linear-gradient(to right, blue, goldenrod);">Ecomnews Med</button></li>
					<li><button>Ecomnews Med</button></li>
				</ul> -->

					</div>
			</div>
	</nav>
	<?php if($page) {?>
	<h8 id="title"><strong>Cliquez sur l'image :</strong></h8><br>
	<a href="<?php echo $linkArticles ?>" title="Consultez ces statistiques pour Ecomnews"><img src="../../../../../web/home/assets/img/ecomnews.png" height="100" width="100"></a>
	<?}?>
