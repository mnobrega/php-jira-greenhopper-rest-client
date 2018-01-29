<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 22/01/2018
 * Time: 00:32
 */

namespace JiraGreenhopperRestApi\ExperimentalApi\Sprint;


class Sprint implements \JsonSerializable
{
    const STATE_CLOSED = 'closed';
    const STATE_FUTURE = 'future';
    const STATE_ACTIVE = 'active';

    /** @var integer */
    public $id;
    /** @var string */
    public $self;
    /** @var string */
    public $state;
    /** @var string */
    public $name;
    /** @var string|null */
    public $startDate;
    /** @var string|null */
    public $endDate;
    /** @var string */
    public $completeDate;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}