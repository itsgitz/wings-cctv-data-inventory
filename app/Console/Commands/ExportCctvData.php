<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportCctvData extends Command
{
    const DATA_JSON = 'data.json';
    const IMAGES_JSON = 'images.json';
    const STORAGE_PATH = './storage/external';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:export_cctv {data_section}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export CCTV data (excel-json) into laravel model system or database table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dataSection = $this->argument('data_section');

        $decodedData = $this->decodeMappedData($dataSection, self::DATA_JSON);
        $decodedImages = $this->decodeMappedData($dataSection, self::IMAGES_JSON);

        foreach ($decodedImages as $k => $image) {
            $decodedData['Foto Capture View'][$k] = $image['image'];
        }

        dd($decodedData['Foto Capture View']);

        return 0;
    }

    private function decodeMappedData($dataSection = '', $fileName)
    {
        $target = self::STORAGE_PATH . '/' . $dataSection . '/' . $fileName;
        try {
            $readDataJson = file_get_contents($target);
            $decodedData = json_decode($readDataJson, true);

            return $decodedData;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
