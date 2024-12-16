<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include('../../koneksi.php');

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$queryParams = [];
parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $queryParams);


if ($request === '/restfull/api/daftar/') {
    if (isset($queryParams) && !empty($queryParams)) {

        $kota_restaurant = array_key_first($queryParams);
        getDaftarRestoranExceptKota($conn, $kota_restaurant);
    } else {
   
        getDaftarRestoran($conn);
    }
} else {
   
    http_response_code(404);
    echo json_encode([
        'status' => 'error',
        'message' => 'Endpoint tidak ditemukan'
    ]);
}


function getDaftarRestoran($conn)
{
    header('Content-Type: application/json');

    $query = "SELECT 
                id_restaurant,
                nama_restaurant,
                kota_restaurant,
                nama_makanan,
                gambar_makanan,
                harga_makanan,
                nama_minuman,
                gambar_minuman,
                harga_minuman,
                potongan_harga
              FROM restaurant";
    $result = mysqli_query($conn, $query);

    $response = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = [
                'id_restaurant' => $row['id_restaurant'],
                'nama_restaurant' => $row['nama_restaurant'],
                'kota_restaurant' => $row['kota_restaurant'],
                'makanan' => [
                    'nama' => $row['nama_makanan'],
                    'gambar' => $row['gambar_makanan'],
                    'harga' => $row['harga_makanan']
                ],
                'minuman' => [
                    'nama' => $row['nama_minuman'],
                    'gambar' => $row['gambar_minuman'],
                    'harga' => $row['harga_minuman']
                ],
                'potongan_harga' => $row['potongan_harga']
            ];
        }

        echo json_encode([
            'status' => 'success',
            'data' => $response
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data tidak ditemukan'
        ]);
    }

    mysqli_close($conn);
}


function getDaftarRestoranExceptKota($conn, $kota_restaurant)
{
    header('Content-Type: application/json');

    $query = "SELECT 
                id_restaurant,
                nama_restaurant,
                kota_restaurant,
                nama_makanan,
                gambar_makanan,
                harga_makanan,
                nama_minuman,
                gambar_minuman,
                harga_minuman,
                potongan_harga
              FROM restaurant
              WHERE kota_restaurant != '$kota_restaurant'";
    $result = mysqli_query($conn, $query);

    $response = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = [
                'id_restaurant' => $row['id_restaurant'],
                'nama_restaurant' => $row['nama_restaurant'],
                'kota_restaurant' => $row['kota_restaurant'],
                'makanan' => [
                    'nama' => $row['nama_makanan'],
                    'gambar' => $row['gambar_makanan'],
                    'harga' => $row['harga_makanan']
                ],
                'minuman' => [
                    'nama' => $row['nama_minuman'],
                    'gambar' => $row['gambar_minuman'],
                    'harga' => $row['harga_minuman']
                ],
                'potongan_harga' => $row['potongan_harga']
            ];
        }

        echo json_encode([
            'status' => 'success',
            'data' => $response
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data tidak ditemukan'
        ]);
    }

    mysqli_close($conn);
}
