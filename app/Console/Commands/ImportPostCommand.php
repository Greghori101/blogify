<?php

namespace App\Console\Commands;

use App\Services\Importers\PostImporter;
use Illuminate\Console\Command;

class ImportPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:post {source} {--user_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import a random post from external API source';

    /**
     * Execute the console command.
     */
    public function handle(PostImporter $importer): int
    {
        $source = $this->argument('source');
        $userId = $this->option('user_id') ?? 1;

        try {
            $post = $importer->import($source, $userId);

            if ($post) {
                $this->info("Imported post: {$post->title}");
            } else {
                $this->warn("No post imported (duplicate or failed request).");
            }
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
