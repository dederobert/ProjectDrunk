<html>
<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php echo CssHelper::css("materialize.min"); ?>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.DS."www".DS."css".DS."materialize.min.css" ?>">-->
	<title>Project drunk</title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="<?php echo URLHelper::URL(); ?>">Home</a></li>
			<li><a href="<?php echo URLHelper::URL(['controller' => 'cocktails']);?>">Cocktails</a></li>
		</ul>
	</nav>
	<div class="container">
		<?php if (!empty($breadcrumb)): ?>
			<nav>
				<div class="nav-wrapper">
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
				&copy;&nbsp;2016 The A-Team 
			</div>
		</div>
	</footer>
	<?php echo ScriptHelper::script("materialize.min"); ?>
	<!--<script src="<?php echo WWW.DS."js".DS."materialize.min.js" ?>"></script>-->
</body>
</html>