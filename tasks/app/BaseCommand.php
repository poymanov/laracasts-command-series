<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use App\DatabaseAdapter;

class BaseCommand extends Command
{
    protected $dbAdapter;

    public function __construct(DatabaseAdapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;

        parent::__construct();
    }

    protected function showTasks(OutputInterface $output)
    {
        $tasks = $this->dbAdapter->fetchAll('tasks');

        if(empty($tasks)) {
            return $output->writeln('<info>No tasks yet</info>');
        }

        $table = new Table($output);
        $table->setHeaders(['Id', 'Description'])->setRows($tasks)->render();
    }
}