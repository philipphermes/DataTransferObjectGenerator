<?php

namespace Generator\Setup;

interface GeneratorCreateInterface
{
    public function create(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void;
}