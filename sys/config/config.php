<?PHP

/*
 * config.php
 * Config class
 * responsible for setting and returning config variables
 */

abstract class Config 
{

	public static function __callStatic( $name, $arguments ) 
	{

		global $registry;

		if ( $arguments ) 
		{
			$registry[$name] = $arguments[0];
		}
		else 
		{
			return ( $registry[$name] ) ? $registry[$name] : null;
		}

	}

}