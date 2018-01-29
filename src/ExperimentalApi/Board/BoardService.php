<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 27/01/2018
 * Time: 00:50
 */

namespace JiraGreenhopperRestApi\ExperimentalApi\Board;

use JiraGreenhopperRestApi\JiraClient;
use JiraGreenhopperRestApi\ExperimentalApi\Sprint\SprintSearchResult;

class BoardService extends JiraClient
{
    private $uri = 'experimental-api/1.0/board';

    /**
     * @param array $paramArray
     * @return BoardSearchResult|object
     * @throws \JiraGreenhopperRestApi\JiraException
     * @throws \JsonMapper_Exception
     */
    public function getAllBoards($paramArray = [])
    {
        $ret = $this->exec($this->uri.$this->toHttpQueryParameter($paramArray),null);
        return $this->json_mapper->map(
            json_decode($ret), new BoardSearchResult()
        );

    }

    /**
     * Notes: The query param maxResults is always < 50
     * @param $boardId
     * @param array $paramArray
     * @return object
     * @throws \JiraGreenhopperRestApi\JiraException
     * @throws \JsonMapper_Exception
     */
    public function getSprints($boardId, $paramArray = [])
    {
        $ret = $this->exec($this->uri.'/'.$boardId.'/sprint'.$this->toHttpQueryParameter($paramArray), null);
        $this->log->addInfo("Result=\n".$ret);
        return $this->json_mapper->map(
            json_decode($ret), new SprintSearchResult()
        );
    }
}