@extends('layouts.postlayout')
 
@section('title', 'COMPLAINTS 投稿ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿ページの説明文')
@section('pageCss')
<link href="/css/post/style.css" rel="stylesheet">
@endsection
 
@include('layouts.postheader')
 
@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            投稿の新規作成
        </h1>
 
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
 
            <fieldset class="mb-4">
 
                <div class="form-group">
                    <label for="sunject">
                        名前
                    </label>
                    <input
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') }}"
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
                    <select
                        id="category_id"
                        name="category_id"
                        class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                        value="{{ old('category_id') }}"
                    >
                    @foreach($categories as $id => $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                    </select>
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
                        value="{{ old('sunject') }}"
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
                    >{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
 
                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('post.index') }}">
                        キャンセル
                    </a>
 
                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
 
@include('layouts.postfooter')