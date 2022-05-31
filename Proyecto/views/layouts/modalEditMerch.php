<div class="modal" id="modalTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Snack</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/merchControllers.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-text" name="name"></textarea>
                    <textarea id="form-edit-color" name="color"></textarea>
                    <textarea id="form-edit-talla" name="talla"></textarea>
                    <textarea id="form-edit-cost" name="costo"></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>