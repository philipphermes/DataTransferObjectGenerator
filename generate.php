<?php

require __DIR__ . "/vendor/autoload.php";

$fileName = 'TestDTO';

$generatedDTOPath = 'src/GeneratedDataTransferObjects';

if (!file_exists($generatedDTOPath)
    && !mkdir($generatedDTOPath, 0777, true)
    && !is_dir($generatedDTOPath)) {
    throw new \RuntimeException(sprintf('Directory "%s" was not created', $generatedDTOPath));
}

$parameters = [
    0 => [
        'name' => 'username',
        'type' => 'string'
    ],
    1 => [
        'name' => 'email',
        'type' => 'string'
    ],
    2 => [
        'name' => 'password',
        'type' => 'string'
    ],
];

$path = sprintf('%s/%s.php', $generatedDTOPath, $fileName);

$namespace = str_replace(['src', '/'], ['App', '\\'], $generatedDTOPath);

$base = sprintf("<?php\n\nnamespace %s;\n\nclass %s \n{\n", $namespace, $fileName);

foreach ($parameters as $parameter) {
    $base .= sprintf("\tprivate %s \$%s;\n\n", $parameter['type'], $parameter['name']);
}

foreach ($parameters as $key => $parameter) {
    $base .= sprintf("\tpublic function get%s(): %s\n\t{\n\t\treturn \$this->%s;\n\t}\n\n", ucfirst($parameter['name']), $parameter['type'], $parameter['name']);
    $base .= sprintf("\tpublic function set%s(%s \$%s): self\n\t{\n\t\t\$this->%s = \$%s;\n\n\t\treturn \$this;\n\t}", ucfirst($parameter['name']), $parameter['type'], $parameter['name'], $parameter['name'], $parameter['name']);

    if(($key+1) !== count($parameters)) {
        $base .= "\n\n";
    }
}

$base .= "\n}";

$dto = fopen($path, "w");
fwrite($dto, $base);
fclose($dto);