<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'news_id',
        'text',
    ];

    public function getComments($news_id){
        return $this->where('news_id',$news_id)
            ->join('users','comments.user_id','=','users.id')
            ->select('comments.*','users.name')
            ->orderBy('created_at','desc')
            ->get();
    }



    public function storeComment( $news_id, $text ){

        $user = \Auth()->user();

        $comment = new Comments;

        $comment->user_id = $user->id;
        $comment->news_id = $news_id;
        $comment->text = $text;
        $comment->save();

//        $comment->author_name =

        $comment->name = $user->name;

        return $comment;
    }
}
