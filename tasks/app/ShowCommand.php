<?php

namespace App;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\BaseCommand;

class ShowCommand extends BaseCommand
{
    public function configure()
    {
        $this->setName('show')
             ->setDescription('Show all tasks');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }
}