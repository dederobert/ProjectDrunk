<div class="container">
<div class="row">
	<div class="col s12">
		<div class="card horizontal"> 
			<div class="card-image">	
				<?php echo ImgHelper::img('Photos/'.$cocktail->name.'.jpg', ['not_found' => '']) ?>
			</div>
			<div class="card-content">
				<h2 class="center-align">
					<?php echo $cocktail->name ?>
					<a href="#" class="secondary-content bnt tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter aux favories">
						 <?php echo(ImgHelper::img("empty_heart.png", 
						 	["alt"=>"empty_heart", "class"=>"heart heart_empty", "name" => $cocktail->name])
						 ); ?>
					</a>
				</h2>
				<p>
					<?php echo $cocktail->preparation ?>
				</p>
				<hr>
				<table>
					<thead>
						<tr>
							<th class="data-field"><i class="material-icons">view_list</i>Ingrédient</th>
						</tr>
					</thead>
					<tbody>
						
					<?php foreach ($cocktail->ingredients as $ingredient): ?>
						<tr><td><?php echo $ingredient ?></td></tr>
					<?php endforeach ?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>
</div>
<script>var base_url = <?php echo BASE_URL; ?></script>
<?php echo ScriptHelper::script("heart"); ?>