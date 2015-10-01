<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

/**
 * Import Doc Command from Phpillip
 */
class ImportDocCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('phpillip:doc:import')
            ->setDescription('Import Doc Command from Phpillip')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('[ Importing Phpillip documentation ]');

        $app         = $this->getApplication()->getKernel();
        $source      = $app['root'] . '/../vendor/phpillip/phpillip/doc';
        $destination = $app['root'] . $app['src_path'] . '/doc';
        $files       = new Filesystem();

        $files->remove($destination);
        $files->mkdir($destination);

        foreach (Finder::create()->files()->in($source)->name('*.md') as $file) {
            $path = substr($file->getPathName(), strlen($source) + 1);
            $name = str_replace('/', '-', $path);

            $files->symlink(
                $file->getPathName(),
                sprintf('%s/%s', $destination, $name),
                true
            );
        }

        $files->symlink(
            $source . '/../README.md',
            sprintf('%s/../readme/README.md', $destination),
            true
        );
    }
}
