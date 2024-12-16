<?php
 

    $name = $_GET['nama'] ?? 'Tidak ada nama';
    $from =  $_GET['kota_keberangkatan'] ?? 'Tidak ada kota keberangkatan';
    $to = $_GET['kota_tujuan'] ?? 'Tidak ada kota tujuan';
    $ticketId = '42434';

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Restaurant</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .image img {
      width: 100%; 
      object-fit: cover;
      border-radius: 10px; 
    }
  </style>
</head>
<body>
  <header>
    <h1>Daftar Restaurant</h1>
  </header>
  <main>
    <div class="restaurant-list" id="restaurant-list">
 
    </div>
  </main>

  <script>
     const toCity = "<?php echo $from; ?>";
     console.log(toCity);
    const apiUrl = `http://localhost/restfull/api/daftar?${toCity}`;
    console.log(apiUrl)

    console.log(apiUrl); 

    fetch(apiUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
      })
      .then(data => {
        if (data.status === 'success') {
          renderRestaurants(data.data);
        } else {
          console.error('No data found:', data.message);
          document.getElementById('restaurant-list').innerHTML = '<p>Data tidak ditemukan.</p>';
        }
      })
      .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        document.getElementById('restaurant-list').innerHTML = '<p>Error fetching data.</p>';
      });

    function renderRestaurants(restaurants) {
      const listElement = document.getElementById('restaurant-list');
      listElement.innerHTML = ''; 

      restaurants.forEach(restaurant => {
        const card = document.createElement('div');
        card.className = 'card';

        card.innerHTML = `
          <div class="image">
            <img src="${restaurant.makanan.gambar}" alt="${restaurant.makanan.nama}" />
          </div>
          <div class="info">
            <p class="food-name">${restaurant.makanan.nama}</p>
            <p class="restaurant-name">${restaurant.nama_restaurant} - ${restaurant.kota_restaurant}</p>
            <p class="price">Harga: Rp${restaurant.makanan.harga}</p>
            <p class="discount">Potongan: ${restaurant.potongan_harga || '0%'}</p>
          </div>
          <button class="order-button">Pesan!</button>
        `;

        listElement.appendChild(card);
      });
    }
  </script>
</body>
</html>
