<?php


use Business\GeneratorCreate;
use Business\GeneratorSetupDTOInterface;
use Business\GeneratorSetupInterface;

class Generator implements GeneratorInterface
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void
    {
        (new GeneratorCreate())->create($generatorSetup, $generatorSetupDTO);
    }
}