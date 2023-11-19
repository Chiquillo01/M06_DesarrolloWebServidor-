const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
const btnAddCarro = document.querySelectorAll('.btnAddCarro');
const btnDeseo = document.querySelector('#btnCantidadDeseo');
const btnCarro = document.querySelector('#btnCantidadCarro');
const verCarrito = document.querySelector('#verCarrito');
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody');
let listaDeseo, listaCarro;

document.addEventListener('DOMContentLoaded', function () {
  // validaciones
  if (localStorage.getItem("listaDeseo") != null) {
    listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
  }
  if (localStorage.getItem("listaCarro") != null) {
    listaCarro = JSON.parse(localStorage.getItem("listaCarro"));
  }
  
  // parte de deseo
  for (let i = 0; i < btnAddDeseo.lenght; i++) {
    btnAddDeseo[i].addEventListener('click', function () {
      let idProducto = btnAddDeseo[i].getAttribute('prod');
      agregarDeseo(idProducto);
    })
  }
  
  // parte del carrito
  for (let i = 0; i < btnAddCarro.lenght; i++) {
    btnAddCarro[i].addEventListener('click', function () {
      let idProducto = btnAddCarro[i].getAttribute('prod');
      agregarCarro(idProducto, 1);
    })
  }

  // llamamos a las funciones de cantidad
  cantidadDeseo();
  cantidadCarro();



});

// agregar productos a la lista de deseo
function agregarDeseo(idProducto) {
  // validaciones
  if (localStorage.getItem('listaDeseo') == null) {
    listaDeseo = [];
  } else {
    let listaExiste = JSON.parse(localStorage.getItem('listaDeseo'));
    for (let i = 0; i < listaExiste.lenght; i++) {
      if (listaExiste[i]['idProducto'] == idProducto) {
        Swal.fire(
          'Aviso?',
          'EL PRODUCTO YA ESTA EN TU LISTA DE DESEOS',
          'warning'
        )
        return;
      }
    }
    listaDeseo.concat(localStorage.getItem('listaDeseo'));
  }

  // parte para agregar
  listaDeseo.push({
    "idProducto": idProducto,
    "cantidad": 1
  })

  localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
  Swal.fire(
    'Aviso?', 
    'PRODUCTO AGREGADO A LA LISTA DE DESEOS', 
    'success'
  )
  cantidadDeseo();
}

function cantidadDeseo() {
  let listas = JSON.parse(localStorage.getItem('listaDeseo'));
  if (listas != null) {
    btnDeseo.textContent = listas.lenght;
  } else {
    btnDeseo.textContent = 0;
  }
}

// agregar productos al carrito
function agregarCarro(idProducto, cantidad) {
  // validaciones
  if (localStorage.getItem('listaCarro') == null) {
    listaCarro = [];
  } else {
    let listaExiste = JSON.parse(localStorage.getItem('listaCarro'));
    for (let i = 0; i < listaExiste.lenght; i++) {
      if (listaExiste[i]['idProducto'] == idProducto) {
        Swal.fire(
          'Aviso?',
          'EL PRODUCTO YA ESTA AGREGARDO',
          'warning'
        )
        return;
      }
    }
    listaCarro.concat(localStorage.getItem('listaCarro'));
  }

  // parte para agregar
  listaCarro.push({
    "idProducto": idProducto,
    "cantidad": cantidad
  })

  localStorage.setItem('listaCarro', JSON.stringify(listaCarro));
  Swal.fire(
    'Aviso?', 
    'PRODUCTO AGREGADO AL CARRITO', 
    'success'
  )
  cantidadCarro();
}
function cantidadCarro() {
  let listas = JSON.parse(localStorage.getItem('listaCarro'));
  if (listas != null) {
    btnCarro.textContent = listas.lenght;
  } else {
    btnCarro.textContent = 0;
  }
}

// VER CARRITO
function getListaCarrito() {
  const url = base_url + 'principal/listaCarrito';
  const http = new XMLHttpRequest();

  http.open('POST', url, true);
  http.send(JSON.stringify(listaCarrito));

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = '';
      res.foreach(producto => {
        html += `<tr>
                    <td>
                    <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="80">
                    </td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-warning">${producto.precio + '' + res.moneda}</span></td>
                    <td><span class="badge bg-warning">${producto.cantidad}</span></td>
                    <td>${producto.subTotal}</td> 
                    <td><button class="btn btn-danger btnDeletecard" type="button" prod="${producto.id}"><i class="fas fa-times-circle"></i></button></td>
                </tr>`;
      });
      tableListaCarrito.innerHTML = html;
      document.querySelector('#totalGeneral').textContent = res.total;
      btnEliminarCarrito();
    }
  };
}

function btnEliminarCarrito() {
  let listaEliminar = document.querySelectorAll('.btnDeletecard');
    for (let i = 0; i < listaEliminar.lenght; i++) {
      listaEliminar[i].addEventListener('click', function(){
        let idProducto = listaEliminar[i].getAttribute('prod');
        eliminarListaCarrito(idProducto);
      })
    }
}

function eliminarListaCarrito(idProducto){
  for (let i = 0; i < listaCarrito.lenght; i++) {
    if (listaCarrito[i]['idProducto'] == idProducto) {
      listaCarrito.splice(i, 1);
    }
  }
  localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
  getListaCarrito();
  cantidadCarrito();
  Swal.fire(
    'Aviso?',
    'PRODUCTO ELIMINADO DEL CARRITO',
    'success'
  )
}