<?php

namespace You\BookingBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use DirectoryIterator;

class GenerateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('empire:generate')
            ->setDescription('Generate Manager Structure')
            ->addArgument(
                'bundle_name',
                InputArgument::OPTIONAL,
                'What entity do you want to generate manager for?'
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bundle = $input->getArgument('bundle_name');


        $data = array(
            "manager_dir" => __DIR__ . "/../" . "Manager",
            "repository_dir" => __DIR__ . "/../" . "Repository",
            "entity_dir" => __DIR__ . "/../" . "Entity",
            "config_dir" => __DIR__ . "/../../../../app/testyml",
            "bundle" => $bundle
        );

        $isdir = is_dir($data["config_dir"]);

        $this->generateDirectories($data);
        $this->generateFiles($data);

        //$newDir = $dir.

//        if ($input->getOption('yell')) {
//            $text = strtoupper($text);
//        }

        $output->writeln($isdir);
    }

    protected function generateDirectories($data)
    {
        //generate manager dir if not existent
        if (!is_dir($data["manager_dir"]))
            mkdir($data["manager_dir"], 0777);

        //generate repository dir if not existent
        if (!is_dir($data["repository_dir"]))
            mkdir($data["repository_dir"], 0777);

    }

    protected function generateFiles($data)
    {
        if (is_dir($data["entity_dir"])) {

            $dir_local = new DirectoryIterator($data["entity_dir"]);

            foreach ($dir_local as $fileinfo) {
                if (!$fileinfo->isDot()) {
                    $entityFile = $fileinfo->getFilename();

                    $fileInfo = explode(".", $entityFile);

                    //generate Manager files
                    $singleManagerDirName = $data["manager_dir"] . "/" . $fileInfo[0] . "Manager.php";
                    if (!is_file($singleManagerDirName)) {
                        $managerFile = fopen($singleManagerDirName, "w");
                        $string = $this->getManagerClassRepresentation($data["bundle"]);

                        fwrite($managerFile, $string);
                        fclose($managerFile);
                    }

                    //generate Repository files
                    $singleRepositoryDirName = $data["repository_dir"] . "/" . $fileInfo[0] . "Repository.php";
                    if (!is_file($singleRepositoryDirName)) {
                        $managerFile = fopen($singleRepositoryDirName, "w");
                        $string = "repository class representation";

                        fwrite($managerFile, $string);
                        fclose($managerFile);
                    }

                    //generate service ymls
                    $configDirFile = $data["config_dir"]."/".$fileInfo[0]."-services.yml";
                    if (!is_file($configDirFile)) {
                        $configFile = fopen($configDirFile, "w");
                        $string = $this->getServiceFileTemplate($data["bundle"], $fileInfo[0]);

                        fwrite($configFile, $string);
                        fclose($configFile);
                    }
                }
            }
        }

    }

    protected function getManagerClassRepresentation($bundle) {
        return $bundle." string manager";
    }

    protected function getServiceFileTemplate($bundle, $entity) {

        $bundlename = strtolower($bundle);
        $entityname = strtolower($entity);

    $string =
'services:'
. PHP_EOL.
"\t".$bundlename.'.'.$entityname.'_repository:
        class: '.$bundle.'\Entity\Repository\\'.$entity.'Repository
        factory_service: doctrine.orm.default_entity_manager
        factory_method: getRepository
            arguments:
                - '.$bundle.'\Entity\\'.$entity.'

'."\t".$bundlename.'.'.$entityname.'_manager:
        class: AppBundle\Entity\Manager\\'.$entity.'Manager
        arguments:
            repository: "@'.$bundlename.'.'.$entityname.'_repository"';

        return $string;
    }


}