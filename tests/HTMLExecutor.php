<?php

namespace Tests;

class HTMLExecutor {

	public function getHTML(string $page): string {

		$dir_script = shell_exec("cd " . dirname(dirname(__FILE__)) . '/public; pwd;');
		$dir_script = trim(preg_replace('/\s+/', ' ', $dir_script));

		$command = "php $dir_script/index.php $page";

		$output = shell_exec($command);

		return $output;
	}

}
