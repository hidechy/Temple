<?php

use Illuminate\Database\Seeder;

class TempleUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
$sql = "update t_temple set memo='慈眼寺、秩父神社、小林寺' where year='2018' and month='05' and day='26';";
DB::statement($sql);

$sql = "update t_temple set memo='杵築大社、井の頭弁財天（大盛寺）' where year='2018' and month='01' and day='03';";
DB::statement($sql);

$sql = "update t_temple set memo='深川不動尊、富岡八幡宮' where year='2018' and month='11' and day='17';";
DB::statement($sql);

$sql = "update t_temple set memo='波除神社、築地本願寺、小網神社' where year='2019' and month='03' and day='17';";
DB::statement($sql);

$sql = "update t_temple set memo='豊川稲荷、日枝神社、愛宕神社' where year='2019' and month='03' and day='30';";
DB::statement($sql);

$sql = "update t_temple set memo='晴明神社、御金神社、伏見稲荷大社、清水寺' where year='2019' and month='04' and day='30';";
DB::statement($sql);
*/

/*
$input = [];
$input['year'] = "2019";
$input['month'] = "09";
$input['day'] = "07";
$input['temple'] = "東京大神宮";
$input['memo'] = "";
DB::table('t_temple')->insert($input);

$input = [];
$input['year'] = "2019";
$input['month'] = "09";
$input['day'] = "21";
$input['temple'] = "光専寺";
$input['memo'] = "";
DB::table('t_temple')->insert($input);

$input = [];
$input['year'] = "2019";
$input['month'] = "09";
$input['day'] = "28";
$input['temple'] = "神田明神";
$input['memo'] = "";
DB::table('t_temple')->insert($input);

$input = [];
$input['year'] = "2019";
$input['month'] = "11";
$input['day'] = "06";
$input['temple'] = "法華経寺";
$input['memo'] = "";
DB::table('t_temple')->insert($input);

$input = [];
$input['year'] = "2019";
$input['month'] = "11";
$input['day'] = "10";
$input['temple'] = "葛飾八幡宮";
$input['memo'] = "";
DB::table('t_temple')->insert($input);

$input = [];
$input['year'] = "2019";
$input['month'] = "11";
$input['day'] = "18";
$input['temple'] = "三峰神社";
$input['memo'] = "";
DB::table('t_temple')->insert($input);
*/

/*
$input = [];
$input['year'] = "2017";
$input['month'] = "01";
$input['day'] = "01";
$input['temple'] = "増上寺";
$input['memo'] = "";
DB::table('t_temple')->insert($input);
*/
/*
$sql = "update t_temple set temple='武蔵一宮　氷川神社' , memo='' where year='2017' and month='03' and day='11';";
DB::statement($sql);

$sql = "update t_temple set temple='上総一宮　玉前神社' , memo='' where year='2018' and month='01' and day='01';";
DB::statement($sql);

$sql = "update t_temple set temple='杵築大社、井の頭弁財天（大盛寺）' , memo='' where year='2018' and month='01' and day='03';";
DB::statement($sql);
*/

/*
$sql = "update t_temple set temple='武蔵国一宮　氷川神社' , memo='' where year='2017' and month='03' and day='11';";
DB::statement($sql);

$sql = "update t_temple set temple='上総国一宮　玉前神社' , memo='' where year='2018' and month='01' and day='01';";
DB::statement($sql);

$sql = "update t_temple set temple='安房国一宮　安房神社' , memo='' where year='2019' and month='01' and day='01';";
DB::statement($sql);
*/


