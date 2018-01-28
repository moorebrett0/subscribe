<?php
/**
 * Subscibe plugin for Craft CMS 3.x
 *
 * Calendar/Membership plugin
 *
 * @link      github.com/moorebrett0
 * @copyright Copyright (c) 2018 Brett Moore and Mailo Arsac
 */

namespace subscribe\subscibe\services;

use subscribe\subscibe\Subscibe;

use Craft;
use craft\base\Component;

/**
 * SubscibeService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Brett Moore and Mailo Arsac
 * @package   Subscibe
 * @since     1.0.0
 */
class SubscibeService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Subscibe::$plugin->subscibeService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (Subscibe::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
