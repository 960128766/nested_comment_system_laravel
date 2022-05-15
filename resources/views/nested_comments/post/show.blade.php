@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>{{ $post->title }}</p>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr/>
                        <h4>Display Comments</h4>
                        @include('nested_comments.comment.reply',['comments'=>$post->comments, 'post_id'=>$post->id])
                        <hr/>
                        <h4>Add Comment</h4>
                        <form action="{{route('comment.add')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment_body" class="form-control">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Comment" class="btn btn-warning mt-1">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
