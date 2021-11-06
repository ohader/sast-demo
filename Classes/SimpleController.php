<?php
declare(strict_types=1);
namespace Olly\SastDemo;

class SimpleController
{
    /** @var mixed */
    private $uid;
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {
        $this->uid = $_GET['uid'];
    }
    public function executeAction(): void
    {
        $headers = [];
        $statement = $this->pdo->query(
            'SELECT header FROM tt_content WHERE uid=' . $this->uid
        );
        foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $headers[] = $row['header'];
        }
        echo 'UID: ' . $this->uid;
        echo implode(', ', $headers);
    }
}
