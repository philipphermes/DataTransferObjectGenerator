<?php

namespace App;

use App\Generator\GeneratorCreate;
use App\Generator\GeneratorSetupDTOInterface;
use App\Generator\GeneratorSetupInterface;

class Generator implements GeneratorInterface
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void
    {
        (new GeneratorCreate())->create($generatorSetup, $generatorSetupDTO);
    }
}