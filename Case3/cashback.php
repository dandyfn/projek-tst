⁠ php
<?php
class Cashback {
    protected $orders = [
        [
            'order_id' => '001',
            'user_id' => 12345,
            'restaurant_id' => 67890,
            'delivery_status' => 'Late',
            'total_amount' => 100000,
        ],
        [
            'order_id' => '002',
            'user_id' => 12345,
            'restaurant_id' => 67890,
            'delivery_status' => 'OnTime',
            'total_amount' => 150000,
        ]
    ];

    /**
     * Mengecek apakah order terlambat
     * @param string $order_id
     * @return array
     */
    public function checkLateOrder($order_id) {
        foreach ($this->orders as $order) {
            if ($order['order_id'] === $order_id) {
                if ($order['delivery_status'] === 'Late') {
                    $cashback = $order['total_amount'] * 0.1; // 10% cashback
                    return [
                        'status' => 'success',
                        'message' => 'Cashback tersedia.',
                        'cashback_amount' => $cashback
                    ];
                } else {
                    return [
                        'status' => 'error',
                        'message' => 'Pengantaran tepat waktu. Cashback tidak tersedia.'
                    ];
                }
            }
        }
        return [
            'status' => 'error',
            'message' => 'Order ID tidak ditemukan.'
        ];
    }
}
?>
