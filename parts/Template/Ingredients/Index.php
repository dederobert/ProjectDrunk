<ul>
	<?php foreach($ingredients["sous-categorie"] as $ingredient): ?>
	<li><?php echo URLHelper::link(['controller' => 'Ingredients', 'action' => 'view', 'params' => [$ingredient]],
	$ingredient); ?></li>
	<?php endforeach; ?>
</ul>