<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePuteri - Sistem Pengundian</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', Verdana, sans-serif;
            overflow: hidden; /* Prevents whole-page scroll, keeps it app-like */
        }
        
        .layout-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .top-header {
            height: 10%;
            min-height: 80px;
            background-color: #5a1730; /* Your header background */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 10;
        }

        .content-area {
            display: flex;
            flex: 1; /* Takes up remaining height */
            height: 90%;
        }

        .sidebar-menu {
            width: 24%;
            min-width: 250px;
            background-color: #f8dfe4;
            border-right: 2px solid #e9bcc6;
            overflow-y: auto; /* Scrollable menu if it gets too long */
        }

        .main-content {
            flex: 1; /* Takes up remaining width */
            width: 76%;
            overflow-y: auto; /* Scrollable main content */
            position: relative;
        }

        /* Modern Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ff99cc; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #ff3c86; }
    </style>
</head>
<body>

    <div class="layout-container">
        <div class="top-header">
            <iframe src="header.php" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
        </div>

        <div class="content-area">
            
            <div class="sidebar-menu">
                <iframe src="menuUtama.php" name="menu" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>
            </div>

            <div class="main-content">
                <iframe src="utama.php" name="main" width="100%" height="100%" frameborder="0" scrolling="yes"></iframe>
            </div>

        </div>
    </div>

</body>
</html>