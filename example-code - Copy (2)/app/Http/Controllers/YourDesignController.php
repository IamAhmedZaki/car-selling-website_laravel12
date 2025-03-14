<?php

namespace App\Http\Controllers;

use App\Models\DesignConfig;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class YourDesignController extends Controller
{
    public function index()
    {
        if (Session::has('user_id_get')) {
            $designs = DesignConfig::with('users')->where('user_id', auth()->user()->id)
            ->orderBy('design_config_id', 'desc') // Order by `id` in descending order
            ->get();
            return view('web.design.index', ['designs' => $designs]);
        } else {
            return redirect()->route('login');
        }
    }
    public function all_design()
    {
        if (Session::has('user_id_get')) {
            // $designs = DesignConfig::all();
            $designs = DesignConfig::with('users')->orderBy('design_config_id', 'desc')->get();

            return view('web.design.all_design', ['designs' => $designs]);
        } else {
            return redirect()->route('login');
        }
    }
}
