<?php

namespace Generator;

use Generator\Setup\GeneratorSetupDTOInterface;
use Generator\Setup\GeneratorSetupInterface;

interface GeneratorInterface
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void;
}