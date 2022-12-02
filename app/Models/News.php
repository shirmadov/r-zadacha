<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'title',
        'slug_name',
        'text',
        'document_name',
        'document_path',
        'author_id',
    ];

    public function saveNews($request){


        $user = \Auth()->user();
        $filePath = '/files/news/';
        $newName = uniqid() . '.'.$request->news_file->getClientOriginalExtension();
        $request->file('news_file')->storeAs($filePath, $newName, 'public');

        $news = new News();
        $news->title = $request->news_title;
        $news->slug_name = Str::slug($request->news_title);
        $news->text = $request->news_text;
        $news->document_name = $request->news_file->getClientOriginalName();
        $news->document_path = $newName;
        $news->author_id = $user->id;
        $news->save();

        return $this->where('author_id',$user->id)->get();

    }

    public function updateNew($request){

        $user = \Auth()->user();
        $filePath = '/files/news/';
        $newName = uniqid() . '.'.$request->news_file->getClientOriginalExtension();
        $request->file('news_file')->storeAs($filePath, $newName, 'public');

        $news = News::find($request->news_id);
        $news->title = $request->news_title;
        $news->slug_name = Str::slug($request->news_title);
        $news->text = $request->news_text;
        $news->document_name = $request->news_file->getClientOriginalName();
        $news->document_path = $newName;
        $news->author_id = $user->id;
        $news->save();

        return $this->where('author_id',$user->id)->get();
    }


}
