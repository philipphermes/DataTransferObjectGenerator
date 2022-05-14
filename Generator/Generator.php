<?php

namespace Generator;

use Generator\Setup\GeneratorCreate;
use Generator\Setup\GeneratorSetupDTOInterface;
use Generator\Setup\GeneratorSetupInterface;

class Generator implements GeneratorInterface
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void
    {
        (new GeneratorCreate())->create($generatorSetup, $generatorSetupDTO);
    }
}