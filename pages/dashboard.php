<?php
    if(isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR'){
        ?>
            <div id="fixe-haut">
	<img  src="../img/DECO.png"  alt="Deco" title="Yes" height="70" width="70" align="right"/>
		<nav>
			<ul>
				<li class="menu-html"><a href=html.html">MENU</a>
					<ul class="submenu">
						<li><a href="#">CHOIX 1</a></li>
						<li><a href="#">CHOIX 2</a></li>
					</ul>
				</li>
			</ul>
		<nav>
	</div>
	</br></br></br></br></br>
	<h1>Connexion Directeur Etude :</h1></br></br></br></br></br></br>
	<p><img src="../img/logoiut.png"  alt="logo" title="Unicaen" height="300" width="570"/ align"center"></br></p>
        <?php
    }

?>
<!--
<h1>Tableau de bord</h1>
<p>Si aucun message d'erreur s'affiche c'est que la connexion à la base de données n'a pas echoué</p>
-->