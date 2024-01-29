<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GlobalDeclare {

  public static function API(){
      

      $out = [
        'ClientID' => '305899988789-tuitn1pj7b1e97kh5rs79mdf328ethak.apps.googleusercontent.com'
      ];

      return $out;
  }

  public static function Campuses(){
    $campuses = [
        'SG' => ["Campus" => "Main Campus", "Icon" => "fa-cogs","Color" => "primary"],
        'MCC' => ["Campus" => "Maasin City Campus", "Icon" => "fa-users","Color" => "danger"],
        'TO' => ["Campus" => "Tomas Oppus Campus", "Icon" => "fa-graduation-cap","Color" => "info"],
        'BN' => ["Campus" => "Bontoc Campus", "Icon" => "fa-ship","Color" => "primary"],
        'SJ' => ["Campus" => "San Juan Campus", "Icon" => "fa-briefcase","Color" => "danger"],
        'HN' => ["Campus" => "Hinunangan Campus", "Icon" => "fa-leaf","Color" => "success"],
    ];
    return $campuses;
}

}


?>
