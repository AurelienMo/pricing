<?php

namespace Pricing\Infrastructure\Cli\PresetData;

use Doctrine\ORM\EntityManagerInterface;
use Nelmio\Alice\Loader\NativeLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoadPresetData extends Command
{
    protected static $defaultName = "pricing:load-preset-data";

    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    final protected function configure(): void
    {
        $this
            ->setDescription('Load preset data (courses informations)');
    }

    final protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $objects = $this->getNativeLoader()->loadFile(__DIR__.'/data/init.yml');
        $output->writeln("<info>Start import preset data</info>");
        foreach ($objects->getObjects() as $object) {
            $this->entityManager->persist($object);
        }
        $this->entityManager->flush();
        $output->writeln("<info>End import preset data</info>");
        return 0;
    }

    private function getNativeLoader(): NativeLoader
    {
        return new NativeLoader();
    }
}
