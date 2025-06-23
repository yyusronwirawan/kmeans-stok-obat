<?php
switch(@$_GET['act']){
default:
?>
<!-- Halaman Data -->
<div class="span12">
    <div class="widget widget-nopad">
        <style>
            .widget-header {
                background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
                padding: 1rem;
                color: white;
                font-size: 1.2rem;
                font-weight: bold;
                border-radius: 8px 8px 0 0;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            }
            .widget-content {
                background: #ffffff;
                padding: 2rem;
                border-radius: 0 0 8px 8px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.05);
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
                display: inline-block;
                margin-bottom: 20px;
            }
            .btn-more:hover {
                background: linear-gradient(135deg, #7c3aed, #4f46e5, #0ea5e9);
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                transform: translateY(-2px);
            }
            table {
                width: 100%;
                border-collapse: collapse;
                background-color: white;
                border-radius: 10px;
                overflow: hidden;
            }
            th, td {
                padding: 1rem;
                border-bottom: 1px solid #e5e7eb;
                text-align: left;
            }
            th {
                background-color: #f3f4f6;
                font-weight: 600;
                color: #374151;
            }
            tr:hover {
                background-color: #f9fafb;
            }
        </style>

        <div class="widget-header"><i class="fas fa-warehouse"></i> Data Persediaan Barang</div>
        <div class="widget-content">
            <a href="?module=data&act=import" class="btn-more"><i class="fas fa-upload"></i> Import Excel</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Barang Masuk</th>
                        <th>Barang Keluar</th>
                        <th>Stok</th>
                        <th>Tanggal Rekapan</th>
                        <th>Tanggal Kadaluwarsa</th>
                        <th>Stok Default</th>
                        <th>Hari Menuju Kadaluwarsa</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                $q = mysql_query("SELECT * FROM data1 ORDER BY id ASC");
                while($r = mysql_fetch_array($q)){
                    $sub = $r['dm'] - $r['dk'];
                    echo "<tr>
                            <td>$no</td>
                            <td>$r[nmb]</td>
                            <td>$r[dm]</td>
                            <td>$r[dk]</td>
                            <td>$sub</td>
                            <td>$r[tgl]</td>
                            <td>$r[tglkadaluwarsa]</td>
                            <td>$r[stokdefault]</td>
                            <td>$r[hari]</td>
                          </tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
break;

case "import":
// Fungsi untuk memeriksa format tanggal
function isValidDate($date) {
    if (empty($date)) return false;
    $dateObject = DateTime::createFromFormat('Y-m-d', $date);
    return $dateObject !== false && $dateObject->format('Y-m-d') === $date;
}

if(isset($_POST["import"])){
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors', 0);

    require 'excelReader/excel_reader2.php';
    require 'excelReader/SpreadsheetReader.php';

    $reader = new SpreadsheetReader($targetDirectory);
    $isFirstRow = true;
    $rows = [];
    $errors = [];

    // Membaca data dari file excel
    foreach($reader as $key => $row){
        if ($isFirstRow) {
            $isFirstRow = false;
            continue; // Lewati baris pertama (header)
        }
        $rows[] = $row;
    }

    // Mengisi data kosong dengan data dari baris berikutnya
    $rowCount = count($rows);
    for ($i = 0; $i < $rowCount; $i++) {
        if (empty($rows[$i][0]) || empty($rows[$i][1]) || empty($rows[$i][2]) || empty($rows[$i][4]) || empty($rows[$i][5]) || empty($rows[$i][6])) {
            // Temukan baris berikutnya yang tidak kosong
            for ($j = $i + 1; $j < $rowCount; $j++) {
                if (!empty($rows[$j][0]) && !empty($rows[$j][1]) && !empty($rows[$j][2]) && !empty($rows[$j][4]) && !empty($rows[$j][5]) && !empty($rows[$j][6])) {
                    // Isi data kosong dengan data dari baris berikutnya
                    $rows[$i] = $rows[$j];
                    // Hapus baris yang diganti
                    array_splice($rows, $j, 1);
                    $rowCount = count($rows); // Update rowCount setelah splice
                    break;
                }
            }
        }
    }

    // Cek duplikasi data
    $checkedDuplicates = []; // Array untuk menyimpan kombinasi duplikat yang telah dicek
    for ($i = 0; $i < $rowCount; $i++) {
        for ($j = $i + 1; $j < $rowCount; $j++) {
            if ($rows[$i] === $rows[$j]) {
                $key = implode('-', $rows[$i]); // Menggabungkan semua elemen baris menjadi satu string sebagai kunci
                if (!isset($checkedDuplicates[$key])) {
                    $errors[] = "Duplikat ditemukan pada baris ke-" . ($i + 2) . " dan ke-" . ($j + 2) . " dengan data: '" . implode(', ', $rows[$i]) . "'.";
                    $checkedDuplicates[$key] = true;
                }
            }
        }
    }

    // Cek apakah data yang diimpor sesuai dengan kriteria
    for ($i = 0; $i < $rowCount; $i++) {
        // Pastikan data tidak kosong sebelum validasi
        if (empty($rows[$i][0]) || empty($rows[$i][1]) || empty($rows[$i][2]) || empty($rows[$i][4]) || empty($rows[$i][5]) || empty($rows[$i][6])) {
            $errors[] = "Baris ke-" . ($i+2) . ": Data tidak lengkap atau kosong.";
            continue;
        }

        if ($rows[$i][1] > 1000) { // Misalnya jumlah barang masuk tidak boleh lebih dari 1000
            $errors[] = "Baris ke-" . ($i+2) . ": Jumlah barang masuk terlalu besar.";
        }
        if ($rows[$i][2] > 1000) { // Misalnya jumlah barang keluar tidak boleh lebih dari 1000
            $errors[] = "Baris ke-" . ($i+2) . ": Jumlah barang keluar terlalu besar.";
        }
        if ($rows[$i][6] > 1000) { // Misalnya stokdefault tidak boleh lebih dari 1000
            $errors[] = "Baris ke-" . ($i+2) . ": stokdefault terlalu besar.";
        }

        // Pengecekan format tanggal
        if (!isValidDate($rows[$i][4])) { // Pengecekan format tanggal pada kolom 'Tanggal Rekapan Data'
            $errors[] = "Baris ke-" . ($i+2) . ": Format tanggal pada kolom 'Tanggal Rekapan Data' tidak valid. Harus menggunakan format 'YYYY-MM-DD'.";
        }
        if (!isValidDate($rows[$i][5])) { // Pengecekan format tanggal pada kolom 'Tanggal Kadaluwarsa'
            $errors[] = "Baris ke-" . ($i+2) . ": Format tanggal pada kolom 'Tanggal Kadaluwarsa' tidak valid. Harus menggunakan format 'YYYY-MM-DD'.";
        }
    }

    if (!empty($errors)) {
        // Menyimpan error sebagai session untuk ditampilkan
        session_start();
        $_SESSION['import_errors'] = $errors;
        echo "<script>
                window.onload = function() {
                    var errors = " . json_encode($errors) . ";
                    var errorList = errors.map(function(error) { return '<li>' + error + '</li>'; }).join('');
                    var popup = '<div id=\"errorPopup\" style=\"position: fixed; top: 10%; left: 50%; transform: translate(-50%, -50%); width: 80%; max-width: 600px; padding: 20px; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); z-index: 9999;\">' +
                                 '<h4>Peringatan!</h4>' +
                                 '<ul>' + errorList + '</ul>' +
                                 '<a href=\"?module=data&act=import\" class=\"btn btn-more\" style=\"background: #dc3545; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px;\">Ok</a>' +
                                 '</div>';
                    document.body.insertAdjacentHTML('beforeend', popup);
                }
              </script>";
    } else {
        // Kosongkan tabel data1
        mysql_query("TRUNCATE TABLE data1");

        // Masukkan data yang sudah diproses ke database
        foreach ($rows as $row) {
            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2]) && !empty($row[4]) && !empty($row[5]) && !empty($row[6])) {
                $nm = mysql_real_escape_string($row[0]);
                $dm = mysql_real_escape_string($row[1]);
                $dk = mysql_real_escape_string($row[2]);
                $tgl = mysql_real_escape_string($row[4]);
                $tglkadaluwarsa = mysql_real_escape_string($row[5]);
                $stokdefault = mysql_real_escape_string($row[6]);

                mysql_query("INSERT INTO data1 (nmb, dm, dk, tgl, tglkadaluwarsa, stokdefault) VALUES ('$nm', '$dm', '$dk', '$tgl', '$tglkadaluwarsa', '$stokdefault')");
            }
        }

        echo "
        <script>
            alert('Data Tersimpan');
            window.location.href='?module=data';
        </script>
        ";
    }
}
?>

