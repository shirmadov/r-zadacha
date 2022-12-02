<li class="news__comment__li" style="@if(Auth::check() && \Auth()->user()->id == $comment->user_id) background-color:#9DA9DA @else background-color:#ffffff @endif ">
    <span class="news__comment__author">{{$comment->name}}</span>
    <div class="news__comment__text">
        <p>{{$comment->text}}</p>
        <span class="news__comment__date">{{$comment->created_at}}</span>
    </div>

</li>
