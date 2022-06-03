<div class="modal" id="modalDeleteTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar Pedido</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/pedidoController.php" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>¿El usuario ya pago este articulo?</p>
                    <input type="submit" value="Si">
                </form>
            </div>
        </div>
    </div>
</div>