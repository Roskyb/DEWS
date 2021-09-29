<?php
include 'utils.php';
function dibujarChat()
{
	$chat = fileToArray('charla.txt');
	foreach ($chat as $message) {
		$split = explode(":", $message);
		$user = $split[0];
		$msg = $split[1];
		echo <<<HTML
			<div class="media w-50 mb-3">
				<span><strong>$user</strong></span>
			<div class="media-body ml-3">
				<div class="bg-light rounded py-2 px-3 mb-2">
				<p class="text-small mb-0 text-muted">$msg</p>
				</div>
			</div>
			</div>
		HTML;
	}
}

dibujarChat();