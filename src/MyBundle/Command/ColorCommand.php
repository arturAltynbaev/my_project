<?php

namespace MyBundle\Command;

use MyBundle\Entity\Test;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ColorCommand extends Command
{
    private $container;

    public function __construct($name = null, ContainerInterface $container)
    {
        parent::__construct($name);
        $this->container = $container;
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:color')

            // the short description shown while running "php bin/console list"
            ->setDescription('Get color result.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command get color result.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Get test color',
            '============',
            '',
        ]);

        $test = $this->container->get('doctrine')
            ->getRepository(Test::class)
            ->find(1);

        var_dump($test);

        $output->writeln('Whoa!');
        $output->writeln('The end.');
    }
}
