<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CafeKita')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7f5;
            color: #202923;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            padding: 25px 18px;
            overflow-y: auto;
            background: linear-gradient(160deg, #1f3929, #304e3a);
            color: #fff;
            z-index: 1000;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.12);
            color: #d9b56d;
            font-size: 24px;
        }

        .brand-text h4 {
            margin: 0;
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .brand-text h4 span {
            color: #d9b56d;
        }

        .brand-text small {
            color: rgba(255, 255, 255, 0.58);
            font-size: 11px;
        }

        .menu-title {
            margin: 12px 0 10px;
            padding: 0 12px;
            color: rgba(255, 255, 255, 0.42);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-menu a,
        .logout-menu button {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            border: 0;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            font-weight: 500;
            text-align: left;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar-menu a i,
        .logout-menu button i {
            width: 20px;
            font-size: 17px;
            text-align: center;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.09);
            color: #fff;
            transform: translateX(2px);
        }

        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.13);
            box-shadow: inset 3px 0 0 #d9b56d;
            color: #fff;
        }

        .sidebar-menu a.active i {
            color: #d9b56d;
        }

        .logout-menu {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.10);
        }

        .logout-menu button {
            width: 100%;
            background: transparent;
            cursor: pointer;
        }

        .logout-menu button:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #ffb0b0;
        }

        .main-content {
            min-height: 100vh;
            margin-left: 260px;
            padding: 25px 32px 35px;
        }

        .topbar {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }

        .page-title h1 {
            margin: 0;
            color: #202923;
            font-size: 27px;
            font-weight: 750;
            letter-spacing: -0.5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px 8px 8px;
            border: 1px solid #e7ebe7;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(35, 54, 41, 0.04);
        }

        .user-avatar {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #e7eee9;
            color: #304e3a;
            font-size: 19px;
        }

        .user-info {
            line-height: 1.25;
        }

        .user-info strong {
            display: block;
            color: #29332d;
            font-size: 13px;
        }

        .user-info span {
            display: inline-block;
            margin-top: 3px;
            padding: 3px 8px;
            border-radius: 20px;
            background: #edf3ee;
            color: #466b52;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .main-card {
            border: 1px solid #eef2f0;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .btn-cafekita {
            background: #1f3929;
            color: #fff;
        }

        .btn-cafekita:hover {
            background: #304e3a;
            color: #fff;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding: 22px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                border-radius: 0 0 20px 20px;
            }

            .sidebar-brand {
                padding-bottom: 20px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .user-profile {
                width: 100%;
            }
        }
    </style>
</head>
<body class="app-with-sidebar">
    @include('layouts.sidebar')

    <main class="main-content">
        <header class="topbar">
            <div class="page-title">
                <h1>@yield('page-title', trim($__env->yieldContent('title', 'CafeKita')))</h1>
            </div>

            <div class="user-profile">
                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="user-info">
                    <strong>{{ auth()->user()->nama }}</strong>
                    <span>{{ str_replace('_', ' ', auth()->user()->role) }}</span>
                </div>
            </div>
        </header>

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>