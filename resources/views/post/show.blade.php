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
                        @if($posts->photo_id)
                            <img class="card-img-top" height="250" src = "{{ asset('photo/'.$posts->photo_id.'.jpg') }}" alt="{{ $posts->photo_id }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title" style="font-size:25px"><strong>{{ $posts->title }}</strong></h5>
                            <p class="card-text" style="font-size:18px">{!! $posts->body !!}</p>
                            <p class="card-text"><small class="text-muted">{{ $posts->user->name }} {{ $posts->updated_at }}</small></p>
                        </div>
                      </div>
        </div>
    </div>
</div>
@endsection
