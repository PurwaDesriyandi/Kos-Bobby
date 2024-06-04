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

    function saveForm() {
        const name = document.getElementById('normal_input').value;
        const phoneNumber = document.getElementById('phone_number').value;
        const address = document.getElementById('address').value;
        const additionalFacilities = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(cb => cb.value);
        const otherFacilities = document.getElementById('other_facilities').value;
        const roomType = document.querySelector('input[name="room_type"]:checked').value;
        const date = document.getElementById('date').value;
        const rentDuration = document.querySelector('input[name="rent_duration"]:checked').value;
        const penghuni = document.querySelector('input[name="penghuni"]:checked').value;
    
        const formData = {
            name,
            phoneNumber,
            address,
            additionalFacilities,
            otherFacilities,
            roomType,
            date,
            rentDuration,
            penghuni
        };
    
        const durationInMilliseconds = rentDuration === "6 Bulan" ? 6 * 30 * 24 * 60 * 60 * 1000 : 12 * 30 * 24 * 60 * 60 * 1000;
        const expirationTime = Date.now() + durationInMilliseconds;
    
        localStorage.setItem('formData', JSON.stringify(formData));
        localStorage.setItem('formDataExpiration', expirationTime.toString());
    
        alert('Data saved successfully!');
    }
    
    function checkExpiration() {
        const expirationTime = localStorage.getItem('formDataExpiration');
        if (expirationTime && Date.now() > parseInt(expirationTime, 10)) {
            localStorage.removeItem('formData');
            localStorage.removeItem('formDataExpiration');
            alert('Saved data has expired and has been removed.');
        }
    }

    window.onload = checkExpiration;

    
        
    function total() {
        var total = 0;
        
        var rentDuration = document.querySelector('input[name="rent_duration"]:checked');
        var Penghuni = document.querySelector('input[name="penghuni"]:checked');
        var facilities = document.querySelectorAll('input[name="additional_facilities[]"]:checked');
        
        if (rentDuration) {
            total += parseFloat(rentDuration.value) ;
        }
        facilities.forEach(function(facilities) {
            total += parseFloat(facilities.value) * parseFloat(rentDuration.id);
        });
        
        document.getElementById('result').innerHTML = 'Total Harga: ' + total.toLocaleString ('id-ID', { style: 'currency', currency: 'IDR' });

    }
    function saveForm(){
        var name = document.getElementById('name').value;
        var phone_number = document.getElementById('phone_number').value;
        var address = document.getElementById('address').value;
        var additional_facilities_checked = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(el => el.id);
        var additional_facilities_prices = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(el => el.value);
        var additional_facilities_info = [];
        for (var i = 0; i < additional_facilities_checked.length; i++) {
            additional_facilities_info.push(additional_facilities_checked[i] + ' (Rp. ' + additional_facilities_prices[i] + ')');
        }
        var date = document.getElementById('date').value;
        var total_sewa = document.querySelector('input[name="rent_duration"]:checked') ? document.querySelector('input[name="rent_duration"]:checked').id : '';
        var rent_duration = document.querySelector('input[name="rent_duration"]:checked') ? document.querySelector('input[name="rent_duration"]:checked').value : '';
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