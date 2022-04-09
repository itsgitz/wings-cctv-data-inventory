<?php

namespace Database\Seeders;

class CctvData
{
    public static function getCctvsData()
    {
       $cctv =[
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.246',
                'ip_cctv'           => '10.10.248.1',
                'ch'                => 'D1',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'zone'              => '-',
                'cctv_number'       => '-',
                'category_area'     => 'IN-WGO-LT2-01',
                'location'          => 'IN-WGO-LT2-01',
                'old_cctv'          => '-',
                'new_cctv'          => '-',
                'name_change'       => '-',
                'data_status'       => '-',
                'description'       => '-'
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.246',
                'ip_cctv'           => '10.10.248.10',
                'ch'                => 'D7',
                'status'            => 'Online',
                'area'              => 'Indoor',
                'zone'              => '-',
                'cctv_number'       => '-',
                'category_area'     => 'IN-GAF-LT2-01',
                'location'          => 'IN-GAF-LT2-01',
                'old_cctv'          => '-',
                'new_cctv'          => '-',
                'name_change'       => '-',
                'data_status'       => '-',
                'description'       => '-'
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.248',
                'ip_cctv'           => '10.10.248.100',
                'ch'                => 'D01',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => '-',
                'cctv_number'       => '-',
                'category_area'     => 'BOF',
                'location'          => 'BOF',
                'old_cctv'          => '-',
                'new_cctv'          => '-',
                'name_change'       => '-',
                'data_status'       => 'Penambahan Baru CCTV BOF',
                'description'       => '-'
            ],
            [
                'cctv_type'         => 'IP',
                'ip_nvr'            => '10.10.249.248',
                'ip_cctv'           => '10.10.248.101',
                'ch'                => 'D02',
                'status'            => 'Online',
                'area'              => 'Outdoor',
                'zone'              => '-',
                'cctv_number'       => '-',
                'category_area'     => 'BOF',
                'location'          => 'BOF',
                'old_cctv'          => '-',
                'new_cctv'          => '-',
                'name_change'       => '-',
                'data_status'       => 'Penambahan Baru CCTV BOF',
                'description'       => '-'
            ]
       ];

       return $cctv;
    }
}
