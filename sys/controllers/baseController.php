<?PHP namespace sys\controllers;

use \sys\models as s;

abstract class BaseController
{

	public function __construct() 
	{
		echo 'base controller<br>';
	}

	public function __destruct()
	{
		echo 'destruct base<br>';
		$action = s\Uri::action();
		if ( method_exists( $this, $action )) $this->$action();
	}

}