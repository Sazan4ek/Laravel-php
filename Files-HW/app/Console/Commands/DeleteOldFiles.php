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
        $oldFiles = File::where('created_at', '<', Carbon::now()->subDays(30))->get();
        
        foreach($oldFiles as $file)
        {
            Storage::delete($file->path);
            $file->delete();
        }
    }
}
