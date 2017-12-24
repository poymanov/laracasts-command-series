<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\BaseCommand;

class CompleteCommand extends BaseCommand
{
    public function configure()
    {
        $this->setName('complete')
             ->setDescription('Make task complete')
             ->addArgument('id', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->dbAdapter->query(
            'delete from tasks where id = :id',
            compact('id')
        );

        $output->writeln('<info>Task completed</info>');

        $this->showTasks($output);
    }
}