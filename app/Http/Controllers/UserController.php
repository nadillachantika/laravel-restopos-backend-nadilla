<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request){

        // $users = DB::table('users')
        // ->where('name','like','%'. $request->search. '%')
        // ->paginate(5);
        // return view('pages.user.index', compact('users'));

        $users = DB::table('users')
        ->when($request->input('name'), function($query, $name){
            return $query->where('name','like','%'. $name . '%');
        })-> paginate(5);
        return view('pages.user.index', compact('users'));
    }

    public function create(){

        return view('pages.user.create');

    }
    public function store(){

    }
    public function show(){

    }
    public function edit(){

    }

}
