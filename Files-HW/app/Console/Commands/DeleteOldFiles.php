<?php

namespace App\Console\Commands;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteOldFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete files which are older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $paths = File::where('created_at', '<', Carbon::now()->subDays(30))->value('path');
        Storage::delete($paths);
        File::where('created_at', '<', Carbon::now()->subDays(30))->delete();
    }
}
