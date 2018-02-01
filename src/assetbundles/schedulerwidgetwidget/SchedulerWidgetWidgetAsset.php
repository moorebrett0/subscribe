<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\assetbundles\schedulerwidgetwidget;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerWidgetWidgetAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@armoore/scheduler/assetbundles/schedulerwidgetwidget/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/SchedulerWidget.js',
        ];

        $this->css = [
            'css/SchedulerWidget.css',
        ];

        parent::init();
    }
}
