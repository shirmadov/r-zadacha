<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Comments;
use App\Models\News;
use App\Models\TagNews;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    protected $per_page = 5;

    public function index(Request $request){


        $news = News::take($this->per_page)->get();
        $all = News::count();
        $tags = Tags::all();

//        dd($tags);

        return view('news.main',[
            'news'=>$news,
            'all'=>$all,
            'tags'=>$tags
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

    public function show($slug, Comments $comments){

        try {

            $new = News::where('slug_name',$slug)->first();

            if(is_null($new)){
                return redirect()->route('/');
            }

            $tags = Tags::all();

            $comments = $comments->getComments($new->id);

            return view('news.news_page',compact('new','tags','comments'));

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function comment(Request $request, Comments $comments){

        try {

            $comment = $comments->storeComment(intval($request->news_id), $request->comment_text);


            $html = view('news.module.comments', compact('comment'))->render();

            return response()->json([
                'success'=>true,
                'content'=>$html,
            ]);

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function search(SearchRequest $request, News $news){

        try {
            $status = 1;
            $news = News::where('title','ilike','%'.$request->search.'%')->limit(3)->get();
            $tags= Tags::where('tag_name','ilike','%'.$request->search.'%')->limit(3)->get();

            if(empty($news->toArray()) && empty($tags->toArray())){
                $status = 0;
            }
            $html = view('layouts.header.search', compact('news','tags'))->render();
            return response()->json([
                'success'=>true,
                'content'=>$html,
                'status'=>$status
            ]);

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function searchByTag($id){

        try {
            $news_id = TagNews::where('tag_id',$id)->pluck('news_id')->toArray();
            $news = News::whereIn('id',array_unique($news_id))->limit(5)->get();

            $all = News::whereIn('id',array_unique($news_id))->count();
            $tags = Tags::all();

              return view('news.main',[
                  'news'=>$news,
                  'all'=>$all,
                  'tags'=>$tags
              ]);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function writeNews(){

        return view('news.write_news');
    }
    public function listNews(){
        $user = \Auth()->user();

        $news = News::where('author_id',$user->id)->get();

        return view('news.list_news',compact('news'));
    }

    public function storeNews(Request $request, News $news){
        try {


            $news = $news->saveNews($request);


            return view('news.list_news',compact('news'));
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function editNews($id){

        $news = News::where('id',$id)->first();


        return view('news.edit_news',compact('news'));
    }

    public function updateNews(Request $request, News $news){

        try {

            $news = $news->updateNew($request);

            return view('news.list_news',compact('news'));
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function deleteNews($id){

        $user = \Auth()->user();

        News::where('id',$id)->delete();
        $news = News::where('author_id',$user->id)->get();
        return view('news.list_news',compact('news'));
    }


}
