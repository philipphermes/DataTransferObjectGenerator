# USAGE:

First you'll have to create a basic php file where you call the Generator\
If everything is set up you can call the file in the terminal with `php generator.php` for example.

### Setup Generator:

1. Crate Setup: `$generatorSetup = new GeneratorSetup();`
2. Setup: `$generatorSetup->setFolderPath('src/GeneratedDataTransferObjects')->setSrcNamespace('App');`
    * src namespace is for when the namespace form src isn't src but something else like App

### Setup DTO:

1. Crate Setup: `$generatorSetupDTO = new GeneratorSetupDTO();`
2. Setup: `$generatorSetupDTO->setClassName('UserTest')`\
   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;`->addProperty((new GeneratorProperty())->setName('id')->setType(GeneratorConstants::INT));`
3. Use GeneratorConstants for types `GeneratorConstants::INT` for int

### Generate:

1. Create Generator: `$generator = new Generator();`
2. Generate: `$generator->generate($generatorSetup, $generatorSetupDTO);`

### Properties & Objects:

* Set Property to Object:\
  `$generatorSetupDTO = new GeneratorSetupDTO();`\
  `$generatorSetupDTO`\
  &emsp;&emsp;&emsp;`->setClassName('ProductTest')`\
  &emsp;&emsp;&emsp;`->addProperty((new GeneratorProperty())->setName('testList')->setType(\App\Test\Test::class);`
* Create array with Objects: \
  `$generatorSetupDTO = new GeneratorSetupDTO();`\
  `$generatorSetupDTO`\
  &emsp;&emsp;&emsp;`->setClassName('ProductTest')`\
  &emsp;&emsp;&emsp;`->addProperty((new GeneratorProperty())->setName('testList')->setType(\App\Test\Test::class)->setIsObjectArray());`
  * Note: will generate an additional method Add...() to add single Objects same with type array
  * List musste be calles ...List or ...Array

### TODOS
* Validate user input for errors