<div class="row">
	<div class="col s12 m3">
		<ul>
		<?php foreach($ingredients["sous-categorie"] as $ingredient): ?>
		<li><?php echo URLHelper::link(['controller' => 'Ingredients', 'action' => 'view', 'params' => [$ingredient]],
		$ingredient); ?></li>
		<?php endforeach; ?>
	</ul>	
	</div>
	<div class="col s12 m9">
		<h2>Cocktails</h2>
		<?php foreach ($cocktails as $cocktail): ?>
			<?php var_dump($cocktail); ?>
		<?php endforeach ?>
	</div>
</div>