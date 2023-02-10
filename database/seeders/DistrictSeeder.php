<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
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
            "province_id"=>"1",
            "name_kh" => "ស្រុកមង្គលបូរី",
            "name_en" => "Mongkol Borei District",
            "code" => "0102",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ស្រុកភ្នំស្រុក",
            "name_en" => "Phnum Srok District",
            "code" => "0103",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ស្រុកព្រះនេត្រព្រះ",
            "name_en" => "Preah Netr Preah District",
            "code" => "0104",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ស្រុកអូរជ្រៅ",
            "name_en" => "Ou Chrov District",
            "code" => "0105",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ក្រុងសិរីសោភ័ណ",
            "name_en" => "Serei Saophoan Municipality",
            "code" => "0106",
            "reference" => "អនុក្រឹត្យលេខ ១៦អនក្រ.បក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ស្រុកថ្មពួក",
            "name_en" => "Thma Puok District",
            "code" => "0107",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ស្រុកស្វាយចេក",
            "name_en" => "Svay Chek District",
            "code" => "0108",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ស្រុកម៉ាឡៃ",
            "name_en" => "Malai District",
            "code" => "0109",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"1",
            "name_kh" => "ក្រុងប៉ោយប៉ែត",
            "name_en" => "Paoy Paet Municipality",
            "code" => "0110",
            "reference" => "អនុក្រឹត្យលេខ ២៣២អនក្រ.បក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកបាណន់",
            "name_en" => "Banan District",
            "code" => "0201",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកថ្មគោល",
            "name_en" => "Thma Koul District",
            "code" => "0202",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ក្រុងបាត់ដំបង",
            "name_en" => "Battambang Municipality",
            "code" => "0203",
            "reference" => "២២៣​អនក្រុ,បក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកបវេល",
            "name_en" => "Bavel District",
            "code" => "0204",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកឯកភ្នំ",
            "name_en" => "Aek Phnum District",
            "code" => "0205",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកមោងឫស្សី",
            "name_en" => "Moung Ruessei District",
            "code" => "0206",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុករតនមណ្ឌល",
            "name_en" => "Rotonak Mondol District",
            "code" => "0207",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកសង្កែ",
            "name_en" => "Sangkae District",
            "code" => "0208",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកសំឡូត",
            "name_en" => "Samlout District",
            "code" => "0209",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកសំពៅលូន",
            "name_en" => "Sampov Lun District",
            "code" => "0210",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកភ្នំព្រឹក",
            "name_en" => "Phnum Proek District",
            "code" => "0211",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកកំរៀង",
            "name_en" => "Kamrieng District",
            "code" => "0212",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុកគាស់ក្រឡ",
            "name_en" => "Koas Krala District",
            "code" => "0213",
            "reference" => "លេខ​៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"2",
            "name_kh" => "ស្រុករុក្ខគិរី",
            "name_en" => "Rukh Kiri District",
            "code" => "0214",
            "reference" => "លេខ​04អនក្រ.បក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកបាធាយ",
            "name_en" => "Batheay District",
            "code" => "0301",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកចំការលើ",
            "name_en" => "Chamkar Leu District",
            "code" => "0302",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកជើងព្រៃ",
            "name_en" => "Cheung Prey District",
            "code" => "0303",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ក្រុងកំពង់ចាម",
            "name_en" => "Kampong Cham Municipality",
            "code" => "0305",
            "reference" => "អនុក្រឹត្យលេខ ២៣០អនក្រ.បក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកកំពង់សៀម",
            "name_en" => "Kampong Siem District",
            "code" => "0306",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកកងមាស",
            "name_en" => "Kang Meas District",
            "code" => "0307",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកកោះសូទិន",
            "name_en" => "Kaoh Soutin District",
            "code" => "0308",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកព្រៃឈរ",
            "name_en" => "Prey Chhor District",
            "code" => "0313",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកស្រីសន្ធរ",
            "name_en" => "Srei Santhor District",
            "code" => "0314",
            "reference" => "អនុក្រឹត្យលេខ ២៣៤អនក្រ.បក"
        ],
        [
            "province_id"=>"3",
            "name_kh" => "ស្រុកស្ទឹងត្រង់",
            "name_en" => "Stueng Trang District",
            "code" => "0315",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុកបរិបូណ៌",
            "name_en" => "Baribour District",
            "code" => "0401",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុកជលគីរី",
            "name_en" => "Chol Kiri District",
            "code" => "0402",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ក្រុងកំពង់ឆ្នាំង",
            "name_en" => "Kampong Chhnang Municipality",
            "code" => "0403",
            "reference" => "អនុក្រឹត្យលេខ២៣១ អនក្រ.បក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុកកំពង់លែង",
            "name_en" => "Kampong Leaeng District",
            "code" => "0404",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុកកំពង់ត្រឡាច",
            "name_en" => "Kampong Tralach District",
            "code" => "0405",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុករលាប្អៀរ",
            "name_en" => "Rolea B'ier District",
            "code" => "0406",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុកសាមគ្គីមានជ័យ",
            "name_en" => "Sameakki Mean Chey District",
            "code" => "0407",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"4",
            "name_kh" => "ស្រុកទឹកផុស",
            "name_en" => "Tuek Phos District",
            "code" => "0408",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកបរសេដ្ឋ",
            "name_en" => "Basedth District",
            "code" => "0501",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ក្រុងច្បារមន",
            "name_en" => "Chbar Mon Municipality",
            "code" => "0502",
            "reference" => "អនុក្រឹត្យលេខ​ ២២៩ អនក្រ.បក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកគងពិសី",
            "name_en" => "Kong Pisei District",
            "code" => "0503",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកឱរ៉ាល់",
            "name_en" => "Aoral District",
            "code" => "0504",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកឧដុង្គ",
            "name_en" => "Odongk District",
            "code" => "0505",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកភ្នំស្រួច",
            "name_en" => "Phnum Sruoch District",
            "code" => "0506",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកសំរោងទង",
            "name_en" => "Samraong Tong District",
            "code" => "0507",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"5",
            "name_kh" => "ស្រុកថ្ពង",
            "name_en" => "Thpong District",
            "code" => "0508",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកបារាយណ៍",
            "name_en" => "Baray District",
            "code" => "0601",
            "reference" => "ប្រកាសលេខ ៤៩៣ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកកំពង់ស្វាយ",
            "name_en" => "Kampong Svay District",
            "code" => "0602",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ក្រុងស្ទឹងសែន",
            "name_en" => "Stueng Saen Municipality",
            "code" => "0603",
            "reference" => "អនុក្រឹតលេខ ១៥ អនក្រ.បក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកប្រាសាទបល្ល័ង្គ",
            "name_en" => "Prasat Ballangk District",
            "code" => "0604",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកប្រាសាទសំបូរ",
            "name_en" => "Prasat Sambour District",
            "code" => "0605",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកសណ្ដាន់",
            "name_en" => "Sandan District",
            "code" => "0606",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកសន្ទុក",
            "name_en" => "Santuk District",
            "code" => "0607",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"6",
            "name_kh" => "ស្រុកស្ទោង",
            "name_en" => "Stoung District",
            "code" => "0608",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកអង្គរជ័យ",
            "name_en" => "Angkor Chey District",
            "code" => "0701",
            "reference" => "ប្រកាសលេខ៤៩៣​ ប្រ.ក  របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកបន្ទាយមាស",
            "name_en" => "Banteay Meas District",
            "code" => "0702",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក  របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកឈូក",
            "name_en" => "Chhuk District",
            "code" => "0703",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក  របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកជុំគិរី",
            "name_en" => "Chum Kiri District",
            "code" => "0704",
            "reference" => "ប្រកាសលេខ​ ៤៩៣​ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកដងទង់",
            "name_en" => "Dang Tong District",
            "code" => "0705",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកកំពង់ត្រាច",
            "name_en" => "Kampong Trach District",
            "code" => "0706",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ស្រុកទឹកឈូ",
            "name_en" => "Tuek Chhou District",
            "code" => "0707",
            "reference" => "អនុក្រឹត្យលេខ​ ២២១ អនក្រ.បក"
        ],
        [
            "province_id"=>"7",
            "name_kh" => "ក្រុងកំពត",
            "name_en" => "Kampot Municipality",
            "code" => "0708",
            "reference" => "អនុក្រឹត្យលេខ​ ២២១ អនក្រ.បក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកកណ្ដាលស្ទឹង",
            "name_en" => "Kandal Stueng District",
            "code" => "0801",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកកៀនស្វាយ",
            "name_en" => "Kien Svay District",
            "code" => "0802",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកខ្សាច់កណ្ដាល",
            "name_en" => "Khsach Kandal District",
            "code" => "0803",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកកោះធំ",
            "name_en" => "Kaoh Thum District",
            "code" => "0804",
            "reference" => "តាមប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកលើកដែក",
            "name_en" => "Leuk Daek District",
            "code" => "0805",
            "reference" => "លេខ​ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកល្វាឯម",
            "name_en" => "Lvea Aem District",
            "code" => "0806",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកមុខកំពូល",
            "name_en" => "Mukh Kampul District",
            "code" => "0807",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកអង្គស្នួល",
            "name_en" => "Angk Snuol District",
            "code" => "0808",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកពញាឮ",
            "name_en" => "Ponhea Lueu District",
            "code" => "0809",
            "reference" => "លេខ ៤៩​៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ស្រុកស្អាង",
            "name_en" => "S'ang District",
            "code" => "0810",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"8",
            "name_kh" => "ក្រុងតាខ្មៅ",
            "name_en" => "Ta Khmau Municipality",
            "code" => "0811",
            "reference" => "២២៨ អនក្រ.បក"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ស្រុកបុទុមសាគរ",
            "name_en" => "Botum Sakor District",
            "code" => "0901",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ស្រុកគិរីសាគរ",
            "name_en" => "Kiri Sakor District",
            "code" => "0902",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ស្រុកកោះកុង",
            "name_en" => "Kaoh Kong District",
            "code" => "0903",
            "reference" => "ប្រកាសលេខ​ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ក្រុងខេមរភូមិន្ទ",
            "name_en" => "Khemara Phoumin Municipality",
            "code" => "0904",
            "reference" => "អនុក្រឹត្យលេខ ២២២​ អនុក្រ.បក"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ស្រុកមណ្ឌលសីមា",
            "name_en" => "Mondol Seima District",
            "code" => "0905",
            "reference" => "ប្រកាសលេខ​ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ស្រុកស្រែ អំបិល",
            "name_en" => "Srae Ambel District",
            "code" => "0906",
            "reference" => "ប្រកាសលេខ​ ៤៩៣ ប្រ.ក  របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"9",
            "name_kh" => "ស្រុកថ្មបាំង",
            "name_en" => "Thma Bang District",
            "code" => "0907",
            "reference" => "ប្រកាសលេខ​ ៤៩៣ ប្រ.ក  របស់ក្រសួងមហាផ្ទៃ"
        ],
        [
            "province_id"=>"10",
            "name_kh" => "ស្រុកឆ្លូង",
            "name_en" => "Chhloung District",
            "code" => "1001",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"10",
            "name_kh" => "ក្រុងក្រចេះ",
            "name_en" => "Kracheh Municipality",
            "code" => "1002",
            "reference" => "អនុក្រឹតលេខ ១០ អនក្រ.បក"
        ],
        [
            "province_id"=>"10",
            "name_kh" => "ស្រុកព្រែកប្រសព្វ",
            "name_en" => "Prek Prasab District",
            "code" => "1003",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"10",
            "name_kh" => "ស្រុកសំបូរ",
            "name_en" => "Sambour District",
            "code" => "1004",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"10",
            "name_kh" => "ស្រុកស្នួល",
            "name_en" => "Snuol District",
            "code" => "1005",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"10",
            "name_kh" => "ស្រុកចិត្របុរី",
            "name_en" => "Chetr Borei District",
            "code" => "1006",
            "reference" => "អនុក្រឹតលេខ ១០ អនក្រ.បក"
        ],
        [
            "province_id"=>"11",
            "name_kh" => "ស្រុកកែវសីមា",
            "name_en" => "Kaev Seima District",
            "code" => "1101",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"11",
            "name_kh" => "ស្រុកកោះញែក",
            "name_en" => "Kaoh Nheaek District",
            "code" => "1102",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"11",
            "name_kh" => "ស្រុកអូររាំង",
            "name_en" => "Ou Reang District",
            "code" => "1103",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"11",
            "name_kh" => "ស្រុកពេជ្រាដា",
            "name_en" => "Pech Chreada District",
            "code" => "1104",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"11",
            "name_kh" => "ក្រុងសែនមនោរម្យ",
            "name_en" => "Saen Monourom Municipality",
            "code" => "1105",
            "reference" => "អនុក្រឹតលេខ ២២៦ អនក្រ.បក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌចំការមន",
            "name_en" => "Chamkar Mon Khan",
            "code" => "1201",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌដូនពេញ",
            "name_en" => "Doun Penh Khan",
            "code" => "1202",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌ៧មករា",
            "name_en" => "Prampir Meakkakra Khan",
            "code" => "1203",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌទួលគោក",
            "name_en" => "Tuol Kouk Khan",
            "code" => "1204",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌដង្កោ",
            "name_en" => "Dangkao Khan",
            "code" => "1205",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌមានជ័យ",
            "name_en" => "Mean Chey Khan",
            "code" => "1206",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌឫស្សីកែវ",
            "name_en" => "Russey Keo Khan",
            "code" => "1207",
            "reference" => "ប្រកាសលេខ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌពោធិ៍សែនជ័យ",
            "name_en" => "Pur SenChey Khan",
            "code" => "1209",
            "reference" => "អនុក្រិតលេខ៨០"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌព្រែកព្នៅ",
            "name_en" => "Praek Pnov Khan",
            "code" => "1211",
            "reference" => "អនុក្រឹត្យលេខ៥៧៨ អនក្រ.បក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌច្បារអំពៅ",
            "name_en" => "Chbar Ampov Khan",
            "code" => "1212",
            "reference" => "អនុក្រឹត្យលេខ៥៧៩ អនក្រ.បក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុកជ័យសែន",
            "name_en" => "Chey Saen District",
            "code" => "1301",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុកឆែប",
            "name_en" => "Chhaeb District",
            "code" => "1302",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុកជាំក្សាន្ដ",
            "name_en" => "Choam Ksant District",
            "code" => "1303",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុកគូលែន",
            "name_en" => "Kuleaen District",
            "code" => "1304",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុករវៀង",
            "name_en" => "Rovieng District",
            "code" => "1305",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុកសង្គមថ្មី",
            "name_en" => "Sangkum Thmei District",
            "code" => "1306",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ស្រុកត្បែងមានជ័យ",
            "name_en" => "Tbaeng Mean Chey District",
            "code" => "1307",
            "reference" => "លេខប្រកាស ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"13",
            "name_kh" => "ក្រុងព្រះវិហារ",
            "name_en" => "Preah Vihear Municipality",
            "code" => "1308",
            "reference" => "អនុក្រឹតលេខ ១១ អនក្រ.បក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកបាភ្នំ",
            "name_en" => "Ba Phnum District",
            "code" => "1401",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកកំចាយមារ",
            "name_en" => "Kamchay Mear District",
            "code" => "1402",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកកំពង់ត្របែក",
            "name_en" => "Kampong Trabaek District",
            "code" => "1403",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកកញ្ជ្រៀច",
            "name_en" => "Kanhchriech District",
            "code" => "1404",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកមេសាង",
            "name_en" => "Me Sang District",
            "code" => "1405",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកពាមជរ",
            "name_en" => "Peam Chor District",
            "code" => "1406",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកពាមរក៍",
            "name_en" => "Peam Ro District",
            "code" => "1407",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកពារាំង",
            "name_en" => "Pea Reang District",
            "code" => "1408",
            "reference" => "តាមប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកព្រះស្ដេច",
            "name_en" => "Preah Sdach District",
            "code" => "1409",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ក្រុងព្រៃវែង",
            "name_en" => "Prey Veng Municipality",
            "code" => "1410",
            "reference" => "០៩ អនក្រ.បក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកពោធិ៍រៀង",
            "name_en" => "Pur Rieng District",
            "code" => "1411",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកស៊ីធរកណ្ដាល",
            "name_en" => "Sithor Kandal District",
            "code" => "1412",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"14",
            "name_kh" => "ស្រុកស្វាយអន្ទរ",
            "name_en" => "Svay Antor District",
            "code" => "1413",
            "reference" => "០៩ អនក្រ.បក"
        ],
        [
            "province_id"=>"15",
            "name_kh" => "ស្រុកបាកាន",
            "name_en" => "Bakan District",
            "code" => "1501",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"15",
            "name_kh" => "ស្រុកកណ្ដៀង",
            "name_en" => "Kandieng District",
            "code" => "1502",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"15",
            "name_kh" => "ស្រុកក្រគរ",
            "name_en" => "Krakor District",
            "code" => "1503",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"15",
            "name_kh" => "ស្រុកភ្នំក្រវ៉ាញ",
            "name_en" => "Phnum Kravanh District",
            "code" => "1504",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"15",
            "name_kh" => "ក្រុងពោធិ៍សាត់",
            "name_en" => "Pursat Municipality",
            "code" => "1505",
            "reference" => "លេខ​ ១៤​ អនក្រ.បក"
        ],
        [
            "province_id"=>"15",
            "name_kh" => "ស្រុកវាលវែង",
            "name_en" => "Veal Veaeng District",
            "code" => "1506",
            "reference" => "លេខ​៤៩៣​ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកអណ្ដូងមាស",
            "name_en" => "Andoung Meas District",
            "code" => "1601",
            "reference" => ""
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ក្រុងបានលុង",
            "name_en" => "Ban Lung Municipality",
            "code" => "1602",
            "reference" => "អនុក្រឹត្យលេខ ២២៧ អនក្រ.បក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកបរកែវ",
            "name_en" => "Bar Kaev District",
            "code" => "1603",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកកូនមុំ",
            "name_en" => "Koun Mom District",
            "code" => "1604",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកលំផាត់",
            "name_en" => "Lumphat District",
            "code" => "1605",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកអូរជុំ",
            "name_en" => "Ou Chum District",
            "code" => "1606",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកអូរយ៉ាដាវ",
            "name_en" => "Ou Ya Dav District",
            "code" => "1607",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកតាវែង",
            "name_en" => "Ta Veaeng District",
            "code" => "1608",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"16",
            "name_kh" => "ស្រុកវើនសៃ",
            "name_en" => "Veun Sai District",
            "code" => "1609",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកអង្គរជុំ",
            "name_en" => "Angkor Chum District",
            "code" => "1701",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកអង្គរធំ",
            "name_en" => "Angkor Thum District",
            "code" => "1702",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកបន្ទាយស្រី",
            "name_en" => "Banteay Srei District",
            "code" => "1703",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកជីក្រែង",
            "name_en" => "Chi Kraeng District",
            "code" => "1704",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកក្រឡាញ់",
            "name_en" => "Kralanh District",
            "code" => "1706",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកពួក",
            "name_en" => "Puok District",
            "code" => "1707",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកប្រាសាទបាគង",
            "name_en" => "Prasat Bakong District",
            "code" => "1709",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ក្រុងសៀមរាប",
            "name_en" => "Siem Reap Municipality",
            "code" => "1710",
            "reference" => "អនុក្រឹតលេខ ១៣ អនក្រ.បក"
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកសូទ្រនិគម",
            "name_en" => "Soutr Nikom District",
            "code" => "1711",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកស្រីស្នំ",
            "name_en" => "Srei Snam District",
            "code" => "1712",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកស្វាយលើ",
            "name_en" => "Svay Leu District",
            "code" => "1713",
            "reference" => ""
        ],
        [
            "province_id"=>"17",
            "name_kh" => "ស្រុកវ៉ារិន",
            "name_en" => "Varin District",
            "code" => "1714",
            "reference" => ""
        ],
        [
            "province_id"=>"18",
            "name_kh" => "ក្រុងព្រះសីហនុ",
            "name_en" => "Preah Sihanouk Municipality",
            "code" => "1801",
            "reference" => "អនុក្រឹត្យលេខ ០៧ អនក្រ.បក"
        ],
        [
            "province_id"=>"18",
            "name_kh" => "ស្រុកព្រៃនប់",
            "name_en" => "Prey Nob District",
            "code" => "1802",
            "reference" => "អនុក្រឹត្យលេខ ០៧ អនក្រ.បក"
        ],
        [
            "province_id"=>"18",
            "name_kh" => "ស្រុកស្ទឹងហាវ",
            "name_en" => "Stueng Hav District",
            "code" => "1803",
            "reference" => "អនុក្រឹត្យលេខ ០៧ អនក្រ.បក"
        ],
        [
            "province_id"=>"18",
            "name_kh" => "ស្រុកកំពង់សីលា",
            "name_en" => "Kampong Seila District",
            "code" => "1804",
            "reference" => "ព្រះរាជក្រឹត្យលេខ នស/រកត/១២០៨/១៣៨៥"
        ],
        [
            "province_id"=>"19",
            "name_kh" => "ស្រុកសេសាន",
            "name_en" => "Sesan District",
            "code" => "1901",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"19",
            "name_kh" => "ស្រុកសៀមបូក",
            "name_en" => "Siem Bouk District",
            "code" => "1902",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"19",
            "name_kh" => "ស្រុកសៀមប៉ាង",
            "name_en" => "Siem Pang District",
            "code" => "1903",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"19",
            "name_kh" => "ក្រុងស្ទឹងត្រែង",
            "name_en" => "Stueng Traeng Municipality",
            "code" => "1904",
            "reference" => "អនុក្រឹត្យលេខ២២៤ អនក្រ.បក"
        ],
        [
            "province_id"=>"19",
            "name_kh" => "ស្រុកថាឡាបរិវ៉ាត់",
            "name_en" => "Thala Barivat District",
            "code" => "1905",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ស្រុកចន្ទ្រា",
            "name_en" => "Chantrea District",
            "code" => "2001",
            "reference" => "៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ស្រុកកំពង់រោទិ៍",
            "name_en" => "Kampong Rou District",
            "code" => "2002",
            "reference" => "៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ស្រុករំដួល",
            "name_en" => "Rumduol District",
            "code" => "2003",
            "reference" => "៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ស្រុករមាសហែក",
            "name_en" => "Romeas Haek District",
            "code" => "2004",
            "reference" => "៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ស្រុកស្វាយជ្រំ",
            "name_en" => "Svay Chrum District",
            "code" => "2005",
            "reference" => "តាមប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ក្រុងស្វាយរៀង",
            "name_en" => "Svay Rieng Municipality",
            "code" => "2006",
            "reference" => "១២ អនក្រ.បក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ស្រុកស្វាយទាប",
            "name_en" => "Svay Teab District",
            "code" => "2007",
            "reference" => "ប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"20",
            "name_kh" => "ក្រុងបាវិត",
            "name_en" => "Bavet Municipality",
            "code" => "2008",
            "reference" => "២២៨ អនក្រ.បក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកអង្គរបូរី",
            "name_en" => "Angkor Borei District",
            "code" => "2101",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកបាទី",
            "name_en" => "Bati District",
            "code" => "2102",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកបូរីជលសារ",
            "name_en" => "Borei Cholsar District",
            "code" => "2103",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកគីរីវង់",
            "name_en" => "Kiri Vong District",
            "code" => "2104",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកកោះអណ្ដែត",
            "name_en" => "Kaoh Andaet District",
            "code" => "2105",
            "reference" => "៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកព្រៃកប្បាស",
            "name_en" => "Prey Kabbas District",
            "code" => "2106",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកសំរោង",
            "name_en" => "Samraong District",
            "code" => "2107",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ក្រុងដូនកែវ",
            "name_en" => "Doun Kaev Municipality",
            "code" => "2108",
            "reference" => "២២៦ អនក្រ.បក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកត្រាំកក់",
            "name_en" => "Tram Kak District",
            "code" => "2109",
            "reference" => "តាមប្រកាសលេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"21",
            "name_kh" => "ស្រុកទ្រាំង",
            "name_en" => "Treang District",
            "code" => "2110",
            "reference" => "លេខ ៤៩៣ ប្រ.ក"
        ],
        [
            "province_id"=>"22",
            "name_kh" => "ស្រុកអន្លង់វែង",
            "name_en" => "Anlong Veaeng District",
            "code" => "2201",
            "reference" => ""
        ],
        [
            "province_id"=>"22",
            "name_kh" => "ស្រុកបន្ទាយអំពិល",
            "name_en" => "Banteay Ampil District",
            "code" => "2202",
            "reference" => ""
        ],
        [
            "province_id"=>"22",
            "name_kh" => "ស្រុកចុងកាល់",
            "name_en" => "Chong Kal District",
            "code" => "2203",
            "reference" => ""
        ],
        [
            "province_id"=>"22",
            "name_kh" => "ក្រុងសំរោង",
            "name_en" => "Samraong Municipality",
            "code" => "2204",
            "reference" => ""
        ],
        [
            "province_id"=>"22",
            "name_kh" => "ស្រុកត្រពាំងប្រាសាទ",
            "name_en" => "Trapeang Prasat District",
            "code" => "2205",
            "reference" => ""
        ],
        [
            "province_id"=>"23",
            "name_kh" => "ស្រុកដំណាក់ចង្អើរ",
            "name_en" => "Damnak Chang'aeur District",
            "code" => "2301",
            "reference" => "អនុក្រឹត្យលេខ ០៦ អនក្រ.បក"
        ],
        [
            "province_id"=>"23",
            "name_kh" => "ក្រុងកែប",
            "name_en" => "Kaeb Municipality",
            "code" => "2302",
            "reference" => "អនុក្រឹត្យលេខ ០៦​ អនក្រ.បក"
        ],
        [
            "province_id"=>"24",
            "name_kh" => "ក្រុងប៉ៃលិន",
            "name_en" => "Pailin Municipality",
            "code" => "2401",
            "reference" => "លេខ 05​អនក្រុ.បក"
        ],
        [
            "province_id"=>"24",
            "name_kh" => "ស្រុកសាលាក្រៅ",
            "name_en" => "Sala Krau District",
            "code" => "2402",
            "reference" => "០៥​អនក្រ.បក​"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ស្រុកតំបែរ",
            "name_en" => "Dambae District",
            "code" => "2501",
            "reference" => "Royal Degree 1445"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ស្រុកក្រូចឆ្មារ",
            "name_en" => "Krouch Chhmar District",
            "code" => "2502",
            "reference" => "Royal Degree 1445"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ស្រុកមេមត់",
            "name_en" => "Memot District",
            "code" => "2503",
            "reference" => "Royal Degree 1445"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ស្រុកអូររាំងឪ",
            "name_en" => "Ou Reang Ov District",
            "code" => "2504",
            "reference" => "Royal Degree 1445"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ស្រុកពញាក្រែក",
            "name_en" => "Ponhea Kraek District",
            "code" => "2505",
            "reference" => "Royal Degree 1445"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ក្រុងសួង",
            "name_en" => "Suong Municipality",
            "code" => "2506",
            "reference" => "ព្រះរាជក្រិត្យលេខ ១៤៤៥"
        ],
        [
            "province_id"=>"25",
            "name_kh" => "ស្រុកត្បូងឃ្មុំ",
            "name_en" => "Tboung Khmum District",
            "code" => "2507",
            "reference" => "Royal Degree 1445"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌជ្រោយចង្វារ",
            "name_en" => "Chroy Changvar Khan",
            "code" => "1210",
            "reference" => "អនុក្រឹត្យលេខ៥៧៧ អនក្រ.បក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌបឹងកេងកង",
            "name_en" => "Boeng Keng Kang Khan",
            "code" => "1213",
            "reference" => "អនុក្រឹត្យលេខ០៣ អនក្រ.បក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌកំបូល",
            "name_en" => "Kamboul Khan",
            "code" => "1214",
            "reference" => "អនុក្រឹត្យលេខ០៤ អនក្រ.បក"
        ],
        [
            "province_id"=>"12",
            "name_kh" => "ខណ្ឌសែនសុខ",
            "name_en" => "Sen Sok Khan",
            "code" => "1208",
            "reference" => "អនុក្រឹត្យលេខ០៣ អនក្រ.បក"
        ]
        ];
        DB::table('districts')->insert($data);
    }
}
