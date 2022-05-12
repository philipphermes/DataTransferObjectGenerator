<?php

require __DIR__ . "/vendor/autoload.php";

use App\Generator\GeneratorSetup;
use App\Generator\GeneratorSetupDTO;
use App\Generator\GeneratorProperty;
use App\Generator\GeneratorConstants;
use App\Generator;

$generator = new Generator();

$generatorSetup = new GeneratorSetup();
$generatorSetup
    ->setFolderPath('src/GeneratedDataTransferObjects')
    ->setSrcNamespace('App');

$generatorSetupDTO = new GeneratorSetupDTO();
$generatorSetupDTO
    ->setClassName('UserTest')
    ->addProperty((new GeneratorProperty())->setName('id')->setType(GeneratorConstants::INT))
    ->addProperty((new GeneratorProperty())->setName('email')->setType(GeneratorConstants::STRING))
    ->addProperty((new GeneratorProperty())->setName('password')->setType(GeneratorConstants::STRING));

$generator->generate($generatorSetup, $generatorSetupDTO);

$generatorSetupDTO = new GeneratorSetupDTO();
$generatorSetupDTO
    ->setClassName('ProductTest')
    ->addProperty((new GeneratorProperty())->setName('testList')->setType(\App\Test\Test::class)->setIsObjectArray())
    ->addProperty((new GeneratorProperty())->setName('test')->setType(\App\Test\Test::class))
    ->addProperty((new GeneratorProperty())->setName('price')->setType(GeneratorConstants::FLOAT))
    ->addProperty((new GeneratorProperty())->setName('quantity')->setType(GeneratorConstants::INT));

$generator->generate($generatorSetup, $generatorSetupDTO);