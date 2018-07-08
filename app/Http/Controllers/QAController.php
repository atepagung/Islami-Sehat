<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QA;
use Illuminate\Support\Facades\DB;
use Exception;

class QAController extends Controller
{
    public function show_qa_ustadz()
    {
    	$terjawab = QA::with('penanya')->where('answer', '<>',null)->where('ditujukan', 'Ustadz')->get();

    	$belum_terjawab = QA::with('penanya')->where(['answer' => null, 'ditujukan' => 'Ustadz'])->get();

    	return view('qa-ustadz', ['terjawab' => $terjawab, 'belum_terjawab' => $belum_terjawab]);
    }

    public function detail_qa_ustadz($id)
    {
    	$qa = QA::with('penanya')->find($id);

    	return view('detail-qa-ustadz', ['qa' => $qa]);
    }

    public function answer_qa_ustadz(Request $request, $id)
    {
    	try {
    		DB::beginTransaction();

    		$qa = QA::find($id);

    		$qa->answer = $request->answer;

    		$qa->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();

    		session()->flash('error_message', 'Pertanyaan gagal dijawab');

    		return redirect()->route('qa-ustadz');
    	}

    	session()->flash('success_message', 'Pertanyaan berhasil dijawab');

		return redirect()->route('qa-ustadz');
    }

    public function show_qa_dokter()
    {
    	$terjawab = QA::with('penanya')->where('answer', '<>',null)->where('ditujukan', 'Dokter')->get();

    	$belum_terjawab = QA::with('penanya')->where(['answer' => null, 'ditujukan' => 'Dokter'])->get();

    	return view('qa-dokter', ['terjawab' => $terjawab, 'belum_terjawab' => $belum_terjawab]);
    }

    public function detail_qa_dokter($id)
    {
    	$qa = QA::with('penanya')->find($id);

    	return view('detail-qa-dokter', ['qa' => $qa]);
    }

    public function answer_qa_dokter(Request $request, $id)
    {
    	try {
    		DB::beginTransaction();

    		$qa = QA::find($id);

    		$qa->answer = $request->answer;

    		$qa->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();

    		session()->flash('error_message', 'Pertanyaan gagal dijawab');

    		return redirect()->route('qa-dokter');
    	}

    	session()->flash('success_message', 'Pertanyaan berhasil dijawab');

		return redirect()->route('qa-dokter');
    }
}
