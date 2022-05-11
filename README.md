# BASIC USAGE:

## Tutorial:

### Setup Generator:
1. Crate Setup: `$generatorSetup = new GeneratorSetup();`
2. Setup: `$generatorSetup->setFolderPath('src/GeneratedDataTransferObjects')->setSrcNamespace('App');`
   * src namespace is for when the namespace form src isn't src but something else like App

### Setup DTO:
1. Crate Setup: `$generatorSetupDTO = new GeneratorSetupDTO();`
2. Setup: `$generatorSetupDTO->setClassName('UserTest')->addProperty((new GeneratorProperty())->setName('id')->setType(GeneratorConstants::INT));`
3. Use GeneratorConstants for types `GeneratorConstants::INT` for int

### Generate:
1. Create Generator: `$generator = new Generator();`
2. Generate: `$generator->generate($generatorSetup, $generatorSetupDTO);`

### TODOS
* allow custom types
* allow arrays
* allow arrays with custom types
* allow add for array additional to set