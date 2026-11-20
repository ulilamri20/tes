@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="card">
    <h2 style="margin-top: 0;">Dashboard</h2>
    <p>Selamat datang, <strong>{{ $user->name }}</strong></p>
    <p class="muted">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
</section>

<section class="row" style="margin-top: 1rem;">
    <div class="card">
        <h3>Total Artikel</h3>
        <p style="font-size: 2rem; margin: .25rem 0;">{{ $totalArticles }}</p>
        <p class="muted">Jumlah seluruh artikel yang ada di sistem.</p>
    </div>

    <div class="card">
        <h3>Artikel Kamu</h3>
        <p style="font-size: 2rem; margin: .25rem 0;">{{ $myArticles }}</p>
        <p class="muted">Artikel yang dibuat oleh akun kamu.</p>
    </div>

    <div class="card">
        <h3>Aksi Cepat</h3>
        <ul style="margin-bottom: 0;">
            <li><a href="{{ route('articles.create') }}">+ Tambah Artikel Baru</a></li>
            <li><a href="{{ route('articles.index') }}">Lihat Semua Artikel</a></li>
            <li><a href="{{ route('home') }}">Lihat Halaman Home</a></li>
        </ul>
    </div>
</section>

<section class="card" style="margin-top: 1rem;">
    <h3>Artikel Terbaru</h3>

    @if ($latestArticles->isNotEmpty())
        <div class="row">
            @foreach ($latestArticles as $article)
                <article class="card">
                    <div style="display: flex; gap: 1rem;">
                        <img src="{{ $article->image_url }}"
                             alt="Thumbnail {{ $article->title }}"
                             style="width: 120px; height: 80px; object-fit: cover;
                                     border-radius: 8px;">
                        <div>
                            <h4 style="margin: 0 0 .25rem 0;">
                                <a href="{{ route('articles.show', $article) }}">
                                    {{ $article->title }}
                                </a>
                            </h4>
                            <p class="muted" style="margin: 0 0 .25rem 0;">
                                oleh {{ $article->user->name }}
                                <span> &bull; </span>
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                            </p>
                            <p style="margin: 0;">
                                {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted">Belum ada artikel yang bisa ditampilkan.</p>
    @endif
</section>

<section class="card" style="margin-top: 1rem;">
    <h3>Info Akun</h3>
    <ul>
        <li><strong>Nama:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>
    <p class="muted">
        Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.
    </p>
</section>
@endsection
