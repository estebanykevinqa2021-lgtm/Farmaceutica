<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario General - Dashboard Semántico</title>
    <link class="cssdeck" rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="container">
        <header class="main-header">
            <h1>Inventario General</h1>
        </header>

        <section class="kpi-container">
            <article class="card-kpi">
                <h3>STOCK TOTAL</h3>
            </article>
            <article class="card-kpi">
                <h3>VENCIMIENTOS</h3>
            </article>
            <article class="card-kpi">
                <h3>NUEVOS INGRESOS</h3>
            </article>
            <article class="card-kpi status-active">
                <h3>ESTADO DE PEDIDOS</h3>
            </article>
        </section>

        <div class="mid-section">

            <article class="panel medicamentos-panel">
                <div class="panel-header">
                    <h2>Medicamento</h2>
                    <div class="actions-buttons">
                        <button class="btn-action-icon" id="btn-agregar-med" title="Agregar Medicamento">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </button>
                        <button class="btn-action-icon" id="btn-editar-med" title="Editar Medicamento">
                            <i class="fa-solid fa-file-pen"></i>
                        </button>
                        <button class="btn-action-icon btn-delete" id="btn-eliminar-med" title="Eliminar Medicamento">
                            <i class="fa-solid fa-file-circle-minus"></i>
                        </button>
                    </div>
                </div>
                <table class="data-table" id="tabla-medicamentos">
                    <thead>
                        <tr>
                            <th>Código Único</th>
                            <th>Nombre Comercial</th>
                            <th>Forma</th>
                            <th>Conc.</th>
                            <th>Receta</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </article>

            <!-- PANEL CATEGORÍAS -->
            <article class="panel categorias-panel">
                <div class="panel-header">
                    <h2>Categoría</h2>
                    <div class="actions-buttons">
                        <button class="btn-action-text" id="btn-agregar-cat" title="Agregar Categoría">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </button>
                        <button class="btn-action-text" id="btn-editar-cat" title="Editar Categoría">
                            <i class="fa-solid fa-file-pen"></i>
                        </button>
                        <button class="btn-action-text btn-delete" id="btn-eliminar-cat" title="Eliminar Categoría">
                            <i class="fa-solid fa-file-circle-minus"></i>
                        </button>
                    </div>
                </div>
                <table class="data-table" id="tabla-categorias">
                    <thead>
                        <tr>
                            <th>Nombre de la categoría</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </article>

        </div>

        <article class="panel lotes-section">
            <div class="panel-header">
                <h2>Trazabilidad de Lotes</h2>
                <div class="main-actions">
                    <button class="btn-main btn-blue" id="btn-agregar-lote">Agregar Lote</button>
                    <button class="btn-main" id="btn-editar-lote">Editar</button>
                    <button class="btn-main btn-danger" id="btn-eliminar-lote">Eliminar</button>
                </div>
            </div>
            <table class="data-table" id="tabla-lote">
                <thead>
                    <tr>
                        <th>Lote</th>
                        <th>Ingreso</th>
                        <th>Caducidad</th>
                        <th>Stock</th>
                        <th>Ubicación</th>
                        <th>Compra</th>
                        <th>Venta</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </article>

    </div>

    <div class="modal-overlay" id="modal-med-agregar">
        <div class="modal">
            <div class="modal-header">
                <h3><i class="fa-solid fa-file-circle-plus"></i> Agregar Medicamento</h3>
                <button class="modal-close" data-close="modal-med-agregar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="med-codigo">Código Único</label>
                    <input type="text" id="med-codigo" placeholder="Ej: MED-0001">
                </div>
                <div class="form-group">
                    <label for="med-nombre">Nombre Comercial</label>
                    <input type="text" id="med-nombre" placeholder="Ej: Paracetamol 500mg">
                </div>
                <div class="form-group">
                    <label for="med-forma">Forma Farmacéutica</label>
                    <input type="text" id="med-forma" placeholder="Ej: Tableta, Jarabe...">
                </div>
                <div class="form-group">
                    <label for="med-conc">Concentración</label>
                    <input type="text" id="med-conc" placeholder="Ej: 500mg">
                </div>
                <div class="form-group">
                    <label for="med-receta">Receta</label>
                    <select id="med-receta">
                        <option value="">Seleccionar</option>
                        <option value="Requerida">Requerida</option>
                        <option value="No requerida">No requerida</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-med-agregar">Cancelar</button>
                <button class="btn-modal-save" id="btn-guardar-med">Guardar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-med-editar">
        <div class="modal">
            <div class="modal-header">
                <h3><i class="fa-solid fa-file-pen"></i> Editar Medicamento</h3>
                <button class="modal-close" data-close="modal-med-editar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit-med-codigo">Código Único</label>
                    <input type="text" id="edit-med-codigo">
                </div>
                <div class="form-group">
                    <label for="edit-med-nombre">Nombre Comercial</label>
                    <input type="text" id="edit-med-nombre">
                </div>
                <div class="form-group">
                    <label for="edit-med-forma">Forma Farmacéutica</label>
                    <input type="text" id="edit-med-forma">
                </div>
                <div class="form-group">
                    <label for="edit-med-conc">Concentración</label>
                    <input type="text" id="edit-med-conc">
                </div>
                <div class="form-group">
                    <label for="edit-med-receta">Receta</label>
                    <select id="edit-med-receta">
                        <option value="">-- Seleccionar --</option>
                        <option value="Requerida">Requerida</option>
                        <option value="No requerida">No requerida</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-med-editar">Cancelar</button>
                <button class="btn-modal-save" id="btn-actualizar-med">Actualizar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-cat-agregar">
        <div class="modal modal-sm">
            <div class="modal-header">
                <h3><i class="fa-solid fa-file-circle-plus"></i> Agregar Categoría</h3>
                <button class="modal-close" data-close="modal-cat-agregar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="cat-nombre">Nombre de la Categoría</label>
                    <input type="text" id="cat-nombre" placeholder="Ej: Analgésicos">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-cat-agregar">Cancelar</button>
                <button class="btn-modal-save" id="btn-guardar-cat">Guardar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-cat-editar">
        <div class="modal modal-sm">
            <div class="modal-header">
                <h3><i class="fa-solid fa-file-pen"></i> Editar Categoría</h3>
                <button class="modal-close" data-close="modal-cat-editar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit-cat-nombre">Nombre de la Categoría</label>
                    <input type="text" id="edit-cat-nombre">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-cat-editar">Cancelar</button>
                <button class="btn-modal-save" id="btn-actualizar-cat">Actualizar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-lote-agregar">
        <div class="modal modal-lg">
            <div class="modal-header">
                <h3><i class="fa-solid fa-boxes-stacking"></i> Agregar Lote</h3>
                <button class="modal-close" data-close="modal-lote-agregar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body modal-grid-2">
                <div class="form-group">
                    <label for="lote-numero">Número de Lote</label>
                    <input type="text" id="lote-numero" placeholder="Ej: LOT-2024-001">
                </div>
                <div class="form-group">
                    <label for="lote-ingreso">Fecha de Ingreso</label>
                    <input type="date" id="lote-ingreso">
                </div>
                <div class="form-group">
                    <label for="lote-caducidad">Fecha de Caducidad</label>
                    <input type="date" id="lote-caducidad">
                </div>
                <div class="form-group">
                    <label for="lote-stock">Stock</label>
                    <input type="number" id="lote-stock" placeholder="Ej: 100" min="0">
                </div>
                <div class="form-group">
                    <label for="lote-ubicacion">Ubicación</label>
                    <input type="text" id="lote-ubicacion" placeholder="Ej: Estante A-3">
                </div>
                <div class="form-group">
                    <label for="lote-compra">Precio de Compra</label>
                    <input type="number" id="lote-compra" placeholder="0.00" step="0.01" min="0">
                </div>
                <div class="form-group">
                    <label for="lote-venta">Precio de Venta</label>
                    <input type="number" id="lote-venta" placeholder="0.00" step="0.01" min="0">
                </div>
                <div class="form-group">
                    <label for="lote-estado">Estado</label>
                    <select id="lote-estado">
                        <option value="">-- Seleccionar --</option>
                        <option value="Activo">Activo</option>
                        <option value="Por vencer">Por vencer</option>
                        <option value="Vencido">Vencido</option>
                        <option value="Agotado">Agotado</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-lote-agregar">Cancelar</button>
                <button class="btn-modal-save" id="btn-guardar-lote">Guardar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-lote-editar">
        <div class="modal modal-lg">
            <div class="modal-header">
                <h3><i class="fa-solid fa-pen-to-square"></i> Editar Lote</h3>
                <button class="modal-close" data-close="modal-lote-editar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body modal-grid-2">
                <div class="form-group">
                    <label for="edit-lote-numero">Número de Lote</label>
                    <input type="text" id="edit-lote-numero">
                </div>
                <div class="form-group">
                    <label for="edit-lote-ingreso">Fecha de Ingreso</label>
                    <input type="date" id="edit-lote-ingreso">
                </div>
                <div class="form-group">
                    <label for="edit-lote-caducidad">Fecha de Caducidad</label>
                    <input type="date" id="edit-lote-caducidad">
                </div>
                <div class="form-group">
                    <label for="edit-lote-stock">Stock</label>
                    <input type="number" id="edit-lote-stock" min="0">
                </div>
                <div class="form-group">
                    <label for="edit-lote-ubicacion">Ubicación</label>
                    <input type="text" id="edit-lote-ubicacion">
                </div>
                <div class="form-group">
                    <label for="edit-lote-compra">Precio de Compra</label>
                    <input type="number" id="edit-lote-compra" step="0.01" min="0">
                </div>
                <div class="form-group">
                    <label for="edit-lote-venta">Precio de Venta</label>
                    <input type="number" id="edit-lote-venta" step="0.01" min="0">
                </div>
                <div class="form-group">
                    <label for="edit-lote-estado">Estado</label>
                    <select id="edit-lote-estado">
                        <option value="">-- Seleccionar --</option>
                        <option value="Activo">Activo</option>
                        <option value="Por vencer">Por vencer</option>
                        <option value="Vencido">Vencido</option>
                        <option value="Agotado">Agotado</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-lote-editar">Cancelar</button>
                <button class="btn-modal-save" id="btn-actualizar-lote">Actualizar</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modal-confirmar-eliminar">
        <div class="modal modal-sm">
            <div class="modal-header modal-header-danger">
                <h3><i class="fa-solid fa-triangle-exclamation"></i> Confirmar Eliminación</h3>
                <button class="modal-close" data-close="modal-confirmar-eliminar"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p id="mensaje-eliminar" style="color:#2c3e50; font-size:14px; line-height:1.6;"></p>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-cancel" data-close="modal-confirmar-eliminar">Cancelar</button>
                <button class="btn-modal-danger" id="btn-confirmar-eliminar">Eliminar</button>
            </div>
        </div>
    </div>

    <!-- Toast de notificación -->
    <div class="toast" id="toast">
        <i class="fa-solid fa-circle-check"></i>
        <span id="toast-msg">Guardado correctamente</span>
    </div>

</body>
<script src="JS/app.js"></script>
</html>