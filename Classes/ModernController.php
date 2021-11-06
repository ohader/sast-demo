<?php
declare(strict_types=1);
namespace Olly\SastDemo;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class ModernController
{
    /** @var ConnectionPool */
    private $connectionPool;
    /** @var StandaloneView */
    private $view;

    public function __construct()
    {
        $this->connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $this->view = GeneralUtility::makeInstance(StandaloneView::class);
    }
    public function executeAction(ServerRequestInterface $request): void
    {
        $headers = [];
        $uid = $request->getQueryParams()['uid'];
        $statement = $this->connectionPool
            ->getConnectionForTable('tt_content')
            ->select(['header'], 'tt_content', ['uid' => $uid]);
        foreach ($statement->getIterator() as $row) {
            $headers[] = $row['header'];
        }
        echo 'UID: ' . $uid;
        echo implode(', ', $headers);
        $this->view->assign('uid', $uid);
        $this->view->assign('headers', $headers);
    }
}
