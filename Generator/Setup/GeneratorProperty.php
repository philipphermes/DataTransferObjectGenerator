<?php

namespace Generator\Setup;

class GeneratorProperty implements GeneratorPropertyInterface
{
    private string $name;

    private string $type;

    private bool $isObjectArray;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function isObjectArray(): bool
    {
        return $this->isObjectArray ?? false;
    }

    public function setIsObjectArray(): self
    {
        $this->isObjectArray = true;

        return $this;
    }
}