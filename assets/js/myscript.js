const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);
if (flashData) {
	Swal.fire({
		title: 'Data',
		text: 'Berhasil' + flashData,
		type: 'success'
	});
}

const flashLogin = $('.flash-login').data('flashlogin');
// console.log(flashData);
if (flashLogin) {
	Swal.fire({
		// position: 'top-end',
		type: 'success',
		title: flashLogin,
		showConfirmButton: false,
		timer: 2000
	});
}
// Hapus Menu
const flashMenu = $('.flash-masuk').data('flashmasuk');
if (flashMenu) {
	Swal.fire({
		// title: 'Data',
		text: flashMenu,
		type: 'success'
	});
}

// Hapus Menu Utama
$('.tombil-hapusmenu').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		type: 'warning',
		title: 'Menu ini Tidak Bisa Hihapus',
		text: 'Hapus dahulu isi menunya',
		// footer: '<a href>Why do I have this issue?</a>'
	})
});
// Hapus Parent Menu
$('.tombil-hapusparent').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		type: 'warning',
		title: 'Menu ini Tidak Bisa Hihapus',
		text: 'Hapus dahulu isi menunya',
		// footer: '<a href>Why do I have this issue?</a>'
	})
});

// Hapus Arsip
$('.tombol-hapusarsip').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		type: 'warning',
		title: 'Menu ini Tidak Bisa Hihapus',
		text: 'Hapus dahulu Arsip di Menu ini',
		// footer: '<a href>Why do I have this issue?</a>'
	})
});

// Hapus Menu
$('.tombol-hapusm').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	// console.log(href);
	Swal.fire({
		title: 'Apakah Yakin?',
		text: "Menghapus Menu ini!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
// End Hapus Menu

// tombo hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	// console.log(href);
	Swal.fire({
		title: 'Apakah Yakin?',
		text: "Data ini Akan Dihapus!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
