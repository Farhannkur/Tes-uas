
function confirmSubmit() {
   return confirm('Apakah Data Sudah Benar?');
}

function validateForm() {
   var nama = document.getElementById('nama').value.trim(); 

   if (nama === '') {
       alert('Nama Wajib Diisi');
       return false;
   }

   if (nama.length < 2) {
       alert('Nama wajib minimal dua karakter!');
       return false;
   }

   return true; 
}
