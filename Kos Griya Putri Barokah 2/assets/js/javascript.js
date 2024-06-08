    jQuery(function () {

        jQuery('#camera_wrap_4').camera({
            height: '600',
            loader: 'bar',
            pagination: false,
            thumbnails: false,
            hover: false,
            opacityOnGrid: false,
            imagePath: 'assets/images/'
        });
    });
    function autoResizeDiv()
    {
        document.getElementById('main').style.height = window.innerHeight +'px';
    }
    window.onresize = autoResizeDiv;
    autoResizeDiv();
    
    function total() {
        let total = 0;
        let rentDurationValue = 0;

        document.querySelectorAll('input[type=radio][name=rent_duration]:checked').forEach(function(item) {
            rentDurationValue = parseInt(item.value); 
            total += parseInt(item.id);
        });
        document.querySelectorAll('input[type=checkbox]:checked').forEach(function(item) {
            total += parseInt(item.id) * rentDurationValue; // Multiply facility cost by the rent duration value
        });

        document.getElementById("result").innerText = "Total Harga: Rp " + total.toLocaleString();
        document.getElementById("total_price").value = total; // Set the hidden input value
    }
    function whatsappMessage(){
        var name = document.getElementById('name').value;
        var phone_number = document.getElementById('phone_number').value;
        var address = document.getElementById('address').value;
        var additional_facilities_checked = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(el => el.value);
        var additional_facilities_prices = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(el => el.id);
        var additional_facilities_info = [];
        for (var i = 0; i < additional_facilities_checked.length; i++) {
            additional_facilities_info.push(additional_facilities_checked[i] + ' (Rp. ' + additional_facilities_prices[i] + ')');
        }
        var date = document.getElementById('date').value;
        var total_sewa = document.querySelector('input[name="rent_duration"]:checked') ? document.querySelector('input[name="rent_duration"]:checked').value : '';
        var rent_duration = document.querySelector('input[name="rent_duration"]:checked') ? document.querySelector('input[name="rent_duration"]:checked').id : '';
        var nokamar = document.querySelector('input[name="nokamar"]:checked') ? document.querySelector('input[name="nokamar"]:checked').id : '';
        total();
        var total_price= document.getElementById('result').textContent.replace('Total Harga:', '')

        var whatsappMessage = `*Pemesanan Kos Putri Griya Barokah 2*\n\n` +
            `*Nama:* ${name}\n` +
            `*No Handphone:* ${phone_number}\n` +
            `*Alamat Domisili:* ${address}\n` +
            `*Fasilitas Tambahan:* ${additional_facilities_info.join(', ')}\n` + 
            `*Tanggal Masuk:* ${date}\n` +
            `*Waktu Sewa:* ${total_sewa} Bulan = Rp. ${rent_duration} \n` +
            `*Pilih No Kamar:* ${nokamar}\n` +
            `*Total Harga Sewa: Rp. ${total_price}*`;

        var whatsappUrl = `https://wa.me/6282256430291?text=${encodeURIComponent(whatsappMessage)}`;
        window.open(whatsappUrl, '_blank');
    };