<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
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
                "name_kh" => "អាហ្វហ្គានីស្ថាន",
                "name_en" => "Afghanistan",
                "iso_3166_1" => "AF",
                "nationality_en" => "Afghan"
            ],
            [
                "name_kh" => "កោះ​អាឡាំង",
                "name_en" => "Åland Islands",
                "iso_3166_1" => "AX",
                "nationality_en" => "Åland Island"
            ],
            [
                "name_kh" => "អាល់បានី",
                "name_en" => "Albania",
                "iso_3166_1" => "AL",
                "nationality_en" => "Albanian"
            ],
            [
                "name_kh" => "អាល់ហ្សេរី",
                "name_en" => "Algeria",
                "iso_3166_1" => "DZ",
                "nationality_en" => "Algerian"
            ],
            [
                "name_kh" => "សាម័រ អាមេរិកាំង",
                "name_en" => "American Samoa",
                "iso_3166_1" => "AS",
                "nationality_en" => "American Samoan"
            ],
            [
                "name_kh" => "អង់ដូរ៉ា",
                "name_en" => "Andorra",
                "iso_3166_1" => "AD",
                "nationality_en" => "Andorran"
            ],
            [
                "name_kh" => "អង់ហ្គោឡា",
                "name_en" => "Angola",
                "iso_3166_1" => "AO",
                "nationality_en" => "Angolan"
            ],
            [
                "name_kh" => "អង់ហ្គីឡា",
                "name_en" => "Anguilla",
                "iso_3166_1" => "AI",
                "nationality_en" => "Anguillan"
            ],
            [
                "name_kh" => "អង់តាក់ទិក",
                "name_en" => "Antarctica",
                "iso_3166_1" => "AQ",
                "nationality_en" => "Antarctic"
            ],
            [
                "name_kh" => "អង់ទីហ្គា និង បាប៊ុយដា",
                "name_en" => "Antigua & Barbuda",
                "iso_3166_1" => "AG",
                "nationality_en" => "Antiguan or Barbudan"
            ],
            [
                "name_kh" => "អាហ្សង់ទីន",
                "name_en" => "Argentina",
                "iso_3166_1" => "AR",
                "nationality_en" => "Argentine"
            ],
            [
                "name_kh" => "អាមេនី",
                "name_en" => "Armenia",
                "iso_3166_1" => "AM",
                "nationality_en" => "Armenian"
            ],
            [
                "name_kh" => "អារូបា",
                "name_en" => "Aruba",
                "iso_3166_1" => "AW",
                "nationality_en" => "Aruban"
            ],
            [
                "name_kh" => "កោះ​អាសេនសិន",
                "name_en" => "Ascension Island",
                "iso_3166_1" => "AC",
              "nationality_en" => ""
            ],
            [
                "name_kh" => "អូស្ត្រាលី",
                "name_en" => "Australia",
                "iso_3166_1" => "AU",
                "nationality_en" => "Australian"
            ],
            [
                "name_kh" => "អូទ្រីស",
                "name_en" => "Austria",
                "iso_3166_1" => "AT",
                "nationality_en" => "Austrian"
            ],
            [
                "name_kh" => "អាស៊ែបៃហ្សង់",
                "name_en" => "Azerbaijan",
                "iso_3166_1" => "AZ",
                "nationality_en" => "Azerbaijani, Azeri"
            ],
            [
                "name_kh" => "បាហាម៉ា",
                "name_en" => "Bahamas",
                "iso_3166_1" => "BS",
                "nationality_en" => "Bahamian"
            ],
            [
                "name_kh" => "បារ៉ែន",
                "name_en" => "Bahrain",
                "iso_3166_1" => "BH",
                "nationality_en" => "Bahraini"
            ],
            [
                "name_kh" => "បង់ក្លាដែស",
                "name_en" => "Bangladesh",
                "iso_3166_1" => "BD",
                "nationality_en" => "Bangladeshi"
            ],
            [
                "name_kh" => "បាបាដុស",
                "name_en" => "Barbados",
                "iso_3166_1" => "BB",
                "nationality_en" => "Barbadian"
            ],
            [
                "name_kh" => "បេឡារុស្ស",
                "name_en" => "Belarus",
                "iso_3166_1" => "BY",
                "nationality_en" => "Belarusian"
            ],
            [
                "name_kh" => "បែលហ្ស៊ិក",
                "name_en" => "Belgium",
                "iso_3166_1" => "BE",
                "nationality_en" => "Belgian"
            ],
            [
                "name_kh" => "បេលីហ្ស",
                "name_en" => "Belize",
                "iso_3166_1" => "BZ",
                "nationality_en" => "Belizean"
            ],
            [
                "name_kh" => "បេណាំង",
                "name_en" => "Benin",
                "iso_3166_1" => "BJ",
                "nationality_en" => "Beninese, Beninois"
            ],
            [
                "name_kh" => "ប៊ឺមុយដា",
                "name_en" => "Bermuda",
                "iso_3166_1" => "BM",
                "nationality_en" => "Bermudian, Bermudan"
            ],
            [
                "name_kh" => "ប៊ូតាន",
                "name_en" => "Bhutan",
                "iso_3166_1" => "BT",
                "nationality_en" => "Bhutanese"
            ],
            [
                "name_kh" => "បូលីវី",
                "name_en" => "Bolivia",
                "iso_3166_1" => "BO",
                "nationality_en" => "Bolivian"
            ],
            [
                "name_kh" => "បូស្នី និងហឺហ្សីហ្គូវីណា",
                "name_en" => "Bosnia & Herzegovina",
                "iso_3166_1" => "BA",
                "nationality_en" => "Bosnian or Herzegovinian"
            ],
            [
                "name_kh" => "បុតស្វាណា",
                "name_en" => "Botswana",
                "iso_3166_1" => "BW",
                "nationality_en" => "Motswana, Botswanan"
            ],
            [
                "name_kh" => "ប្រេស៊ីល",
                "name_en" => "Brazil",
                "iso_3166_1" => "BR",
                "nationality_en" => "Brazilian"
            ],
            [
                "name_kh" => "ដែនដី​អង់គ្លេស​នៅ​មហា​សមុទ្រ​ឥណ្ឌា",
                "name_en" => "British Indian Ocean Territory",
                "iso_3166_1" => "IO",
                "nationality_en" => "BIOT"
            ],
            [
                "name_kh" => "កោះ​វឺជិន​ចក្រភព​អង់គ្លេស",
                "name_en" => "British Virgin Islands",
                "iso_3166_1" => "VG",
                "nationality_en" => "British Virgin Island"
            ],
            [
                "name_kh" => "ប្រ៊ុយណេ",
                "name_en" => "Brunei",
                "iso_3166_1" => "BN",
                "nationality_en" => "Bruneian"
            ],
            [
                "name_kh" => "ប៊ុលហ្គារី",
                "name_en" => "Bulgaria",
                "iso_3166_1" => "BG",
                "nationality_en" => "Bulgarian"
            ],
            [
                "name_kh" => "បួគីណាហ្វាសូ",
                "name_en" => "Burkina Faso",
                "iso_3166_1" => "BF",
                "nationality_en" => "Burkinabé"
            ],
            [
                "name_kh" => "ប៊ូរុនឌី",
                "name_en" => "Burundi",
                "iso_3166_1" => "BI",
                "nationality_en" => "Burundian"
            ],
            [
                "name_kh" => "កម្ពុជា",
                "name_en" => "Cambodia",
                "iso_3166_1" => "KH",
                "nationality_en" => "Cambodian"
            ],
            [
                "name_kh" => "កាមេរូន",
                "name_en" => "Cameroon",
                "iso_3166_1" => "CM",
                "nationality_en" => "Cameroonian"
            ],
            [
                "name_kh" => "កាណាដា",
                "name_en" => "Canada",
                "iso_3166_1" => "CA",
                "nationality_en" => "Canadian"
            ],
            [
                "name_kh" => "កោះ​កាណារី",
                "name_en" => "Canary Islands",
                "iso_3166_1" => "IC",
                "nationality_en" => ""
            ],
            [
                "name_kh" => "កាបវែរ",
                "name_en" => "Cape Verde",
                "iso_3166_1" => "CV",
                "nationality_en" => "Cabo Verdean"
            ],
            [
                "name_kh" => "ហុល្លង់ ការ៉ាប៊ីន",
                "name_en" => "Caribbean Netherlands",
                "iso_3166_1" => "BQ",
                "nationality_en" => ""
            ],
            [
                "name_kh" => "កោះ​កៃម៉ង់",
                "name_en" => "Cayman Islands",
                "iso_3166_1" => "KY",
                "nationality_en" => "Caymanian"
            ],
            [
                "name_kh" => "សាធារណរដ្ឋអាហ្វ្រិកកណ្ដាល",
                "name_en" => "Central African Republic",
                "iso_3166_1" => "CF",
                "nationality_en" => "Central African"
            ],
            [
                "name_kh" => "ជឺតា និង​ម៉េលីឡា",
                "name_en" => "Ceuta & Melilla",
                "iso_3166_1" => "EA",
                "nationality_en" => ""
            ],
            [
                "name_kh" => "ឆាដ",
                "name_en" => "Chad",
                "iso_3166_1" => "TD",
                "nationality_en" => "Chadian"
            ],
            [
                "name_kh" => "ស៊ីលី",
                "name_en" => "Chile",
                "iso_3166_1" => "CL",
                "nationality_en" => "Chilean"
            ],
            [
                "name_kh" => "ចិន",
                "name_en" => "China",
                "iso_3166_1" => "CN",
                "nationality_en" => "Chinese"
            ],
            [
                "name_kh" => "កោះ​គ្រីស្មាស",
                "name_en" => "Christmas Island",
                "iso_3166_1" => "CX",
                "nationality_en" => "Christmas Island"
            ],
            [
                "name_kh" => "កោះ​កូកូស (គីលីង)",
                "name_en" => "Cocos (Keeling) Islands",
                "iso_3166_1" => "CC",
                "nationality_en" => "Cocos Island"
            ],
            [
                "name_kh" => "កូឡុំប៊ី",
                "name_en" => "Colombia",
                "iso_3166_1" => "CO",
                "nationality_en" => "Colombian"
            ],
            [
                "name_kh" => "កូម័រ",
                "name_en" => "Comoros",
                "iso_3166_1" => "KM",
                "nationality_en" => "Comoran, Comorian"
            ],
            [
                "name_kh" => "កុងហ្គោ - ប្រាហ្សាវីល",
                "name_en" => "Congo - Brazzaville",
                "iso_3166_1" => "CG",
                "nationality_en" => "Congolese"
            ],
            [
                "name_kh" => "កុងហ្គោ- គីនស្ហាសា",
                "name_en" => "Congo - Kinshasa",
                "iso_3166_1" => "CD",
                "nationality_en" => "Congolese"
            ],
            [
                "name_kh" => "កោះ​ខូក",
                "name_en" => "Cook Islands",
                "iso_3166_1" => "CK",
                "nationality_en" => "Cook Island"
            ],
            [
                "name_kh" => "កូស្តារីកា",
                "name_en" => "Costa Rica",
                "iso_3166_1" => "CR",
                "nationality_en" => "Costa Rican"
            ],
            [
                "name_kh" => "កូដឌីវ័រ",
                "name_en" => "Côte d’Ivoire",
                "iso_3166_1" => "CI",
                "nationality_en" => "Ivorian"
            ],
            [
                "name_kh" => "ក្រូអាត",
                "name_en" => "Croatia",
                "iso_3166_1" => "HR",
                "nationality_en" => "Croatian"
            ],
            [
                "name_kh" => "គុយបា",
                "name_en" => "Cuba",
                "iso_3166_1" => "CU",
                "nationality_en" => "Cuban"
            ],
            [
                "name_kh" => "កូរ៉ាកៅ",
                "name_en" => "Curaçao",
                "iso_3166_1" => "CW",
                "nationality_en" => "Curaçaoan"
            ],
            [
                "name_kh" => "ស៊ីប",
                "name_en" => "Cyprus",
                "iso_3166_1" => "CY",
                "nationality_en" => "Cypriot"
            ],
            [
                "name_kh" => "ឆេគា",
                "name_en" => "Czechia",
                "iso_3166_1" => "CZ",
                "nationality_en" => ""
            ],
            [
                "name_kh" => "ដាណឺម៉ាក",
                "name_en" => "Denmark",
                "iso_3166_1" => "DK",
                "nationality_en" => "Danish"
            ],
            [
                "name_kh" => "ឌៀហ្គោហ្គាស៊ី",
                "name_en" => "Diego Garcia",
                "iso_3166_1" => "DG",
                "nationality_en" => ""
            ],
            [
                "name_kh" => "ជីប៊ូទី",
                "name_en" => "Djibouti",
                "iso_3166_1" => "DJ",
                "nationality_en" => "Djiboutian"
            ],
            [
                "name_kh" => "ដូមីនីក",
                "name_en" => "Dominica",
                "iso_3166_1" => "DM",
                "nationality_en" => "Dominican"
            ],
            [
                "name_kh" => "សាធារណរដ្ឋ​ដូមីនីក",
                "name_en" => "Dominican Republic",
                "iso_3166_1" => "DO",
                "nationality_en" => "Dominican"
            ],
            [
                "name_kh" => "អេក្វាឌ័រ",
                "name_en" => "Ecuador",
                "iso_3166_1" => "EC",
                "nationality_en" => "Ecuadorian"
            ],
            [
                "name_kh" => "អេហ្ស៊ីប",
                "name_en" => "Egypt",
                "iso_3166_1" => "EG",
                "nationality_en" => "Egyptian"
            ],
            [
                "name_kh" => "អែលសាល់វ៉ាឌ័រ",
                "name_en" => "El Salvador",
                "iso_3166_1" => "SV",
                "nationality_en" => "Salvadoran"
            ],
            [
                "name_kh" => "ហ្គីណេអេក្វាទ័រ",
                "name_en" => "Equatorial Guinea",
                "iso_3166_1" => "GQ",
                "nationality_en" => "Equatorial Guinean, Equatoguinean"
            ],
            [
                "name_kh" => "អេរីទ្រា",
                "name_en" => "Eritrea",
                "iso_3166_1" => "ER",
                "nationality_en" => "Eritrean"
            ],
            [
                "name_kh" => "អេស្តូនី",
                "name_en" => "Estonia",
                "iso_3166_1" => "EE",
                "nationality_en" => "Estonian"
            ],
            [
                "name_kh" => "អេត្យូពី",
                "name_en" => "Ethiopia",
                "iso_3166_1" => "ET",
                "nationality_en" => "Ethiopian"
            ],
            [
                "name_kh" => "Eurozone",
                "name_en" => "Eurozone",
                "iso_3166_1" => "EZ",
                "nationality_en" => ""
            ],
            [
                "name_kh" => "កោះ​ហ្វក់ឡែន",
                "name_en" => "Falkland Islands",
                "iso_3166_1" => "FK",
                "nationality_en" => "Falkland Island"
            ],
            [
                "name_kh" => "កោះ​ហ្វារ៉ូ",
                "name_en" => "Faroe Islands",
                "iso_3166_1" => "FO",
                "nationality_en" => "Faroese"
            ],
            [
                "name_kh" => "ហ្វីជី",
                "name_en" => "Fiji",
                "iso_3166_1" => "FJ",
                "nationality_en" => "Fijian"
            ],
            [
                "name_kh" => "ហ្វាំងឡង់",
                "name_en" => "Finland",
                "iso_3166_1" => "FI",
                "nationality_en" => "Finnish"
            ],
            [
                "name_kh" => "បារាំង",
                "name_en" => "France",
                "iso_3166_1" => "FR",
                "nationality_en" => "French"
            ],
            [
                "name_kh" => "ហ្គៀណាបារាំង",
                "name_en" => "French Guiana",
                "iso_3166_1" => "GF",
                "nationality_en" => "French Guianese"
            ],
            [
                "name_kh" => "ប៉ូលី​ណេស៊ី​បារាំង",
                "name_en" => "French Polynesia",
                "iso_3166_1" => "PF",
                "nationality_en" => "French Polynesian"
            ],
            [
                "name_kh" => "ដែនដី​បារាំង​នៅ​ភាគខាងត្បូង",
                "name_en" => "French Southern Territories",
                "iso_3166_1" => "TF",
                "nationality_en" => "French Southern Territories"
            ],
            [
                "name_kh" => "ហ្គាបុង",
                "name_en" => "Gabon",
                "iso_3166_1" => "GA",
                "nationality_en" => "Gabonese"
            ],
            [
                "name_kh" => "ហ្គាំប៊ី",
                "name_en" => "Gambia",
                "iso_3166_1" => "GM",
                "nationality_en" => "Gambian"
            ],
            [
                "name_kh" => "ហ្សកហ្ស៊ី",
                "name_en" => "Georgia",
                "iso_3166_1" => "GE",
                "nationality_en" => "Georgian"
            ],
            [
                "name_kh" => "អាល្លឺម៉ង់",
                "name_en" => "Germany",
                "iso_3166_1" => "DE",
                "nationality_en" => "German"
            ],
            [
                "name_kh" => "ហ្គាណា",
                "name_en" => "Ghana",
                "iso_3166_1" => "GH",
                "nationality_en" => "Ghanaian"
            ],
            [
                "name_kh" => "ហ្គីប្រាលតា",
                "name_en" => "Gibraltar",
                "iso_3166_1" => "GI",
                "nationality_en" => "Gibraltar"
            ],
            [
                "name_kh" => "ក្រិក",
                "name_en" => "Greece",
                "iso_3166_1" => "GR",
                "nationality_en" => "Greek, Hellenic"
            ],
            [
                "name_kh" => "ហ្គ្រោអង់ឡង់",
                "name_en" => "Greenland",
                "iso_3166_1" => "GL",
                "nationality_en" => "Greenlandic"
            ],
            [
                "name_kh" => "ហ្គ្រីណាដា",
                "name_en" => "Grenada",
                "iso_3166_1" => "GD",
                "nationality_en" => "Grenadian"
            ],
            [
                "name_kh" => "ហ្គោដឺឡុប",
                "name_en" => "Guadeloupe",
                "iso_3166_1" => "GP",
                "nationality_en" => "Guadeloupe"
            ],
            [
                "name_kh" => "ហ្គាំ",
                "name_en" => "Guam",
                "iso_3166_1" => "GU",
                "nationality_en" => "Guamanian, Guambat"
            ],
            [
                "name_kh" => "ហ្គាតេម៉ាឡា",
                "name_en" => "Guatemala",
                "iso_3166_1" => "GT",
                "nationality_en" => "Guatemalan"
            ],
            [
                "name_kh" => "ហ្គេនស៊ី",
                "name_en" => "Guernsey",
                "iso_3166_1" => "GG",
                "nationality_en" => "Channel Island"
            ],
            [
                "name_kh" => "ហ្គីណេ",
                "name_en" => "Guinea",
                "iso_3166_1" => "GN",
                "nationality_en" => "Guinean"
            ],
            [
                "name_kh" => "ហ្គីណេប៊ីសូ",
                "name_en" => "Guinea-Bissau",
                "iso_3166_1" => "GW",
                "nationality_en" => "Bissau-Guinean"
            ],
            [
                 "name_kh" => "ហ្គីយ៉ាណា",
                 "name_en" => "Guyana",
                 "iso_3166_1" => "GY",
                 "nationality_en" => "Guyanese"
            ],
            [
                 "name_kh" => "ហៃទី",
                 "name_en" => "Haiti",
                 "iso_3166_1" => "HT",
                 "nationality_en" => "Haitian"
            ],
            [
                 "name_kh" => "ហុងឌូរ៉ាស",
                 "name_en" => "Honduras",
                 "iso_3166_1" => "HN",
                 "nationality_en" => "Honduran"
            ],
            [
                 "name_kh" => "ហុងកុង",
                 "name_en" => "Hong Kong SAR China",
                 "iso_3166_1" => "HK",
                 "nationality_en" => "Hong Kong, Hong Kongese"
            ],
            [
                 "name_kh" => "ហុងគ្រី",
                 "name_en" => "Hungary",
                 "iso_3166_1" => "HU",
                 "nationality_en" => "Hungarian, Magyar"
            ],
            [
                 "name_kh" => "អ៊ីស្លង់",
                 "name_en" => "Iceland",
                 "iso_3166_1" => "IS",
                 "nationality_en" => "Icelandic"
            ],
            [
                 "name_kh" => "ឥណ្ឌា",
                 "name_en" => "India",
                 "iso_3166_1" => "IN",
                 "nationality_en" => "Indian"
            ],
            [
                 "name_kh" => "ឥណ្ឌូណេស៊ី",
                 "name_en" => "Indonesia",
                 "iso_3166_1" => "ID",
                 "nationality_en" => "Indonesian"
            ],
            [
                 "name_kh" => "អ៊ីរ៉ង់",
                 "name_en" => "Iran",
                 "iso_3166_1" => "IR",
                 "nationality_en" => "Iranian, Persian"
            ],
            [
                 "name_kh" => "អ៊ីរ៉ាក់",
                 "name_en" => "Iraq",
                 "iso_3166_1" => "IQ",
                 "nationality_en" => "Iraqi"
            ],
            [
                 "name_kh" => "អៀរឡង់",
                 "name_en" => "Ireland",
                 "iso_3166_1" => "IE",
                 "nationality_en" => "Irish"
            ],
            [
                 "name_kh" => "អែលអុហ្វមែន",
                 "name_en" => "Isle of Man",
                 "iso_3166_1" => "IM",
                 "nationality_en" => "Manx"
            ],
            [
                 "name_kh" => "អ៊ីស្រាអែល",
                 "name_en" => "Israel",
                 "iso_3166_1" => "IL",
                 "nationality_en" => "Israeli"
            ],
            [
                 "name_kh" => "អ៊ីតាលី",
                 "name_en" => "Italy",
                 "iso_3166_1" => "IT",
                 "nationality_en" => "Italian"
            ],
            [
                 "name_kh" => "ចាម៉ៃកា",
                 "name_en" => "Jamaica",
                 "iso_3166_1" => "JM",
                 "nationality_en" => "Jamaican"
            ],
            [
                 "name_kh" => "ជប៉ុន",
                 "name_en" => "Japan",
                 "iso_3166_1" => "JP",
                 "nationality_en" => "Japanese"
            ],
            [
                 "name_kh" => "ជឺស៊ី",
                 "name_en" => "Jersey",
                 "iso_3166_1" => "JE",
                 "nationality_en" => "Channel Island"
            ],
            [
                 "name_kh" => "ហ៊្សកដានី",
                 "name_en" => "Jordan",
                 "iso_3166_1" => "JO",
                 "nationality_en" => "Jordanian"
            ],
            [
                 "name_kh" => "កាហ្សាក់ស្ថាន",
                 "name_en" => "Kazakhstan",
                 "iso_3166_1" => "KZ",
                 "nationality_en" => "Kazakhstani, Kazakh"
            ],
            [
                 "name_kh" => "កេនយ៉ា",
                 "name_en" => "Kenya",
                 "iso_3166_1" => "KE",
                 "nationality_en" => "Kenyan"
            ],
            [
                 "name_kh" => "គិរិបាទី",
                 "name_en" => "Kiribati",
                 "iso_3166_1" => "KI",
                 "nationality_en" => "I-Kiribati"
            ],
            [
                 "name_kh" => "កូសូវ៉ូ",
                 "name_en" => "Kosovo",
                 "iso_3166_1" => "XK",
                "nationality_en" => ""
            ],
            [
                 "name_kh" => "គុយវ៉ែត",
                 "name_en" => "Kuwait",
                 "iso_3166_1" => "KW",
                 "nationality_en" => "Kuwaiti"
            ],
            [
                 "name_kh" => "កៀហ្ស៊ីស៊ីស្ថាន",
                 "name_en" => "Kyrgyzstan",
                 "iso_3166_1" => "KG",
                 "nationality_en" => "Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz"
            ],
            [
                 "name_kh" => "ឡាវ",
                 "name_en" => "Laos",
                 "iso_3166_1" => "LA",
                 "nationality_en" => "Lao, Laotian"
            ],
            [
                 "name_kh" => "ឡាតវីយ៉ា",
                 "name_en" => "Latvia",
                 "iso_3166_1" => "LV",
                 "nationality_en" => "Latvian"
            ],
            [
                 "name_kh" => "លីបង់",
                 "name_en" => "Lebanon",
                 "iso_3166_1" => "LB",
                 "nationality_en" => "Lebanese"
            ],
            [
                 "name_kh" => "ឡេសូតូ",
                 "name_en" => "Lesotho",
                 "iso_3166_1" => "LS",
                 "nationality_en" => "Basotho"
            ],
            [
                 "name_kh" => "លីបេរីយ៉ា",
                 "name_en" => "Liberia",
                 "iso_3166_1" => "LR",
                 "nationality_en" => "Liberian"
            ],
            [
                 "name_kh" => "លីប៊ី",
                 "name_en" => "Libya",
                 "iso_3166_1" => "LY",
                 "nationality_en" => "Libyan"
            ],
            [
                 "name_kh" => "លិចទេនស្តែន",
                 "name_en" => "Liechtenstein",
                 "iso_3166_1" => "LI",
                 "nationality_en" => "Liechtenstein"
            ],
            [
                 "name_kh" => "លីទុយអានី",
                 "name_en" => "Lithuania",
                 "iso_3166_1" => "LT",
                 "nationality_en" => "Lithuanian"
            ],
            [
                 "name_kh" => "លុចហ្សំបួរ",
                 "name_en" => "Luxembourg",
                 "iso_3166_1" => "LU",
                 "nationality_en" => "Luxembourg, Luxembourgish"
            ],
            [
                 "name_kh" => "ម៉ាកាវ",
                 "name_en" => "Macau SAR China",
                 "iso_3166_1" => "MO",
                 "nationality_en" => "Macanese, Chinese"
            ],
            [
                 "name_kh" => "ម៉ាសេដូនា",
                 "name_en" => "Macedonia",
                 "iso_3166_1" => "MK",
                 "nationality_en" => "Macedonian"
            ],
            [
                 "name_kh" => "ម៉ាដាហ្គាស្កា",
                 "name_en" => "Madagascar",
                 "iso_3166_1" => "MG",
                 "nationality_en" => "Malagasy"
            ],
            [
                 "name_kh" => "ម៉ាឡាវី",
                 "name_en" => "Malawi",
                 "iso_3166_1" => "MW",
                 "nationality_en" => "Malawian"
            ],
            [
                 "name_kh" => "ម៉ាឡេស៊ី",
                 "name_en" => "Malaysia",
                 "iso_3166_1" => "MY",
                 "nationality_en" => "Malaysian"
            ],
            [
                 "name_kh" => "ម៉ាល់ឌីវ",
                 "name_en" => "Maldives",
                 "iso_3166_1" => "MV",
                 "nationality_en" => "Maldivian"
            ],
            [
                 "name_kh" => "ម៉ាលី",
                 "name_en" => "Mali",
                 "iso_3166_1" => "ML",
                 "nationality_en" => "Malian, Malinese"
            ],
            [
                 "name_kh" => "ម៉ាល់តា",
                 "name_en" => "Malta",
                 "iso_3166_1" => "MT",
                 "nationality_en" => "Maltese"
            ],
            [
                 "name_kh" => "កោះ​ម៉ាស់សល",
                 "name_en" => "Marshall Islands",
                 "iso_3166_1" => "MH",
                 "nationality_en" => "Marshallese"
            ],
            [
                 "name_kh" => "ម៉ាទីនីក",
                 "name_en" => "Martinique",
                 "iso_3166_1" => "MQ",
                 "nationality_en" => "Martiniquais, Martinican"
            ],
            [
                 "name_kh" => "ម៉ូរីតានី",
                 "name_en" => "Mauritania",
                 "iso_3166_1" => "MR",
                 "nationality_en" => "Mauritanian"
            ],
            [
                 "name_kh" => "ម៉ូរីស",
                 "name_en" => "Mauritius",
                 "iso_3166_1" => "MU",
                 "nationality_en" => "Mauritian"
            ],
            [
                 "name_kh" => "ម៉ាយុត",
                 "name_en" => "Mayotte",
                 "iso_3166_1" => "YT",
                 "nationality_en" => "Mahoran"
            ],
            [
                 "name_kh" => "ម៉ិកស៊ិក",
                 "name_en" => "Mexico",
                 "iso_3166_1" => "MX",
                 "nationality_en" => "Mexican"
            ],
            [
                 "name_kh" => "មីក្រូណេស៊ី",
                 "name_en" => "Micronesia",
                 "iso_3166_1" => "FM",
                 "nationality_en" => "Micronesian"
            ],
            [
                 "name_kh" => "ម៉ុលដាវី",
                 "name_en" => "Moldova",
                 "iso_3166_1" => "MD",
                 "nationality_en" => "Moldovan"
            ],
            [
                 "name_kh" => "ម៉ូណាកូ",
                 "name_en" => "Monaco",
                 "iso_3166_1" => "MC",
                 "nationality_en" => "Monégasque, Monacan"
            ],
            [
                 "name_kh" => "ម៉ុងហ្គោលី",
                 "name_en" => "Mongolia",
                 "iso_3166_1" => "MN",
                 "nationality_en" => "Mongolian"
            ],
            [
                 "name_kh" => "ម៉ុងតេណេហ្គ្រោ",
                 "name_en" => "Montenegro",
                 "iso_3166_1" => "ME",
                 "nationality_en" => "Montenegrin"
            ],
            [
                 "name_kh" => "ម៉ុង​សេរ៉ង់",
                 "name_en" => "Montserrat",
                 "iso_3166_1" => "MS",
                 "nationality_en" => "Montserratian"
            ],
            [
                 "name_kh" => "ម៉ារ៉ុក",
                 "name_en" => "Morocco",
                 "iso_3166_1" => "MA",
                 "nationality_en" => "Moroccan"
            ],
            [
                 "name_kh" => "ម៉ូហ្សាំប៊ិក",
                 "name_en" => "Mozambique",
                 "iso_3166_1" => "MZ",
                 "nationality_en" => "Mozambican"
            ],
            [
                 "name_kh" => "មីយ៉ាន់ម៉ា (ភូមា)",
                 "name_en" => "Myanmar (Burma)",
                 "iso_3166_1" => "MM",
                 "nationality_en" => "Burmese"
            ],
            [
                 "name_kh" => "ណាមីប៊ី",
                 "name_en" => "Namibia",
                 "iso_3166_1" => "NA",
                 "nationality_en" => "Namibian"
            ],
            [
                 "name_kh" => "ណូរូ",
                 "name_en" => "Nauru",
                 "iso_3166_1" => "NR",
                 "nationality_en" => "Nauruan"
            ],
            [
                 "name_kh" => "នេប៉ាល់",
                 "name_en" => "Nepal",
                 "iso_3166_1" => "NP",
                 "nationality_en" => "Nepali, Nepalese"
            ],
            [
                 "name_kh" => "ហូឡង់",
                 "name_en" => "Netherlands",
                 "iso_3166_1" => "NL",
                 "nationality_en" => "Dutch, Netherlandic"
            ],
            [
                 "name_kh" => "ញូកាឡេដូនៀ",
                 "name_en" => "New Caledonia",
                 "iso_3166_1" => "NC",
                 "nationality_en" => "New Caledonian"
            ],
            [
                 "name_kh" => "នូវែលហ្សេឡង់",
                 "name_en" => "New Zealand",
                 "iso_3166_1" => "NZ",
                 "nationality_en" => "New Zealand, NZ"
            ],
            [
                 "name_kh" => "នីការ៉ាហ្គ័រ",
                 "name_en" => "Nicaragua",
                 "iso_3166_1" => "NI",
                 "nationality_en" => "Nicaraguan"
            ],
            [
                 "name_kh" => "នីហ្សេរ",
                 "name_en" => "Niger",
                 "iso_3166_1" => "NE",
                 "nationality_en" => "Nigerien"
            ],
            [
                 "name_kh" => "នីហ្សេរីយ៉ា",
                 "name_en" => "Nigeria",
                 "iso_3166_1" => "NG",
                 "nationality_en" => "Nigerian"
            ],
            [
                 "name_kh" => "ណៀ",
                 "name_en" => "Niue",
                 "iso_3166_1" => "NU",
                 "nationality_en" => "Niuean"
            ],
            [
                 "name_kh" => "កោះ​ណ័រហ្វក់",
                 "name_en" => "Norfolk Island",
                 "iso_3166_1" => "NF",
                 "nationality_en" => "Norfolk Island"
            ],
            [
                 "name_kh" => "កូរ៉េ​ខាង​ជើង",
                 "name_en" => "North Korea",
                 "iso_3166_1" => "KP",
                 "nationality_en" => "North Korean"
            ],
            [
                 "name_kh" => "កោះ​ម៉ារីណា​ខាង​ជើង",
                 "name_en" => "Northern Mariana Islands",
                 "iso_3166_1" => "MP",
                 "nationality_en" => "Northern Marianan"
            ],
            [
                 "name_kh" => "ន័រវែស",
                 "name_en" => "Norway",
                 "iso_3166_1" => "NO",
                 "nationality_en" => "Norwegian"
            ],
            [
                 "name_kh" => "អូម៉ង់",
                 "name_en" => "Oman",
                 "iso_3166_1" => "OM",
                 "nationality_en" => "Omani"
            ],
            [
                 "name_kh" => "ប៉ាគីស្ថាន",
                 "name_en" => "Pakistan",
                 "iso_3166_1" => "PK",
                 "nationality_en" => "Pakistani"
            ],
            [
                 "name_kh" => "ផៅឡូ",
                 "name_en" => "Palau",
                 "iso_3166_1" => "PW",
                 "nationality_en" => "Palauan"
            ],
            [
                 "name_kh" => "ដែន​ប៉ាលេស្ទីន",
                 "name_en" => "Palestinian Territories",
                 "iso_3166_1" => "PS",
                 "nationality_en" => "Palestinian"
            ],
            [
                 "name_kh" => "ប៉ាណាម៉ា",
                 "name_en" => "Panama",
                 "iso_3166_1" => "PA",
                 "nationality_en" => "Panamanian"
            ],
            [
                 "name_kh" => "ប៉ាពួញ៉ូហ្គីណេ",
                 "name_en" => "Papua New Guinea",
                 "iso_3166_1" => "PG",
                 "nationality_en" => "Papua New Guinean, Papuan"
            ],
            [
                 "name_kh" => "ប៉ារ៉ាហ្គាយ",
                 "name_en" => "Paraguay",
                 "iso_3166_1" => "PY",
                 "nationality_en" => "Paraguayan"
            ],
            [
                 "name_kh" => "ប៉េរូ",
                 "name_en" => "Peru",
                 "iso_3166_1" => "PE",
                 "nationality_en" => "Peruvian"
            ],
            [
                 "name_kh" => "ហ្វីលីពីន",
                 "name_en" => "Philippines",
                 "iso_3166_1" => "PH",
                 "nationality_en" => "Philippine, Filipino"
            ],
            [
                 "name_kh" => "កោះ​ភីតកាន",
                 "name_en" => "Pitcairn Islands",
                 "iso_3166_1" => "PN",
                "nationality_en" => ""
            ],
            [
                 "name_kh" => "ប៉ូឡូញ",
                 "name_en" => "Poland",
                 "iso_3166_1" => "PL",
                 "nationality_en" => "Polish"
            ],
            [
                 "name_kh" => "ព័រទុយហ្គាល់",
                 "name_en" => "Portugal",
                 "iso_3166_1" => "PT",
                 "nationality_en" => "Portuguese"
            ],
            [
                 "name_kh" => "ព័រតូរីកូ",
                 "name_en" => "Puerto Rico",
                 "iso_3166_1" => "PR",
                 "nationality_en" => "Puerto Rican"
            ],
            [
                 "name_kh" => "កាតា",
                 "name_en" => "Qatar",
                 "iso_3166_1" => "QA",
                 "nationality_en" => "Qatari"
            ],
            [
                 "name_kh" => "រេអុយញ៉ុង",
                 "name_en" => "Réunion",
                 "iso_3166_1" => "RE",
                 "nationality_en" => "Réunionese, Réunionnais"
            ],
            [
                 "name_kh" => "រូម៉ានី",
                 "name_en" => "Romania",
                 "iso_3166_1" => "RO",
                 "nationality_en" => "Romanian"
            ],
            [
                 "name_kh" => "រុស្ស៊ី",
                 "name_en" => "Russia",
                 "iso_3166_1" => "RU",
                 "nationality_en" => "Russian"
            ],
            [
                 "name_kh" => "រវ៉ាន់ដា",
                 "name_en" => "Rwanda",
                 "iso_3166_1" => "RW",
                 "nationality_en" => "Rwandan"
            ],
            [
                 "name_kh" => "សាម័រ",
                 "name_en" => "Samoa",
                 "iso_3166_1" => "WS",
                 "nationality_en" => "Samoan"
            ],
            [
                 "name_kh" => "សាន​ម៉ារីណូ",
                 "name_en" => "San Marino",
                 "iso_3166_1" => "SM",
                 "nationality_en" => "Sammarinese"
            ],
            [
                 "name_kh" => "សៅតូម៉េ និង ប្រាំងស៊ីប",
                 "name_en" => "São Tomé & Príncipe",
                 "iso_3166_1" => "ST",
                 "nationality_en" => "São Toméan"
            ],
            [
                 "name_kh" => "អារ៉ាប៊ីសាអូឌីត",
                 "name_en" => "Saudi Arabia",
                 "iso_3166_1" => "SA",
                 "nationality_en" => "Saudi, Saudi Arabian"
            ],
            [
                 "name_kh" => "សេណេហ្គាល់",
                 "name_en" => "Senegal",
                 "iso_3166_1" => "SN",
                 "nationality_en" => "Senegalese"
            ],
            [
                 "name_kh" => "ស៊ែប",
                 "name_en" => "Serbia",
                 "iso_3166_1" => "RS",
                 "nationality_en" => "Serbian"
            ],
            [
                 "name_kh" => "សីសែល",
                 "name_en" => "Seychelles",
                 "iso_3166_1" => "SC",
                 "nationality_en" => "Seychellois"
            ],
            [
                 "name_kh" => "សេរ៉ាឡេអូន",
                 "name_en" => "Sierra Leone",
                 "iso_3166_1" => "SL",
                 "nationality_en" => "Sierra Leonean"
            ],
            [
                 "name_kh" => "សិង្ហបុរី",
                 "name_en" => "Singapore",
                 "iso_3166_1" => "SG",
                 "nationality_en" => "Singaporean"
            ],
            [
                 "name_kh" => "សីង​ម៉ាធីន",
                 "name_en" => "Sint Maarten",
                 "iso_3166_1" => "SX",
                 "nationality_en" => "Sint Maarten"
            ],
            [
                 "name_kh" => "ស្លូវ៉ាគី",
                 "name_en" => "Slovakia",
                 "iso_3166_1" => "SK",
                 "nationality_en" => "Slovak"
            ],
            [
                 "name_kh" => "ស្លូវេនី",
                 "name_en" => "Slovenia",
                 "iso_3166_1" => "SI",
                 "nationality_en" => "Slovenian, Slovene"
            ],
            [
                 "name_kh" => "កោះ​សូឡូម៉ុង",
                 "name_en" => "Solomon Islands",
                 "iso_3166_1" => "SB",
                 "nationality_en" => "Solomon Island"
            ],
            [
                 "name_kh" => "សូម៉ាលី",
                 "name_en" => "Somalia",
                 "iso_3166_1" => "SO",
                 "nationality_en" => "Somali, Somalian"
            ],
            [
                 "name_kh" => "អាហ្វ្រិកខាងត្បូង",
                 "name_en" => "South Africa",
                 "iso_3166_1" => "ZA",
                 "nationality_en" => "South African"
            ],
            [
                 "name_kh" => "កោះ​ហ្សកហ្ស៊ី​ខាង​ត្បូង និង សាន់វិច​ខាង​ត្បូង",
                 "name_en" => "South Georgia & South Sandwich Islands",
                 "iso_3166_1" => "GS",
                 "nationality_en" => "South Georgia or South Sandwich Islands"
            ],
            [
                 "name_kh" => "កូរ៉េ​ខាង​ត្បូង",
                 "name_en" => "South Korea",
                 "iso_3166_1" => "KR",
                 "nationality_en" => "South Korean"
            ],
            [
                 "name_kh" => "ស៊ូដង់​ខាង​ត្បូង",
                 "name_en" => "South Sudan",
                 "iso_3166_1" => "SS",
                 "nationality_en" => "South Sudanese"
            ],
            [
                 "name_kh" => "អេស្ប៉ាញ",
                 "name_en" => "Spain",
                 "iso_3166_1" => "ES",
                 "nationality_en" => "Spanish"
            ],
            [
                 "name_kh" => "ស្រីលង្កា",
                 "name_en" => "Sri Lanka",
                 "iso_3166_1" => "LK",
                 "nationality_en" => "Sri Lankan"
            ],
            [
                 "name_kh" => "សង់ បាតេឡេម៉ី",
                 "name_en" => "St. Barthélemy",
                 "iso_3166_1" => "BL",
                 "nationality_en" => "Barthélemois"
            ],
            [
                 "name_kh" => "សង់​ហេឡេណា",
                 "name_en" => "St. Helena",
                 "iso_3166_1" => "SH",
                 "nationality_en" => "Saint Helenian"
            ],
            [
                 "name_kh" => "សង់ឃីត និង​ណេវីស",
                 "name_en" => "St. Kitts & Nevis",
                 "iso_3166_1" => "KN",
                 "nationality_en" => "Kittitian or Nevisian"
            ],
            [
                 "name_kh" => "សង់​លូសៀ",
                 "name_en" => "St. Lucia",
                 "iso_3166_1" => "LC",
                 "nationality_en" => "Saint Lucian"
            ],
            [
                 "name_kh" => "សង់​ម៉ាទីន",
                 "name_en" => "St. Martin",
                 "iso_3166_1" => "MF",
                 "nationality_en" => "Saint-Martinoise"
            ],
            [
                 "name_kh" => "សង់ព្យែរ និង​មីគីឡុង",
                 "name_en" => "St. Pierre & Miquelon",
                 "iso_3166_1" => "PM",
                 "nationality_en" => "Saint-Pierrais or Miquelonnais"
            ],
            [
                 "name_kh" => "សាំង​វីនសេន និង​ឌឹ​ហ្គ្រីណាឌីនីស",
                 "name_en" => "St. Vincent & Grenadines",
                 "iso_3166_1" => "VC",
                 "nationality_en" => "Saint Vincentian, Vincentian"
            ],
            [
                 "name_kh" => "ស៊ូដង់",
                 "name_en" => "Sudan",
                 "iso_3166_1" => "SD",
                 "nationality_en" => "Sudanese"
            ],
            [
                 "name_kh" => "សូរីណាម",
                 "name_en" => "Suriname",
                 "iso_3166_1" => "SR",
                 "nationality_en" => "Surinamese"
            ],
            [
                 "name_kh" => "ស្វាលបាដ និង ហ្សង់ម៉ាយេន",
                 "name_en" => "Svalbard & Jan Mayen",
                 "iso_3166_1" => "SJ",
                 "nationality_en" => "Svalbard"
            ],
            [
                 "name_kh" => "ស្វាហ្ស៊ីឡង់",
                 "name_en" => "Swaziland",
                 "iso_3166_1" => "SZ",
                 "nationality_en" => "Swazi"
            ],
            [
                 "name_kh" => "ស៊ុយអែត",
                 "name_en" => "Sweden",
                 "iso_3166_1" => "SE",
                 "nationality_en" => "Swedish"
            ],
            [
                 "name_kh" => "ស្វីស",
                 "name_en" => "Switzerland",
                 "iso_3166_1" => "CH",
                 "nationality_en" => "Swiss"
            ],
            [
                 "name_kh" => "ស៊ីរី",
                 "name_en" => "Syria",
                 "iso_3166_1" => "SY",
                 "nationality_en" => "Syrian"
            ],
            [
                 "name_kh" => "តៃវ៉ាន់",
                 "name_en" => "Taiwan",
                 "iso_3166_1" => "TW",
                 "nationality_en" => "Chinese, Taiwanese"
            ],
            [
                 "name_kh" => "តាហ្ស៊ីគីស្ថាន",
                 "name_en" => "Tajikistan",
                 "iso_3166_1" => "TJ",
                 "nationality_en" => "Tajikistani"
            ],
            [
                 "name_kh" => "តង់ហ្សានី",
                 "name_en" => "Tanzania",
                 "iso_3166_1" => "TZ",
                 "nationality_en" => "Tanzanian"
            ],
            [
                 "name_kh" => "ថៃ",
                 "name_en" => "Thailand",
                 "iso_3166_1" => "TH",
                 "nationality_en" => "Thai"
            ],
            [
                 "name_kh" => "ទីម័រ",
                 "name_en" => "Timor-Leste",
                 "iso_3166_1" => "TL",
                 "nationality_en" => "Timorese"
            ],
            [
                 "name_kh" => "តូហ្គោ",
                 "name_en" => "Togo",
                 "iso_3166_1" => "TG",
                 "nationality_en" => "Togolese"
            ],
            [
                 "name_kh" => "តូខេឡៅ",
                 "name_en" => "Tokelau",
                 "iso_3166_1" => "TK",
                 "nationality_en" => "Tokelauan"
            ],
            [
                 "name_kh" => "តុងហ្គា",
                 "name_en" => "Tonga",
                 "iso_3166_1" => "TO",
                 "nationality_en" => "Tongan"
            ],
            [
                 "name_kh" => "ទ្រីនីដាត និង​តូបាហ្គោ",
                 "name_en" => "Trinidad & Tobago",
                 "iso_3166_1" => "TT",
                 "nationality_en" => "Trinidadian or Tobagonian"
            ],
            [
                 "name_kh" => "ទ្រីស្តង់​ដា​ចូនហា",
                 "name_en" => "Tristan da Cunha",
                 "iso_3166_1" => "TA",
                "nationality_en" => ""
            ],
            [
                 "name_kh" => "ទុយនេស៊ី",
                 "name_en" => "Tunisia",
                 "iso_3166_1" => "TN",
                 "nationality_en" => "Tunisian"
            ],
            [
                 "name_kh" => "ទួរគី",
                 "name_en" => "Turkey",
                 "iso_3166_1" => "TR",
                 "nationality_en" => "Turkish"
            ],
            [
                 "name_kh" => "តួកម៉េនីស្ថាន",
                 "name_en" => "Turkmenistan",
                 "iso_3166_1" => "TM",
                 "nationality_en" => "Turkmen"
            ],
            [
                 "name_kh" => "កោះ​ទួគ និង កៃកូស",
                 "name_en" => "Turks & Caicos Islands",
                 "iso_3166_1" => "TC",
                 "nationality_en" => "Turks and Caicos Island"
            ],
            [
                 "name_kh" => "ទូវ៉ាលូ",
                 "name_en" => "Tuvalu",
                 "iso_3166_1" => "TV",
                 "nationality_en" => "Tuvaluan"
            ],
            [
                 "name_kh" => "កោះ​អៅឡាយីង​អាមេរិក",
                 "name_en" => "U.S. Outlying Islands",
                 "iso_3166_1" => "UM",
                "nationality_en" => ""
            ],
            [
                 "name_kh" => "កោះ​វឺជីន​អាមេរិក",
                 "name_en" => "U.S. Virgin Islands",
                 "iso_3166_1" => "VI",
                 "nationality_en" => "U.S. Virgin Island"
            ],
            [
                 "name_kh" => "អ៊ូហ្គង់ដា",
                 "name_en" => "Uganda",
                 "iso_3166_1" => "UG",
                 "nationality_en" => "Ugandan"
            ],
            [
                 "name_kh" => "អ៊ុយក្រែន",
                 "name_en" => "Ukraine",
                 "iso_3166_1" => "UA",
                 "nationality_en" => "Ukrainian"
            ],
            [
                 "name_kh" => "អារ៉ាប់រួម",
                 "name_en" => "United Arab Emirates",
                 "iso_3166_1" => "AE",
                 "nationality_en" => "Emirati, Emirian, Emiri"
            ],
            [
                 "name_kh" => "ចក្រភព​អង់គ្លេស",
                 "name_en" => "United Kingdom",
                 "iso_3166_1" => "GB",
                 "nationality_en" => "British, UK"
            ],
            [
                 "name_kh" => "អង្គការសហប្រជាជាតិ",
                 "name_en" => "United Nations",
                 "iso_3166_1" => "UN",
                "nationality_en" => ""
            ],
            [
                 "name_kh" => "សហរដ្ឋអាមេរិក",
                 "name_en" => "United States",
                 "iso_3166_1" => "US",
                 "nationality_en" => "American"
            ],
            [
                 "name_kh" => "អ៊ុយរ៉ាហ្គាយ",
                 "name_en" => "Uruguay",
                 "iso_3166_1" => "UY",
                 "nationality_en" => "Uruguayan"
            ],
            [
                 "name_kh" => "អ៊ូសបេគីស្ថាន",
                 "name_en" => "Uzbekistan",
                 "iso_3166_1" => "UZ",
                 "nationality_en" => "Uzbekistani, Uzbek"
            ],
            [
                 "name_kh" => "វ៉ានូអាទូ",
                 "name_en" => "Vanuatu",
                 "iso_3166_1" => "VU",
                 "nationality_en" => "Ni-Vanuatu, Vanuatuan"
            ],
            [
                 "name_kh" => "បុរី​វ៉ាទីកង់",
                 "name_en" => "Vatican City",
                 "iso_3166_1" => "VA",
                "nationality_en" => ""
            ],
            [
                 "name_kh" => "វេនេហ្ស៊ុយឡា",
                 "name_en" => "Venezuela",
                 "iso_3166_1" => "VE",
                 "nationality_en" => "Venezuelan"
            ],
            [
                 "name_kh" => "វៀតណាម",
                 "name_en" => "Vietnam",
                 "iso_3166_1" => "VN",
                 "nationality_en" => "Vietnamese"
            ],
            [
                 "name_kh" => "វ៉ាលីស និង​ហ្វូទូណា",
                 "name_en" => "Wallis & Futuna",
                 "iso_3166_1" => "WF",
                 "nationality_en" => "Wallis and Futuna, Wallisian or Futunan"
            ],
            [
                 "name_kh" => "សាហារ៉ាខាងលិច",
                 "name_en" => "Western Sahara",
                 "iso_3166_1" => "EH",
                 "nationality_en" => "Sahrawi, Sahrawian, Sahraouian"
            ],
            [
                 "name_kh" => "យេមែន",
                 "name_en" => "Yemen",
                 "iso_3166_1" => "YE",
                 "nationality_en" => "Yemeni"
            ],
            [
                 "name_kh" => "ហ្សាំប៊ី",
                 "name_en" => "Zambia",
                 "iso_3166_1" => "ZM",
                 "nationality_en" => "Zambian"
            ],
            [
                 "name_kh" => "ហ្ស៊ីមបាវ៉េ",
                 "name_en" => "Zimbabwe",
                 "iso_3166_1" => "ZW",
                 "nationality_en" => "Zimbabwean"
            ]
        ];
        DB::table('countries')->insert($data);
    }
}
