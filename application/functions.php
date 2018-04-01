	<?php
	
		function get_data($where, $what, $default = null){
			return !empty($where[$what]) ? $where[$what] : $default;
		}