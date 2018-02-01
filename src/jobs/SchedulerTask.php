<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\jobs;

use armoore\scheduler\Scheduler;

use Craft;
use craft\queue\BaseJob;

/**
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerTask extends BaseJob
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        // Do work here
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('scheduler', 'SchedulerTask');
    }
}
