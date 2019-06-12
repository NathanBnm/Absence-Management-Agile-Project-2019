<?php
if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ETU') {
	?>
	<nav class="navbar bleu" role="navigation" aria-label="main navigation">
		<div id="navbar" class="navbar-menu">
			<div class="navbar-start">
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link has-dropdown">
						<i class="fas fa-portrait" style="font-size: 30px; padding: 10%"></i>
						Etudiant
					</a>
					<div class="navbar-dropdown is-left">
						<a class="navbar-item">
							Mes Informations
						</a>
					</div>
				</div>
				<a class="navbar-item">
					Accueil
				</a>
				<a class="navbar-item">
					Absences
				</a>
				<a class="navbar-item">
					Retards
				</a>
			</div>
			<div class="navbar-end">
				<a class="navbar-item">
					<i class="fas fa-power-off" style="font-size: 30px"></i>
				</a>
			</div>
		</div>
	</nav>
<?php
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ENS') {
	?>
	<nav class="navbar orange" role="navigation" aria-label="main navigation">
		<div id="navbar" class="navbar-menu">
			<div class="navbar-start">
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link has-dropdown">
						<i class="fas fa-portrait" style="font-size: 30px; padding: 10%"></i>
						Enseignant
					</a>
					<div class="navbar-dropdown is-left">
						<a class="navbar-item">
							Mes Informations
						</a>
					</div>
				</div>
				<a class="navbar-item">
					Accueil
				</a>
				<a class="navbar-item">
					Absences
				</a>
				<a class="navbar-item">
					Retards
				</a>
			</div>
			<div class="navbar-end">
				<a class="navbar-item">
					<i class="fas fa-power-off" style="font-size: 30px"></i>
				</a>
			</div>
		</div>
	</nav>
<?php
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
	?>
	<nav class="navbar violet" role="navigation" aria-label="main navigation">
		<div id="navbar" class="navbar-menu">
			<div class="navbar-start">
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link has-dropdown">
						<i class="fas fa-portrait" style="font-size: 30px; padding: 10%"></i>
						Directeur
					</a>
					<div class="navbar-dropdown is-left">
						<a class="navbar-item">
							Mes Informations
						</a>
					</div>
				</div>
				<a class="navbar-item">
					Accueil
				</a>
				<a class="navbar-item">
					Absences
				</a>
				<a class="navbar-item">
					Retards
				</a>
			</div>
			<div class="navbar-end">
				<a class="navbar-item">
					<i class="fas fa-power-off" style="font-size: 30px"></i>
				</a>
			</div>
		</div>
	</nav>
<?php
}
?>