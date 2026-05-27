<?php include('pengesahan.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="menu_admin2.css">

<ul class="nav">
    <li class="dropdown">
        <a href="#" class="dropbtn">Daftar <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-content">
            <a href="daftarJawatan.php">Daftar Jawatan</a>
            <a href="daftarCalon.php">Daftar Calon</a>
        </div>
    </li>
    <li class="dropdown">
        <a href="#" class="dropbtn">Senarai <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-content">
            <a href="senaraiJawatan.php">Senarai Jawatan</a>
            <a href="senaraiCalon.php">Senarai Calon</a>
            <a href="senaraiPengundi.php">Senarai Pengundi</a>
        </div> 
    </li>
    <li class="dropdown">
        <a href="#" class="dropbtn">Laporan <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-content">
            <a href="laporan_pemenang.php">Keputusan ikut Jawatan</a>
            <a href="keputusan_undian.php">Keputusan Undian</a>
        </div>
    </li>
    <li><a href="carian_calon.php">Carian</a></li>
    <li><a href="importData.php">Import Data</a></li>
    <li><a href="logout.php" style="background-color:#ff4d4d;" onclick="return confirm('Anda Pasti log keluar?')">Log Keluar</a></li>
</ul>

<script>
    // Fungsi untuk buka/tutup dropdown apabila diklik
    document.querySelectorAll('.dropbtn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelectorAll('.dropdown-content').forEach(function(content) {
                if (content !== button.nextElementSibling) {
                    content.classList.remove('show');
                }
            });

            var menu = button.nextElementSibling;
            if (menu) menu.classList.toggle('show');
        });
    });

    // FIXED: was 'even.target' (typo — missing 't')
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn') && !event.target.closest('.dropbtn')) {
            document.querySelectorAll('.dropdown-content').forEach(function(content) {
                content.classList.remove('show');
            });
        }
    };
</script>

</body>
</html>
