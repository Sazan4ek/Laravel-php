<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $file = $request->file('file');

        if(Storage::putFile('userImages', $file))
        {
            Log::info('Загрузка в хранилище прошла успешно! ', [
                'Имя файла' => $file->getClientOriginalName(),
                'Размер файла' => Storage::size('userImages/'.$file->hashName()),
                'Дата загрузки' => now()->timezone('Europe/Minsk')->format('Y-m-d H:i:s'),
                'IP' => $request->ip()
            ]);
        }
        else Log::info('Загрузка в хранилище не удалась');
    }
}
