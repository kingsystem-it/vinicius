<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->get();

        return view('site.pages.home.index', compact('plans'));
    }

    public function plan($url)
    {
        if(!$plan = Plan::where('url', $url)->first()){
         return redirect()->back();
        }

        session()->put('plan', $plan);
        return redirect()->route('register');
    }
}
