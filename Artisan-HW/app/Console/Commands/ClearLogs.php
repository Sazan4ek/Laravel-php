<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearLogs extends Command
{
    protected $signature = 'clear:logs';      
     
    protected $description = 'Deletes all files in directory storage/logs';      
   
    public function handle()     
    {         
        $files = Storage::disk('local2')->files();            
        Storage::disk('local2')->delete($files); 

        $this->info("Логи были успешно очищены");
    }
}
