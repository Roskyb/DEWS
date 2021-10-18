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
				"pregunta" => "¿Quien es el presidente de Japon?",
				"respuestas" => ["Doraemon", "Nobita", "Fumio Kishida"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "¿Como se domina al presidente de españa en el parlamento?",
				"respuestas" => ["Mc Pedro", "Perro Sanchez", "Apedra"],
				"correcta" => "Perro Sanchez"
			],
			[
				"pregunta" => "Para ser elegido representate de un partido politico en determinada circunscripción, 
				ademas de tener que cumplir con los requisitos minimos de condición. Que formulario de la deves rellena?",
				"respuestas" => ["Modelo 59-A", "Modelo 69-A", "Modelo 69-B"],
				"correcta" => "Modelo 69-B"
			],
			[
				"pregunta" => "En politica que lados hay?",
				"respuestas" => ["Izquierda y derecha", "Arriba y abajo", "Pregunta trampa, la respuesta es mis cojones"],
				"correcta" => "Pregunta trampa, la respuesta es mis cojones"
			]
		]
	],
	'PH' => [
		"preguntas" => [
			[
				"pregunta" => "¿Quien domina el top?",
				"respuestas" => ["Isabel Yasuo", "El mafioso de Sinchan", "Ander Ezequiel Vicente"],
				"correcta" => "Isabel Yasuo"
			],
			[
				"pregunta" => "Que contiene PH",
				"respuestas" => ["Videos", "Poemas", "VideoJuegos"],
				"correcta" => "Videos"
			],
			[
				"pregunta" => "En que lado del reproductor se encuentra \" Enviar a pantalla \" ?",
				"respuestas" => ["Arriba a la derecha", "Abajo en el centro", "No sale"],
				"correcta" => "Arriba a la derecha"
			],
			[
				"pregunta" => "Segun las políticas de privacidad de la página puedes subir contenido de terceros sin verificación",
				"respuestas" => ["Depende la hora del día", "No", "Si"],
				"correcta" => "No"
			]
		]
	], 'ESPAÑA' => [
		"preguntas" => [
			[
				"pregunta" => "España es el mejor páis del mundo",
				"respuestas" => ["No se que quieres que responda...", "Probablemente", "Si..."],
				"correcta" => "No se que quieres que responda..."
			],
			[
				"pregunta" => "Con que se hizo la bandera de españa",
				"respuestas" => ["Papel y boli", "Colillas de cigarros pintadas", "2 gotas de sangre y un rayo de sol"],
				"correcta" => "2 gotas de sangre y un rayo de sol"
			],
			[
				"pregunta" => "Eres español si vives en ceuto o en melilla",
				"respuestas" => ["No", "Si", "Dicen que si pero no estoy seguro"],
				"correcta" => "Dicen que si pero no estoy seguro"
			],
			[
				"pregunta" => "Si es poseedor de un carnet de tipo b en territorio español el cual tiene una antiguiedad superior a dos años, puede usted circula con vehiculos con un MMA superior a 4250kg impulsado por combustibles alternativos?",
				"respuestas" => ["Con y sin carnet, a mi nadie me manda", "Si", "No"],
				"correcta" => "Si"
			]
		]
	], 'Ingenieria' => [
		"preguntas" => [
			[
				"pregunta" => "1+1=?",
				"respuestas" => ["2", "3", "4"],
				"correcta" => "Fumio Kishida"
			],
			[
				"pregunta" => "Cuantos lados tiene un triangulo",
				"respuestas" => ["3", "Tris", "2"],
				"correcta" => "3"
			],
			[
				"pregunta" => "Por cuantas esquinas esta compuesto un circulo ",
				"respuestas" => ["Infinity", "0", "Yo que se"],
				"correcta" => "Infinity"
			],
			[
				"pregunta" => "Profe puedo usar calculadora?",
				"respuestas" => ["Ininglish plish", "No", "Si"],
				"correcta" => "Si"
			]
		]
	]
];
