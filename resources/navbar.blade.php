<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar CafeKita</title>
  
  <!-- Font Google (Plus Jakarta Sans / Inter) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
      background-color: #f7f9f6;
      display: flex;
      min-height: 100vh;
    }

    /* ================= SIDEBAR ================= */
    .sidebar {
      width: 250px;
      background-color: #264a38; /* Warna hijau gelap khas CafeKita */
      color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 24px 16px;
      min-height: 100vh;
    }

    /* Logo Brand */
    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 0 10px 24px 10px;
    }

    .brand-icon {
      width: 44px;
      height: 44px;
      background-color: #38604b;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #e5b364; /* Aksen krem/emas */
    }

    .brand-text h2 {
      font-size: 1.15rem;
      font-weight: 700;
      line-height: 1.2;
      color: #ffffff;
    }

    .brand-text span {
      font-size: 0.72rem;
      color: #9cb5a5;
    }

    /* Menu Navigation */
    .menu-group {
      margin-top: 10px;
    }

    .menu-title {
      font-size: 0.68rem;
      font-weight: 700;
      color: #8da997;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      padding: 0 12px;
      margin-bottom: 12px;
    }

    .nav-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 14px;
      border-radius: 10px;
      text-decoration: none;
      color: #b7cebf;
      font-size: 0.88rem;
      font-weight: 500;
      transition: all 0.2s ease;
    }

    .nav-link svg {
      width: 18px;
      height: 18px;
      stroke-width: 2;
    }

    .nav-link:hover {
      background-color: #315843;
      color: #ffffff;
    }

    /* Menu Aktif */
    .nav-link.active {
      background-color: #355d47;
      color: #ffffff;
      font-weight: 600;
      border-left: 3px solid #d4a359; /* Aksen garis kiri */
    }

    .nav-link.active svg {
      color: #d4a359;
    }

    /* Tombol Keluar (Bottom) */
    .sidebar-footer {
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      padding-top: 14px;
    }

    .nav-link.logout {
      color: #c4d7cc;
    }

    .nav-link.logout:hover {
      background-color: rgba(220, 53, 69, 0.15);
      color: #ff9d9d;
    }

    /* ================= TOPBAR (Kanan Atas) ================= */
    .main-content {
      flex: 1;
      padding: 24px 32px;
    }

    .top-header {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin-bottom: 24px;
    }

    .user-profile-badge {
      display: flex;
      align-items: center;
      gap: 12px;
      background: #ffffff;
      padding: 6px 14px;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      border: 1px solid #eef1ed;
    }

    .avatar-icon {
      width: 32px;
      height: 32px;
      background-color: #eef3ee;
      color: #2b503c;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .user-info {
      display: flex;
      flex-direction: column;
    }

    .user-info .name {
      font-size: 0.8rem;
      font-weight: 700;
      color: #1e293b;
    }

    .user-info .role-badge {
      font-size: 0.65rem;
      font-weight: 700;
      color: #64748b;
      letter-spacing: 0.5px;
    }
  </style>
</head>
<body>

  <!-- ================= SIDEBAR ================= -->
  <aside class="sidebar">
    <div>
      <!-- Brand / Logo -->
      <div class="sidebar-brand">
        <div class="brand-icon">
          <!-- Icon Cangkir Kopi -->
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 8h1a4 4 0 1 1 0 8h-1"></path>
            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"></path>
            <line x1="6" y1="2" x2="6" y2="4"></line>
            <line x1="10" y1="2" x2="10" y2="4"></line>
            <line x1="14" y1="2" x2="14" y2="4"></line>
          </svg>
        </div>
        <div class="brand-text">
          <h2>CafeKita</h2>
          <span>Sistem Informasi Cafe</span>
        </div>
      </div>

      <!-- Menu Utama -->
      <div class="menu-group">
        <div class="menu-title">Menu Utama</div>
        <ul class="nav-list">
          <li>
            <a href="#" class="nav-link active">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                <rect width="7" height="5" x="3" y="16" rx="1"></rect>
              </svg>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                <path d="M3 9h18"></path>
                <path d="M9 21V9"></path>
              </svg>
              <span>Data Meja</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                <path d="M6 6h10"></path>
                <path d="M6 10h10"></path>
              </svg>
              <span>Data Menu</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                <rect x="8" y="2" width="8" height="4" rx="1"></rect>
              </svg>
              <span>Pemesanan</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                <line x1="16" x2="16" y1="2" y2="6"></line>
                <line x1="8" x2="8" y1="2" y2="6"></line>
                <line x1="3" x2="21" y1="10" y2="10"></line>
              </svg>
              <span>Reservasi</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Menu Keluar -->
    <div class="sidebar-footer">
      <a href="#" class="nav-link logout">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
          <polyline points="16 17 21 12 16 7"></polyline>
          <line x1="21" x2="9" y1="12" y2="12"></line>
        </svg>
        <span>Keluar</span>
      </a>
    </div>
  </aside>

  <!-- ================= KONTEN & TOPBAR ================= -->
  <main class="main-content">
    <header class="top-header">
      <div class="user-profile-badge">
        <div class="avatar-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <div class="user-info">
          <span class="name">Kasir CafeKita</span>
          <span class="role-badge">KASIR</span>
        </div>
      </div>
    </header>

    <!-- Konten halaman lainnya masuk di sini -->
  </main>

</body>
</html>