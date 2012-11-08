<?PHP

# start session
session_start();

# base path ... path to the working root of site
define( BASE_PATH, realpath( '../' ) . '/' );

# require the registry files
include BASE_PATH . 'sys/config/registry.php';
include BASE_PATH . 'app/config/registry.php';

# require the config file
include BASE_PATH . 'sys/config/config.php';

# require the common functions file
include BASE_PATH . 'libs/common.php';

# require the uri model
include BASE_PATH . 'sys/models/uriModel.php';
sys\models\Uri::init();