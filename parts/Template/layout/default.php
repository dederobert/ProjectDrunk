<html>
<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php echo CssHelper::css("materialize.min"); ?>
	<?php echo CssHelper::css("Drunk"); ?>
	<title>Project drunk</title>
	<?php echo ScriptHelper::script("jquery-3.1.1.min"); ?>
</head>
<body>
	<nav>
		<ul>
			<li><a href="<?php echo URLHelper::URL(); ?>">Home</a></li>
			<li><a href="<?php echo URLHelper::URL(['controller' => 'ingredients']);?>">Cocktails</a></li>
			<li><a href="<?php echo URLHelper::URL(['controller' => 'users', 'action' => 'login']) ?>">Connexion</a></li>
			<li><a href="#" ><i class="material-icons">loyalty</i></a></li>
		</ul>
	</nav>
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
	</div>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				&copy;&nbsp;2016 The A-Team 
			</div>
		</div>
	</footer>
	<?php echo ScriptHelper::script("materialize.min"); ?>
</body>
</html>