Step-1:
php artisan make:command TraitMakeCommand

Step-2:
Create a `stubs` directory inside app/console/commands/

Step-3:
Create a file `trait.stub` inside `stubs` directory.

Step-4:
write below code and save the `trait.stub` file.
<?php
namespace DummyNamespace;
trait DummyClass
{
    //
}

Step-5:
add this namespace inside `TraitMakeCommand.php` file.
use Illuminate\Console\GeneratorCommand;
change the `extends` class `Command` to `GeneratorCommand`;

Step-6:
Finally make the change inside `TraitMakeCommand.php` file will be like.
protected $name = 'make:trait';
protected $description = 'Create a new Trait';
protected $type='Trait';

protected function getStub()
{
        return __DIR__.'/stubs/trait.stub';
}

protected function getDefaultNamespace($rootNamespace)
{
        return $rootNamespace.'\Traits';
}

Step-7:
Make your Trait.
php artisan make:trait UserTrait