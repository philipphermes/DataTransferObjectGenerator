<?php

interface GeneratorPropertyInterface
{
    public function getName(): string;

    public function setName(string $name): self;

    public function getType(): string;

    public function setType(string $type): self;

    public function isObjectArray(): bool;

    public function setIsObjectArray(): self;
}