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

        $classValue = sprintf("<?php\n\nnamespace %s;\n\nclass %s \n{\n", $classNamespace, $className);

        /** @var GeneratorPropertyInterface $property */
        foreach ($properties as $property) {
            if(strpos($property->getType(), "\\")) {
                $property->setType("\\" . $property->getType());
            }

            if($property->isObjectArray()) {
                $classValue .= sprintf("\t/** @var %s[] \$%s*/\n", $property->getType(), $property->getName());
                $classValue .= sprintf("\tprivate array \$%s;\n\n", $property->getName());
            } else {
                $classValue .= sprintf("\tprivate %s \$%s;\n\n", $property->getType(), $property->getName());
            }
        }

        foreach ($properties as $key => $property) {

            //Get
            if($property->isObjectArray()) {
                $classValue .= sprintf("\t/** \n\t * @return %s[]\n\t */\n", $property->getType());
            }
            $classValue .= sprintf("\tpublic function get%s(): ", ucfirst($property->getName()));

            if($property->isObjectArray()) {
                $classValue .= "array\n\t";
            } else {
                $classValue .= sprintf("%s\n\t", $property->getType());
            }

            $classValue .= sprintf("{\n\t\treturn \$this->%s;\n\t}\n\n", $property->getName());

            //Set
            if($property->isObjectArray()) {
                $classValue .= sprintf("\t/** \n\t * @param %s[] \$%s\n", $property->getType(), $property->getName());
                $classValue .= "\t * @return \$this\n";
                $classValue .= "\t */\n";
            }
            $classValue .= sprintf("\tpublic function set%s", ucfirst($property->getName()));

            if($property->isObjectArray()) {
                $classValue .= "(array ";
            } else {
                $classValue .= sprintf("(%s ", $property->getType());
            }

            $classValue .= sprintf("\$%s): self\n\t{\n\t\t\$this->%s = \$%s;\n\n\t\treturn \$this;\n\t}", $property->getName(), $property->getName(), $property->getName());

            if(($key+1) !== count($properties)) {
                $classValue .= "\n\n";
            }

            //Add
            if($property->getType() !== GeneratorConstants::ARRAY && !$property->isObjectArray()) {
                continue;
            }

            $addName = str_replace(["List", "Array"], "", $property->getName());

            $classValue .= sprintf("\tpublic function add%s", ucfirst($addName));

            $classValue .= sprintf("(%s ", $property->getType());

            $classValue .= sprintf("\$%s): self\n\t{\n\t\t\$this->%s[] = \$%s;\n\n\t\treturn \$this;\n\t}", $addName, $property->getName(), $addName);

            if(($key+1) !== count($properties)) {
                $classValue .= "\n\n";
            }
        }

        $classValue .= "\n}";

        $classFile = fopen($classPath, 'wb');
        fwrite($classFile, $classValue);
        fclose($classFile);
    }
}