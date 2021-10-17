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
						<td><input type='text' class='form-control'  name=preguntas[$i][tema] value=" .
			(isset($_POST['preguntas'][$i]['tema']) ? $_POST['preguntas'][$i]['tema'] : '')
			. "></td>
						<td>
							<select class='form-select' name=preguntas[$i][cantidadPreguntas]>
								";
		for ($j = 0; $j < 5; $j++) echo "<option value=$j>$j</option>";
		echo "
							</select>
						</td>
						<td>
						";
		echo "
		<input class='form-check-input' type='checkbox' name=preguntas[$i][guardarErrores] " .
			(isset($_POST['preguntas'][$i]['guardarErrores']) ? 'checked' : '') . ">" .
			"<label for=preguntas[$i][guardarErrores]  class='form-check-label'>Grabar fallos</label>";
		echo "
						</td>
					</tr>";
	}

	echo "</tbody>";

	echo "</table>";
}


function prettyArr($arr)
{
	print("<pre>" . print_r($arr, true) . "</pre>");
}

$temas = [
	'Politica' => [
		"preguntas" => [
			[
				"pregunta" => "1Pol¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "2Pol¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "3Pol¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "4Pol¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			]
		]
	],
	'PH' => [
		"preguntas" => [
			[
				"pregunta" => "PH¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "PH¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "PH¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "PH¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			]
		]
	], 'ESPAÑA' => [
		"preguntas" => [
			[
				"pregunta" => "ESP¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "ESP¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "ESP¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "ESP2¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			]
		]
	], 'Ingenieria' => [
		"preguntas" => [
			[
				"pregunta" => "1ING¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "2ING¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "3ING¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "4ING¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			]
		]
	]
];
