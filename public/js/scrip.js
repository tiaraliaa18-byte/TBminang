function kirimWA(metode) {
    
    const nomorWA = "6282177895773"; 
    
    let daftarPesanan = [];
    let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    
   
    checkboxes.forEach((item) => {
        daftarPesanan.push(item.value);
    });

    if (daftarPesanan.length === 0) {
        alert("Silakan pilih menu terlebih dahulu!");
        return;
    }

    
    let pesan = `Halo RM Cahaya Minang, saya mau pesan:\n\n`;
    pesan += `*Menu:* ${daftarPesanan.join(", ")}\n`;
    pesan += `*Metode:* ${metode}\n\n`;
    pesan += `Terima kasih!`;


    let url = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;

    
    window.open(url, '_blank');
}