document.addEventListener("DOMContentLoaded", () => {
    cargarDatos('categorias'); 
    cargarDatos('medicamentos');
    cargarDatos('lotes');        
});

function cargarDatos(v) {
    const fd = new FormData();
    fd.append('datos', v);
    fetch('cargar_activos.php', {
        method: 'POST',
        body: fd
    })
    .then(response => response.json())
    .then(data => {
        if(v === 'categorias')   
            viewCategorias(data);
        else if(v === 'medicamentos')
            viewMedicamentos(data);
        else if(v === 'lotes')
            viewLotes(data);
    })
    .catch(error => console.error('Error:', error));
}

function viewCategorias(data) {
    const tbody = document.querySelector('#tabla-categorias tbody'); 
    tbody.innerHTML = '';
    data.forEach(dato => {
        const row = document.createElement('tr');
        row.dataset.id = dato.id_categoria;
        row.innerHTML = `<td>${dato.nombre_categoria}</td>`;
        tbody.appendChild(row);
    });
}

function viewMedicamentos(data) {
    const tbody = document.querySelector('#tabla-medicamentos tbody');
    tbody.innerHTML = '';
    data.forEach(dato => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${dato.codigo}</td>
            <td>${dato.nombre_comercial}</td>
            <td>${dato.forma_farmaceutica}</td>
            <td>${dato.concentracion}</td>
            <td>${dato.receta}</td>
        `;
        tbody.appendChild(row);
    });
}

function viewLotes(data){ 
    const tbody = document.querySelector('#tabla-lote tbody');
    tbody.innerHTML = '';
    data.forEach(dato => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${dato.numero_lote}</td>
            <td>${dato.fecha_ingreso}</td>
            <td>${dato.fecha_caducidad}</td>
            <td>${dato.stock}</td>
            <td>${dato.ubicacion}</td>
            <td>${dato.precio_compra}</td>
            <td>${dato.precio_venta}</td>
            <td>${dato.estado}</td>
        `;
        tbody.appendChild(row);
    });
}


let filaSeleccionada = { med: null, cat: null, lote: null };
let filaAEliminar = null;
let timerToast = null; 
 
const CONFIG = {
    med: {
        tabla: '#tabla-medicamentos tbody',
        modalAgregar: 'modal-med-agregar',
        modalEditar: 'modal-med-editar',
        campos: ['codigo', 'nombre', 'forma', 'conc', 'receta'],
        prefijo: 'med',
        dataKeys: ['codigo', 'nombre', 'forma', 'conc', 'receta'],
        requeridos: ['codigo', 'nombre'],
        mensajeReq: 'El codigo y nombre son obligatorios',
        mensajeOk: { guardar: 'Medicamento agregado', actualizar: 'Medicamento actualizado' }
    },
    cat: {
        tabla: '#tabla-categorias tbody',
        modalAgregar: 'modal-cat-agregar',
        modalEditar: 'modal-cat-editar',
        campos: ['nombre'],
        prefijo: 'cat',
        dataKeys: ['nombre'],
        requeridos: ['nombre'],
        mensajeReq: 'El nombre es obligatorio',
        mensajeOk: { guardar: 'Categoria agregada', actualizar: 'Categoria actualizada' }
    },
    lote: {
        tabla: '#tabla-lote tbody',
        modalAgregar: 'modal-lote-agregar',
        modalEditar: 'modal-lote-editar',
        campos: ['numero', 'ingreso', 'caducidad', 'stock', 'ubicacion', 'compra', 'venta', 'estado'],
        prefijo: 'lote',
        dataKeys: ['lote', 'ingreso', 'caducidad', 'stock', 'ubicacion', 'compra', 'venta', 'estado'],
        requeridos: ['numero'],
        mensajeReq: 'El numero de lote es obligatorio',
        mensajeOk: { guardar: 'Lote agregado', actualizar: 'Lote actualizado' }
    }
};
 
document.addEventListener('DOMContentLoaded', function () {
    ['categorias', 'medicamentos', 'lotes'].forEach(cargarDatos);
 
    const acciones = {
        'btn-agregar-med':    function () { abrirModal('modal-med-agregar') },
        'btn-editar-med':     function () { abrirEditar('med') },
        'btn-eliminar-med':   function () { abrirEliminar('med') },
        'btn-guardar-med':    function () { guardar('med') },
        'btn-actualizar-med': function () { actualizar('med') },
 
        'btn-agregar-cat':    function () { abrirModal('modal-cat-agregar') },
        'btn-editar-cat':     function () { abrirEditar('cat') },
        'btn-eliminar-cat':   function () { abrirEliminar('cat') },
        'btn-guardar-cat':    function () { guardar('cat') },
        'btn-actualizar-cat': function () { actualizar('cat') },
 
        'btn-agregar-lote':    function () { abrirModal('modal-lote-agregar') },
        'btn-editar-lote':     function () { abrirEditar('lote') },
        'btn-eliminar-lote':   function () { abrirEliminar('lote') },
        'btn-guardar-lote':    function () { guardar('lote') },
        'btn-actualizar-lote': function () { actualizar('lote') }
    };
 
 
    document.querySelectorAll('[data-close]').forEach(function (btn) {
        btn.onclick = function () { cerrarModal(this.getAttribute('data-close')) };
    });
 
    document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
        overlay.onclick = function (e) { if (e.target == this) cerrarModal(this.id) };
    });
 
    document.getElementById('btn-confirmar-eliminar').onclick = function () {
        if (filaAEliminar) { 
            filaAEliminar.remove(); 
            filaAEliminar = null;
            mostrarToast('Registro eliminado'); 
        }
        cerrarModal('modal-confirmar-eliminar');
    };
});

