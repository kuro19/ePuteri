<!-- Fail ini adalah laman utama yang memaparkan isi kandungan web pada bahagian tengah-->
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting For Positions</title>

  <style>
 /* Add this inside the <style> tags of utama.php */

/* Make the info boxes interactive */
.item {
    flex: 1;
    background: rgba(255, 255, 255, 0.7); /* Subtle background for each box */
    padding: 20px 10px;
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
}

.item:hover {
    transform: translateY(-10px); /* Floats up on hover */
    box-shadow: 0 10px 20px rgba(255, 60, 134, 0.2); /* Pink shadow */
    background: rgba(255, 255, 255, 1);
}

.icon {
    width: 60px;
    height: 60px;
    margin: auto;
    border-radius: 50%;
    background: #ffd6e5;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #ff3c86;
    transition: transform 0.3s ease;
}

.item:hover .icon {
    transform: scale(1.15) rotate(5deg); /* Icon pops and slightly tilts */
}

/* MOBILE RESPONSIVENESS */
@media (max-width: 768px) {
    .info-box {
        flex-direction: column; /* Stack boxes vertically on small screens */
        gap: 20px;
    }
    
    .logo-section {
        gap: 20px;
    }
    
    .title h2 {
        font-size: 24px;
    }
}
  </style>
</head>
<body>

  <div class="poster">

    <!-- Header -->
    <div class="header">
      <h1>PERSATUAN UNIT BERUNIFORM PUTERI ISLAM</h1>
    </div>

    <!-- Logo -->
    <div class="logo-section">
      <img src="puteri-logo.jpg" alt="Logo Puteri">
      <img src="school-logo.jpg" alt="Logo Sekolah">
    </div>

    <!-- Tajuk -->
    <div class="title">
      <h2>VOTING FOR POSITIONS !</h2>
      <p>
        Sistem Pengundian Atas Talian <br>
        Pemilihan Pemimpin
      </p>
    </div>

    <!-- Bahagian bawah -->
    <div class="info-box">

      <div class="item">
        <div class="icon">👥</div>
        <h3>DISIPLIN</h3>
        <p>Memupuk sahsiah dan</p>
        <p>disiplin diri</p>
      </div>

      <div class="item">
        <div class="icon">❤</div>
        <h3>KECEMERLANGAN</h3>
        <p>Berusaha ke arah kecemerlangan</p>
      </div>

      <div class="item">
        <div class="icon">☆</div>
        <h3>KHIDMAT</h3>
        <p>Sedia berkhidmat untuk masyarakat</p>
      </div>

      <div class="item">
        <div class="icon">❀</div>
        <h3>AKHLAK MULIA</h3>
        <p>Berakhlak mulia dan berbudi bahasa</p>
      </div>

    </div>

  </div>

</body>
</html>
