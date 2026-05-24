<!-- Fail ini adalah laman utama yang memaparkan isi kandungan web pada bahagian tengah-->
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting For Positions</title>

  <style>
  	* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
    }

    body {
  	  background-image: url(bg-puteri.jpg);
  	  background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      width:100%;
      padding: 10px;
    }  

    .header {
      width: fit-content;
      margin: auto;
      background: #f8dfe4;
      padding: 15px 40px;
      border-radius: 15px;
      border: 2px solid #e9bcc6;
      margin-bottom: 40px;
    }

    .header h1 {
      color: #5a1730;
      font-size: 18px;
      text-align: center;
    }

    .logo-section {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 50px;
      margin-top: 40px;   
  	  margin-bottom: 30px;
    }

    .logo-section img {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }

    .title {
      text-align: center;
      margin-top: 20px;
    }

    .title h2 {
      color: #5a1730;
      font-size: 30px;
      margin-bottom: 10px;
    }

    .title p {
      color: #ff4f9a;
      font-size: 24px;
      font-style: italic;
      line-height: 1.4;
    }

    .info-box {
      margin-top: 30px;
      border-radius: 20px;
      padding: 30px;
      display: flex;
      justify-content: space-between;
      text-align: center;
      gap: 10px;
    }

    .item {
      flex: 1;
    }

    .item h3 {
      color: #ff3c86;
      margin-top: 10px;
      margin-bottom: 10px;
      font-size: 12px;
    }

    .item p {
      color: #333;
      font-size: 12px;
      line-height: 1.5;
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
