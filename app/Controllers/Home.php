<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $date = date("Y-m-d");
        $file = file_get_contents("https://api.myquran.com/v1/sholat/jadwal/1204/2021/06/23");
        $data_waktu = json_decode($file, true);
        // $data_solat = array('datalist' => $data_waktu );
        $data = $data_waktu['data']['jadwal'];
        $databener = array('datalist' => $data, );
        // var_dump($data);
        echo view('home', $databener);
    }
    public function coba(){
        $date = date("d");
        $file = file_get_contents("https://www.jadwalsholat.org/adzan/monthly.php?id=47");
        $first_step = explode( "<b>".$date."</b></td>" , $file );
        $second_step = explode("</tr>" , $first_step[1] );
        $data = $second_step[0];

        $subuh = substr($data, 14, 17);
        $isya = substr($data, -10, 10);
        $magrib = substr($data, -28, 9);
        $ashar = substr($data, -38, 5);
        $dzuhur = substr($data, 51, 19);
        var_dump($dzuhur);
        $jadwalsolat = array(
            'subuh' => $subuh,
            'dzuhur' => $dzuhur,
            'ashar' => $ashar,
            'magrib' => $magrib,
            'isya' => $isya,
        );
        var_dump($jadwalsolat);
    } 
    // function jadwalsholat(){
    //      $date = date("Y-m-d");
    //      $file = file_get_contents("https://api.pray.zone/v2/times/today.json?city=bogor");
    //      $data_waktu = json_encode($file, true);

    //      return $data_waktu;
    // }

}
