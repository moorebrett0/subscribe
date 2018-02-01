<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\console\controllers;

use armoore\scheduler\Scheduler;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Default Command
 *
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class DefaultController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Handle scheduler/default console commands
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console DefaultController actionIndex() method\n";

        return $result;
    }

    /**
     * Handle scheduler/default/do-something console commands
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'something';

        echo "Welcome to the console DefaultController actionDoSomething() method\n";

        return $result;
    }
}
