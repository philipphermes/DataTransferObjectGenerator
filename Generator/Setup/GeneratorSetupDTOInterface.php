<?php

interface GeneratorSetupDTOInterface
{
    public function getClassName(): string;

    public function setClassName(string $className): self;

    public function getProperties(): array;

    public function addProperty(GeneratorPropertyInterface $property): self;
}