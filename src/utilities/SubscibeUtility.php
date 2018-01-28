<?php
/**
 * Subscibe plugin for Craft CMS 3.x
 *
 * Calendar/Membership plugin
 *
 * @link      github.com/moorebrett0
 * @copyright Copyright (c) 2018 Brett Moore and Mailo Arsac
 */

namespace subscribe\subscibe\utilities;

use subscribe\subscibe\Subscibe;
use subscribe\subscibe\assetbundles\subscibeutilityutility\SubscibeUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * Subscibe Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Brett Moore and Mailo Arsac
 * @package   Subscibe
 * @since     1.0.0
 */
class SubscibeUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('subscibe', 'SubscibeUtility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'subscibe-subscibe-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@subscribe/subscibe/assetbundles/subscibeutilityutility/dist/img/SubscibeUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(SubscibeUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'subscibe/_components/utilities/SubscibeUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
