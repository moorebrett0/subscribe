<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\assetbundles\schedulerfieldfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerFieldFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@armoore/scheduler/assetbundles/schedulerfieldfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/SchedulerField.js',
        ];

        $this->css = [
            'css/SchedulerField.css',
        ];

        parent::init();
    }
}
