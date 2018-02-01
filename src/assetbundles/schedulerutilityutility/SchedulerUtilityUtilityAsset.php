<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\assetbundles\schedulerutilityutility;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerUtilityUtilityAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@armoore/scheduler/assetbundles/schedulerutilityutility/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/SchedulerUtility.js',
        ];

        $this->css = [
            'css/SchedulerUtility.css',
        ];

        parent::init();
    }
}
