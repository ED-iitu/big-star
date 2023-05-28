<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupController extends Controller
{
    public function createBackup()
    {
        $databaseName = config('database.connections.mysql.database');
        $fileName = 'backup-' . date('Y-m-d_H-i-s') . '.sql';
        $filePath = storage_path('app/backup/' . $fileName);

        $command = sprintf(
            'mysqldump -u %s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            $databaseName,
            $filePath
        );

        exec($command);

        return Storage::download('backup/' . $fileName);
    }
}
