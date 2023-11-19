const tableLista = document.querySelector("#tableListaDeseo tbody");
document.addEventListener("DOMContentLoaded", function () {
  getListaDeseo();
});

function getListaDeseo() {
  const url = base_url + 'principal/listaDeseo';
  const http = new XMLHttpRequest();

  http.open('POST', url, true);
  http.send(JSON.stringify(listaDeseo));

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = '';
      res.foreach(producto => {
        html += `<tr>
                    <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="80"></td>
                    <td>${producto.nombre}</td>
                    <td>${producto.precio}</td>
                    <td>${producto.cantidad}</td>
                    <td><button class="btn btn-danger" type="button"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-info" type="button"><i class="fas fa-cart-plus"></button>
                    </td> 
                </tr>`;
      });
      tableLista.innerHTML = html;
    }
  };
}

function btnEliminarDeseo() {
  let listaEliminar = document.querySelectorAll('.btnEliminarDeseo');
    for (let i = 0; i < listaEliminar.lenght; i++) {
      listaEliminar[i].addEventListener('click', function(){
        let idProducto = listaEliminar[i].getAttribute('prod');
        eliminarListaDeseo(idProducto);
      })
    }
}

function eliminarListaDeseo(idProducto){
  for (let i = 0; i < listaDeseo.lenght; i++) {
    if (listaDeseo[i]['idProducto'] == idProducto) {
      listaDeseo.splice(i, 1);
    }
  }
  localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
  getListaDeseo();
  cantidadDeseo();
  Swal.fire(
    'Aviso?',
    'PRODUCTO ELIMINADO DE TU LISTA',
    'success'
  )
}