<!-- Halaman Import -->
<div class="span12">
    <div class="widget widget-nopad">
        <style>
            .widget-header {
                background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
                padding: 1rem;
                color: white;
                font-size: 1.2rem;
                font-weight: bold;
                border-radius: 8px 8px 0 0;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            }
            .widget-content {
                background: white;
                padding: 2rem;
                border-radius: 0 0 8px 8px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.05);
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
                display: inline-block;
            }
            .btn-more:hover {
                background: linear-gradient(135deg, #7c3aed, #4f46e5, #0ea5e9);
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                transform: translateY(-2px);
            }
            input[type="file"] {
                padding: 10px;
                border-radius: 8px;
                border: 2px dashed #cbd5e1;
                background: #f8fafc;
                width: 100%;
                max-width: 400px;
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            .form-actions {
                margin-top: 20px;
                display: flex;
                gap: 1rem;
                flex-wrap: wrap;
            }
        </style>

        <div class="widget-header"><i class="fas fa-file-import"></i> Import Data Excel</div>
        <div class="widget-content">
            <p><b>Contoh Format Excel:</b></p>
            <img src="contoh.webp" alt="Contoh Format Excel" style="max-width:100%; margin-bottom: 1rem;">
            <br>
            <a href="Book1.xlsx" class="btn-more"><i class="fas fa-download"></i> Download Format Excel</a>

            <form action="?module=data&act=import" method="post" enctype="multipart/form-data">
                <br><label for="excel"><b>Unggah File Excel:</b></label><br>
                <input type="file" name="excel" id="excel" accept=".xlsx,.xls" required>

                <div class="form-actions">
                    <button type="submit" name="import" class="btn-more"><i class="fas fa-upload"></i> Import</button>
                    <a href="?module=data" class="btn-more"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
break;
}
?>