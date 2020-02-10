setTimeout(()=> {
    let map = L.map('map').setView([ 1.082828, 104.030457], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    L.marker([ 1.082828, 104.030457]).addTo(map)
        .bindPopup('Batam Island.')
        .openPopup();

        let onMapClick = ({latlng}) => {
            document.querySelector("input[name='latitude']").value = latlng.lat;
            document.querySelector("input[name='longtitude']").value = latlng.lng;
        }
        
        map.on('click', onMapClick);
},1200);


