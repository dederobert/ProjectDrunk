<html>
<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php echo CssHelper::css("materialize.min"); ?>
	<?php echo CssHelper::css("Drunk"); ?>
	<title>Project drunk</title>
	<?php echo ScriptHelper::script("jquery-3.1.1.min"); ?>
</head>
<body>
	<header id="top">
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper">
					<a class="brand-logo" href="<?php echo URLHelper::URL(); ?>">Home</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="<?php echo URLHelper::URL(['controller' => 'ingredients']);?>">Cocktails</a></li>
						<?php if (!isset($_SESSION['user'])): ?>
							<li><a href="<?php echo URLHelper::URL(['controller' => 'users', 'action' => 'login']) ?>">Connexion</a></li>
							<li><a href="<?php echo URLHelper::URL(['controller' => 'users', 'action' => 'register']) ?>">Inscription</a></li>
						<?php else:
						$user = unserialize($_SESSION['user']);
						 ?>
							<li><a href="<?php echo URLHelper::URL(['controller' => 'users', 'action' => 'logout']) ?>">Deconnexion</a></li>
							<li><a href="<?php echo URLHelper::URL(['controller' => 'users', 'action' => 'view', 'params'=>[$user->username]]) ?>">Profil</a></li>
						<?php endif ?>
						<li><a href="#" ><i class="material-icons">loyalty</i></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<main>
		<div class="">
			<?php if (!empty($breadcrumb)): ?>
				<nav>
					<div class="nav-wrapper teal">
						<div class="col s12">
							<?php foreach ($breadcrumb as $node): ?>
								<a href="<?php echo $node['url']; ?>" class="breadcrumb"><?php echo $node['title']; ?></a>
						
							<?php endforeach ?>	
						</div>
					</div>
				</nav>
			<?php endif ?>
			<!-- Inclusion du contenue de la page depuis le dossier parts/nom_controller -->
			<?php include $viewPath; ?>
			<a href="#top" class="right pinned back-top waves-effect waves-circle waves-light btn-floating secondary-content">^</a>
		</div>
	</main>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
			<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a>
			<br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.	
			</div>
		</div>
	</footer>
	<?php echo ScriptHelper::script("materialize.min"); ?>
</body>
</html>