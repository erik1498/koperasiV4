$('.menu').on('click', (parameter) => {
    $('.menus').hide();
    $('.'+parameter.currentTarget.dataset.page).show();
    $(parameter.currentTarget.dataset.felement)[0].focus();
});

$('.menu-sub').on('click', (parameter) => {
    $('.menus-sub').hide();
    $('.'+parameter.currentTarget.dataset.page).show();
    $(parameter.currentTarget.dataset.felement)[0].focus();
});

$('.menu-show').on('click',(parameter) => {
    $('.'+parameter.currentTarget.dataset.page).hide();
    $('.menus').show();
})

$('.rupiah').on('keyup', function (parameter) {
    var angka = parameter.currentTarget.value;
    var number_string = angka.replace(/[^.\d]/g, '').toString(),
    split   		= number_string.split('.'),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? ',' : '';
        rupiah += separator + ribuan.join(',');
    }

    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
    parameter.currentTarget.value =  angka < 0 ? '-'+rupiah : rupiah; 
});

function rupiah(angka) {
    var number_string = angka.toString().replace(/[^.\d]/g, '').toString(),
    split   		= number_string.split('.'),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? ',' : '';
        rupiah += separator + ribuan.join(',');
    }

    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
    if (angka < 0) {
        return '-'+rupiah;
    }
    return rupiah; 
}

 //Initialize Select2 Elements
 $('.select2').select2()

 //Initialize Select2 Elements
 $('.select2bs4').select2({
   theme: 'bootstrap4'
 })

 