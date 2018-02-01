<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\widgets;

use armoore\scheduler\Scheduler;
use armoore\scheduler\assetbundles\schedulerwidgetwidget\SchedulerWidgetWidgetAsset;

use Craft;
use craft\base\Widget;

/**
 * Scheduler Widget
 *
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerWidget extends Widget
{

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $message = 'Hello, world.';

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('scheduler', 'SchedulerWidget');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@armoore/scheduler/assetbundles/schedulerwidgetwidget/dist/img/SchedulerWidget-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function maxColspan()
    {
        return null;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge(
            $rules,
            [
                ['message', 'string'],
                ['message', 'default', 'value' => 'Hello, world.'],
            ]
        );
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate(
            'scheduler/_components/widgets/SchedulerWidget_settings',
            [
                'widget' => $this
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerAssetBundle(SchedulerWidgetWidgetAsset::class);

        return Craft::$app->getView()->renderTemplate(
            'scheduler/_components/widgets/SchedulerWidget_body',
            [
                'message' => $this->message
            ]
        );
    }
}
