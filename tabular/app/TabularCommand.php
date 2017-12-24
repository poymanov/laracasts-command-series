<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TabularCommand extends Command
{
    public function configure()
    {
        $this->setName('tabular')
             ->setDescription('Display tabular data');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);
        $table->setHeaders(['Name', 'Age'])
              ->setRows([
                  ['John', '17'],
                  ['Jane', '18'],
                  ['Michael', '19']
              ])
              ->render();
    }
}