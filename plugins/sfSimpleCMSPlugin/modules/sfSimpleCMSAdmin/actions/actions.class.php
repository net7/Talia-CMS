<?php

// autoloading for plugin lib actions is broken as of symfony-1.0.2
require_once(sfConfig::get('sf_plugins_dir'). '/sfSimpleCMSPlugin/modules/sfSimpleCMSAdmin/lib/BasesfSimpleCMSAdminActions.class.php');

class sfSimpleCMSAdminActions extends BasesfSimpleCMSAdminActions
{
}
