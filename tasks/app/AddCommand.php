<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\BaseCommand;

class AddCommand extends BaseCommand
{
    public function configure()
    {
        $this->setName('add')
             ->setDescription('Add a new task')
             ->addArgument('description', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->dbAdapter->query(
            'insert into tasks(description) values(:description)',
            compact('description')
        );

        $this->showTasks($output);
    }
}