/*
$str = "
東京都港区愛宕1-5-3	虎ノ門駅	2014	8	8
東京都中央区日本橋小網町16-23	水天宮前駅	2014	8	30
千葉県香取市香取1697-1	香取駅	2014	10	14
栃木県日光市山内2301	東武日光駅	2015	1	1
長野県長野市大字長野元善町491-イ	長野駅	2015	5	30
東京都台東区浅草2-3-1	浅草駅	2015	11	14
東京都港区芝公園4-7-35	大門駅	2016	1	1
愛知県名古屋市熱田区神宮1-1-1	神宮前駅	2016	4	24
東京都江東区亀戸3-6-1	亀戸駅	2016	5	5
東京都文京区湯島1-4-25	御茶ノ水駅	2016	10	10
東京都港区芝公園4-7-35	大門駅	2017	1	1
埼玉県さいたま市大宮区高鼻町1-407	大宮駅	2017	3	11
東京都文京区根津1-28-9	根津駅	2017	6	3
東京都千代田区永田町2-10-5	赤坂駅	2017	6	24
東京都千代田区外神田2-16-2	秋葉原駅	2017	6	27
東京都港区赤坂8-11-27	乃木坂駅	2017	7	8
東京都西東京市東伏見1-5-38	東伏見駅	2017	8	12
東京都港区高輪3-15-18	品川駅	2017	8	14
東京都台東区下谷2-13-14	入谷駅	2017	11	5
東京都新宿区百人町1-11-16	新大久保駅	2017	12	23
千葉県長生郡一宮町一宮3048	上総一ノ宮駅	2018	1	1
東京都杉並区善福寺1-33-1	上井草駅	2018	1	2
東京都武蔵野市境南町2-10-11	武蔵境駅	2018	1	3
東京都千代田区富士見2-4-1	飯田橋駅	2018	1	13
茨城県鹿嶋市宮中2306-1	鹿島神宮駅	2018	4	1
千葉県成田市成田１	成田駅	2018	5	3
東京都葛飾区柴又7-10-3	柴又駅	2018	5	4
埼玉県秩父市黒谷2191	和銅黒谷駅	2018	5	26
神奈川県川崎市川崎区大師町4-48	川崎大師駅	2018	6	23
東京都千代田区富士見2-4-1	飯田橋駅	2018	7	10
東京都江東区亀戸9-15-7	東大島駅	2018	7	14
東京都江東区大島7-24-1	東大島駅	2018	8	11
東京都調布市深大寺元町5-15-1	調布駅	2018	8	14
東京都中野区新井5-3-5	新井薬師前駅	2018	8	15
東京都台東区浅草2-3-1	浅草駅	2018	10	27
千葉県市川市大野町3-1917	市川大野駅	2018	11	3
東京都文京区湯島3-30-1	湯島駅	2018	11	17
東京都文京区白山5-31-26	白山駅	2018	11	23
東京都中央区日本橋室町2-4-14	三越前駅	2018	12	1
千葉県館山市大神宮589	館山駅	2019	1	1
東京都杉並区善福寺1-33-1	上井草駅	2019	1	2
東京都練馬区関町南2-3-22	上石神井駅	2019	2	11
東京都品川区西品川3-16-31	大崎駅	2019	2	16
東京都杉並区大宮2-3-1	永福町駅	2019	3	2
東京都品川区北品川3-7-15	北品川駅	2019	3	17
東京都港区北青山3-5-17	表参道駅	2019	3	30
東京都足立区西新井1-15-1	大師前駅	2019	4	6
東京都荒川区荒川3-66-5	三河島駅	2019	4	20
東京都豊島区巣鴨3-35-2	巣鴨駅	2019	4	27
京都府京都市左京区下鴨泉川町59	京都駅	2019	4	30
長野県駒ヶ根市赤穂29	駒ヶ根駅	2019	5	3
東京都江東区亀戸3-57-22	亀戸駅	2019	5	19
東京都千代田区富士見2-4-1	飯田橋駅	2019	9	7
東京都武蔵野市吉祥寺本町1-10-21	吉祥寺駅	2019	9	21
東京都千代田区外神田2-16-2	秋葉原駅	2019	9	28
千葉県市川市中山2-10-1	下総中山駅	2019	11	6
千葉県市川市八幡4-2-1	本八幡駅	2019	11	10
埼玉県秩父市三峰298-1	三峰口駅	2019	11	18
";

$ex_str = explode("\n" , $str);
foreach($ex_str as $v){
    if (trim($v) == ""){continue;}
    list($address , $station , $year , $month , $day) = explode("\t" , trim($v));

    $update = [];
    $update['address'] = trim($address);
    $update['station'] = trim($station);
    DB::table('t_temple')
        ->where('year' , '=' , $year)
        ->where('month' , '=' , sprintf("%02d" , $month))
        ->where('day' , '=' , sprintf("%02d" , $day))
        ->update($update);
}
*/

/*
$insert = [];
$insert['year'] = "2019";
$insert['month'] = "11";
$insert['day'] = "26";

$insert['temple'] = "鹿島神宮";
$insert['memo'] = "成田山新勝寺";
$insert['address'] = "茨城県鹿嶋市宮中2306-1";
$insert['station'] = "鹿島神宮駅";

DB::table('t_temple')->insert($insert);
*/
/*

$sql = "update t_temple set temple = '下総国一宮　香取神宮' where year = '2014' and month = '10' and day = '14';";
DB::statement($sql);
$sql = "update t_temple set temple = '常陸国一宮　鹿島神宮' where year = '2018' and month = '04' and day = '01';";
DB::statement($sql);
$sql = "update t_temple set temple = '常陸国一宮　鹿島神宮' where year = '2019' and month = '11' and day = '26';";
DB::statement($sql);
$sql = "update t_temple set memo = '慈眼寺、知知夫国一宮　秩父神社、小林寺' where year = '2018' and month = '05' and day = '26';";
DB::statement($sql);
*/

/*
$insert = [];
$insert['year'] = "2019";
$insert['month'] = "12";
$insert['day'] = "29";

$insert['temple'] = "花園神社";
$insert['memo'] = "";
$insert['address'] = "東京都新宿区新宿5-17-3";
$insert['station'] = "新宿駅";

DB::table('t_temple')->insert($insert);
*/

/*
$insert = [];
$insert['year'] = "2020";
$insert['month'] = "01";
$insert['day'] = "01";

$insert['temple'] = "北口本宮冨士浅間神社";
$insert['memo'] = "";
$insert['address'] = "山梨県富士吉田市上吉田5558";
$insert['station'] = "富士山駅";

DB::table('t_temple')->insert($insert);
*/




$insert = [];
$insert['year'] = "2020";
$insert['month'] = "01";
$insert['day'] = "02";

$insert['temple'] = "井草八幡宮";
$insert['memo'] = "大和市神社";
$insert['address'] = "東京都杉並区善福寺1-33-1";
$insert['station'] = "上井草駅";

DB::table('t_temple')->insert($insert);




$insert = [];
$insert['year'] = "2020";
$insert['month'] = "01";
$insert['day'] = "03";

$insert['temple'] = "大法寺";
$insert['memo'] = "武蔵野八幡宮、安養寺、大盛寺、杵築大社、延命寺";
$insert['address'] = "東京都武蔵野市吉祥寺東町2-9-13";
$insert['station'] = "吉祥寺駅";

DB::table('t_temple')->insert($insert);






    }
}
