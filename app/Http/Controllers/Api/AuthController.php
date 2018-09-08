<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Exception;

class AuthController extends Controller
{

	public function addMessageSuccess($output, $message)
	{
		return [
			'status' => 'OK',
			'message' => $message,
			'result' => $output
		];
	}

	public function addMessageFailed($message)
	{
		return [
			'status' => 'Fail',
			'message' => $message
		];
	}

	public function login(Request $request)
	{
		$checkLogin = User::where(['username' => $request->input('username'), 'password' => $request->input('password')])->first(['id', 'username', 'fullname', 'usia', 'jk', 'asal_pesantren', 'berat', 'riwayat_penyakit']);

		

		if ($checkLogin !== null) {
			$output = $this->addMessageSuccess($checkLogin->toArray(), 'Login Berhasil');
    		return response()->json($output, 200);
		}else {
			$output = $this->addMessageFailed('Username atau password salah');
			return response()->json($output, 400);
		}
	}

	public function register(Request $request)
	{
		try {
			DB::beginTransaction();

			$user = new User;
			$user->username = $request->input('username');
			$user->password = $request->input('password');
			$user->fullname = $request->input('fullname');
			$user->usia = $request->input('usia');
			$user->jk = $request->input('jk');
			$user->asal_pesantren = $request->input('asal_pesantren');
			$user->berat = $request->input('berat');
			$user->riwayat_penyakit = $request->input('riwayat_penyakit');

			$user->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollBack();

			$output = $this->addMessageFailed('Username sudah terdaftar');

			return response()->json($output, 200);
		}

		$user = User::where('id', $user->id)->first(['id', 'username', 'fullname', 'usia', 'jk', 'asal_pesantren', 'berat', 'riwayat_penyakit']);

		$output = $this->addMessageSuccess($user->toArray(), 'User berhasil ditambahkan');

		return response()->json($output, 200);
	}

	public function update(Request $request, $id)
	{

		try {
			DB::beginTransaction();

			$user = User::find($id);

			$user->fullname = $request->input('fullname');
			$user->usia = $request->input('usia');
			$user->jk = $request->input('jk');
			$user->asal_pesantren = $request->input('asal_pesantren');
			$user->berat = $request->input('berat');
			$user->riwayat_penyakit = $request->input('riwayat_penyakit');

			$user->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollBack();

			$output = $this->addMessageFailed('User tidak terdaftar');

			return response()->json($output, 400);
		}

		$user = User::where('id', $id)->first(['id', 'username', 'fullname', 'usia', 'jk', 'asal_pesantren', 'berat', 'riwayat_penyakit']);

		$output = $this->addMessageSuccess($user->toArray(), 'User berhasil diupdate');

		return response()->json($output, 200);
	}

	public function update_password(Request $request)
	{

		try {
			DB::beginTransaction();

			$user = User::where(['username' => $request->username, 'usia' => $request->usia])->first();

			$user->password = $request->input('password');
			
			$user->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollBack();

			$output = $this->addMessageFailed('Data tidak sesuai');

			return response()->json($output, 400);
		}

		$user = User::where('id', $user->id)->first(['id', 'username', 'fullname', 'usia', 'jk', 'asal_pesantren', 'berat', 'riwayat_penyakit']);

		$output = $this->addMessageSuccess($user->toArray(), 'Password berhasil diubah');

		return response()->json($output, 200);
	}

}