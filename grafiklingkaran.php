<?php
// Mengambil tanggal dari database
$tanggal_query = mysql_query("SELECT tanggal FROM hasil WHERE id_hasil='1'");
$tanggal_data = mysql_fetch_assoc($tanggal_query);
$tanggal = $tanggal_data['tanggal'];
$tanggal_format = date("d-m-Y", strtotime($tanggal)); // Format tanggal dengan "hari bulan tahun"

// Inisialisasi array untuk menyimpan titik-titik data
$data_points = array();

// Inisialisasi array untuk menyimpan warna setiap data
$data_colors = array();

// Mengambil data dari database untuk ditampilkan pada grafik
$q = mysql_query("SELECT * FROM data1 ORDER BY id ASC");
while ($r = mysql_fetch_array($q)) {
    $data_point = array(
        'x' => $r['dm'],
        'y' => $r['dk'],
        'z' => $sub=$r['dm']-$r['dk']
    );

    $sub=$r['dm']-$r['dk'];
    session_start (); 
    $px1 = $_SESSION [ '$px1' ] ;
    $py1 = $_SESSION [ '$py1' ] ;
    $pz1 = $_SESSION [ '$pz1' ] ;
    $px2 = $_SESSION [ '$px2' ] ;
    $py2 = $_SESSION [ '$py2' ] ;
    $pz2 = $_SESSION [ '$pz2' ] ;
    $px3 = $_SESSION [ '$px3' ] ;
    $py3 = $_SESSION [ '$py3' ] ;
    $pz3 = $_SESSION [ '$pz3' ] ;
    $c1 = sqrt(pow(($r['dm'] - $px1), 2) + pow(($r['dk'] - $py1), 2) + pow(($sub - $pz1), 2));
    $c2 = sqrt(pow(($r['dm'] - $px2), 2) + pow(($r['dk'] - $py2), 2) + pow(($sub - $pz2), 2));
    $c3 = sqrt(pow(($r['dm'] - $px3), 2) + pow(($r['dk'] - $py3), 2) + pow(($sub - $pz3), 2));

    // Menentukan cluster untuk data
    $min = min($c1, $c2, $c3);
    
    // Menentukan cluster untuk data
    if ($min == $c1) {
        $color = 'red';
        $cluster_labels[] = 'C1'; // Label untuk Cluster 1
    } elseif ($min == $c2) {
        $color = 'blue'; // Ubah warna ke biru untuk Cluster 2
        $cluster_labels[] = 'C2'; // Label untuk Cluster 2
    } elseif ($min == $c3) {
        $color = 'green'; // Ubah warna ke hijau untuk Cluster 3
        $cluster_labels[] = 'C3'; // Label untuk Cluster 3
    } else {
        $color = 'gray'; // Warna default untuk data yang tidak termasuk dalam cluster
        $cluster_labels[] = 'None'; // Label untuk data yang tidak termasuk dalam cluster
    }

    // Menyimpan titik data ke dalam array
    $data_points[] = $data_point;

    // Menyimpan warna data ke dalam array
    $data_colors[] = $color;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Grafik Hasil Clustering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chart.js & Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #f8fafc, #eef2ff);
            color: #1f2937;
        }

        .span12 {
            max-width: 800px;
            margin: 2rem auto;
        }

        .widget {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            background: #ffffff;
            transition: all 0.3s ease;
        }

        .widget:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .widget-header {
            background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
            padding: 1.5rem 2rem;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .widget-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .widget-header:hover::before {
            left: 100%;
        }

        .widget-content {
            padding: 2rem;
        }

        h2 {
            text-align: center;
            font-weight: 700;
            color: #4a5568;
            display: block;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            letter-spacing: 0.3px;
        }

        .chart-container {
            padding: 1rem;
            background: linear-gradient(145deg, #f8fafc, #e2e8f0);
            border-radius: 12px;
            margin: 1rem 0;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        .btn-more {
            background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
            color: white;
            padding: 12px 24px;
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
            margin-top: 2rem;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-more::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-more:hover::before {
            left: 100%;
        }

        .btn-more:hover {
            background: linear-gradient(135deg, #7c3aed, #4f46e5, #0ea5e9);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
        }

        .back-btn {
            text-align: center;
        }

        /* Enhanced styles */
        .fas {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .span12 {
                margin: 1rem;
                max-width: none;
            }
            
            .widget-header {
                padding: 1rem 1.5rem;
                font-size: 1.1rem;
            }
            
            .widget-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header">
                <i class="fas fa-chart-pie"></i> Grafik Hasil Clustering
            </div>
            <div class="widget-content">
                <h2>Tanggal Proses: <?= $tanggal_format ?></h2>
                <div class="chart-container">
                    <canvas id="clusteringChart"></canvas>
                </div>
                <div class="back-btn">
                    <a href="?module=data" class="btn-more"><i class="fas fa-arrow-left"></i> Kembali ke Data</a>
                </div>
            </div>
        </div>
    </div>
     <script>
        const labels = <?= json_encode(array_unique($cluster_labels)) ?>;
        const dataColors = <?= json_encode($data_colors) ?>;
        const clusterLabels = <?= json_encode($cluster_labels) ?>;

        const counts = {};
        clusterLabels.forEach(label => {
            counts[label] = (counts[label] || 0) + 1;
        });

        const chartLabels = Object.keys(counts);
        const chartData = Object.values(counts);
        const backgroundColor = chartLabels.map(label => {
            if (label === 'C1') return '#ef4444';
            if (label === 'C2') return '#3b82f6';
            if (label === 'C3') return '#10b981';
            return '#6b7280';
        });

        const ctx = document.getElementById('clusteringChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: chartLabels.map((label, index) => {
                    const total = chartData.reduce((a, b) => a + b, 0);
                    const count = chartData[index];
                    const percent = Math.round((count / total) * 100);
                    return `${label} - ${count} data (${percent}%)`;
                }),
                datasets: [{
                    data: chartData,
                    backgroundColor: backgroundColor,
                    borderColor: '#ffffff',
                    borderWidth: 3,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            padding: 20,
                            usePointStyle: true
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            size: 14,
                            weight: 'bold'
                        },
                        formatter: (value, context) => {
                            const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            return Math.round((value / total) * 100) + '%';
                        },
                        textStrokeColor: 'rgba(0,0,0,0.5)',
                        textStrokeWidth: 1
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#fff',
                        borderWidth: 1,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                const value = context.raw;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percent = Math.round((value / total) * 100);
                                return `${context.label} (${percent}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 1500
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>
</body>
</html>