<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateTraitCommand extends Command
{
    protected $signature = 'make:trait {name}';

    protected $description = 'Create a new trait file';

    public function handle()
    {
        $name = $this->argument('name');
        $traitName = $this->getTraitName($name);
        $directoryPath = app_path('Traits');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $traitName . '.php';

        // Check if the directory exists, if not, create it
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if (File::exists($filePath)) {
            $this->error("Trait {$traitName} already exists.");
            return;
        }

        $namespace = $this->getDefaultNamespace();
        $content = 
        "<?php\n\n
        namespace {$namespace};\n\n
        trait {$traitName}\n{\n
                // Add your trait methods here\n
        }\n";

        File::put($filePath, $content);

        $this->info("Trait {$filePath} created successfully.");
    }

    protected function getTraitName($name)
    {
        return ucfirst($name) . 'Trait';
    }

    protected function getDefaultNamespace()
    {
        return 'App\Traits';
    }
}
