<?php

namespace App\Generator;

class GeneratorCreate implements GeneratorCreateInterface
{
    public function create(GeneratorSetupInterface $generatorSetup, GeneratorSetupDTOInterface $generatorSetupDTO): void
    {
        $folderPath = $generatorSetup->getFolderPath();
        $srcNamespace = $generatorSetup->getSrcNamespace();

        $className = $generatorSetupDTO->getClassName();
        $properties = $generatorSetupDTO->getProperties();

        if (!file_exists($folderPath)
            && !mkdir($folderPath, 0777, true)
            && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $classPath = sprintf('%s/%s.php', $folderPath, $className);
        $classNamespace = str_replace(['src', '/'], [$srcNamespace, '\\'], $folderPath);

        $base = sprintf("<?php\n\nnamespace %s;\n\nclass %s \n{\n", $classNamespace, $className);

        /** @var GeneratorPropertyInterface $property */
        foreach ($properties as $property) {
            $base .= sprintf("\tprivate %s \$%s;\n\n", $property->getType(), $property->getName());
        }

        foreach ($properties as $key => $property) {
            $base .= sprintf("\tpublic function get%s(): %s\n\t{\n\t\treturn \$this->%s;\n\t}\n\n", ucfirst($property->getName()), $property->getType(), $property->getName());
            $base .= sprintf("\tpublic function set%s(%s \$%s): self\n\t{\n\t\t\$this->%s = \$%s;\n\n\t\treturn \$this;\n\t}", ucfirst($property->getName()), $property->getType(), $property->getName(), $property->getName(), $property->getName());

            if(($key+1) !== count($properties)) {
                $base .= "\n\n";
            }
        }

        $base .= "\n}";

        $classFile = fopen($classPath, 'wb');
        fwrite($classFile, $base);
        fclose($classFile);
    }
}