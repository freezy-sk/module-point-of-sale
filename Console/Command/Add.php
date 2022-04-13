<?php

namespace MarekViger\PointOfSale\Console\Command;

use MarekViger\PointOfSale\Model\Pos;
use MarekViger\PointOfSale\Model\PosFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Add extends Command
{
    private PosFactory $modelFactory;

    public function __construct(PosFactory $modelFactory)
    {
        $this->modelFactory = $modelFactory;

        parent::__construct();
    }

    /**
     * Initialization of the command.
     */
    protected function configure()
    {
        $this->setName('marekviger:pos:add');
        $this->setDescription('Add new POS');
        $this->addArgument('name', InputArgument::REQUIRED, 'Name');
        $this->addArgument('address', InputArgument::REQUIRED, 'Address');
        $this->addArgument('is_available', InputArgument::OPTIONAL, 'Is Available', false);
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $name = $input->getArgument('name');
        $isAvailable = $input->getArgument('is_available');
        if (is_string($isAvailable)) {
            $isAvailable = strtr($isAvailable, [
                'yes' => '1',
                'y' => '1',
                'no' => '0',
                'n' => '0',
            ]);
        }

        /** @var Pos $pos */
        $pos = $this->modelFactory->create();
        $pos->setData([
            'name' => $name,
            'address' => $input->getArgument('address'),
            'is_available' => (bool) $isAvailable,
        ]);
        $pos->save();

        $output->writeln(sprintf('<info>New Point Of Sale "%s" added successfully with ID %d</info>', $name, $pos->getId()));
    }
}
