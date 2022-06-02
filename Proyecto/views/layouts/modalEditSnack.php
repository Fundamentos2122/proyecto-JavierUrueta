<div class="modal" id="modalTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Snack</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/snacksControllers.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <!--<label for="name">Nombre del Snack</label>-->
                    <textarea id="form-edit-text" name="name" required></textarea>
                    <!--<label for="cost">Precio</label>-->
                    <textarea id="form-edit-cost" name="cost" required></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>