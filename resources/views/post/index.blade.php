@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">圖片</th>
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
                            <td>
                                @if($post->photo_id)
                                    <img height="50" src = "{{ asset('photo/'.$post->photo_id.'.jpg') }}" alt="{{ $post->photo_id }}">
                                @endif
                            </td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->body !!}</td>
                            <td>
                                <button onclick="location.href='{{ route('post.show', $post->id) }}'" class='btn btn-success'>
                                    檢視
                                </button>

                                @if(Auth::user()->id == $post->user_id)
                                    <button onclick="location.href='{{ route('post.edit', $post->id) }}'" class='btn btn-primary'>
                                        編輯
                                    </button>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class='btn btn-danger'>刪除</button>
                                    </form>
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
