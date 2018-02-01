<?php
/**
 * Scheduler plugin for Craft CMS 3.x
 *
 * S
 *
 * @link      bmoore.com
 * @copyright Copyright (c) 2018 BMoore
 */

namespace armoore\scheduler\records;

use armoore\scheduler\Scheduler;

use Craft;
use craft\db\ActiveRecord;

/**
 * @author    BMoore
 * @package   Scheduler
 * @since     0.0.1
 */
class SchedulerRecord extends ActiveRecord
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%scheduler_schedulerrecord}}';
    }
}
