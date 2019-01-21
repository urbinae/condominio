<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function mes($mes) {
        switch ($mes) {
            case "01": return "Enero";
                break;
            case "02": return "Febrero";
                break;
            case "03": return "Marzo";
                break;
            case "04": return "Abril";
                break;
            case "05": return "Mayo";
                break;
            case "06": return "Junio";
                break;
            case "07": return "Julio";
                break;
            case "08": return "Agosto";
                break;
            case "09": return "Septiembre";
                break;
            case "10": return "Octubre";
                break;
            case "11": return "Noviembre";
                break;
            case "12": return "Diciembre";
                break;
        }
    }

}
