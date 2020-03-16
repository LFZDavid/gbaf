<?php

//namespace Gbaf\Controller;

abstract class EntityController
{
	public function message($message)
	{
		echo '<script type="text/javascript">alert("'.$message.'");
				</script>';
	}
}