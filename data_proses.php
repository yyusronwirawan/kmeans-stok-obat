<div class="span12">
    <div class="widget widget-nopad">
        <?php
        switch(@$_GET['act']){
        default:
        ?>
        <style>
            * {
                box-sizing: border-box;
            }
            
            .widget {
                margin: 0;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
                background: white;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .widget-header {
                background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
                padding: 1rem;
                color: white;
                font-size: 1.2rem;
                font-weight: 700;
                letter-spacing: 0.5px;
                position: relative;
                overflow: hidden;
            }
            
            .widget-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 100%);
                pointer-events: none;
            }
            
            .widget-header i {
                margin-right: 12px;
                font-size: 1.2em;
                opacity: 0.9;
            }
            
            .widget-content {
                background: linear-gradient(135deg, #f5f7ff 0%, #ffffff 100%);
                padding: 3rem;
                position: relative;
            }
            
            .widget-content::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23f0f4ff" opacity="0.4"/><circle cx="75" cy="75" r="1" fill="%23e0e7ff" opacity="0.3"/><circle cx="50" cy="10" r="0.5" fill="%23c7d2fe" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
                pointer-events: none;
                z-index: 0;
            }
            
            .shortcuts {
                position: relative;
                z-index: 1;
            }
            
            .btn-more {
                background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);
                color: white;
                padding: 14px 32px;
                border-radius: 50px;
                font-weight: 600;
                font-size: 1rem;
                text-decoration: none;
                border: none;
                cursor: pointer;
                transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                display: inline-block;
                box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
                letter-spacing: 0.5px;
                text-transform: uppercase;
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
                background: linear-gradient(135deg, #6366f1, #3b82f6, #0ea5e9);5,0.2), transparent);
                transition: left 0.6s;
            }
            
            .btn-more:hover::before {
                left: 100%;
            }
            
            .btn-more:hover {
                background: linear-gradient(135deg, #7c3aed, #4f46e5, #0ea5e9);
                box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
                transform: translateY(-3px) scale(1.02);
            }
            
            .btn-more:active {
                transform: translateY(-1px) scale(0.98);
                transition: all 0.1s ease;
            }
            
            .form-control {
                width: 100%;
                padding: 14px 18px;
                border: 2px solid #e2e8f0;
                border-radius: 12px;
                background: rgba(255, 255, 255, 0.9);
                font-size: 0.95rem;
                font-weight: 500;
                color: #2d3748;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            
            .form-control:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
                background: white;
                transform: translateY(-1px);
            }
            
            .form-control:hover {
                border-color: #cbd5e0;
                background: white;
            }
            
            select.form-control {
                cursor: pointer;
                background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23667eea" d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
                background-repeat: no-repeat;
                background-position: right 12px center;
                background-size: 16px;
                padding-right: 40px;
                appearance: none;
            }
            
            table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
                margin-top: 2rem;
                background: rgba(255, 255, 255, 0.8);
                border-radius: 16px;
                overflow: hidden;
                backdrop-filter: blur(20px);
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            }
            
            th, td {
                padding: 18px 16px;
                border: none;
                text-align: center;
                vertical-align: middle;
                position: relative;
            }
            
            tr {
                border-bottom: 1px solid rgba(226, 232, 240, 0.6);
            }
            
            tr:last-child {
                border-bottom: none;
            }
            
            tr:nth-child(even) {
                background: rgba(248, 250, 252, 0.5);
            }
            
            tr:hover {
                background: rgba(102, 126, 234, 0.04);
                transition: background-color 0.3s ease;
            }
            
            label {
                font-weight: 700;
                color: #4a5568;
                display: block;
                margin-bottom: 12px;
                font-size: 1.1rem;
                letter-spacing: 0.3px;
                text-align: left;
            }
            
            /* Premium glass effect for specific rows */
            tr:first-child td {
                background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.05) 100%);
                backdrop-filter: blur(20px);
                font-weight: 600;
            }
            
            /* Input field styling for better visual hierarchy */
            input[readonly].form-control {
                background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
                color: #4a5568;
                font-weight: 600;
                cursor: default;
                border-color: #e2e8f0;
            }
            
            /* Responsive design */
            @media (max-width: 768px) {
                .widget-content {
                    padding: 1.5rem;
                }
                
                .widget-header {
                    padding: 1.5rem;
                    font-size: 1.2rem;
                }
                
                .form-control {
                    font-size: 0.9rem;
                    padding: 12px 16px;
                }
                
                .btn-more {
                    padding: 12px 24px;
                    width: 100%;
                    text-align: center;
                    margin-top: 1rem;
                }
                
                th, td {
                    padding: 12px 8px;
                    font-size: 0.85rem;
                }
                
                table {
                    margin-top: 1rem;
                }
                
                label {
                    font-size: 1rem;
                    margin-bottom: 8px;
                }
            }
            
            @media (max-width: 480px) {
                .widget-content {
                    padding: 1rem;
                }
                
                th, td {
                    padding: 8px 4px;
                    font-size: 0.8rem;
                }
                
                .form-control {
                    font-size: 0.85rem;
                    padding: 10px 12px;
                }
            }
            
            /* Animation for form interactions */
            @keyframes subtle-bounce {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-2px); }
            }
            
            .form-control:focus {
                animation: subtle-bounce 0.6s ease-in-out;
            }
            
            /* Loading state styling (if needed) */
            .loading {
                opacity: 0.7;
                pointer-events: none;
                position: relative;
            }
            
            .loading::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 20px;
                height: 20px;
                margin: -10px 0 0 -10px;
                border: 2px solid #667eea;
                border-radius: 50%;
                border-top-color: transparent;
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }
        </style>

        <div class="widget-header"><i class="fas fa-filter"></i> Pilih Data Awal Clustering</div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="shortcuts">
                    <?php
                    include("koneksi.php");
                    $sql_data = mysql_query("SELECT * FROM data1 ORDER BY id ASC");
                    ?>
                    <form name="f1" method="post" action="proses.php" target="_blank">
                        <table>
                            <?php for ($i = 1; $i <= 3; $i++): ?>
                            <tr>
                                <td colspan="10">
                                    <label>Pilih Data untuk C<?= $i ?>:</label>
                                    <select id="c<?= $i ?>Data" class="form-control" onchange="setC<?= $i ?>Values(this)" name="c<?= $i ?>Data" required>
                                        <option value="" disabled selected hidden>Pilih Data</option>
                                        <?php mysql_data_seek($sql_data, 0); ?>
                                        <?php while($row_data = mysql_fetch_array($sql_data)) { ?>
                                            <option value="<?= $row_data['dm'] . '_' . $row_data['dk'] . '_' . $row_data['hari'] . '_' . $row_data['stokdefault']; ?>">
                                                <?= $row_data['nmb']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Barang Masuk</td>
                                <td><input type="text" id="c<?= $i ?>x" class="form-control" readonly></td>
                                <td>Barang Keluar</td>
                                <td><input type="text" id="c<?= $i ?>y" class="form-control" readonly></td>
                                <td>Stok</td>
                                <td><input type="text" id="c<?= $i ?>z" class="form-control" readonly></td>
                                <td>Hari</td>
                                <td><input type="text" id="c<?= $i ?>hari" class="form-control" readonly></td>
                                <td>Stok Default</td>
                                <td><input type="text" id="c<?= $i ?>stokdefault" class="form-control" readonly></td>
                            </tr>
                            <?php endfor; ?>
                            <tr>
                                <td colspan="10" style="text-align:right;">
                                    <input type="submit" name="simpan" value="Proses" class="btn-more">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <?php break; } ?>
    </div>
</div>

<script>
function setC1Values(select) {
    const val = select.value.split("_");
    document.getElementById("c1x").value = val[0];
    document.getElementById("c1y").value = val[1];
    document.getElementById("c1z").value = val[0] - val[1];
    document.getElementById("c1hari").value = val[2];
    document.getElementById("c1stokdefault").value = val[3];
}
function setC2Values(select) {
    const val = select.value.split("_");
    document.getElementById("c2x").value = val[0];
    document.getElementById("c2y").value = val[1];
    document.getElementById("c2z").value = val[0] - val[1];
    document.getElementById("c2hari").value = val[2];
    document.getElementById("c2stokdefault").value = val[3];
}
function setC3Values(select) {
    const val = select.value.split("_");
    document.getElementById("c3x").value = val[0];
    document.getElementById("c3y").value = val[1];
    document.getElementById("c3z").value = val[0] - val[1];
    document.getElementById("c3hari").value = val[2];
    document.getElementById("c3stokdefault").value = val[3];
}
</script>