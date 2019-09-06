@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>포럼 글 목록</h1>
        <hr>
        <ul>
            @forelse($articles as $item)
                <li>
                    [{{ $item->id }}] {{ $item->title }}

                    <small>{{ $item->content }}</small> |
                    <small>{{ $item->user->name }}</small>
                </li>
            @empty
                <p>글이 없습니다.</p>

            @endforelse
        </ul>
    </div>


    @if($articles->count())
        <div class="text-center">
            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                글 등록하기
            </a>

            {!! $articles->render() !!}
        </div>
    @endif
@stop