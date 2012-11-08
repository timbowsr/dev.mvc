<?PHP namespace app\controllers;
use \sys\controllers as s;

class IndexController extends s\BaseController
{

	public function __construct() 
	{
		echo 'index controller<br>';

		parent::__construct();

	}

	public function indexAction() 
	{
		echo 'index action<br>';
	}

}