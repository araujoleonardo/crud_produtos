@extends('./layouts/main')
  
@section('content')
<h1 class="page-header text-center">CRUD Produtos</h1>
<div class="row form-group">
    <div class="col-md-11 col-md-offset-1">
        <input type="search" name="search" id="search" class="form-control" placeholder="Search ..." />
    </div>    
</div>
<br>
<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <h2>Tabela de produtos</h2>
    </div>
    <div class="col-md-2 col-md-offset-1">  
        <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-outline-primary pull-right"> + Novo Produto</button>
    </div>
</div>
<div class="row">
    <div class="col-md-11 col-md-offset-1">
        <table class="table table-bordered table-responsive table-striped">
            <thead class="table-dark text-center">
                <th>ID</th>
                <th>Nome do produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </thead>
            <tbody id="produtoBody">
            </tbody>
            <tbody id="pesquisa">
            </tbody>

        </table>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

            //Validação csrf-token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            showProdutos();

            //Módulo salvar produto
            $('#addForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#addnew').modal('hide');
                        $('#addForm')[0].reset();
                        showProdutos();
                    }
                });
            });
            //----------

            //Módulo editar produto
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var quantity = $(this).data('quantity');
                $('#editmodal').modal('show');
                $('#name').val(name);
                $('#price').val(price);
                $('#quantity').val(quantity);
                $('#idProduto').val(id);
            });

            $('#editForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');

                $.post(url,form,function(data){
                    $('#editmodal').modal('hide');
                    showProdutos();
                })
            });
            //---------

            //Módulo deletar produto
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#deleteproduto').val(id);
            });

            $('#deleteproduto').click(function(){
                var id = $(this).val();
                $.post("{{ URL::to('destroy') }}",{id:id}, function(){
                    $('#deletemodal').modal('hide');
                    showProdutos();
                })
            });
            //--------
        });        

        //Função listar produtos
        function showProdutos() {
            $.get("{{ URL::to('show') }}", function(data){
                $('#produtoBody').empty().html(data);
            });
        }

        //Módulo de busca
        $('#search').on('keyup', function() {
            $value=$(this).val();

            if ($value){
                $('#produtoBody').hide();
            }

            $.ajax({

                type:'get',
                url:'{{URL::to('search')}}',
                data:{'search':$value},

                success:function(data) {
                    $('#pesquisa').html(data);
                }

            });
            
        })
    </script>
@endsection