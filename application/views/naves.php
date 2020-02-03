
<h3>Naves de la Película: <?php echo $titulo; ?></h3>
<table id="table-naves">
    <thead>
        <tr>
            <th>Nave</th>
            <th>Modelo</th>
            <th>Pasajeros</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $naves; ?>
    </tbody>
</table>

<div id="modal-form" class="modal">
    <div class="modal-content">
        <h4>Formulario</h4>
        <div class="row">
            <form id="form-nave">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nombre" name="nombre" type="text" class="validate" />
                        <label for="nombre">Nombre *</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="modelo" name="modelo" type="text" class="validate" />
                        <label for="modelo">Modelo *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="pasajeros" name="pasajeros" type="text" class="validate" />
                        <label for="pasajeros">Pasajeros *</label>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="btn waves-effect" onclick="guardarNave()">Guardar</a>
    </div>
</div>

<script>

    var papa;
    $('.modal').modal();

    function formNave(el){
        $('.modal').modal('open');
        papa = $(el).closest('tr');
        var tr = $(el).closest('tr');
        $('#form-nave #nombre').val(tr.data('name') );
        $('#form-nave #modelo').val(tr.data('model') );
        $('#form-nave #pasajeros').val(tr.data('passenger') );
        M.updateTextFields();
    }


</script>
