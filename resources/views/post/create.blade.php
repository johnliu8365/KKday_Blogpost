@extends('layouts.app')
<head>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=jogizat6qiibdvnloi5ls0f4av2drdim5yd7adfdn9oqd275"></script>
  <script>tinymce.init({ selector:'textarea', height: 400 });</script>
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">建立留言</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="titlw" class="col-md-2 col-form-label text-md-right">標題</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titlw" class="col-md-2 col-form-label text-md-right">內容</label>
                            <div class="col-md-9">
                                <textarea id="body" name="body"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    建立留言
                                </button>
                                <button class="btn btn-danger" onclick="location.href='{{ route('home') }}'">
                                    離開
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
