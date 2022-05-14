<?php

class GeneratorSetupDTO implements GeneratorSetupDTOInterface
{
    private string $className;

    /**
     * @var GeneratorPropertyInterface[]
     */
    private array $properties;

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function addProperty(GeneratorPropertyInterface $property): self
    {
        $this->properties[] = $property;

        return $this;
    }
}