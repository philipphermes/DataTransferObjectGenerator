<?php

namespace App;

use App\Generator\GeneratorSetupDTOInterface;
use App\Generator\GeneratorSetupInterface;

interface GeneratorInterface
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void;
}