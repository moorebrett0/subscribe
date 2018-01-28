<?php
/**
 * Subscibe plugin for Craft CMS 3.x
 *
 * Calendar/Membership plugin
 *
 * @link      github.com/moorebrett0
 * @copyright Copyright (c) 2018 Brett Moore and Mailo Arsac
 */

namespace subscribe\subscibe\jobs;

use subscribe\subscibe\Subscibe;

use Craft;
use craft\queue\BaseJob;

/**
 * SubscibeTask job
 *
 * Jobs are run in separate process via a Queue of pending jobs. This allows
 * you to spin lengthy processing off into a separate PHP process that does not
 * block the main process.
 *
 * You can use it like this:
 *
 * use subscribe\subscibe\jobs\SubscibeTask as SubscibeTaskJob;
 *
 * $queue = Craft::$app->getQueue();
 * $jobId = $queue->push(new SubscibeTaskJob([
 *     'description' => Craft::t('subscibe', 'This overrides the default description'),
 *     'someAttribute' => 'someValue',
 * ]));
 *
 * The key/value pairs that you pass in to the job will set the public properties
 * for that object. Thus whatever you set 'someAttribute' to will cause the
 * public property $someAttribute to be set in the job.
 *
 * Passing in 'description' is optional, and only if you want to override the default
 * description.
 *
 * More info: https://github.com/yiisoft/yii2-queue
 *
 * @author    Brett Moore and Mailo Arsac
 * @package   Subscibe
 * @since     1.0.0
 */
class SubscibeTask extends BaseJob
{
    // Public Properties
    // =========================================================================

    /**
     * Some attribute
     *
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * When the Queue is ready to run your job, it will call this method.
     * You don't need any steps or any other special logic handling, just do the
     * jobs that needs to be done here.
     *
     * More info: https://github.com/yiisoft/yii2-queue
     */
    public function execute($queue)
    {
        // Do work here
    }

    // Protected Methods
    // =========================================================================

    /**
     * Returns a default description for [[getDescription()]], if [[description]] isn’t set.
     *
     * @return string The default task description
     */
    protected function defaultDescription(): string
    {
        return Craft::t('subscibe', 'SubscibeTask');
    }
}
