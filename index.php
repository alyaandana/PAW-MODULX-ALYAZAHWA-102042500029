<?php 

include 'data.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="navbar">
        <div class="brand">Cia Store</div>
        <div class="menu">
            <a href="#">Home</a>
            <a href="#katalog">Products</a>
            <a href="#">About</a>
        </div>
    </div>

    <div class="hero">
        <div class="hero-card">
            <small>CIA STORE</small>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a href="#katalog" class="btn">Lihat Produk</a>
        </div>
    </div>

    <div class="container" id="katalog">
        <div class="header-katalog">
            <div>
                <small>OUR PRODUCTS</small>
                <h2>Katalog Produk</h2>
            </div>
            <div class="badge">
                Total Produk: <?= $total; ?>
            </div>
        </div>

        <div class="grid">
            <?php foreach ($produk as $item): ?>
                <?php 
                    // Logika diskon untuk harga di atas 1 juta
                    $dapat_diskon = false;
                    $harga_bayar = $item['harga'];

                    if ($item['harga'] >= 1000000) {
                        $dapat_diskon = true;
                        $harga_bayar = $item['harga'] - ($item['harga'] * 0.10);
                    }
                ?>
                <div class="card">
                    <img src="<?= $item['gambar']; ?>" alt="gambar produk">
                    <div class="card-body">
                        <span class="kat"><?= $item['kategori']; ?></span>
                        <h3><?= $item['nama']; ?></h3>

                        <div class="harga-area">
                            <?php if ($dapat_diskon): ?>
                                <span class="coret">Rp <?= number_format($item['harga'], 0, ',', '.'); ?></span>
                                <span class="diskon">10% OFF</span>
                                <div class="harga">Rp <?= number_format($harga_bayar, 0, ',', '.'); ?></div>
                            <?php else: ?>
                                <div class="harga">Rp <?= number_format($item['harga'], 0, ',', '.'); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="footer-card">
                            <?php if ($item['stok'] > 0): ?>
                                <span class="stok-ada">Tersedia (Stok: <?= $item['stok']; ?>)</span>
                                <button class="btn-beli">Beli Sekarang</button>
                            <?php else: ?>
                                <span class="stok-habis">Stok Habis</span>
                                <button class="btn-beli disabled" disabled>Beli Sekarang</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2026 Cia Store</p>
    </div>

</body>
</html>