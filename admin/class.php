<?php

class Admin extends Page{
	public function __construct() {
		$this->LoadDataBase();
		$this->LoadLang();
	}
		public function BodyHead($title) {
		echo "<body>\n";
		echo "<div id=Admin>\n";
		$this->LoadScript();
		echo "<h2>".$title."</h2>";
	}
	public function BodyFoot() {
		echo "</div>\n";
		echo "</body>\n";
	}

}

?>
