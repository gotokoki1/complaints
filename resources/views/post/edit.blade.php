@extends('layouts.postlayout')
 
@section('title', 'COMPLAINTS 投稿編集ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿編集ページの説明文')
@section('pageCss')
<link href="/css/post/style.css" rel="stylesheet">
@endsection
 
@include('layouts.postheader')
 
@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h4 mb-4 font-weight-bold">
      投稿の編集
    </h1>
    <form method="POST" action="{{ route('post.update', $post->id) }}">
      @csrf
      @method('PUT')
      <fieldset class="mb-4">
        <div class="form-group">
          <label for="sunject">
            名前
          </label>
          <input
            id="name"
            name="name"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            value="{{ old('name') ?: $post->name }}"
            type="text"
          >
          @if ($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="sunject">
            カテゴリー
          </label>
          <input
            id="category_id"
            name="category_id"
            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
            value="{{ old('category_id') ?: $post->category_id }}"
            type="text"
          >
          @if ($errors->has('category_id'))
            <div class="invalid-feedback">
              {{ $errors->first('category_id') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="sunject">
            件名
          </label>
          <input
            id="sunject"
            name="sunject"
            class="form-control {{ $errors->has('sunject') ? 'is-invalid' : '' }}"
            value="{{ old('sunject') ?: $post->sunject }}"
            type="text"
          >
          @if ($errors->has('sunject'))
            <div class="invalid-feedback">
              {{ $errors->first('sunject') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="message">
            メッセージ
          </label>
          <textarea
            id="message"
            name="message"
            class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
            rows="4"
          >
            {{ old('message') ?: $post->message }}
          </textarea>
          @if ($errors->has('message'))
            <div class="invalid-feedback">
              {{ $errors->first('message') }}
            </div>
          @endif
        </div>
        <div class="mt-5">
          <a class="btn btn-secondary" href="{{ route('post.show', $post->id) }}">
            キャンセル
          </a>
          <button type="submit" class="btn btn-primary">
            編集する
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
@endsection
 
@include('layouts.postfooter')
