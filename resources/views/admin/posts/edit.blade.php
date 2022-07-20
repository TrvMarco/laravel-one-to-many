@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>Modifica un post: {{$post->title}}</h1>   
    </div>
    <div class="container">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}" >
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto:</label>
                <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="5" name="content">{{old('content',$post->content)}}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published',$post->published) ? 'checked' : ''}}>
              <label class="form-check-label" for="published">Pubblica il post</label>
              @error('published')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-warning">Modifica Post</button>
        </form>
    </div>
@endsection