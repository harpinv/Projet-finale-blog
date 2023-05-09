<?php

// Inclusion of other classes.
use App\Controller\RootController;

require_once dirname(__FILE__) . '/../Model/DB.php';
require_once dirname(__FILE__) . '/../Controller/AbstractController.php';
require_once dirname(__FILE__) . '/../Controller/RootController.php';
require_once dirname(__FILE__) . '/../Controller/HomeController.php';
require_once dirname(__FILE__) . '/../Controller/LoginController.php';

// Inclusion of entities.
require_once dirname(__FILE__) . '/../Model/Entity/administrateur.php';
require_once dirname(__FILE__) . '/../Model/Entity/article.php';
require_once dirname(__FILE__) . '/../Model/Entity/message.php';

// Inclusion of managers.
require_once dirname(__FILE__) . '/../Model/Manager/administrateurManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/articleManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/messageManager.php';

// Inclusion of controllers.
require_once dirname(__FILE__) . '/../Controller/administrateurController.php';
require_once dirname(__FILE__) . '/../Controller/articleController.php';
require_once dirname(__FILE__) . '/../Controller/messageController.php';

// Inclusion of the router.
require_once dirname(__FILE__) . '/router.php';