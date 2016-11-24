<div class="container">
	<div class="row">
		<h1 class="center-align">Inscription</h1>
		<div class="col s12">
			<?php if (isset($error)): ?>
				<?php echo $error; ?>
			<?php endif ?>
		</div>
		<form action="" method="POST">
			<div class="col s12">
				<div class="row">
					<div class="input-field col s8 offset-s2">
						<input value="<?php echo $username ?>" type="text" name="username" id="username" class="validate" required pattern="[a-zA-Z0-9]{4,}">
						<label for="username" data-error="trop court" >Nom d'utilisateur</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8 offset-s2">
						<input type="password" id="password" name="password" class="validate" required pattern="[a-zA-Z0-9]{4,}">
						<label for="password" data-error="trop court" >Mot de passe</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s4 offset-s2">
						<input value="<?php echo $lastname ?>" type="text" name="lastname" id="lastname" class="validate" pattern="[a-zA-Z0-9]{4,}">
						<label for="lastname" data-error="trop court" >Nom</label>
					</div>
					<div class="input-field col s4">
						<input value="<?php echo $firstname ?>" type="text" id="firstname" name="firstname" class="validate" pattern="[a-zA-Z0-9]{4,}">
						<label for="firstname" data-error="trop court" >Prénom</label>
					</div>
				</div>
				<div class="row">
					<div class="col s8 offset-s2">
						<p class="center-align">
							<?php if ($sexe != "f"): ?>
								<input type="radio" checked name="sexe" value="h" id="sexeH">
								<label for="sexeH">Homme</label>
								<input type="radio" name="sexe" value="f" id="sexeF">
								<label for="sexeF">Femme</label>
							<?php else: ?>
								<input type="radio" name="sexe" value="h" id="sexeH">
								<label for="sexeH">Homme</label>
								<input type="radio" checked name="sexe" value="f" id="sexeF">
								<label for="sexeF">Femme</label>
							<?php endif ?>
						
						</p>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8 offset-s2">
						<input value="<?php echo $email ?>" type="email" id="email" name="email" class="validate">
						<label for="email" data-error="Ceci n'est pas un email">Email</label>
					</div>
				</div>
				<div class="row">
					<div class=" col s8 offset-s2">
						<input value="<?php echo $ddn ?>" type="date" class="datepicker" name="ddn" id="ddn">
						<label for="ddn">Date de naissance</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s4 offset-s2">
						<input value="<?php echo $address ?>" type="text" id="address" name="address">
						<label for="address">Adresse</label>
					</div>
					<div class="input-field col s2">
						<input value="<?php echo $zipcode ?>" type="number" name="zipcode" id="zipcode">
						<label for="zipcode">Code postal</label>
					</div>
					<div class="input-field col s2">
						<input value="<?php echo $city ?>" type="text" name="city" id="city">
						<label for="city">Ville</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8 offset-s2">
							<input value="<?php echo $phone ?>" type="number" name="phone" id="phone" length="10">
							<label for="phone">Telephone</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field center-align">
						<button class="btn waves-effect waves-light" type="submit" name="submit">
							Inscription
							<i class="material-icons">send</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>