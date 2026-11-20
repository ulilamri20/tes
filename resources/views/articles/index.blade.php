@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<section class="card">
    <h2>Daftar Artikel</h2>
    <a href="{{ route('articles.create') }}">+ Artikel Baru</a>

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if ($articles->isNotEmpty())
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article) }}">
                        {{ $article->title }}
                    </a>
                    <small>oleh {{ $article->user->name }}</small>

                    @if ($article->user_id === auth()->id())
                        <a href="{{ route('articles.edit', $article) }}">Edit</a>

                        <form action="{{ route('articles.destroy', $article) }}"
                              method="POST" class="inline"
                              onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>

        {{ $articles->links() }}
    @else
        <p>Belum ada artikel.</p>
    @endif
</section>
@endsection
