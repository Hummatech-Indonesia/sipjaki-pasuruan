<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateEnumCommand extends Command
{
    protected $signature = 'make:enum {name}';

    protected $description = 'Create a new enum file';

    public function handle()
    {
        $name = $this->argument('name');
        $enumName = $this->getEnumName($name);
        $directoryPath = app_path('Enums');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $enumName . '.php';

        // Check if the directory exists, if not, create it
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if (File::exists($filePath)) {
            $this->error("Enum {$enumName} already exists.");
            return;
        }

        $namespace = $this->getDefaultNamespace();
        $content = "<?php\n\nnamespace {$namespace};\n\nenum {$enumName}\n{\n    // Define your enum values here\n}\n";

        File::put($filePath, $content);

        $this->info("Enum {$filePath} created successfully.");
    }

    protected function getEnumName($name)
    {
        return ucfirst($name);
    }

    protected function getDefaultNamespace()
    {
        return 'App\Enums';
    }
}
