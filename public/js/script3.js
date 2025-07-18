documentaddEventListener('DOMContentLoaded') ();  {
  const form = document.getElementById('alatForm');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const data = {
      kode: document.getElementById('kodeAlat').value.trim(),
      nama: document.getElementById('namaAlat').value.trim(),
      kategori: document.getElementById('kategoriAlat').value.trim(),
      status: document.getElementById('statusAlat').value,
      tanggal: document.getElementById('tanggal').value
    };

    if (!data.kode || !data.nama || !data.kategori || !data.status || !data.tanggal) {
      alert("Harap lengkapi semua kolom!");
      return;
    }

    alert(`Data berhasil disimpan:\n\nKode: ${data.kode}\nNama: ${data.nama}\nKategori: ${data.kategori}\nStatus: ${data.status}\nTanggal: ${data.tanggal}`);

    // Simpan data bisa ditambahkan di sini (localStorage atau API)
    form.reset();
  });
}