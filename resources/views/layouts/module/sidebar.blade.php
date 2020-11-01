<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="nav-title">MANAJEMEN TRANSAKSI</li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.success') }}">
                <i class="nav-icon icon-puzzle"></i>Transaksi Berhasil  ({{ (App\Transaction::where('status','SUCCESS')->count()) }})
            </a>
            <a class="nav-link" href="{{ route('transaction.cancels') }}">
                <i class="nav-icon icon-puzzle"></i> Transaksi Batal ({{ (App\Transaction::where('status','CANCEL')->count()) }})
            </a>
            <a class="nav-link" href="{{ route('transaction.waiting') }}">
                <i class="nav-icon icon-puzzle"></i> Menunggu Dikirim ({{ (App\Transaction::where('status','CONFIRMED')->count()) }})
            </a>
            <a class="nav-link" href="{{ route('transaction.index') }}">
                <i class="nav-icon icon-puzzle"></i> Konfirmasi({{ (App\Transaction::where('status','PAID')->count()) }})
            </a>
            <a class="nav-link" href="{{ route('transaction.return') }}">
                <i class="nav-icon icon-puzzle"></i> Barang Return ({{ (App\Transaction::where('status','RETURN')->count()) }})
            </a>
        </li>
        <li class="nav-title">MANAJEMEN USER</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="nav-icon icon-puzzle"></i> Admin
            </a>
            <a class="nav-link" href="{{ route('customer.index') }}">
                <i class="nav-icon icon-puzzle"></i> Pelanggan
            </a>
        </li>
        <li class="nav-title">MANAJEMEN PRODUK</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="nav-icon icon-puzzle"></i> Kategori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}">
                <i class="nav-icon icon-puzzle"></i> Produk
            </a>
        </li>
        <li class="nav-title">MANAJEMEN KOTA</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('city.index') }}">
                <i class="nav-icon icon-puzzle"></i> Kota
            </a>
        </li>
        <li class="nav-title">MANAJEMEN LAPORAN</li>

        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-list"></i> Laporan
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Transaksi
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Keuangan
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Pengiriman
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Penjualan
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Supplier
                    </a>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Pelanggan
                    </a>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Stok
                    </a>
                    </a>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-report"></i> Laporan Barang
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Pengaturan
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-puzzle"></i> Toko
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>