<?php

namespace App\Generator;

interface GeneratorPropertyInterface
{
    public function getName(): string;

    public function setName(string $name): \App\Generator\GeneratorProperty;

    public function getType(): string;

    public function setType(string $type): \App\Generator\GeneratorProperty;
}