<!-- Modal adicionar produto-->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Adicinar produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ URL::to('store') }}" id="addForm">
                <div class="mb-3">
                    <label for="name">Nome do produto</label>
                    <input type="text" name="name" class="form-control" placeholder="Input Name" required>
                </div>
                <div class="mb-3">
                    <label for="price">Preço</label>
                    <input type="text" name="price" class="form-control" placeholder="Input Price" required>
                </div>
                <div class="mb-3">
                    <label for="quantity">Quantidade</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Input Quantity" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Modal editar produto -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Editar produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ URL::to('update') }}" id="editForm">
                    <input type="hidden" id="idProduto" name="id">
                    <div class="mb-3">
                        <label for="name">Nome do produto</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="price">Preço</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="quantity">Quantidade</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
        </div>
    </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Deletar produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4 class="text-center">Tem certeza que deseja excluir o produto?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" id="deleteproduto" class="btn btn-danger">Deletar</button>
        </form>
        </div>
    </div>
    </div>
</div>