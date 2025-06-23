<?php 
session_start();
include "koneksi.php";
error_reporting(0);

if (!empty($_SESSION["useradmin"]) && !empty($_SESSION["passadmin"])) {
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mining K-Means Clustering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #2563eb;
            --secondary-blue: #3b82f6;
            --accent-blue: #1d4ed8;
            --light-blue: #eff6ff;
            --dark-blue: #1e40af;
            --pure-white: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --hover-bg: #f8fafc;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--pure-white);
            color: var(--text-primary);
            line-height: 1.6;
            font-weight: 400;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* NAVBAR */
        .container2 {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 50%, var(--accent-blue) 100%);
            padding: 1.25rem 0;
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        #menu {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            padding: 0 2rem;
        }

        #menu li {
            position: relative;
        }

        #menu li a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            color: var(--pure-white);
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            padding: 0.75rem 1.25rem;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        #menu li a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        #menu li a:hover::before {
            left: 100%;
        }

        #menu li a:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.15));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        #menu li a i {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* CONTENT */
        .container5 {
            padding: 3rem 1rem;
            max-width: 95%;
            width: 100%;
            margin: 0 auto;
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .grid {
            background: var(--pure-white);
            padding: 3rem;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .grid::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--secondary-blue), var(--accent-blue));
        }

        /* TABLE STYLES */
        .table-container {
            overflow-x: auto;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-top: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--pure-white);
        }

        thead {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        thead th {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-primary);
            text-transform: uppercase;
            letter-spacing: 0.025em;
            padding: 1.25rem 1rem;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        tbody td {
            padding: 1rem;
            font-size: 0.9rem;
            color: var(--text-primary);
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        tbody tr {
            transition: all 0.2s ease;
            position: relative;
        }

        tbody tr:hover {
            background: linear-gradient(135deg, var(--hover-bg) 0%, #f9fafb 100%);
            transform: translateX(2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        tbody tr:hover td {
            color: var(--text-primary);
        }

        /* CUSTOM SCROLLBAR */
        .table-container::-webkit-scrollbar {
            height: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: var(--radius-sm);
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, var(--primary-blue), var(--secondary-blue));
            border-radius: var(--radius-sm);
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, var(--accent-blue), var(--primary-blue));
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
            border-top: 1px solid var(--border-color);
            background: linear-gradient(135deg, #fafbfc 0%, var(--pure-white) 100%);
            margin-top: 4rem;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 1024px) {
            .container5 {
                padding: 2rem 0.75rem;
                max-width: 98%;
            }

            .grid {
                padding: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            #menu {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                padding: 0 1rem;
            }

            #menu li a {
                padding: 0.875rem 1.5rem;
                font-size: 0.9rem;
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }

            .container5 {
                padding: 1.5rem 0.5rem;
                max-width: 99%;
            }

            .grid {
                padding: 2rem;
                border-radius: var(--radius-md);
            }

            /* Mobile Table Styles */
            .table-container {
                border: none;
                border-radius: 0;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tbody tr {
                background: var(--pure-white);
                border: 1px solid var(--border-color);
                border-radius: var(--radius-md);
                margin-bottom: 1rem;
                padding: 1rem;
                box-shadow: var(--shadow-sm);
            }

            tbody tr:hover {
                transform: none;
                box-shadow: var(--shadow-md);
            }

            tbody td {
                padding: 0.75rem 0;
                padding-left: 40%;
                position: relative;
                border-bottom: 1px solid #f3f4f6;
                font-size: 0.875rem;
            }

            tbody td:last-child {
                border-bottom: none;
            }

            tbody td::before {
                content: attr(data-label);
                position: absolute;
                top: 0.75rem;
                left: 0;
                width: 35%;
                padding-right: 1rem;
                white-space: nowrap;
                font-weight: 600;
                color: var(--text-secondary);
                font-size: 0.8rem;
                text-transform: uppercase;
                letter-spacing: 0.025em;
            }
        }

        @media (max-width: 480px) {
            .container2 {
                padding: 1rem 0;
            }

            #menu li a {
                padding: 1rem 1.25rem;
                font-size: 0.85rem;
            }

            .container5 {
                padding: 1rem 0.25rem;
                max-width: 100%;
            }

            .grid {
                padding: 1.5rem;
            }

            tbody td {
                padding-left: 45%;
            }

            tbody td::before {
                width: 40%;
            }
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* LOADING STATES */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        /* FOCUS STYLES */
        #menu li a:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        /* PRINT STYLES */
        @media print {
            .container2,
            footer {
                display: none;
            }

            .container5 {
                padding: 0;
            }

            .grid {
                box-shadow: none;
                border: 1px solid #000;
            }

            tbody tr:hover {
                background: transparent;
                transform: none;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="container2">
        <ul id="menu">
            <li><a href="?module=data"><i class="fas fa-database"></i> Data</a></li>
            <li><a href="?module=data_proses"><i class="fas fa-cogs"></i> Proses Clustering</a></li>
            <li><a href="?module=hasil"><i class="fas fa-check-circle"></i> Hasil Clustering</a></li>
            <li><a href="?module=grafiklingkaran"><i class="fas fa-chart-pie"></i> Grafik Hasil Clustering</a></li>
            <li><a href="?module=laporan"><i class="fas fa-file-alt"></i> Laporan</a></li>
            <li><a href="?module=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="container5">
        <div class="grid">
            <?php include "content.php"; ?>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        &copy; <?= date("Y") ?> Dimas Xcode. All rights reserved.
    </footer>

    <!-- JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>
</html>

<?php
} else {
    include "login.php";
}
?>