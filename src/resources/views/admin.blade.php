<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy - ダッシュボード</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
</head>

<body>
    <header class="header">
        <h1 class="logo">PiGLy</h1>
        <div class="header-buttons">
            <button class="header-btn">目標体重設定</button>
            <button class="header-btn">ログアウト</button>
        </div>
    </header>

    <main class="main-container">
        <section class="stats">
            <div class="stat-box">
                <p>目標体重</p>
                <h2>****<span>kg</span></h2>
            </div>
            <div class="stat-box">
                <p>目標まで</p>
                <h2>****<span>kg</span></h2>
            </div>
            <div class="stat-box">
                <p>最新体重</p>
                <h2>****<span>kg</span></h2>
            </div>
        </section>

        <section class="data-section">
            <div class="data-controls">
                <input type="date" class="date-input" placeholder="年/月/日" />
                <span>~</span>
                <input type="date" class="date-input" placeholder="年/月/日" />
                <button class="search-btn">検索</button>
                <button class="add-btn">データ追加</button>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th>運動時間</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>日付</td>
                        <td>体重<span>kg</span></td>
                        <td>カロリー<span>cal</span></td>
                        <td>運動時間</td>
                        <td><button class="edit-btn">✏️</button></td>
                    </tr>

                    <!-- 他の行を追加 -->
                </tbody>
            </table>

            <div class="pagination">
                <button class="page-btn">&lt;</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">&gt;</button>
            </div>
        </section>
    </main>
</body>

</html>