<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
public function list(){
    $users=User::get();
    return view('users',['users'=>$users]);
}

public function import_user(Request $request){

    }

    public function export_user(){
        $users=User::orderBy('id', 'desc')->get();
        return (new UsersExport($users))->download('users.csv', \Maatwebsite\Excel\Excel::CSV);
    // return Excel::download(new UsersExport, 'users-data.xlsx');
    }

}

