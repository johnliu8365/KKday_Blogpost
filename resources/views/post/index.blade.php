@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">姓名</th>
                    <th scope="col">標題</th>
                    <th scope="col">內容</th>
                    <th scope="col">功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                                @if(Auth::user()->id == $post->user_id)
                                    <button onclick="location.href='{{ route('post.edit', $post->id) }}'" class='btn btn-primary'>
                                        編輯
                                    </button>
                                    <button onclick="location.href='{{ route('post.destroy', $post->id) }}'" class='btn btn-danger'>
                                        刪除
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
