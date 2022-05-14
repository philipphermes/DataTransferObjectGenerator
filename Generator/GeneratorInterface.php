<?php

use Business\GeneratorSetupDTOInterface;
use Business\GeneratorSetupInterface;

interface GeneratorInterface
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void;
}