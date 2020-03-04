<?php

require '../vendor/autoload.php';

$html = new Tests\HTMLExecutor;
$document = $html->getHTML('404');

// ___________________________________________


$validator = new HtmlValidator\Validator();
$result = $validator->validateDocument($document);


if ($result->hasErrors()) {
	echo "Attention il y a des erreurs !";
}

if ($result->hasWarnings()) {
	echo "Attention il y a des warnings !";
}
