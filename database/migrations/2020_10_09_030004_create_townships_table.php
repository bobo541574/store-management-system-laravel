<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('townships', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('city_id');
            $table->string('name');
        });

        // DB::table('townships')->insert([

        //     //Ayeyarwady Division => Townships in cities
        //     ['city_id' => '1', 'name' => 'Bogale'],
        //     ['city_id' => '2', 'name' => 'Danubyu'],
        //     ['city_id' => '3', 'name' => 'Dedaye'],
        //     ['city_id' => '4', 'name' => 'Einme'],
        //     ['city_id' => '5', 'name' => 'Hinthada'],
        //     ['city_id' => '6', 'name' => 'Ingapu'],
        //     ['city_id' => '7', 'name' => 'Kangyidaunt'],
        //     ['city_id' => '8', 'name' => 'Kyaiklat'],
        //     ['city_id' => '9', 'name' => 'Kyangin'],
        //     ['city_id' => '10', 'name' => 'Kyaunggon'],
        //     ['city_id' => '11', 'name' => 'Kyonpyaw'],
        //     ['city_id' => '12', 'name' => 'Labutta'],
        //     ['city_id' => '13', 'name' => 'Lemyethna'],
        //     ['city_id' => '14', 'name' => 'Maubin'],
        //     ['city_id' => '15', 'name' => 'Mawlamyinegyun'],
        //     ['city_id' => '16', 'name' => 'Myanaung'],
        //     ['city_id' => '17', 'name' => 'Myaungmya'],
        //     ['city_id' => '18', 'name' => 'Ngapudaw'],
        //     ['city_id' => '19', 'name' => 'Nyaungdon'],
        //     ['city_id' => '20', 'name' => 'Pantanaw'],
        //     ['city_id' => '21', 'name' => 'Pathein'],
        //     ['city_id' => '22', 'name' => 'Pyapon'],
        //     ['city_id' => '23', 'name' => 'Thabaung'],
        //     ['city_id' => '24', 'name' => 'Wakema'],
        //     ['city_id' => '25', 'name' => 'Yegyi'],
        //     ['city_id' => '26', 'name' => 'Zalun'],

        //     // Bago East Division
        //     ['city_id' => '27', 'name' => 'Bago'],
        //     ['city_id' => '27', 'name' => 'Bo Kone Ward'],
        //     ['city_id' => '27', 'name' => 'Han Thar Wa Di Ward'],
        //     ['city_id' => '27', 'name' => 'Hin Thar Kone Wark'],
        //     ['city_id' => '27', 'name' => 'Kyauk Gyi Su Wark'],
        //     ['city_id' => '27', 'name' => 'Leik Pyar Kan Ward'],
        //     ['city_id' => '27', 'name' => 'Ma Zin Ward'],
        //     ['city_id' => '27', 'name' => 'Myo Thit Ward'],
        //     ['city_id' => '27', 'name' => 'Myo Twin Ward'],
        //     ['city_id' => '27', 'name' => 'Nyaung Waing Ward'],
        //     ['city_id' => '27', 'name' => 'Pan Hlaing Ward'],
        //     ['city_id' => '27', 'name' => 'Pon Nar Su Ward'],
        //     ['city_id' => '27', 'name' => 'Thu Hpa Yar Kone Ward'],
        //     ['city_id' => '27', 'name' => 'Ywar Thit Ward'],
        //     ['city_id' => '27', 'name' => 'Zay Paing Ward'],
        //     ['city_id' => '27', 'name' => 'Zyaing Ga Naing Ward'],

        //     ['city_id' => '28', 'name' => 'Daik-U'],
        //     ['city_id' => '29', 'name' => 'Kawa'],
        //     ['city_id' => '30', 'name' => 'Kyaukkyi'],
        //     ['city_id' => '31', 'name' => 'Kyauktaga'],
        //     ['city_id' => '32', 'name' => 'Nyaunglebin'],
        //     ['city_id' => '33', 'name' => 'Oktwin'],
        //     ['city_id' => '34', 'name' => 'Phyu'],
        //     ['city_id' => '35', 'name' => 'Shwegyin'],
        //     ['city_id' => '36', 'name' => 'Tantabin'],
        //     ['city_id' => '37', 'name' => 'Taungoo'],
        //     ['city_id' => '38', 'name' => 'Thanatpin'],
        //     ['city_id' => '39', 'name' => 'Waw'],
        //     ['city_id' => '40', 'name' => 'Yedashe'],
        //     ['city_id' => '41', 'name' => 'Gyobingauk'],
        //     ['city_id' => '42', 'name' => 'Letpadan'],
        //     ['city_id' => '43', 'name' => 'Minhla'],
        //     ['city_id' => '44', 'name' => 'Monyo'],
        //     ['city_id' => '45', 'name' => 'Nattalin'],
        //     ['city_id' => '46', 'name' => 'Okpho'],
        //     ['city_id' => '47', 'name' => 'Padaung'],
        //     ['city_id' => '48', 'name' => 'Pauk Kaung'],
        //     ['city_id' => '49', 'name' => 'Paungde'],
        //     ['city_id' => '50', 'name' => 'Pyay'],
        //     ['city_id' => '51', 'name' => 'Shwedaung'],
        //     ['city_id' => '52', 'name' => 'Thayarwady'],
        //     ['city_id' => '53', 'name' => 'Thegon'],
        //     ['city_id' => '54', 'name' => 'Zigon'],

        //     // Chin State
        //     ['city_id' => '55', 'name' => 'Falam'],
        //     ['city_id' => '56', 'name' => 'Hakha'],
        //     ['city_id' => '57', 'name' => 'Htantlang'],
        //     ['city_id' => '58', 'name' => 'Kanpetlet'],
        //     ['city_id' => '59', 'name' => 'Madupi'],
        //     ['city_id' => '60', 'name' => 'Mindat'],
        //     ['city_id' => '61', 'name' => 'Paletwa'],
        //     ['city_id' => '62', 'name' => 'Tiddim'],
        //     ['city_id' => '63', 'name' => 'Tonzang'],

        //     // Kachin State
        //     ['city_id' => '64', 'name' => 'Bhamo'],
        //     ['city_id' => '65', 'name' => 'Chipwi'],
        //     ['city_id' => '66', 'name' => 'Hpakan'],
        //     ['city_id' => '67', 'name' => 'Injangyang'],
        //     ['city_id' => '68', 'name' => 'Kawnglanghpu'],
        //     ['city_id' => '69', 'name' => 'Machanbaw'],
        //     ['city_id' => '70', 'name' => 'Mansi'],
        //     ['city_id' => '71', 'name' => 'Mogaung'],
        //     ['city_id' => '72', 'name' => 'Mohnyin'],
        //     ['city_id' => '73', 'name' => 'Momauk'],
        //     ['city_id' => '74', 'name' => 'Myitkyina'],
        //     ['city_id' => '75', 'name' => 'Nogmung'],
        //     ['city_id' => '76', 'name' => 'Puta-O'],
        //     ['city_id' => '77', 'name' => 'Shwegu'],
        //     ['city_id' => '78', 'name' => 'Sumprabum'],
        //     ['city_id' => '79', 'name' => 'Tanai'],
        //     ['city_id' => '80', 'name' => 'Tsawlaw'],
        //     ['city_id' => '81', 'name' => 'Waingmaw'],

        //     // Kayah State
        //     ['city_id' => '82', 'name' => 'Bawlakhe'],
        //     ['city_id' => '83', 'name' => 'Demoso'],
        //     ['city_id' => '84', 'name' => 'Hpasawng'],
        //     ['city_id' => '85', 'name' => 'Hpruso'],
        //     ['city_id' => '86', 'name' => 'Loikaw'],
        //     ['city_id' => '87', 'name' => 'Mese'],
        //     ['city_id' => '88', 'name' => 'Shadaw'],

        //     // Kayin State
        //     ['city_id' => '89', 'name' => 'Hlaingbwe'],
        //     ['city_id' => '90', 'name' => 'Hpa-An'],
        //     ['city_id' => '91', 'name' => 'Hpapun'],
        //     ['city_id' => '92', 'name' => 'Kawkareik'],
        //     ['city_id' => '93', 'name' => 'Kyain Seikgyi'],
        //     ['city_id' => '94', 'name' => 'Myawaddy'],
        //     ['city_id' => '95', 'name' => 'Thandaung'],

        //     // Magway Division
        //     ['city_id' => '96', 'name' => 'Aunglan'],
        //     ['city_id' => '97', 'name' => 'Chauk'],
        //     ['city_id' => '98', 'name' => 'Gangaw'],
        //     ['city_id' => '99', 'name' => 'Kamma'],
        //     ['city_id' => '100', 'name' => 'Magway'],
        //     ['city_id' => '101', 'name' => 'Minbu'],
        //     ['city_id' => '102', 'name' => 'Mindon'],
        //     ['city_id' => '103', 'name' => 'Minhla'],
        //     ['city_id' => '104', 'name' => 'Myaing'],
        //     ['city_id' => '105', 'name' => 'Myothit'],
        //     ['city_id' => '106', 'name' => 'Natmauk'],
        //     ['city_id' => '107', 'name' => 'Ngape'],
        //     ['city_id' => '108', 'name' => 'Pakokku'],
        //     ['city_id' => '109', 'name' => 'Pauk'],
        //     ['city_id' => '110', 'name' => 'Pwintbyu'],
        //     ['city_id' => '111', 'name' => 'Salin'],
        //     ['city_id' => '112', 'name' => 'Saw'],
        //     ['city_id' => '113', 'name' => 'Seikphyu'],
        //     ['city_id' => '114', 'name' => 'Sidoktaya'],
        //     ['city_id' => '115', 'name' => 'Sinbaungwe'],
        //     ['city_id' => '116', 'name' => 'Taungdwingyi'],
        //     ['city_id' => '117', 'name' => 'Thayet'],
        //     ['city_id' => '118', 'name' => 'Tilin'],
        //     ['city_id' => '119', 'name' => 'Yenangyaung'],
        //     ['city_id' => '120', 'name' => 'Yesagyo'],

        //     // Mandalay Division
        //     ['city_id' => '121', 'name' => 'Amarapura'],

        //     ['city_id' => '122', 'name' => 'Ah Hneik Taw Ward'],
        //     ['city_id' => '122', 'name' => 'Ah Ma Ra Htar Ni Ward'],
        //     ['city_id' => '122', 'name' => 'Aung Myay Thar Zan Ward'],
        //     ['city_id' => '122', 'name' => 'Bone Taw Toe Ward'],
        //     ['city_id' => '122', 'name' => 'Daw Na Bwar Ward'],
        //     ['city_id' => '122', 'name' => 'Ma Har Zay Yar Bon Ward'],
        //     ['city_id' => '122', 'name' => 'May Ga Gi Ri Ward'],
        //     ['city_id' => '122', 'name' => 'Min Tei Ei Kin Ward'],
        //     ['city_id' => '122', 'name' => 'Nyaung Kwe Ward'],
        //     ['city_id' => '122', 'name' => 'Oe Bo Ward'],
        //     ['city_id' => '122', 'name' => 'Pale Ngwe Yaung Ward'],
        //     ['city_id' => '122', 'name' => 'Pyi Gyi Kyet Tha yay Ward'],
        //     ['city_id' => '122', 'name' => 'Pyi Gyi Yan Lon Ward'],
        //     ['city_id' => '122', 'name' => 'Pyi Lone Chan Thar Ward'],
        //     ['city_id' => '122', 'name' => 'Thi Ri Mar Lar Ward'],
        //     ['city_id' => '122', 'name' => 'U Poke Htaw Ward'],

        //     ['city_id' => '123', 'name' => 'Aung Nan Yeik Thar Ward'],
        //     ['city_id' => '123', 'name' => 'Chan Aye Tha Zan Ward'],
        //     ['city_id' => '123', 'name' => 'Day Wun (West) Ward'],
        //     ['city_id' => '123', 'name' => 'Hay Mar Za La Ward'],
        //     ['city_id' => '123', 'name' => 'Kan Kauk Ward'],
        //     ['city_id' => '123', 'name' => 'Kit Sa Na Ma Hi Ward'],
        //     ['city_id' => '123', 'name' => 'Maw Ra Gi War Ward'],
        //     ['city_id' => '123', 'name' => 'Pat Kone Pyaw Bwei Ward'],
        //     ['city_id' => '123', 'name' => 'Pat Kone Wun Kyin Ward'],
        //     ['city_id' => '123', 'name' => 'Pyi Gyi Myet Hman Ward'],
        //     ['city_id' => '123', 'name' => 'Pyi Gyi Myet Shin Ward'],
        //     ['city_id' => '123', 'name' => 'Pyi Gyi Pyawbwe Ward'],
        //     ['city_id' => '123', 'name' => 'Seik Ta Ra Ma Hi Ward'],
        //     ['city_id' => '123', 'name' => 'Thi Ri Hay Mar Ward'],
        //     ['city_id' => '123', 'name' => 'Yan Myo Lon Ward'],

        //     ['city_id' => '124', 'name' => 'Aung Pin Lel Ward'],
        //     ['city_id' => '124', 'name' => 'Aung Thar Yar Ward'],
        //     ['city_id' => '124', 'name' => 'Chan Mya Thar Zi (South) Ward'],
        //     ['city_id' => '124', 'name' => 'Htun Tone Ward'],
        //     ['city_id' => '124', 'name' => 'Kan Thar Yar Ward'],
        //     ['city_id' => '124', 'name' => 'Kyung Lone U Shaung Ward'],
        //     ['city_id' => '124', 'name' => 'Mya Yi Nan Dar Ward'],
        //     ['city_id' => '124', 'name' => 'Myo Thit Ward'],
        //     ['city_id' => '124', 'name' => 'Tan Pa Wa Di Ward'],
        //     ['city_id' => '124', 'name' => 'Than Hlet maw (South) Ward'],

        //     ['city_id' => '125', 'name' => 'Kyaukpadaung'],
        //     ['city_id' => '126', 'name' => 'Kyaukse'],
        //     ['city_id' => '127', 'name' => 'Lewe'],
        //     ['city_id' => '128', 'name' => 'Madaya'],

        //     ['city_id' => '129', 'name' => 'Chan Mya Thar Zi (North) Ward'],
        //     ['city_id' => '129', 'name' => 'Day Wun (East) Ward'],
        //     ['city_id' => '129', 'name' => 'Hay Ma Mar Lar Ward'],
        //     ['city_id' => '129', 'name' => 'Ma Har Aung Myay Ward'],
        //     ['city_id' => '129', 'name' => 'Ma Har Myaing Ward'],
        //     ['city_id' => '129', 'name' => 'Ma Har Nwe Sin Ward'],
        //     ['city_id' => '129', 'name' => 'Sein Pan Ward'],
        //     ['city_id' => '129', 'name' => 'Set Kyar New Sin Ward'],
        //     ['city_id' => '129', 'name' => 'Shwe Hpone Shein Ward'],
        //     ['city_id' => '129', 'name' => 'Tet Ka Tho Ward'],
        //     ['city_id' => '129', 'name' => 'Than Hlet Maw Ward'],
        //     ['city_id' => '129', 'name' => 'Ya Da Nar Bon Mi Ward'],
        //     ['city_id' => '129', 'name' => 'Ye Mun (South) Ward'],

        //     ['city_id' => '130', 'name' => 'Mahlaing'],

        //     ['city_id' => '131', 'name' => 'Amarapura'],
        //     ['city_id' => '131', 'name' => 'Aung Myay Thar Zan'],
        //     ['city_id' => '131', 'name' => 'Chan Naye Thar Zan'],
        //     ['city_id' => '131', 'name' => 'Chan Mya Thar Zi'],
        //     ['city_id' => '131', 'name' => 'Maha Aung Myay'],
        //     ['city_id' => '131', 'name' => 'Pyi Gyi Tagon'],

        //     ['city_id' => '132', 'name' => 'Ah Shey Pyin Ward'],
        //     ['city_id' => '132', 'name' => 'Aung San Ward'],
        //     ['city_id' => '132', 'name' => 'Aung Zay yar Ward'],
        //     ['city_id' => '132', 'name' => 'Chit Set Ward'],
        //     ['city_id' => '132', 'name' => 'Kyi Taw Kone Ward'],
        //     ['city_id' => '132', 'name' => 'Meiktila'],
        //     ['city_id' => '132', 'name' => 'Myo Ma Ward'],
        //     ['city_id' => '132', 'name' => 'Nan Taw Kone Ward'],
        //     ['city_id' => '132', 'name' => 'Pauk Chaung Ward'],
        //     ['city_id' => '132', 'name' => 'Pyi Thar Yar'],
        //     ['city_id' => '132', 'name' => 'Thi Ri Min Ga Lar Ward'],
        //     ['city_id' => '132', 'name' => 'Wun Zin Ward'],
        //     ['city_id' => '132', 'name' => 'Ya Da Nar Man Aung Ward'],
        //     ['city_id' => '132', 'name' => 'Yan Myo Aung Ward'],

        //     ['city_id' => '133', 'name' => 'Mogoke'],
        //     ['city_id' => '134', 'name' => 'Myingyan'],
        //     ['city_id' => '135', 'name' => 'Myittha'],
        //     ['city_id' => '136', 'name' => 'Natogyi'],
        //     ['city_id' => '137', 'name' => 'Ngazun'],

        //     ['city_id' => '138', 'name' => 'Bagan'],
        //     ['city_id' => '138', 'name' => 'Nyaung-U'],

        //     ['city_id' => '139', 'name' => 'Patheingyi'],
        //     ['city_id' => '140', 'name' => 'Pyawbwe'],

        //     ['city_id' => '141', 'name' => 'Ga Gyi - Za Myin Zwe Ward'],
        //     ['city_id' => '141', 'name' => 'Chan Mya Thar Yar Ward'],
        //     ['city_id' => '141', 'name' => 'Htein Kone Ward'],
        //     ['city_id' => '141', 'name' => 'Ngwe Taw Kyi Kone Ward'],
        //     ['city_id' => '141', 'name' => 'Ta Khun Tan Ward'],
        //     ['city_id' => '141', 'name' => 'Taung Myint Ward'],
        //     ['city_id' => '141', 'name' => 'Thin Pan Kone Ward'],
        //     ['city_id' => '141', 'name' => 'Yar Taw Ward'],

        //     ['city_id' => '142', 'name' => 'Pyinmana'],
        //     ['city_id' => '143', 'name' => 'Pyinoolwin'],
        //     ['city_id' => '144', 'name' => 'Singu'],
        //     ['city_id' => '145', 'name' => 'Sintgaing'],
        //     ['city_id' => '146', 'name' => 'Tada-U'],
        //     ['city_id' => '147', 'name' => 'Tatkon'],
        //     ['city_id' => '148', 'name' => 'Taungtha'],
        //     ['city_id' => '149', 'name' => 'Thabeikkyin'],
        //     ['city_id' => '150', 'name' => 'Thazi'],
        //     ['city_id' => '151', 'name' => 'Wundwin'],
        //     ['city_id' => '152', 'name' => 'Yamethin'],

        //     // Mon State
        //     ['city_id' => '153', 'name' => 'Bilin'],
        //     ['city_id' => '154', 'name' => 'Chaungzon'],
        //     ['city_id' => '155', 'name' => 'Kyaikmaraw'],
        //     ['city_id' => '156', 'name' => 'Kyaikto'],

        //     ['city_id' => '157', 'name' => 'Auk Kyin Ward'],
        //     ['city_id' => '157', 'name' => 'Bo Kone Ward'],
        //     ['city_id' => '157', 'name' => 'Chauk Maing Kywe Chan Kone Ward'],
        //     ['city_id' => '157', 'name' => 'Gway Kone Ward'],
        //     ['city_id' => '157', 'name' => 'Hlaing Shan Su Ward'],
        //     ['city_id' => '157', 'name' => 'Hpet Tan Ward'],
        //     ['city_id' => '157', 'name' => 'Kwin Yat Ward'],
        //     ['city_id' => '157', 'name' => 'Kyaik Hpa Nei Ward'],
        //     ['city_id' => '157', 'name' => 'Kyauk Tan Ward'],
        //     ['city_id' => '157', 'name' => 'Mandalay Ward'],
        //     ['city_id' => '157', 'name' => 'Mawlamyine'],
        //     ['city_id' => '157', 'name' => 'Ma Yan Kone Ward'],
        //     ['city_id' => '157', 'name' => 'Mu Pon Ward'],
        //     ['city_id' => '157', 'name' => 'Myaing Thar Yar Ward'],
        //     ['city_id' => '157', 'name' => 'Mya Ni Kone Ward'],
        //     ['city_id' => '157', 'name' => 'Naung Kha Ri Ward'],
        //     ['city_id' => '157', 'name' => 'Pan Be Dan Ward'],
        //     ['city_id' => '157', 'name' => 'Phar-Auk Village'],
        //     ['city_id' => '157', 'name' => 'Rakine Gone Ward'],
        //     ['city_id' => '157', 'name' => 'San Gyi Ward'],
        //     ['city_id' => '157', 'name' => 'Shwe (South) Ward'],
        //     ['city_id' => '157', 'name' => 'Shwe Myaing Thi Ri Ward'],
        //     ['city_id' => '157', 'name' => 'Sit Ke Kone Ward'],
        //     ['city_id' => '157', 'name' => 'Thar Yar Aye Ward'],
        //     ['city_id' => '157', 'name' => 'Thi Ti Min Ga Lar Ward'],
        //     ['city_id' => '157', 'name' => 'Thi Ri Myaing Ward'],
        //     ['city_id' => '157', 'name' => 'Zay Cho Ward'],
        //     ['city_id' => '157', 'name' => 'Zay Yar Myaing Ward'],
        //     ['city_id' => '157', 'name' => 'Zay Yar Thi Ri Ward'],

        //     ['city_id' => '158', 'name' => 'Mudon'],
        //     ['city_id' => '159', 'name' => 'Paung'],
        //     ['city_id' => '160', 'name' => 'Thanbyuzayat'],
        //     ['city_id' => '161', 'name' => 'Thaton'],
        //     ['city_id' => '162', 'name' => 'Ye'],

        //     // Naypitaw U.Territory Region
        //     ['city_id' => '163', 'name' => 'Dhatkhina Thiri Ward'],
        //     ['city_id' => '163', 'name' => 'Shwe In Kyinn Ward'],

        //     ['city_id' => '164', 'name' => 'Lae way'],
        //     ['city_id' => '165', 'name' => 'Ottara Thiri'],

        //     ['city_id' => '166', 'name' => 'Kyi Taung Kan Ward'],
        //     ['city_id' => '166', 'name' => 'Pobba Thiri Ward'],

        //     ['city_id' => '167', 'name' => 'Baw Ga Wa Di Ward'],
        //     ['city_id' => '167', 'name' => 'Min Ca lar Ward'],
        //     ['city_id' => '167', 'name' => 'Shwe Chi Ward'],
        //     ['city_id' => '167', 'name' => 'U Yin Su Ward'],
        //     ['city_id' => '167', 'name' => 'Yan Aun Ward'],
        //     ['city_id' => '167', 'name' => 'Ywar Kauk Ward'],

        //     ['city_id' => '168', 'name' => 'Tatkon'],
        //     ['city_id' => '169', 'name' => 'Yamethin'],

        //     ['city_id' => '170', 'name' => 'Ba La Theik Di Ward'],
        //     ['city_id' => '170', 'name' => 'DHa Na Theik Ward'],
        //     ['city_id' => '170', 'name' => 'Kantkaw Housing'],
        //     ['city_id' => '170', 'name' => 'Khayay Housing'],
        //     ['city_id' => '170', 'name' => 'Nyar Na Theik Ward'],
        //     ['city_id' => '170', 'name' => 'Padauk Housing'],
        //     ['city_id' => '170', 'name' => 'Spal Housing'],
        //     ['city_id' => '170', 'name' => 'Shw Kyar Pin Ward'],
        //     ['city_id' => '170', 'name' => 'Shwe Nandar Ward'],
        //     ['city_id' => '170', 'name' => 'Thapyay Housing'],
        //     ['city_id' => '170', 'name' => 'Tha Pyay Kone Ward'],
        //     ['city_id' => '170', 'name' => 'Thazin Housing'],
        //     ['city_id' => '170', 'name' => 'Thu Kha Theik Di Ward'],
        //     ['city_id' => '170', 'name' => 'Wun Na Theik Di Ward'],

        //     ['city_id' => '171', 'name' => 'Ah Naw Ra Htar Ward'],
        //     ['city_id' => '171', 'name' => 'Aung Zay Ya Ward'],
        //     ['city_id' => '171', 'name' => 'Kyan Sit Thar Ward'],
        //     ['city_id' => '171', 'name' => 'Pyi San Aung Ward'],

        //     // Rakhine State
        //     ['city_id' => '172', 'name' => 'Ann'],
        //     ['city_id' => '173', 'name' => 'Buthidaung'],
        //     ['city_id' => '174', 'name' => 'Gwa'],
        //     ['city_id' => '175', 'name' => 'Kyaukpyu'],
        //     ['city_id' => '176', 'name' => 'Kyauktaw'],
        //     ['city_id' => '177', 'name' => 'Maungdaw'],
        //     ['city_id' => '178', 'name' => 'Minbya'],
        //     ['city_id' => '179', 'name' => 'Mrauk-U'],
        //     ['city_id' => '180', 'name' => 'Munaung'],
        //     ['city_id' => '181', 'name' => 'Myebon'],
        //     ['city_id' => '182', 'name' => 'Pauktaw'],
        //     ['city_id' => '183', 'name' => 'Ponnagyun'],
        //     ['city_id' => '184', 'name' => 'Ramree'],
        //     ['city_id' => '185', 'name' => 'Rathedaung'],
        //     ['city_id' => '186', 'name' => 'Sittwe'],
        //     ['city_id' => '187', 'name' => 'Thandwe'],
        //     ['city_id' => '188', 'name' => 'Toungup'],

        //     // Sagaing Division
        //     ['city_id' => '189', 'name' => 'Ayadaw'],
        //     ['city_id' => '190', 'name' => 'Banmauk'],
        //     ['city_id' => '191', 'name' => 'Budalin'],
        //     ['city_id' => '192', 'name' => 'Chaung-U'],
        //     ['city_id' => '193', 'name' => 'Hkamti'],
        //     ['city_id' => '194', 'name' => 'Homalin'],
        //     ['city_id' => '195', 'name' => 'Indaw'],
        //     ['city_id' => '196', 'name' => 'Kale'],
        //     ['city_id' => '197', 'name' => 'Kalewa'],
        //     ['city_id' => '198', 'name' => 'kanbalu'],
        //     ['city_id' => '199', 'name' => 'Kani'],
        //     ['city_id' => '200', 'name' => 'Katha'],
        //     ['city_id' => '201', 'name' => 'Kawlin'],
        //     ['city_id' => '202', 'name' => 'Khin-U'],
        //     ['city_id' => '203', 'name' => 'Kyunhla'],
        //     ['city_id' => '204', 'name' => 'Lahe'],
        //     ['city_id' => '205', 'name' => 'Lay Shi'],
        //     ['city_id' => '206', 'name' => 'Mawlaik'],
        //     ['city_id' => '207', 'name' => 'Mingin'],

        //     ['city_id' => '208', 'name' => 'Ah Lel Ward'],
        //     ['city_id' => '208', 'name' => 'Ah Lone Ward'],
        //     ['city_id' => '208', 'name' => 'Aung Chan Thar Ward'],
        //     ['city_id' => '208', 'name' => 'Aung Min Ga Lar Ward'],
        //     ['city_id' => '208', 'name' => 'Aye Thar Yar Ward'],
        //     ['city_id' => '208', 'name' => 'Chan Mya Thar Zi Ward'],
        //     ['city_id' => '208', 'name' => 'Cahn Mya Wa Di Ward'],
        //     ['city_id' => '208', 'name' => 'Daw Na Chan Ward'],
        //     ['city_id' => '208', 'name' => 'Hpa Yar Gyi Ward'],
        //     ['city_id' => '208', 'name' => 'Hpone Soe Ward'],
        //     ['city_id' => '208', 'name' => 'Htan Taw Ward'],
        //     ['city_id' => '208', 'name' => 'Inn Ywar Thit Ward'],
        //     ['city_id' => '208', 'name' => 'Kwayt Gyi Ward'],
        //     ['city_id' => '208', 'name' => 'Monywa Ward'],
        //     ['city_id' => '208', 'name' => 'Monywa (South) Ward'],
        //     ['city_id' => '208', 'name' => 'Monywa Ward'],
        //     ['city_id' => '208', 'name' => 'Mya Wa Di Ward'],
        //     ['city_id' => '208', 'name' => 'Myo Thit Ward'],
        //     ['city_id' => '208', 'name' => 'Na Da Wun Ward'],
        //     ['city_id' => '208', 'name' => 'Nat Lu Hteik Ward'],
        //     ['city_id' => '208', 'name' => 'Oe Bo (South) Ward'],
        //     ['city_id' => '208', 'name' => 'Set Hmu ZOn Ward'],
        //     ['city_id' => '208', 'name' => 'Sit Pin Ward'],
        //     ['city_id' => '208', 'name' => 'Sue Lay Gone Ward'],
        //     ['city_id' => '208', 'name' => 'Thar Lar Ward'],
        //     ['city_id' => '208', 'name' => 'Ya Da Nar Bon Ward'],
        //     ['city_id' => '208', 'name' => 'Yan Kin Ward'],
        //     ['city_id' => '208', 'name' => 'Yone Gyi Ward'],

        //     ['city_id' => '209', 'name' => 'Myaung'],
        //     ['city_id' => '210', 'name' => 'Myinmu'],
        //     ['city_id' => '211', 'name' => 'Nanyun'],
        //     ['city_id' => '212', 'name' => 'Pale'],
        //     ['city_id' => '213', 'name' => 'Paungbyin'],
        //     ['city_id' => '214', 'name' => 'Pinlebu'],
        //     ['city_id' => '215', 'name' => 'Sagaing'],
        //     ['city_id' => '216', 'name' => 'Salingyi'],
        //     ['city_id' => '217', 'name' => 'Shwebo'],
        //     ['city_id' => '218', 'name' => 'Tabayin'],
        //     ['city_id' => '219', 'name' => 'Tamu'],
        //     ['city_id' => '220', 'name' => 'Taze'],
        //     ['city_id' => '221', 'name' => 'Tigyaing'],
        //     ['city_id' => '222', 'name' => 'Wetlet'],
        //     ['city_id' => '223', 'name' => 'Wuntho'],
        //     ['city_id' => '224', 'name' => 'Ye-U'],
        //     ['city_id' => '225', 'name' => 'Yinmabin'],

        //     // Shan State (East)
        //     ['city_id' => '226', 'name' => 'Kengtung'],
        //     ['city_id' => '227', 'name' => 'Matman'],
        //     ['city_id' => '228', 'name' => 'Monghpyak'],
        //     ['city_id' => '229', 'name' => 'Monghsat'],
        //     ['city_id' => '230', 'name' => 'Mongkhet'],
        //     ['city_id' => '231', 'name' => 'Mongla'],
        //     ['city_id' => '232', 'name' => 'Mongping'],
        //     ['city_id' => '233', 'name' => 'Mongton'],
        //     ['city_id' => '234', 'name' => 'Mongyang'],
        //     ['city_id' => '235', 'name' => 'Mongyawng'],
        //     ['city_id' => '236', 'name' => 'Tachileik'],

        //     // Shan State (North)
        //     ['city_id' => '237', 'name' => 'Hopang'],
        //     ['city_id' => '238', 'name' => 'Hseni'],
        //     ['city_id' => '239', 'name' => 'Hsipaw'],
        //     ['city_id' => '240', 'name' => 'Konkyan'],
        //     ['city_id' => '241', 'name' => 'Kunlong'],
        //     ['city_id' => '242', 'name' => 'Kutkai'],
        //     ['city_id' => '243', 'name' => 'Kyuakme'],
        //     ['city_id' => '244', 'name' => 'Lashio'],
        //     ['city_id' => '245', 'name' => 'Laukkaing'],
        //     ['city_id' => '246', 'name' => 'Mabein'],
        //     ['city_id' => '247', 'name' => 'Manton'],
        //     ['city_id' => '248', 'name' => 'Mongmao'],
        //     ['city_id' => '249', 'name' => 'Mongmit'],
        //     ['city_id' => '250', 'name' => 'Mongyai'],
        //     ['city_id' => '251', 'name' => 'Muse'],
        //     ['city_id' => '252', 'name' => 'Namhsan'],
        //     ['city_id' => '253', 'name' => 'Namphan'],
        //     ['city_id' => '254', 'name' => 'Namtu'],
        //     ['city_id' => '255', 'name' => 'Nanhkan'],
        //     ['city_id' => '256', 'name' => 'Nawnghkio'],
        //     ['city_id' => '257', 'name' => 'Pangsang'],
        //     ['city_id' => '258', 'name' => 'Pangwaun'],
        //     ['city_id' => '259', 'name' => 'Tangyan'],

        //     // Shan State (South)
        //     ['city_id' => '260', 'name' => 'Hopong'],
        //     ['city_id' => '261', 'name' => 'Hsihseng'],
        //     ['city_id' => '262', 'name' => 'Kalaw'],
        //     ['city_id' => '263', 'name' => 'Kunhing'],
        //     ['city_id' => '264', 'name' => 'Kyethi'],
        //     ['city_id' => '265', 'name' => 'Laihka'],
        //     ['city_id' => '266', 'name' => 'Langkho'],
        //     ['city_id' => '267', 'name' => 'Lawksawk'],

        //     ['city_id' => '268', 'name' => 'Loilen'],
        //     ['city_id' => '269', 'name' => 'Mawkmai'],
        //     ['city_id' => '270', 'name' => 'Monghsu'],
        //     ['city_id' => '271', 'name' => 'Mongkaung'],
        //     ['city_id' => '272', 'name' => 'Mongnai'],
        //     ['city_id' => '273', 'name' => 'Mongpan'],
        //     ['city_id' => '274', 'name' => 'Nansang'],
        //     ['city_id' => '275', 'name' => 'Nyaungshwe'],
        //     ['city_id' => '276', 'name' => 'Pekon'],
        //     ['city_id' => '277', 'name' => 'Pindaya'],
        //     ['city_id' => '278', 'name' => 'Pinlaung'],
        //     ['city_id' => '279', 'name' => 'Taunggyi'],
        //     ['city_id' => '280', 'name' => 'Ywangan'],

        //     // Tanintharyi Division
        //     ['city_id' => '281', 'name' => 'Bokpyin'],
        //     ['city_id' => '282', 'name' => 'Dawei'],
        //     ['city_id' => '283', 'name' => 'Kawthoung'],
        //     ['city_id' => '284', 'name' => 'Kyunsu'],
        //     ['city_id' => '285', 'name' => 'Launglon'],
        //     ['city_id' => '286', 'name' => 'Myeik'],
        //     ['city_id' => '287', 'name' => 'Palaw'],
        //     ['city_id' => '288', 'name' => 'Tanintharyi'],
        //     ['city_id' => '289', 'name' => 'Thayetchaung'],
        //     ['city_id' => '290', 'name' => 'Yebyu'],

        //     // Yangon Division
        //     ['city_id' => '291', 'name' => 'Dagon Myothit(East)'],
        //     ['city_id' => '291', 'name' => 'Dagon Myothit(North)'],
        //     ['city_id' => '291', 'name' => 'Dagon Myothit(Seikkan'],
        //     ['city_id' => '291', 'name' => 'Dagon Myothit(South)'],

        //     ['city_id' => '292', 'name' => 'Ahlone'],
        //     ['city_id' => '292', 'name' => 'Bahan'],
        //     ['city_id' => '292', 'name' => 'Botahtaung'],
        //     ['city_id' => '292', 'name' => 'Dagon'],
        //     ['city_id' => '292', 'name' => 'Dawbon'],
        //     ['city_id' => '292', 'name' => 'Hlaing'],
        //     ['city_id' => '292', 'name' => 'Hlaingtharya'],
        //     ['city_id' => '292', 'name' => 'Hmawbi'],
        //     ['city_id' => '292', 'name' => 'Insein'],
        //     ['city_id' => '292', 'name' => 'Kamaryut'],
        //     ['city_id' => '292', 'name' => 'Kyauktada'],
        //     ['city_id' => '292', 'name' => 'Kyauktan'],
        //     ['city_id' => '292', 'name' => 'Kyeemyindaing'],
        //     ['city_id' => '292', 'name' => 'Lanmadaw'],
        //     ['city_id' => '292', 'name' => 'Latha'],
        //     ['city_id' => '292', 'name' => 'Mayangone'],
        //     ['city_id' => '292', 'name' => 'Mingaladon'],
        //     ['city_id' => '292', 'name' => 'Mingalartaungnyunt'],
        //     ['city_id' => '292', 'name' => 'North Okkalapa'],
        //     ['city_id' => '292', 'name' => 'Pabedan'],
        //     ['city_id' => '292', 'name' => 'Pazundaung'],
        //     ['city_id' => '292', 'name' => 'Sanchaung'],
        //     ['city_id' => '292', 'name' => 'Seikkan'],
        //     ['city_id' => '292', 'name' => 'Shwepyithar'],
        //     ['city_id' => '292', 'name' => 'South Okkalapa'],
        //     ['city_id' => '292', 'name' => 'Tamwe'],
        //     ['city_id' => '292', 'name' => 'Thaketa'],
        //     ['city_id' => '292', 'name' => 'Thanlyin'],
        //     ['city_id' => '292', 'name' => 'Thingangkyun'],
        //     ['city_id' => '292', 'name' => 'Yankin'],

        //     ['city_id' => '293', 'name' => 'Cocokyun'],
        //     ['city_id' => '293', 'name' => 'Dala'],
        //     ['city_id' => '293', 'name' => 'Hlegu'],
        //     ['city_id' => '293', 'name' => 'Htantabin'],
        //     ['city_id' => '293', 'name' => 'Htauk Kyant'],
        //     ['city_id' => '293', 'name' => 'Kawhmu'],
        //     ['city_id' => '293', 'name' => 'Kayan'],
        //     ['city_id' => '293', 'name' => 'Kungyangon'],
        //     ['city_id' => '293', 'name' => 'Seikgyikanaungto'],
        //     ['city_id' => '293', 'name' => 'Taikkyi'],
        //     ['city_id' => '293', 'name' => 'Thongwa'],
        //     ['city_id' => '293', 'name' => 'Twantay'],


        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('townships');
    }
}