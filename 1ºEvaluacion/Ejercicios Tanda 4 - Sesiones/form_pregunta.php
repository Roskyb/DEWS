<div class="item col-4">
	<div class="col-md-12 col-xs-8  border-5 border-bg-danger">
		<div class="panel panel-primary">
			<div class="panel-heading bg-primary text-white p-1">
				<h4><?php echo $tema ?> - Nº1</h4>
				<p class="fw-bold"><?php echo $aciertos ?></p>

			</div>
			<div class="panel-body">
				<p class="fw-bold"><?php echo $pregunta ?></p>
				<?php
				foreach ($respuestas as $respuesta) {
					$name = 'radio' . $tema;
					echo <<<HTML
						<div class="radio">
							<label>
								<input type="radio" name=$name id="optionsRadios1" value="option1" checked=""> $respuesta
							</label>
						</div>
						HTML;
				}
				?>

			</div>
			<?php

			if ($datos['cantPreguntas'] == $datos['indice']) {
				echo "TERMINADO";
			} else {
			?>
				<div class="panel-footer">
					<input class="btn btn-secondary w-100 mt-3" type="submit" name=<?php echo $tema ?>>
				</div>
			<?php
			}

			?>

		</div>
	</div>
</div>
</form>