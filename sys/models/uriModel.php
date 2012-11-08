<?PHP namespace sys\models;

class Uri
{
	
	private static $_instance = null;
	private static $_data = array();

    public static function init()
    {
        if ( !self::$_instance ) { self::$_instance = new self(); }
    }

    private function __construct()
    {

		# process the uri to break path into an array
		$uri = preg_split( "/[\/\\\]/", self::get() );
		
		# remove the first index of the array because it will always be blank
		array_shift( $uri );

		# begin a controller variable with the namespace
		self::$_data['controller'] = "\\app\\controller\\";

		# get the controller data from the uri array
		self::$_data['controller'] = ( empty( $uri[0] ) || $uri[0] == '/' ) ? 'index' : strtolower( $uri[0] );
		self::$_data['controllerFile'] = self::$_data['controller'] . 'Controller';
		self::$_data['controllerNS'] = "\\app\\controllers\\" . self::$_data['controllerFile'];

		# get the action data from the uri array 
		self::$_data['action'] = ( empty( $uri[1] ) || $uri[1] == '/' ) ? 'index' : strtolower( $uri[1] );
		self::$_data['action'] .= 'Action';

    }

	public static function redirect( $path ) 
	{
		header( 'Location: http://'.Config::siteURL().'/'.$path );
		exit;
	}

	public static function get()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public static function __callStatic( $name, $arguments ) 
	{
		if ( $arguments ) 
		{
			self::$_data[$name] = $arguments[0];
		}
		else 
		{
			return self::$_data[$name];
		}
	}

}