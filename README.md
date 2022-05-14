# USAGE:

First you'll have to create a basic php file in the root of the project where you call the Generator\
If everything is set up you can call the file in the terminal with `php generator.php` for example.

### Setup Generator:

`$generatorSetup = new GeneratorSetup();`\
`$generatorSetup->setFolderPath('src/GeneratedDataTransferObjects')`\
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;`->setSrcNamespace('App');`\

#### Notes:
* src namespace is for when the namespace form src isn't src but something else like App

### Setup Property:
`$generatorProperty = new GeneratorProperty();`\
`$generatorProperty->setName('id')`\
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;`->setType(GeneratorConstants::INT);`

#### When it is list of objects:

`$generatorProperty = new GeneratorProperty();`\
`$generatorProperty->setName('ObjectList')`\
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;`->setType(Object::class)`\
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;`->setIsObjectArray();`

#### Notes: 
* will generate an additional method Add...() to add single Objects same with type array
* List must be called ...List or ...Array

#### Types:
* STRING
* INT
* FLOAT
* ARRAY
* Custom Object

### Setup DTO:
`$generatorSetupDTO = new GeneratorSetupDTO();`\
`$generatorSetupDTO->setClassName('UserTest')`\
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;`->addProperty($generatorProperty);`

### Generate:

`$generator = new Generator();`\
`$generator->generate($generatorSetup, $generatorSetupDTO);`

### TODOS
* Validate user input for errors
* Type Array