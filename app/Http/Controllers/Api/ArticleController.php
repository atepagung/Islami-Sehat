<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\DB;
use Exception;

class ArticleController extends Controller
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

    public function all()
    {
    	//$articles = Article::all()->toArray();
        /*
        $query = "
            SELECT
                id,
                picture,
                title,
                content,
                CASE
                    WHEN category = 'A' then 'Kesehatan dan Gizi'
                    WHEN category = 'B' then 'Kesehatan Lingkungan'
                    WHEN category = 'C' then 'Gaya Hidup'
                    WHEN category = 'D' then 'Kesehatan Masyarakat'
                END
                AS 'category',
                created_at,
                updated_at
            FROM
                articles
        ";
        */
        $articles = Article::select(DB::raw("id,
                picture,
                title,
                content,
                CASE
                    WHEN category = 'A' then 'Kesehatan dan Gizi'
                    WHEN category = 'B' then 'Kesehatan Lingkungan'
                    WHEN category = 'C' then 'Gaya Hidup'
                    WHEN category = 'D' then 'Kesehatan Masyarakat'
                END
                AS 'category',
                created_at,
                updated_at"))->get();

        $output = $this->addMessageSuccess($articles, 'Success');

        return response()->json($output, 200);
    }

    public function getByCategory($category)
    {

    	if ($category == 1) {
            $category = 'A';
        }elseif ($category == 2) {
            $category = 'B';
        }elseif ($category == 3) {
            $category = 'C';
        }elseif ($category == 4) {
            $category = 'D';
        }else {
            $output = $this->addMessageFailed('Kategori tidak ditemukan');
            return response()->json($output, 400);
        }

        $articles = Article::select(DB::raw("id,
                picture,
                title,
                content,
                CASE
                    WHEN category = 'A' then 'Kesehatan dan Gizi'
                    WHEN category = 'B' then 'Kesehatan Lingkungan'
                    WHEN category = 'C' then 'Gaya Hidup'
                    WHEN category = 'D' then 'Kesehatan Masyarakat'
                END
                AS 'category',
                created_at,
                updated_at"))->where('category', $category)->get()->toArray();

        $output = $this->addMessageSuccess($articles, 'Success');
        return response()->json($output, 200);
    }
}
