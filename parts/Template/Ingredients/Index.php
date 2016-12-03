<div class="row">
	<!-- Affichage de la hierarchies -->
	<div class="col s12 m3">
		<?php if ($ingredients->hasSousCategorie): ?>	
		<div class="collection with-header pinned center">
			<h4 class="collection-header">Navigation</h4>
			<?php foreach($ingredients->sousCategorie as $ingredient): ?>
			<a href="<?php echo URLHelper::URL(['controller' => 'Ingredients', 'action' => 'view', 'params' => [$ingredient]]); ?>"
					class="collection-item">
				<?php echo $ingredient; ?>
			</a>
			
			<?php endforeach; ?>
		</div>	
		<?php endif ?>
	</div>
	<!-- Affichage des cocktails-->
	<div class="col s12 m9">
		<h2>Cocktails</h2>
		<ul class="collection collapsible popout" data-collapsible="accordion">
			<!-- Affichage des cocktails -->
			<?php foreach ($ingredients->cocktails as $cocktail): ?>
			<li class="collection-item avatar">
				<!-- Nom du cocktail-->
				<div class="collapsible-header">
					<?php echo ImgHelper::img("Photos/".$cocktail->name.".jpg", ['alt' => $cocktail->name, 'not_found' => '', 'class' => 'circle']) ?>
					<span class="title"><?php echo $cocktail->name ?></span>
				</div>
				<!-- Ingrédients et prépartion-->
				<div class="collapsible-body">
					<a class="grey-text text-lighten-3" href="<?php echo URLHelper::URL(['controller' => 'cocktails', 'action' => 'view', 'params' => [$cocktail->name]]) ?>"><i class="material-icons">info</i>Voir</a>
					<h4>Ingrédients</h4>
					<ul class="browser-default">
						<?php foreach ($cocktail->ingredients as $ingredient): ?>
							<li><?php echo $ingredient ?></li>
						<?php endforeach ?>
					</ul>
					<h4>Préparation</h4>
					<p><?php echo $cocktail->preparation ?></p>
					<?php foreach ($cocktail->tags as $tag): ?>
						<div class="chip"><i class="material-icons tiny">label_outline</i><a href="<?php echo URLHelper::URL(['controller' => 'ingredients', 'action' => 'view', 'params' => [$tag]]) ?>"><?php echo $tag ?></a></div>
					<?php endforeach ?>
				</div>
				<!-- Favorie-->
					<a href="#" class="secondary-content bnt tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter aux favories">
					 <?php echo(ImgHelper::img("empty_heart.png", 
					 	["alt"=>"empty_heart", "class"=>"heart heart_empty", "name" => $cocktail->name])
					 ); ?>
					</a>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>
<script>var base_url = <?php echo BASE_URL; ?></script>
<?php echo ScriptHelper::script("heart"); ?>