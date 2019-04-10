@extends('layouts.app')
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
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
                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        @php
                            $old_input = Session::get('_old_input');
                        @endphp

                        <div class="form-group row">
                            <label for="titlw" class="col-md-2 col-form-label text-md-right">標題</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ $old_input ? $old_input['title'] : '' }}"
                                required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titlw" class="col-md-2 col-form-label text-md-right">圖片</label>
                            <div class="input-group col-md-9">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="photo" name="photo">
                                  <label class="custom-file-label" for="photo">請選擇圖片</label>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <label for="titlw" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="titlw" class="col-md-2 col-form-label text-md-right">內容</label>
                            <div class="col-md-9">
                                <textarea id="body" name="body">{{ $old_input ? $old_input['body'] : '' }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    建立留言
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endsection
