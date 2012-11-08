<?PHP

function startSiteTest()
{
	$_SESSION['site_test']['start_time'] = microtime();
	$_SESSION['site_test']['start_mem1'] = memory_get_usage(true);
	$_SESSION['site_test']['start_mem2'] = memory_get_usage();
}

function endSiteTest() 
{
	unset( $_SESSION['site_test'] );
}

function echor( $var ) 
{
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
	echo '<br>';
}