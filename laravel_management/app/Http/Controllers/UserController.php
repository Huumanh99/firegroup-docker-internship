<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $queryUsers = DB::table('users');

        // search by name
        $name = $request->get('name');

        if (strlen($name) > 0) {
            $queryUsers->where('name', 'like', '%' . $name . '%');
        }

        //sort Name and role
        $sortName = strtolower($request->get('sortName'));
        if (strlen($sortName) > 0) {
            $queryUsers->orderBy('name', $sortName)->get();
        }

        $users =  $queryUsers->get();

        return view('users.list', [
            'users' => $users,
            'name' => $name,
            'sortName' => $sortName == 'desc' ? 'asc' : 'desc',
            'currentPage' => 'users',
        ]);
    }

    public function create(Request $request)
    {
        return view('users.create', [
            'currentPage' => 'users'
        ]);
    }

    public function createUser(Request $request)
    {
        // check uploaded image
        DB::table('users')->insert(
            [
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'birth_date' => $request->input('birth_date'),
            ]
        );

        return redirect()->route("users");
    }

    // Router get: /users/{id}
    public function edit($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->get();

        return view(
            'users.edit',
            [
                'user' => $user,
                'currentPage' => 'users'
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $userData = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'birth_date' => $request->input('birth_date'),
        ];

        DB::table('users')->where('id', $id)->update($userData);

        return redirect()->route('users');
    }

    public function delete(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route("users");
    }

    public function detail(Request $request, $id)
    {
        $user = DB::table('users')->where('id', '=', $id)->get();
        return view(
            'users.detail',
            [
                'user' => $user,
                'currentPage' => 'users'
            ]
        );
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        if (strlen($name) > 0) {
            $users = DB::table('users')->where('name', 'LIKE', '%' . $name . '%')->get('name');
        } else {
            $users = [];
        }
        return  response()->json($users);
    }

    public function report(Request $request){
        $fromdate = $request->fromdate;
        $todate = $request->todate;
        // $name = $request->name;
 
        $data = DB::select("SELECT * FROM users WHERE created_at BETWEEN '$fromdate 00:00:00' AND '$todate 23:59:59'");

         return view('users.list', [
             '$datas' => $data,
         ]);
     }
}
