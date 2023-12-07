<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateHelperCommand extends Command
{
    protected $signature = 'make:helper {name}';

    protected $description = 'Create a new helper file';

    public function handle()
    {
        $name = $this->argument('name');
        $helperName = $this->getHelperName($name);
        $directoryPath = app_path('Helpers');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $helperName . '.php';

        // Check if the directory exists, if not, create it
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if (File::exists($filePath)) {
            $this->error("Helper {$helperName} already exists.");
            return;
        }

        $namespace = $this->getDefaultNamespace();
        $content = "<?php\n\nnamespace {$namespace};\n\nclass {$helperName}\n{\n    // Add your helper functions here\n}\n";

        File::put($filePath, $content);

        $this->info("Helper {$filePath} created successfully.");
    }

    protected function getHelperName($name)
    {
        return ucfirst($name) . 'Helper';
    }

    protected function getDefaultNamespace()
    {
        return 'App\Helpers';
    }
}
