<?php

require_once __DIR__ . "/Setup/GeneratorCreateInterface.php";
require_once __DIR__ . "/Setup/GeneratorSetupDTOInterface.php";
require_once __DIR__ . "/Setup/GeneratorSetupInterface.php";

class Generator
{
    public function generate(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void
    {
        (new GeneratorCreate())->create($generatorSetup, $generatorSetupDTO);
    }
}