<?php

namespace App\Console\Commands;

use App\Models\Cctv;
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

        die();

        foreach ($decodedImages as $k => $image) {
            $decodedData['Foto Capture View'][$k] = $image['file'];
        }

        try {
            $this->export($decodedData);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return 0;
    }

    private function decodeMappedData($dataSection = '', $fileName)
    {
        $target = self::STORAGE_PATH . '/' . $dataSection . '/' . $fileName;
        try {
            $readDataJson = file_get_contents($target);
            $finalData = json_decode($readDataJson, true);

            return $finalData;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function export($decodedData = [])
    {
        $cctv = new Cctv;

        $cctv->data_number      = $decodedData['No'][0];
        $cctv->recorded_at      = $decodedData['Tanggal Pendataan CCTV'][0];
        $cctv->cctv_type        = $decodedData['Jenis CCTV'][0];
        $cctv->ip_nvr           = $decodedData['IP NVR '][0];
        $cctv->ip_cctv          = $decodedData['IP CCTV'][0];
        $cctv->ch               = $decodedData['CH'][0];
        $cctv->status           = $decodedData['Status CCTV'][0];
        $cctv->area             = $decodedData['Area CCTV'][0];
        $cctv->zone             = $decodedData['Zona'][0];
        $cctv->cctv_number      = $decodedData['No CCTV'][0];
        $cctv->category_area    = $decodedData['Kategori Area'][0];
        $cctv->location         = $decodedData['Lokasi'][0];
        $cctv->old_cctv         = $decodedData['Nama CCTV OLD'][0];
        $cctv->new_cctv         = $decodedData['NEW Nama CCTV (Out/In-Arah View-Aset)'][0];
        $cctv->name_change      = $decodedData['Perubahan NAMA DONE'][0];
        $cctv->data_status      = $decodedData['Status Pendataan'][0];
        $cctv->description      = $decodedData['KETERANGAN'][0];
        $cctv->image            = $decodedData['Foto Capture View'][0];

        $cctv->save();
    }
}
