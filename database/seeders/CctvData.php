<?php

namespace Database\Seeders;

class CctvData
{
    public static function getCctvsData()
    {
       $cctv =[
           // No pictures
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.246',
                'ip_cctv'           => '10.10.248.1',
                'ch'                => 'D1',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'category_area'     => 'IN-WGO-LT2-01',
                'location'          => 'IN-WGO-LT2-01',
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.246',
                'ip_cctv'           => '10.10.248.10',
                'ch'                => 'D7',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'category_area'     => 'IN-GAF-LT2-01',
                'location'          => 'IN-GAF-LT2-01',
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.248',
                'ip_cctv'           => '10.10.248.100',
                'ch'                => 'D01',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'category_area'     => 'BOF',
                'location'          => 'BOF',
                'data_status'       => 'Penambahan Baru CCTV BOF',
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.248',
                'ip_cctv'           => '10.10.248.101',
                'ch'                => 'D02',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'category_area'     => 'BOF',
                'location'          => 'BOF',
                'data_status'       => 'Penambahan Baru CCTV BOF',
            ],
            // With pict
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.1',
                'ch'                => 'D33',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => '5',
                'cctv_number'       => '60',
                'category_area'     => 'Outdoor',
                'location'          => 'Waste',
                'data_status'       => 'Penambahan Baru CCTV Waste',
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.10',
                'ch'                => 'D42',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => '5',
                'cctv_number'       => '61',
                'category_area'     => 'Outdoor',
                'location'          => 'Waste',
                'data_status'       => 'Penambahan Baru CCTV Waste',
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.100',
                'ch'                => 'D27',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => null,
                'cctv_number'       => null,
                'category_area'     => 'CCTV Face Recogination',
                'location'          => 'CCTV Face Recogination',
                'data_status'       => null,
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.100',
                'ch'                => 'D27',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => null,
                'cctv_number'       => null,
                'category_area'     => 'CCTV Face Recogination',
                'location'          => 'CCTV Face Recogination',
                'data_status'       => null,
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.104',
                'ch'                => 'D15',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'zone'              => null,
                'cctv_number'       => null,
                'category_area'     => 'Out-Limbah-01',
                'location'          => 'Out-Limbah-01',
                'data_status'       => null,
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.105',
                'ch'                => 'D16',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'zone'              => null,
                'cctv_number'       => null,
                'category_area'     => 'Out-Limbah-02',
                'location'          => 'Out-Limbah-02',
                'data_status'       => null,
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.255.245',
                'ip_cctv'           => '10.10.249.106',
                'ch'                => 'D17',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'zone'              => null,
                'cctv_number'       => null,
                'category_area'     => 'Out-Limbah-03',
                'location'          => 'Out-Limbah-03',
                'data_status'       => null,
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.252.47',
                'ip_cctv'           => '10.10.249.107',
                'ch'                => 'D05',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => null,
                'cctv_number'       => null,
                'category_area'     => 'Powder 3',
                'location'          => 'Powder 3',
                'data_status'       => 'Penambahan Baru CCTV PWD3',
            ]
       ];

       return $cctv;
    }
}
