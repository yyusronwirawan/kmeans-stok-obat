<?php
session_start();
?>
<div class="container">
    <style>
        .card-header {
            background: linear-gradient(90deg, #6366f1, #3b82f6, #0ea5e9);
            color: white !important;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 1rem 2rem;
            border-radius: 18px 18px 0 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .card-body {
            background: white;
            padding: 2rem;
            border-radius: 0 0 18px 18px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }

        .btn-more {
            background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
            color: white;
            padding: 10px 20px;
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-more:hover {
            background: linear-gradient(135deg, #7c3aed, #4f46e5, #0ea5e9);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .table-hover tbody tr:hover td {
            background: #f9fafb;
            transition: all 0.2s ease-in-out;
        }

        .badge-cluster {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 60px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .badge-cluster.C1 {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
        }

        .badge-cluster.C2 {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .badge-cluster.C3 {
            background: linear-gradient(135deg, #f97316, #f59e0b);
        }

        .iteration-title {
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-left: 4px solid #3b82f6;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #1e293b;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .iteration-title:first-of-type {
            margin-top: 1rem;
        }

        /* Alert styles for convergence message */
        .alert {
            padding: 1rem 1.5rem;
            margin: 2rem 0;
            border-radius: 12px;
            font-weight: 500;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        /* Premium card for clustering results with blue gradient */
        .premium-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .premium-card:hover {
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .premium-card-header {
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 50%, #1e40af 100%);
            color: white;
            padding: 1.5rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
        }

        .premium-card-body {
            padding: 1.5rem 2rem;
        }

        @media (max-width: 768px) {
            .card-header {
                font-size: 1.1rem;
                padding: 1rem 1.2rem;
            }

            .btn-more {
                font-size: 0.95rem;
                padding: 8px 16px;
            }

            .table th, .table td {
                font-size: 0.85rem;
                padding: 0.75rem;
            }

            .iteration-title {
                font-size: 1.2rem;
                margin-top: 1.5rem;
                margin-bottom: 1rem;
                padding: 0.8rem;
            }

            .alert {
                padding: 0.8rem 1rem;
                margin: 1.5rem 0;
            }
        }
    </style>

    <div class="span12">
        <div class="widget widget-nopad">
            <?php
            switch(@$_GET['act']){
                default:
            ?>
            <div class="widget-header"> 
                <i class="icon-list-alt"></i>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <i class="fas fa-table"></i> Hasil Clustering
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        <a href="cetak.php" target="_blank" class="btn-more">
                            <i class="fas fa-print"></i> Cetak
                        </a>
                    </div>
                    
                    <?php
                    // Mengambil data pusat cluster dari database
                    $sql_edit = mysql_query("SELECT * FROM hasil WHERE id_hasil='1'");
                    $row = mysql_fetch_array($sql_edit);
                    
                    if ($row) {
                        $px1 = $row['c1'];
                        $py1 = $row['c2'];
                        $pz1 = $row['c3'];
                        $c1hari = $row['c1hari'];
                        $c1stokdefault = $row['c1stokdefault'];
                        $px2 = $row['c1y'];
                        $py2 = $row['c2y'];
                        $pz2 = $row['c3y'];
                        $c2hari = $row['c2hari'];
                        $c2stokdefault = $row['c2stokdefault'];
                        $px3 = $row['c1z'];
                        $py3 = $row['c2z'];
                        $pz3 = $row['c3z'];
                        $c3hari = $row['c3hari'];
                        $c3stokdefault = $row['c3stokdefault'];
                        
                        // Inisialisasi iterasi
                        $it = 1;
                        
                        // Perulangan clustering
                        while(true) {
                            // Menampilkan hasil clustering
                            echo "<div class='iteration-title'>Iterasi $it</div>";
                            echo '<div class="premium-card">
                                    <div class="premium-card-header">
                                        <i class="fas fa-chart-scatter"></i> Pusat Cluster
                                    </div>
                                    <div class="premium-card-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Pusat Cluster</th>
                                                    <th colspan="5"><center>Titik Cluster</center></th>
                                                </tr>
                                                <tr>
                                                    <th>Barang Masuk</th>
                                                    <th>Barang Keluar</th>
                                                    <th>Stok</th>
                                                    <th>Hari</th>
                                                    <th>Stok Default</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                            
                            echo "<tr>
                                    <td>Cluster 1</td>
                                    <td>" . number_format($px1, 2) . "</td>
                                    <td>" . number_format($py1, 2) . "</td>
                                    <td>" . number_format($pz1, 2) . "</td>
                                    <td>" . number_format($c1hari, 2) . "</td>
                                    <td>" . number_format($c1stokdefault, 2) . "</td>
                                  </tr>";
                            
                            echo "<tr>
                                    <td>Cluster 2</td>
                                    <td>" . number_format($px2, 2) . "</td>
                                    <td>" . number_format($py2, 2) . "</td>
                                    <td>" . number_format($pz2, 2) . "</td>
                                    <td>" . number_format($c2hari, 2) . "</td>
                                    <td>" . number_format($c2stokdefault, 2) . "</td>
                                  </tr>";
                            
                            echo "<tr>
                                    <td>Cluster 3</td>
                                    <td>" . number_format($px3, 2) . "</td>
                                    <td>" . number_format($py3, 2) . "</td>
                                    <td>" . number_format($pz3, 2) . "</td>
                                    <td>" . number_format($c3hari, 2) . "</td>
                                    <td>" . number_format($c3stokdefault, 2) . "</td>
                                  </tr>";
                            
                            echo '</tbody>
                                        </table>
                                    </div>
                                </div>';
                            
                            echo '<div class="premium-card">
                                    <div class="premium-card-header">
                                        <i class="fas fa-database"></i> Data Clustering dan Hasil
                                    </div>
                                    <div class="premium-card-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Nama Barang</th>
                                                    <th colspan="5"><center>Data Persediaan Barang</center></th>
                                                    <th rowspan="2">C1</th>
                                                    <th rowspan="2">C2</th>
                                                    <th rowspan="2">C3</th>
                                                    <th rowspan="2">Hasil</th>
                                                </tr>
                                                <tr>
                                                    <th>Barang Masuk</th>
                                                    <th>Barang Keluar</th>
                                                    <th>Stok</th>
                                                    <th>Hari</th>
                                                    <th>Stok Default</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                            
                            // Pengambilan data dari database
                            $no = 1;
                            $q = mysql_query("SELECT * FROM data1 ORDER BY id ASC");
                            
                            // Inisialisasi variabel untuk mengecek perubahan pusat cluster
                            $changed = false;
                            
                            // Inisialisasi variabel untuk menyimpan data baru yang dikelompokkan ke setiap cluster
                            $agtc1x = []; $agtc1y = []; $agtc1z = []; $agtc1hari = []; $agtc1stokdefault = [];
                            $agtc2x = []; $agtc2y = []; $agtc2z = []; $agtc2hari = []; $agtc2stokdefault = [];
                            $agtc3x = []; $agtc3y = []; $agtc3z = []; $agtc3hari = []; $agtc3stokdefault = [];
                            
                            while($r = mysql_fetch_array($q)){
                                $min = 0;
                                $sub = $r['dm'] - $r['dk'];
                                echo "<tr>
                                        <td>$no</td>
                                        <td>$r[nmb]</td>
                                        <td>$r[dm]</td>
                                        <td>$r[dk]</td>
                                        <td>$sub</td>
                                        <td>$r[hari]</td>
                                        <td>$r[stokdefault]</td>";
                                
                                // Menghitung jarak ke masing-masing pusat cluster
                                $c1 = sqrt((pow(($r['dm'] - $px1), 2)) + (pow(($r['dk'] - $py1), 2)) + (pow(($sub - $pz1), 2)) + (pow(($r['hari'] - $c1hari), 2)) + (pow(($r['stokdefault'] - $c1stokdefault), 2)));
                                $c2 = sqrt((pow(($r['dm'] - $px2), 2)) + (pow(($r['dk'] - $py2), 2)) + (pow(($sub - $pz2), 2)) + (pow(($r['hari'] - $c2hari), 2)) + (pow(($r['stokdefault'] - $c2stokdefault), 2)));
                                $c3 = sqrt((pow(($r['dm'] - $px3), 2)) + (pow(($r['dk'] - $py3), 2)) + (pow(($sub - $pz3), 2)) + (pow(($r['hari'] - $c3hari), 2)) + (pow(($r['stokdefault'] - $c3stokdefault), 2)));
                                
                                // Menentukan cluster untuk data
                                $min = min($c1, $c2, $c3);
                                if($min == $c1){
                                    $ketmin = "C1";
                                    $agtc1x[] = $r['dm']; $agtc1y[] = $r['dk']; $agtc1z[] = $sub;
                                    $agtc1hari[] = $r['hari']; $agtc1stokdefault[] = $r['stokdefault'];
                                } elseif($min == $c2){
                                    $ketmin = "C2";                    
                                    $agtc2x[] = $r['dm']; $agtc2y[] = $r['dk']; $agtc2z[] = $sub;
                                    $agtc2hari[] = $r['hari']; $agtc2stokdefault[] = $r['stokdefault'];
                                } elseif($min == $c3){
                                    $ketmin = "C3";                    
                                    $agtc3x[] = $r['dm']; $agtc3y[] = $r['dk']; $agtc3z[] = $sub;
                                    $agtc3hari[] = $r['hari']; $agtc3stokdefault[] = $r['stokdefault'];
                                }
                                
                                echo "<td>" . number_format($c1, 2) . "</td>
                                      <td>" . number_format($c2, 2) . "</td>
                                      <td>" . number_format($c3, 2) . "</td>
                                      <td><span class='badge-cluster $ketmin'>$ketmin</span></td>
                                    </tr>";
                                $no++;
                            }
                            
                            echo '</tbody>
                                        </table>
                                    </div>
                                </div>';
                            
                            // Menghitung pusat cluster baru
                            $pxx1 = (count($agtc1x) > 0) ? array_sum($agtc1x) / count($agtc1x) : 0;
                            $pyy1 = (count($agtc1y) > 0) ? array_sum($agtc1y) / count($agtc1y) : 0;
                            $pzz1 = (count($agtc1z) > 0) ? array_sum($agtc1z) / count($agtc1z) : 0;
                            $pzz1hari = (count($agtc1hari) > 0) ? array_sum($agtc1hari) / count($agtc1hari) : 0;
                            $pzz1stokdefault = (count($agtc1stokdefault) > 0) ? array_sum($agtc1stokdefault) / count($agtc1stokdefault) : 0;

                            $pxx2 = (count($agtc2x) > 0) ? array_sum($agtc2x) / count($agtc2x) : 0;
                            $pyy2 = (count($agtc2y) > 0) ? array_sum($agtc2y) / count($agtc2y) : 0;
                            $pzz2 = (count($agtc2z) > 0) ? array_sum($agtc2z) / count($agtc2z) : 0;
                            $pzz2hari = (count($agtc2hari) > 0) ? array_sum($agtc2hari) / count($agtc2hari) : 0;
                            $pzz2stokdefault = (count($agtc2stokdefault) > 0) ? array_sum($agtc2stokdefault) / count($agtc2stokdefault) : 0;
                            
                            $pxx3 = (count($agtc3x) > 0) ? array_sum($agtc3x) / count($agtc3x) : 0;
                            $pyy3 = (count($agtc3y) > 0) ? array_sum($agtc3y) / count($agtc3y) : 0;
                            $pzz3 = (count($agtc3z) > 0) ? array_sum($agtc3z) / count($agtc3z) : 0;
                            $pzz3hari = (count($agtc3hari) > 0) ? array_sum($agtc3hari) / count($agtc3hari) : 0;
                            $pzz3stokdefault = (count($agtc3stokdefault) > 0) ? array_sum($agtc3stokdefault) / count($agtc3stokdefault) : 0;
                            
                            // Mengecek apakah pusat cluster berubah
                            if ($px1 != $pxx1 || $py1 != $pyy1 || $pz1 != $pzz1 || $c1hari != $pzz1hari || $c1stokdefault != $pzz1stokdefault ||
                                $px2 != $pxx2 || $py2 != $pyy2 || $pz2 != $pzz2 || $c2hari != $pzz2hari || $c2stokdefault != $pzz2stokdefault ||
                                $px3 != $pxx3 || $py3 != $pyy3 || $pz3 != $pzz3 || $c3hari != $pzz3hari || $c3stokdefault != $pzz3stokdefault ) {
                                $changed = true;
                                // Memperbarui pusat cluster
                                $px1 = $pxx1; $py1 = $pyy1; $pz1 = $pzz1;
                                $c1hari = $pzz1hari; $c1stokdefault = $pzz1stokdefault;
                                $px2 = $pxx2; $py2 = $pyy2; $pz2 = $pzz2;
                                $c2hari = $pzz2hari; $c2stokdefault = $pzz2stokdefault;
                                $px3 = $pxx3; $py3 = $pyy3; $pz3 = $pzz3;
                                $c3hari = $pzz3hari; $c3stokdefault = $pzz3stokdefault;
                            }
                            
                            // Mengakhiri perulangan jika tidak ada perubahan pada pusat cluster
                            if (!$changed) {
                                echo "<div class='alert alert-success'>
                                        <i class='fas fa-check-circle'></i> 
                                        <strong>Konvergensi tercapai pada iterasi ke-$it!</strong> 
                                        Algoritma K-Means Clustering telah menemukan hasil yang optimal.
                                      </div>";
                                break;
                            }
                            
                            $it++;
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                                <i class='fas fa-times-circle'></i> 
                                <strong>Data pusat cluster tidak ditemukan!</strong> 
                                Pastikan data awal cluster sudah tersimpan di database.
                              </div>";
                    }
                    ?>	
                </div>
            </div>
            <?php
            break;
            }
            ?>
        </div>
    </div>
</div>

<?php
// Menyimpan hasil akhir ke session sesuai struktur kode referensi
$_SESSION['$px1'] = $px1;
$_SESSION['$py1'] = $py1;
$_SESSION['$pz1'] = $pz1;
$_SESSION['$c1hari'] = $c1hari;
$_SESSION['$c1stokdefault'] = $c1stokdefault;
$_SESSION['$px2'] = $px2;
$_SESSION['$py2'] = $py2;
$_SESSION['$pz2'] = $pz2;
$_SESSION['$c2hari'] = $c2hari;
$_SESSION['$c2stokdefault'] = $c2stokdefault;
$_SESSION['$px3'] = $px3;
$_SESSION['$py3'] = $py3;
$_SESSION['$pz3'] = $pz3;
$_SESSION['$c3hari'] = $c3hari;
$_SESSION['$c3stokdefault'] = $c3stokdefault;
?>