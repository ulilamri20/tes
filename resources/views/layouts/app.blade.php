<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            color-scheme: light;

            /* Palet: Blue #90D2F5 > #21A5EC, Green #053F56, Midnight, White, Gray #F2F3F7 */
            --bg: #DCEFFC;
            --surface: #FFFFFF;
            --surface-2: #F2F3F7;
            --border: #E1E6EE;
            --text: #3E5764;
            --heading: #053F56;
            --muted: #5F7785;
            --accent: #21A5EC;
            --accent-soft: #90D2F5;
            --accent-strong: #0B76B0;
            --accent-ink: #04222E;
            --grad: linear-gradient(90deg, #90D2F5 0%, #21A5EC 100%);
            --danger: #DC2626;
            --success: #0F766E;

            --radius: 14px;
            --page: 1150px;
            --font-display: Fraunces, Georgia, "Times New Roman", serif;
            --font-body: "Plus Jakarta Sans", Inter, "Segoe UI", Arial, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            max-width: none;
            min-height: 100%;
            margin: 0 !important;
            padding: 0 !important;
        }

        body {
            background:
                var(--bg);
            background-attachment: fixed;
            color: var(--text);
            font-family: var(--font-body);
            font-size: 15px;
            line-height: 1.75;
            -webkit-font-smoothing: antialiased;
        }

        ::selection {
            background: var(--accent);
            color: var(--accent-ink);
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--surface-2);
            border-radius: 10px;
            border: 2px solid var(--bg);
        }

        .container {
            width: 100%;
            max-width: none;
            margin: 0 auto;
            padding: 0;
        }

        /* ============ NAVBAR: pill melayang ============ */
        .nav {
            position: sticky;
            top: 14px;
            z-index: 50;
            width: calc(100% - 48px);
            max-width: var(--page);
            margin: 14px auto 52px;
            padding: 8px 10px 8px 12px;
            display: flex;
            align-items: center;
            gap: 4px;
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: 999px;
            box-shadow: 0 10px 30px rgba(5, 63, 86, 0.10);
        }

        .nav a {
            color: var(--text);
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 999px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .nav a:hover {
            color: var(--heading);
            background: var(--surface-2);
        }

        .nav a.active {
            color: var(--accent-ink);
            background: var(--grad);
        }

        .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--muted);
        }

        .inline {
            display: inline;
        }

        .nav button {
            background: var(--surface-2);
            color: var(--heading);
            border: 1px solid var(--border);
            padding: 8px 20px;
            border-radius: 999px;
        }

        .nav button:hover {
            background: var(--danger);
            border-color: var(--danger);
            color: #FFFFFF;
            transform: none;
        }

        hr {
            display: none;
        }

        /* ============ KONTEN UTAMA ============ */
        main.row {
            display: block;
            width: calc(100% - 48px);
            max-width: var(--page);
            margin: 0 auto;
            padding: 0 0 72px;
        }

        main.row > section {
            display: block;
            width: 100%;
            max-width: 100%;
            margin-bottom: 40px;
        }

        /* CARD (dasar: tanpa bayangan berat, batas tipis) */
        .card {
            background: var(--surface);
            box-shadow: 0 1px 2px rgba(5, 63, 86, 0.05), 0 8px 24px rgba(5, 63, 86, 0.05);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px;
            margin-bottom: 20px;
        }

        /* HERO: blok judul rata kiri dengan garis aksen vertikal */
        main.row > section:first-child > .card {
            position: relative;
            background: transparent;
            border: none;
            border-left: 3px solid;
            border-image: linear-gradient(180deg, var(--accent-soft), var(--accent)) 1;
            border-radius: 0;
            padding: 6px 0 6px 32px;
            margin-bottom: 8px;
        }

        main.row > section:first-child > .card h1,
        main.row > section:first-child > .card h2,
        main.row > section:first-child > .card h3,
        main.row > section:first-child > .card h4 {
            color: var(--heading);
            font-size: clamp(32px, 4.4vw, 52px);
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin: 0 0 14px;
        }

        main.row > section:first-child > .card p {
            color: var(--text);
            font-size: 17px;
            max-width: 56ch;
        }

        main.row > section:first-child > .card .muted {
            color: var(--muted);
        }

        main.row > section:first-child > .card a {
            color: var(--accent-strong);
        }

        h1, h2, h3, h4 {
            color: var(--heading);
            font-family: var(--font-display);
            font-weight: 600;
            line-height: 1.25;
            letter-spacing: -0.01em;
        }

        h2 {
            font-size: 32px;
        }

        h3 {
            font-size: 24px;
        }

        /* LINK */
        a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        a:hover {
            color: var(--heading);
        }

        /* ============ GRID 3 KOLOM ============ */
        .row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 26px;
        }

        .row > :not(.card):not(article) {
            grid-column: 1 / -1;
        }

        .row > .card {
            min-width: 0;
            margin-bottom: 0;
        }

        /* ============ KARTU ARTIKEL: gambar di atas ============ */
        .row > article.card {
            width: 100%;
            min-width: 0;
            margin-bottom: 0;
            padding: 0;
            overflow: hidden;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .row > article.card:hover {
            background: var(--surface);
            border-color: rgba(33, 165, 236, 0.6);
            box-shadow: 0 16px 36px rgba(5, 63, 86, 0.12);
        }

        article.card > div {
            display: flex;
            flex-direction: column;
            height: 100%;
            gap: 0;
        }

        article.card img {
            flex: none;
            display: block;
            width: 100%;
            max-width: 100%;
            height: 210px;
            object-fit: cover;
            border-radius: 0;
            border-bottom: 1px solid var(--border);
            filter: none;
            transition: transform 0.5s ease, filter 0.3s ease;
        }

        article.card:hover img {
            transform: scale(1.04);
            filter: none;
        }

        /* bungkus gambar agar zoom tidak keluar kartu */
        article.card > div {
            overflow: hidden;
        }

        article.card > div > div {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 22px 24px 20px;
            background: inherit;
            position: relative;
            z-index: 1;
        }

        article.card h4 {
            margin: 0 0 10px;
            font-size: 22px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        article.card h4 a {
            color: var(--heading);
            font-weight: 600;
        }

        article.card h4 a:hover {
            color: var(--accent-strong);
        }

        article.card p {
            margin: 0 0 16px;
            color: var(--text);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* baris meta (tanggal/penulis) jadi footer kartu */
        article.card .muted {
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid var(--border);
        }

        /* ARTIKEL UTAMA: selebar penuh, gambar kiri teks kanan */
        .row > article.card:first-of-type {
            grid-column: 1 / -1;
        }

        .row > article.card:first-of-type > div {
            flex-direction: row;
        }

        .row > article.card:first-of-type img {
            flex: 0 0 54%;
            width: 54%;
            max-width: 54%;
            height: auto;
            min-height: 340px;
            border-bottom: none;
            border-right: 1px solid var(--border);
        }

        .row > article.card:first-of-type > div > div {
            justify-content: center;
            padding: 40px 44px;
        }

        .row > article.card:first-of-type h4 {
            font-size: clamp(28px, 3.2vw, 40px);
            line-height: 1.15;
            margin-bottom: 16px;
            -webkit-line-clamp: 3;
        }

        .row > article.card:first-of-type p {
            font-size: 16px;
            -webkit-line-clamp: 4;
        }

        .row > article.card:first-of-type .muted {
            margin-top: 8px;
        }

        img {
            max-width: 100%;
        }

        /* ============ TOMBOL ============ */
        button {
            background: var(--grad);
            color: var(--accent-ink);
            border: none;
            padding: 11px 24px;
            border-radius: 999px;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        button:hover {
            background: var(--heading);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        /* ============ FORM ============ */
        input, textarea, select {
            width: 100%;
            padding: 13px 16px;
            margin: 7px 0 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--bg);
            color: var(--heading);
            font: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: var(--muted);
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(33, 165, 236, 0.22);
        }

        a:focus-visible,
        button:focus-visible {
            outline: 2px solid var(--accent-strong);
            outline-offset: 3px;
            border-radius: 6px;
        }

        label {
            display: block;
            color: var(--heading);
            font-weight: 600;
        }

        /* ============ PESAN ============ */
        .muted {
            color: var(--muted);
            font-size: 13px;
        }

        .flash {
            padding: 14px 18px;
            margin: 15px 0;
            border-radius: 12px;
            background: rgba(15, 118, 110, 0.08);
            color: var(--success);
            border: 1px solid rgba(15, 118, 110, 0.3);
            border-left: 3px solid var(--success);
        }

        .error {
            padding: 14px 18px;
            margin: 15px 0;
            border-radius: 12px;
            background: rgba(220, 38, 38, 0.07);
            color: var(--danger);
            border: 1px solid rgba(220, 38, 38, 0.3);
            border-left: 3px solid var(--danger);
        }

        ul {
            padding-left: 22px;
        }

        li {
            margin-bottom: 10px;
        }

        /* ============ PAGINASI (tengah) ============ */
        .pagination {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin: 40px 0 0;
            padding: 0;
            list-style: none;
        }

        .pagination li {
            margin: 0;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            min-width: 42px;
            padding: 8px 14px;
            text-align: center;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 999px;
            background: var(--surface);
            transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        .pagination a:hover {
            background: var(--surface-2);
            border-color: var(--accent);
            color: var(--accent-strong);
        }

        .pagination .active span {
            background: var(--grad);
            border-color: var(--accent);
            color: var(--accent-ink);
            font-weight: 700;
        }

        .pagination .disabled span {
            opacity: 0.4;
        }

        nav[role="navigation"] svg {
            width: 18px;
            height: 18px;
        }

        /* ============ FOOTER ============ */
        footer {
            width: calc(100% - 48px);
            max-width: var(--page);
            margin: 0 auto;
            padding: 28px 0 36px;
            text-align: left;
            background: transparent;
            border-top: 1px solid var(--border);
            color: var(--muted);
        }

        footer .muted {
            color: var(--muted);
        }

        /* ============ TABLET ============ */
        @media (max-width: 960px) {
            .row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .row > article.card:first-of-type img {
                flex-basis: 48%;
                width: 48%;
                max-width: 48%;
                min-height: 300px;
            }

            .row > article.card:first-of-type > div > div {
                padding: 28px;
            }
        }

        /* ============ MOBILE ============ */
        @media (max-width: 700px) {
            .nav {
                flex-wrap: wrap;
                width: calc(100% - 28px);
                top: 8px;
                margin: 8px auto 32px;
                padding: 10px 12px;
                border-radius: 24px;
            }

            .right {
                margin-left: 0;
                width: 100%;
                flex-wrap: wrap;
                padding: 4px 8px 2px;
            }

            main.row {
                width: calc(100% - 28px);
            }

            .card {
                padding: 20px;
            }

            main.row > section:first-child > .card {
                padding: 4px 0 4px 20px;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .row > article.card:first-of-type > div {
                flex-direction: column;
            }

            .row > article.card:first-of-type img {
                flex: none;
                width: 100%;
                max-width: 100%;
                min-height: 0;
                height: 210px;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .row > article.card:first-of-type > div > div {
                padding: 22px 22px 20px;
            }

            h2 {
                font-size: 26px;
            }

            footer {
                width: calc(100% - 28px);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
            }

            article.card:hover img {
                transform: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        @include('partials.nav')

        <main class="row">
            @yield('content')
        </main>

        <footer>
            <div class="muted">© Portal Berita Sederhana - Laravel</div>
        </footer>
    </div>
</body>
</html>
