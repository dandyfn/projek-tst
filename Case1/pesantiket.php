<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Tiketmu</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #0057b8;
      color: #000;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    header {
      width: 100%;
      text-align: center;
      background-color: #7fd1d1;
      padding: 20px 0;
    }

    header h1 {
      margin: 0;
      font-size: 2rem;
    }

    main {
      margin-top: 20px;
      width: 90%;
      max-width: 600px;
      padding: 20px;
      background-color: #2d61a8;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .form-group label {
      flex: 1;
      font-weight: bold;
      color: #fff;
      text-align: right;
      margin-right: 10px;
      padding: 10px;
      background-color: #ff4040;
      border-radius: 5px;
    }

    .form-group input {
      flex: 2;
      padding: 10px;
      font-size: 1rem;
      border: 2px solid #fff600;
      border-radius: 5px;
    }

    .submit-button {
      width: 100%;
      padding: 15px;
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      color: #fff;
      background-color: #00c853;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .submit-button:hover {
      background-color: #00a244;
    }

    @media (max-width: 768px) {
      main {
        width: 95%;
        padding: 15px;
      }

      header h1 {
        font-size: 1.5rem;
      }

      .form-group label, .form-group input {
        font-size: 0.9rem;
      }

      .submit-button {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Pesan Tiketmu!</h1>
  </header>
  <main>
    <form action="hal.beranda.php" method="POST">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
      </div>
      <div class="form-group">
        <label for="kota-keberangkatan">Kota Keberangkatan</label>
        <input type="text" id="kota-keberangkatan" name="kota_keberangkatan" placeholder="Masukkan kota keberangkatan" required>
      </div>
      <div class="form-group">
        <label for="kota-tujuan">Kota Tujuan</label>
        <input type="text" id="kota-tujuan" name="kota_tujuan" placeholder="Masukkan kota tujuan" required>
      </div>
      <button type="submit" class="submit-button">Buat Pesanan!</button>
    </form>
  </main>
</body>
</html>
