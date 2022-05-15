@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{$comment->user->name}}</strong>
        <p>{{$comment->body}}</p>
        <a href="" id="reply"></a>
        <form method="POST" action="{{route('reply.add')}}">
            @csrf
            <div class="form-group">
               <input type="text" name="comment_body" class="form-control">
                <input type="hidden" name="post_id" value="{{$post_id}}">
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
            </div>
            <div class="form-group mt-1">
                <input type="submit" value="Reply" class="btn btn-warning">
            </div>
        </form>
        @include('nested_comments.comment.reply',['comments'=>$comment->replies])
    </div>
@endforeach
