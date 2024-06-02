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
