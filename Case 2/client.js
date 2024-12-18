document.getElementById('applyPromo').addEventListener('click', async () => {
    const url = 'http://localhost/middleware/promo';
    const requestData = {
        user_id: 123,
        restaurant_id: 456
    };

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(requestData)
        });

        const result = await response.json();
        if (result.promo_applied) {
            document.getElementById('promoMessage').innerText = `Promo diterapkan: Diskon Rp${result.discount_amount}`;
        } else {
            document.getElementById('promoMessage').innerText = result.message;
        }
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('promoMessage').innerText = 'Terjadi kesalahan!';
    }
});
