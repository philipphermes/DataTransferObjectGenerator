<?php

namespace App\Generator;

interface GeneratorCreateInterface
{
    public function create(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void;
}