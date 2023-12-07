<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateInterfaceCommand extends Command
{
    protected $signature = 'make:interface {name}';

    protected $description = 'Create a new interface file';

    public function handle()
    {
        $name = $this->argument('name');
        $className = $this->getClassName($name);
        $directoryPath = app_path('Contracts/Interfaces');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $className . '.php';

        // Check if the directory exists, if not, create it
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if (File::exists($filePath)) {
            $this->error("Interface {$className} already exists.");
            return;
        }

        $namespace = $this->getDefaultNamespace();
        $content = 
        "<?php\n\n
        namespace {$namespace};\n\n
        interface {$className}\n{\n\
                // Define your interface methods here\n
        }\n";

        File::put($filePath, $content);

        $this->info("Interface {$filePath} created successfully.");
    }

    protected function getClassName($name)
    {
        return ucfirst($name);
    }

    protected function getDefaultNamespace()
    {
        return 'App\Contract\Interfaces';
    }
}
