<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name_kh" => "ខេត្តបន្ទាយមានជ័យ",
                "name_en" => "Banteay Meanchey Province",
                "code" => "01",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តបាត់ដំបង",
                "name_en" => "Battambang Province",
                "code" => "02",
                "reference" => "លេខ​៤៩៣ប្រ.ក"],
            [
                "name_kh" => "ខេត្តកំពង់ចាម",
                "name_en" => "Kampong Cham Province",
                "code" => "03",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តកំពង់ឆ្នាំង",
                "name_en" => "Kampong Chhnang Province",
                "code" => "04",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តកំពង់ស្ពឺ",
                "name_en" => "Kampong Speu Province",
                "code" => "05",
                "reference" => "លេខ​៤៩៣​ប្រ,ក"
            ],
            [
                "name_kh" => "ខេត្តកំពង់ធំ",
                "name_en" => "Kampong Thom Province",
                "code" => "06",
                "reference" => "ប្រកាសលេខ ៤៩៣​ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តកំពត",
                "name_en" => "Kampot Province",
                "code" => "07",
                "reference" => "ប្រកាសលេខ ៤៩៣ ​ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
            ],
            [
                "name_kh" => "ខេត្តកណ្ដាល",
                "name_en" => "Kandal Province",
                "code" => "08",
                "reference" => "ប្រកាសលេខ ៤៩៣​ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តកោះកុង",
                "name_en" => "Koh Kong Province",
                "code" => "09",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
            ],
            [
                "name_kh" => "ខេត្តក្រចេះ",
                "name_en" => "Kratie Province",
                "code" => "10",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តមណ្ឌលគិរី",
                "name_en" => "Mondul Kiri Province",
                "code" => "11",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "រាជធានីភ្នំពេញ",
                "name_en" => "Phnom Penh Capital",
                "code" => "12",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តព្រះវិហារ",
                "name_en" => "Preah Vihear Province",
                "code" => "13",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក",
            ],
            [
                "name_kh" => "ខេត្តព្រៃវែង",
                "name_en" =>  "Prey Veng Province",
                "code" => "14",
                "reference" => "ប្រកាសលេខ ៤៩៣​ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តពោធិ៍សាត់",
                "name_en" => "Pursat Province",
                "code" => "15",
                "reference" => "លេខ​៤៩៣​ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តរតនគិរី",
                "name_en" => "Ratanak Kiri Province",
                "code" => "16",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តសៀមរាប",
                "name_en" => "Siemreap Province",
                "code" => "17",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តព្រះសីហនុ",
                "name_en" => "Preah Sihanouk Province",
                "code" => "18",
                "reference" => "ព្រះរាជក្រឹត្យលេខ នស/រកត/១២០៨/១៣៨៥"
            ],
            [
                "name_kh" => "ខេត្តស្ទឹងត្រែង",
                "name_en" => "Stung Treng Province",
                "code" => "19",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តស្វាយរៀង",
                "name_en" => "Svay Rieng Province",
                "code" => "20",
                "reference" => "ប្រកាសលេខ ៤៩៣​ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តតាកែវ",
                "name_en" => "Takeo Province",
                "code" => "21",
                "reference" => "ប្រកាសលេខ ៤៩៣​ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តឧត្ដរមានជ័យ",
                "name_en" => "Oddar Meanchey Province",
                "code" => "22",
                "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
            ],
            [
                "name_kh" => "ខេត្តកែប",
                "name_en" => "Kep Province",
                "code" => "23",
                "reference" => "ព្រះរាជក្រឹត្យលេខ នស/រកត/១២០៨/១៣៨៣"
            ],
            [
                "name_kh" => "ខេត្តប៉ៃលិន",
                "name_en" => "Pailin Province",
                "code" => "24",
                "reference" => "នស/រកម/1208/1384​"
            ],
            [
                "name_kh" => "ខេត្តត្បូងឃ្មុំ",
                "name_en" => "Tboung Khmum Province",
                "code" => "25",
                "reference" => "ព្រះរាជក្រឹក្យលេខ នស/រកត/១២១៣/១៤៤៥"
            ],
            [
                "name_kh" => "ធ្វើដំណើរតាមខេត្ត",
                "name_en" => "Travel to Provinces",
                "code" => "25",
                "reference" => "ព្រះរាជក្រឹក្យលេខ នស/រកត/១២១៣/១៤៤៥"
            ],
            [
                "name_kh" => "ក្រៅប្រទេសកម្ពុជា",
                "name_en" => "Outside Cambodia",
                "code" => " ",
                "reference" =>  "",
            ],
            [
                "name_kh" => "ផេ្សងៗ",
                "name_en" => "Other",
                "code" => "",
                "reference" =>  "",
            ],
            [
                "name_kh" => "ប៉ោយបែត",
                "name_en" => "Poipe",
                "code" => "",
                "reference" =>  "",
            ]
        ];
        DB::table('provinces')->insert($data);
    }
}
