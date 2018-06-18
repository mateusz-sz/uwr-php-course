<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/18/18
 * Time: 7:30 PM
 */

namespace TransactionStatus;

use MyCLabs\Enum\Enum;


/**
 * @method static Status ACTIVE()
 * @method static Status BLOCKED()
 * @method static Status SUSPENDED()
 * @method static Status CLOSED()
 */
class Status extends Enum
{
    private const ACTIVE = 'active';
    private const BLOCKED = 'blocked';
    private const SUSPENDED = 'suspended';
    private const CLOSED = 'closed';
}