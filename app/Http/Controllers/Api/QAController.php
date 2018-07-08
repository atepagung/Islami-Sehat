<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QA;
use App\User;
use Illuminate\Support\Facades\DB;
use Exception;

class QAController extends Controller
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

    public function post_question(Request $request, $id)
    {
        $checkUser = User::find($id);
        if ($checkUser == null) {
            $output = $this->addMessageFailed('User tidak ditemukan');

            return response()->json($output, 400);
        }

    	try {
    		DB::beginTransaction();

    		$qa = new QA;

    		$qa->user_id = $id;
    		$qa->question = $request->question;
    		$qa->ditujukan = $request->ditujukan;

    		$qa->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();

            $output = $this->addMessageFailed('QA tidak berhasil ditambahkan');

    		return response()->json($output, 400);
    	}

        $output = $this->addMessageSuccess($qa->toArray(), 'QA berhasil ditambahkan');

    	return response()->json($output, 200);
    }

    public function get_question_by_user_id($id)
    {

        $checkUser = User::find($id);
        if ($checkUser == null) {
            $output = $this->addMessageFailed('User tidak ditemukan');

            return response()->json($output, 400);
        }

    	$questions = QA::where('user_id', $id)->get();

        $output = $this->addMessageSuccess($questions->toArray(), 'Success');

    	return response()->json($output, 200);
    }
}
