<?php
/**
 * Subscibe plugin for Craft CMS 3.x
 *
 * Calendar/Membership plugin
 *
 * @link      github.com/moorebrett0
 * @copyright Copyright (c) 2018 Brett Moore and Mailo Arsac
 */

namespace subscribe\subscibe\variables;

use subscribe\subscibe\Subscibe;

use Craft;

/**
 * Subscibe Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.subscibe }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Brett Moore and Mailo Arsac
 * @package   Subscibe
 * @since     1.0.0
 */
class SubscibeVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.subscibe.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.subscibe.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
