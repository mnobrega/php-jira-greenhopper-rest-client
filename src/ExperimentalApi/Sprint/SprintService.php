<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 22/01/2018
 * Time: 01:04
 */

namespace JiraGreenhopperRestApi\ExperimentalApi\Sprint;

use JiraGreenhopperRestApi\JiraClient;

class SprintService extends JiraClient
{
    private $uri = "/sprint";

    /**
     * @param $sprintId
     * @return Sprint|object
     * @throws \JiraGreenhopperRestApi\JiraException
     * @throws \JsonMapper_Exception
     */
    public function get($sprintId)
    {
        $ret = $this->exec($this->uri."/$sprintId", null);
        $this->log->addInfo('Result='.$ret);
        $sprint = $this->json_mapper->map(
            json_decode($ret), new Sprint()
        );
        return $sprint;
    }
}