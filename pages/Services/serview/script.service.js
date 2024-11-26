// Obtener el ID del servicio desde la URL
const urlParams = new URLSearchParams(window.location.search);
const serviceId = urlParams.get('id');

if (serviceId) {
    fetch(`http://localhost:4000/api/services/${serviceId}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`Service ${serviceId} not found`);
            }
            return response.json();
        })
        .then((data) => {
            if (data) {
                document.getElementById('service-name').textContent = data.name;
                document.getElementById('service-introduction').textContent = data.introduction;
                document.getElementById('service-content').textContent = data.content;
                document.getElementById('service-hs').textContent = data.schedule_description;
                document.getElementById('service-modality').textContent = data.modality;
                document.getElementById('service-price').textContent = data.price;
                document.getElementById('facture').href = '../pago/menu_buy.html';
                document.getElementById('service-active').textContent = data.isactive;

                const daysList = document.getElementById('service-days');
                const days = data.service_days ? data.service_days.split(',') : [];
                days.forEach(day => {
                    const li = document.createElement('li');
                    li.textContent = day;
                    daysList.appendChild(li);
                });
            }
        })
        .catch((err) => {
            console.error(err.message);
            document.getElementById('service-detail').innerHTML = `<p>Error: No se pudo cargar el servicio</p>`;
        });
} else {
    document.getElementById('service-detail').innerHTML = `<p>Error: ID de servicio no proporcionado</p>`;
}
