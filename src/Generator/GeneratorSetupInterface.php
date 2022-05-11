<?php

namespace App\Generator;

interface GeneratorSetupInterface
{
    public function getFolderPath(): string;

    public function setFolderPath(string $folderPath): self;

    public function getSrcNamespace(): string;

    public function setSrcNamespace(string $srcNamespace): self;
}