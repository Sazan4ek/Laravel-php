<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowConfigKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:show {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->argument('key');
        $answer = config($key, 'Ключ конфигурации не найден');
        if($answer === 'Ключ конфигурации не найден') $this->error($answer);
        else dd($answer);
    }
}
