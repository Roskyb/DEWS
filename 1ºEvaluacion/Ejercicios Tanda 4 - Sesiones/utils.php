<?php
function dibujarConfigurador()
{
	echo "<table class='table'>";
	echo "<thead>";
	echo "	<tr>
					<th>#</th>
					<th>Tipo de pregunta</th>
					<th>Cantidad</th>
					<th>Grabar fallos</th>
				</tr>";
	echo "</thead>";

	echo "<tbody>";

	for ($i = 1; $i <= 8; $i++) {

		echo "	<tr>
						<th scope='row'>$i</th>
						<td><input type='text' class='form-control'  name=preguntas[$i][tema]></td>
						<td>
							<select class='form-select' name=preguntas[$i][cantidadPreguntas]>
								";
		for ($j = 0; $j < 5; $j++) echo "<option value=$j>$j</option>";
		echo "
							</select>
						</td>
						<td>
							<input class='form-check-input' type='checkbox' name=preguntas[$i][guardarErrores] ><label for=c$i class='form-check-label'>Grabar fallos</label>
						</td>
					</tr>";
	}

	echo "</tbody>";

	echo "</table>";
}


function prettyArr($arr)
{
	print("<pre>".print_r($arr,true)."</pre>");
}