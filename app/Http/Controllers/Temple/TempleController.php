<?php

namespace App\Http\Controllers\Temple;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class TempleController extends Controller
{

  public function index(){

    $photolist = $this->getPhotoUrl();

    $appUrl = "http://" . $_SERVER['HTTP_HOST'] . "/Temple/public";

    //-----------//
    $explanation = [];
    $result = DB::table('t_temple')->orderBy('year')->orderBy('month')->orderBy('day')
        ->get(['year' , 'month' , 'day' , 'temple' , 'memo' , 'address' , 'station']);
    if (isset($result[0])){
      foreach($result as $v){
        $explanation[$v->year . "-" . $v->month . "-" . $v->day]['temple'] = $v->temple;
        $explanation[$v->year . "-" . $v->month . "-" . $v->day]['memo'] = $v->memo;
        $explanation[$v->year . "-" . $v->month . "-" . $v->day]['address'] = $v->address;
        $explanation[$v->year . "-" . $v->month . "-" . $v->day]['station'] = $v->station;
      }
    }
//print_r($explanation);
    //-----------//

    return view('temple.index')
      ->with('photolist' , $photolist)
      ->with('appUrl' , $appUrl)
      ->with('explanation' , $explanation);
  }



  public function callphoto(){

    list($date , ) = explode("　" , $_POST['date']);
    $photolist = $this->getPhotoUrl($date);
//print_r($photolist);

    //-----------//
    $rotation = [];
    $rotationfile = "/var/www/html/Temple/public/mySetting/rotation90";
    $content = file_get_contents($rotationfile);
    foreach (explode("\n" , $content) as $v){
      if (trim($v) == ""){continue;}
      $rotation[] = trim($v);
    }
    //-----------//

    $image_files = [];
    $size_class = [];

    $str = "";

    $str .= "<table>";
    foreach ($photolist as $imgno => $imgsrc){

      $ex_imgsrc = explode('/' , $imgsrc);
      $imagefile = $ex_imgsrc[count($ex_imgsrc) - 1];

      $sizeclass = (in_array($imagefile , $rotation)) ? 'rotate90' : 'width100';

      if ($imgno%10==0){$str .= "<tr>";}
      $str .= "<td class='img_td'>";
      $str .= "<img src='" . $imgsrc . "' class='" . $sizeclass . " pointer' onclick='javascript:openModal(\"" . $date . "\" , \"" . $imgsrc . "\" , \"" . $sizeclass . "\");'>";
      $str .= "</td>";
      if ($imgno%10==9){$str .= "</tr>";}

      $image_files[] = $imgsrc;
      $size_class[] = $sizeclass;
    }
    $str .= "</table>";

    $str .= "<div class='display_none'>";
    $str .= "<textarea id='image_files-" . $date . "'>" . implode("|" , $image_files) . "</textarea>";
    $str .= "<textarea id='size_class-" . $date . "'>" . implode("|" , $size_class) . "</textarea>";
    $str .= "</div>";

    echo $str;
  }



  private function scandir_r($dir){
    $list = scandir($dir);

    $results = array();

    foreach($list as $record){
      if(in_array($record, array(".", ".."))){continue;}

      $path = rtrim($dir, "/")."/".$record;
      if(is_file($path)){
        $results[] = $path;
      }else{
        if(is_dir($path)){
          $results = array_merge($results, $this->scandir_r($path)); 
        }
      }
    }

    return $results;
  }



  private function getPhotoUrl($pickdate=null){

    //-----------//
    $skiplist = [];
    $skipfile = "/var/www/html/Temple/public/mySetting/skiplist";
    $content = file_get_contents($skipfile);
    foreach (explode("\n" , $content) as $v){
      if (trim($v) == ""){continue;}
      $skiplist[] = trim($v);
    }
    //-----------//

    //-----------//
    $skiplist2 = [];
    $skipfile = "/var/www/html/Temple/public/mySetting/skiplist2";
    $content = file_get_contents($skipfile);
    foreach (explode("\n" , $content) as $v){
      if (trim($v) == ""){continue;}
      $skiplist2[] = trim($v);
    }
    //-----------//

    $_dir = "/var/www/html/BrainLog/public/UPPHOTO";
    $filelist = $this->scandir_r($_dir);
//print_r($filelist);

    sort($filelist);

    foreach ($filelist as $v){

      $pos = strpos($v , 'UPPHOTO');
      $str = substr(trim($v) , $pos);

      list( , $year , $date , $photo) = explode("/" , $str);

      if (in_array($date , $skiplist)){continue;}
      if (in_array($photo , $skiplist2)){continue;}

      $photolist[$year][$date][] = strtr($v , ['/var/www/html' => 'http://160.16.86.159']);
    }

    if (is_null($pickdate)){
      return $photolist;
    }else{
      list($year , $month , $day) = explode("-" , $pickdate);
      return $photolist[$year][$pickdate];
    }
  }



}
