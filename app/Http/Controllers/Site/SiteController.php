<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class SiteController extends Controller
{
    public function home(Plan $plan)
    {
        // pegando os planos e suas features
        $plans = $plan->with('features')->get();
        return view('home.index',compact('plans'));
    }
}
