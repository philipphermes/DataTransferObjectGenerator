<?php

namespace Generator\Setup;

class GeneratorSetup implements GeneratorSetupInterface
{
    private string $folderPath;

    private string $srcNamespace;

    public function getFolderPath(): string
    {
        return $this->folderPath;
    }

    public function setFolderPath(string $folderPath): self
    {
        $this->folderPath = $folderPath;

        return $this;
    }

    public function getSrcNamespace(): string
    {
        return $this->srcNamespace;
    }

    public function setSrcNamespace(string $srcNamespace): self
    {
        $this->srcNamespace = $srcNamespace;

        return $this;
    }
}