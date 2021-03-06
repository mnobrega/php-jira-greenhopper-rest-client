<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 21/01/2018
 * Time: 16:25
 */

namespace JiraGreenhopperRestApi;
use JiraGreenhopperRestApi\ExperimentalApi\Board\BoardService;
use JiraGreenhopperRestApi\Configuration\DotEnvConfiguration;

require_once(__DIR__.'/../vendor/autoload.php');

$dotEnvConfig = new DotEnvConfiguration(__DIR__."/../");
$boardService = new BoardService($dotEnvConfig);

try {

    // TEST get All Boards
    $boards = $boardService->getAllBoards();
    dump($boards);

    // TEST get board sprints
    $boardSprints = $boardService->getSprints($boards->values[0]->id);
    dump($boardSprints);

} catch (\Exception $e) {
    dd($e);
}
