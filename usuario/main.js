    //variables
    let listaProductos=document.getElementById('idListaProductos');
    let countSpan=document.getElementById('idCount');
    let count=0;
    let total=document.getElementById('total');
    let t=0;
    let pagar = document.getElementById('idButtonPagar');
    let arrayProducts=[];
    let nameUser= document.getElementById("nameUser");
    let numTable= document.getElementById("numTable");
    let divRigth= document.getElementById("divRigth");

    let containerCard= document.getElementById('containerCard');
    let containerBebidas=document.getElementById("containerBebidas");
    let containerPromos=document.getElementById("containerPromos");
    /*funciones*/

    //funcion para eliminar item del carrito.
    function itemDelete(name) {

            console.log(name.parentElement.children[1].innerHTML);
            t -= parseFloat(name.parentElement.children[1].innerHTML);
            total.innerText = `$ ${t}.0`;
            count--;
            countSpan.innerText = count;
            name.parentElement.remove();
            arrayProducts.pop(name.parentElement.children[0].innerHTML);
            console.log(arrayProducts);

    }
    let countName=0;
    //funcion para agregar items al carrito
    function addItem(click) {
        console.log(click.parentElement.children[3].innerHTML);

        listaProductos.innerHTML+=`
            <li class="list-group-item d-flex justify-content-between align-items-center" onclick="
            //this.parentNode.removeChild(this);
            
        ">
                <span>${click.parentElement.children[0].innerHTML} $</span>
                <span class="badge bg-primary rounded-pill">${click.parentElement.children[3].innerHTML}  </span>
                <button type="button" class="btn bg-danger text-white" name="${countName}">x</button>
            </li>
        `;
        count++;
        countSpan.innerHTML=count;
        countName++;

        //total
        t+=parseFloat(click.parentElement.children[3].innerHTML);
        total.innerText=`$ ${t}.0`;

        //añadimos elemento al array para la peticion
        arrayProducts.push(click.parentElement.children[0].innerHTML);


    }
    //funcion para retornar los productos
    function getProducts() {
        fetch('products.json')
            .then(response=>response.json()
                .then((data)=>{

                    for (let j = 0; j <data.length ; j++) {
                        containerCard.innerHTML+=`
                                <div class="container-fluid d-flex justify-content-around col-4 mb-4" id="card4">
                                    <div class="card">
                                        <img src="${data[j].imgUrl}" class="card-img-top" alt="150px" >
                                        <div class="card-body">
                                            <h5 class="card-title">${data[j].title}</h5>
                                            <p class="card-text">${data[j].description}</p>
                                            <p class="card-text">Precio $: </p>
                                            <span class="card-text">${data[j].price}</span>
                                             <a class="btn btn-success" name="add${j}">
                                             agregar al carrito.</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                    }
                    containerCard.addEventListener("click",e=>{
                        console.log(e.target);
                        addItem(e.target)})
                }).catch(e=> console.log(e))
            );
    }
    //funcion para retornar los bebidas
    function getBebidas() {
        fetch('bebidas.json')
            .then(response=>response.json()
                .then((data)=>{

                    for (let j = 0; j <data.length ; j++) {
                        containerBebidas.innerHTML+=`
                                <div class="container-fluid d-flex justify-content-around col-4 mb-4" id="card4">
                                    <div class="card">
                                        <img src="${data[j].imgUrl}" class="card-img-top" alt="150px" >
                                        <div class="card-body">
                                            <h5 class="card-title">${data[j].title}</h5>
                                            <p class="card-text">${data[j].description}</p>
                                            <p class="card-text">Precio $: </p>
                                            <span class="card-text">${data[j].price}</span>
                                             <a class="btn btn-info" name="add${j}">
                                             agregar al carrito.</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                    }
                    containerBebidas.addEventListener("click",e=>{
                        console.log(e.target);
                        addItem(e.target)})
                }).catch(e=> console.log(e))
            );
    }
    //funcion para retornar los promos
    function getPromos() {
        fetch('promos.json')
            .then(response=>response.json()
                .then((data)=>{

                    for (let j = 0; j <data.length ; j++) {
                        containerPromos.innerHTML+=`
                                <div class="container-fluid d-flex justify-content-around col-4 mb-4" id="card4">
                                    <div class="card">
                                        <img src="${data[j].imgUrl}" class="card-img-top" alt="150px" >
                                        <div class="card-body">
                                            <h5 class="card-title">${data[j].title}</h5>
                                            <p class="card-text">${data[j].description}</p>
                                            <p class="card-text">Precio $: </p>
                                            <span class="card-text">${data[j].price}</span>
                                             <a class="btn btn-warning" name="add${j}">
                                             agregar al carrito.</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                    }
                    containerPromos.addEventListener("click",e=>{
                        console.log(e.target);
                        addItem(e.target)})
                }).catch(e=> console.log(e))
            );
    }


    getProducts();
    getBebidas();
    getPromos();
    //evento para ingresar a la funcion "deleteItem"
    listaProductos.addEventListener("click",e=>{
    itemDelete(e.target)});
    //evento para enviar datos a la comanda SQL y generar un alert
    pagar.addEventListener("click",()=>{
        let prod=arrayProducts.join();
        let url=`http://localhost/alitas/usuario/ProductServices.php?num_mesa=${numTable.innerText}&usuario=${nameUser.innerText}&productos=${prod}&total=${total.innerText}`;
        fetch(url);

        divRigth.innerHTML+=`
            <div class="alert alert-success m-auto-10" role="alert">
              <h4 class="alert-heading">${nameUser.innerText}, se ha enviado tu pedido con exito!!</h4>
              <p>Tus Productos :</p>
              <p>${prod}</p>
              <hr>
              <p class="mb-0"> Total de la cuenta: ${total.innerText}</p>
              <button  class="btn btn-warning" onclick="window.location.reload();">OK</button>
            </div>
            
        `

    })