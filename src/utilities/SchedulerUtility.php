<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\utilities;

use armoore\scheduler\Scheduler;
use armoore\scheduler\assetbundles\schedulerutilityutility\SchedulerUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * Scheduler Utility
 *
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('scheduler', 'SchedulerUtility');
    }

    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'scheduler-scheduler-utility';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@armoore/scheduler/assetbundles/schedulerutilityutility/dist/img/SchedulerUtility-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(SchedulerUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'scheduler/_components/utilities/SchedulerUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
