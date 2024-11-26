for (let i = 0; i <= 20; i++) {
    fetch(`http://localhost:4000/api/services/${i}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`Service ${i} not found or error occurred`);
            }
            return response.json();
        })
        .then((data) => {
            if (data) {
                console.log(data);

                let btnContainer = document.getElementById("list-services");
                let li = document.createElement('li');
                let btncontent = document.createElement('a');
                let span = document.createElement('span');
                let content = document.createElement('span');
                let div1= document.createElement('div')
                let div2= document.createElement('div')

                btncontent.href = `serview/service.html?id=${data.id}`;
                div1.id= 'service-title'
                div2.id= 'service-content'
                span.textContent = data.name;
                content.textContent= data.introduction
                btncontent.classList.add('btn', 'btn-light');

                btnContainer.appendChild(li);
                li.appendChild(btncontent);
                div1.appendChild(span)
                div2.appendChild(content)
                btncontent.appendChild(div1);
                btncontent.appendChild(div2);
            }
        })
        .catch((err) => {
            console.error(err.message); // Muestra el error en la consola
            // Opcional: manejar visualmente el error, como mostrar un mensaje al usuario
        });
}
