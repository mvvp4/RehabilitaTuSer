for(let i=0;i<=2;i++){
    fetch(`http://localhost:4000/services/${i}`)
        .then((response) => response.json())
        .then(data => {
            console.log(data)
            // Elementos html
            let btnContainer = document.getElementById("list-services")
            let li = document.createElement('li')
            let logo=document.createElement('img')
            let btncontent = document.createElement('a')
            let span= document.createElement('span')
    
            //caracteristicas de los textos dentro del boton
            span.id= 'service'
            span.textContent = name
            // Características del boton
            btncontent.classList.add('btn','btn-light')
            
    
            // Agregamos la imagen al documento
            btnContainer.appendChild(li)
            li.appendChild(logo)
            li.appendChild(btncontent)
            btncontent.appendChild(span)
        })}