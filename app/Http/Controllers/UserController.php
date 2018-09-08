<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\QA;


use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    public function show()
    {
    	$users = User::all();

    	return view('list-users', ['users' => $users]);
    }

    public function delete(Request $request)
    {
    	try {
    		DB::beginTransaction();

    		QA::where('user_id', $request->user_id)->delete();

    		User::where('id', $request->user_id)->delete();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		session()->flash('error_message', 'Gagal Menghapus User');
    		return redirect()->route('users');
    	}

    	session()->flash('success_message', 'Berhasil Mengubah Artikel');
		return redirect()->route('users');
    }
}
