<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $per_page = 5;

    public function index(Request $request){

        $news = News::take($this->per_page)->get();
        $all = News::count();

        return view('news.main',[
            'news'=>$news,
            'all'=>$all
        ]);
    }

    public function viewMore(Request $request){

        try {
            $skip_row = $request->row_count;

            $news = News::skip($skip_row)->take($this->per_page)->get();
            $html = view('news.module.news_text', compact('news'))->render();

            return response()->json([
                'success'=>true,
                'content'=>$html,
                'row_count'=>$this->per_page
            ]);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($slug){

//        dd($slug);

        try {

            $new = News::where('slug_name',$slug)->first();
//            dd($new);
            if(is_null($new)){
                return redirect()->route('/');
            }

            return view('news.news_page',compact('new'));

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function comment(Request $request){

        try {

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }


}
