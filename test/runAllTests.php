<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 21/01/2018
 * Time: 16:25
 */

namespace JiraAgileRestApi;
use JiraGreenhopperRestApi\BacklogIssue\BacklogIssue;
use JiraGreenhopperRestApi\BacklogIssue\BacklogIssueService;
use JiraGreenhopperRestApi\Board\BoardService;
use JiraGreenhopperRestApi\Configuration\DotEnvConfiguration;
use JiraGreenhopperRestApi\Issue\Issue;
use JiraGreenhopperRestApi\Issue\IssueService;
use JiraGreenhopperRestApi\IssueRank\IssueRank;
use JiraGreenhopperRestApi\IssueRank\IssueRankService;
use JiraGreenhopperRestApi\Sprint\Sprint;
use JiraGreenhopperRestApi\Sprint\SprintIssue;
use JiraGreenhopperRestApi\Sprint\SprintService;

require_once(__DIR__.'/../vendor/autoload.php');

$dotEnvConfig = new DotEnvConfiguration(__DIR__."/../");
$issueRankService = new IssueRankService($dotEnvConfig);
$issueService = new IssueService($dotEnvConfig);
$backlogIssueService = new BacklogIssueService($dotEnvConfig);
$sprintService = new SprintService($dotEnvConfig);
$boardService = new BoardService($dotEnvConfig);

$testIssueKey = 'VVESTIOS-152';
$testBeforeIssueKey = 'VVESTIOS-149';
$testBoardId=5;

try {

    // TEST get All Boards
    $boards = $boardService->getAllBoards();
    dd($boards);

    // TEST get board sprints
    $boardSprints = $boardService->getSprints($testBoardId);
    dump($boardSprints);

} catch (\Exception $e) {
    dd($e);
}
