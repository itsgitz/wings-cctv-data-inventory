<?php

namespace App\Console\Commands;

use App\Models\Cctv;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ExportCctvData extends Command
{
    const DATA_JSON     = 'data.json';
    const IMAGES_JSON   = 'images.json';
    const IMAGES_STORAGE_PATH = './storage/app/public/img';

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
        $dataWithImages = $this->mergeDataWithImages($decodedData, $decodedImages);

        try {
            $this->export($dataSection, $dataWithImages);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return 0;
    }

    private function decodeMappedData($dataSection = '', $fileName)
    {
        $target = self::IMAGES_STORAGE_PATH . '/' . $dataSection . '.' . $fileName;
        try {
            $readDataJson = file_get_contents($target);
            $finalData = json_decode($readDataJson, true);

            return $finalData;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function mergeDataWithImages($decodedData, $decodedImages)
    {
        foreach ($decodedImages as $k => $image) {
            $decodedData['Foto Capture View'][$k] = $image['file'];
        }

        return $decodedData;
    }

    private function export($dataSection, $decodedData = [])
    {
        $exportedCctvs = Cctv::where('data_section_exported', $dataSection)->first();

        if ( !isset($exportedCctvs) ) {
            for ($i = 0; $i < count($decodedData['No']); $i++) {
                echo "Exporting data for {$decodedData['IP CCTV'][$i]} | {$decodedData['CH'][$i]}\n";

                $cctv = new Cctv;

                $cctv->data_number      = $decodedData['No'][$i];
                $cctv->recorded_at      = $decodedData['Tanggal Pendataan CCTV'][$i];
                $cctv->cctv_type        = $decodedData['Jenis CCTV'][$i];
                $cctv->ip_nvr           = $decodedData['IP NVR '][$i];
                $cctv->ip_cctv          = $decodedData['IP CCTV'][$i];
                $cctv->ch               = $decodedData['CH'][$i];
                $cctv->status           = $decodedData['Status CCTV'][$i];
                $cctv->area             = $decodedData['Area CCTV'][$i];
                $cctv->zone             = $decodedData['Zona'][$i];
                $cctv->cctv_number      = $decodedData['No CCTV'][$i];
                $cctv->category_area    = $decodedData['Kategori Area'][$i];
                $cctv->location         = $decodedData['Lokasi'][$i];
                $cctv->old_cctv         = $decodedData['Nama CCTV OLD'][$i];
                $cctv->new_cctv         = $decodedData['NEW Nama CCTV (Out/In-Arah View-Aset)'][$i];
                $cctv->name_change      = $decodedData['Perubahan NAMA DONE'][$i];
                $cctv->data_status      = $decodedData['Status Pendataan'][$i];
                $cctv->description      = $decodedData['KETERANGAN'][$i];

                $imageUrl = '';

                if ( !empty($decodedData['Foto Capture View'][$i]) ) {
                    $url = 'img/' . $decodedData['Foto Capture View'][$i];
                    $imageUrl = Storage::url($url);
                }

                $cctv->image                    = $imageUrl;
                $cctv->status_notes             = $decodedData['STATUS CCTV'][$i];
                $cctv->data_section_exported    = $dataSection;

                $cctv->save();
            }

            echo "\nDone! \n";
        } else {
            echo "This $dataSection data already exported! \n";
        }
    }
}
