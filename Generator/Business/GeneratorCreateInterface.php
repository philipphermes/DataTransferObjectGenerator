<?php

namespace Business;

interface GeneratorCreateInterface
{
    public function create(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void;
}