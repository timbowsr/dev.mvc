<?PHP

# initialize the site
include 'init.php';

# start performance testing if set in the registry
if ( Config::appTest()) startSiteTest();

# autoload controllers
function __autoload( $className )
{
    $path  = BASE_PATH . str_replace( '\\', '/', $className ) . '.php';
	if ( file_exists( $path )) { require_once( $path ); } else { header( 'Location: /' ); }
}

// # check for user login, if not logged in then send to login page
// $uri = ( !$_SESSION['user']['authenticated'] ) ? $uri = '/index/login' : $_SERVER['REQUEST_URI'];

# call the controller
$controller = sys\models\Uri::controllerNS();
$controller = new $controller( $uri );