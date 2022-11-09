@foreach($produtos as $produto)
    <tr class="text-center">
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->name }}</td>
        <td>{{ $produto->price }}</td>
        <td>{{ $produto->quantity }}</td>
        <td>
            <a href='#' class='btn btn-success edit' 
                data-id='{{ $produto->id }}'
                data-name='{{ $produto->name }}'
                data-price='{{ $produto->price }}'
                data-quantity='{{ $produto->quantity }}'> 
                Edit
            </a> 
            <a href='#' class='btn btn-danger delete' data-id='{{ $produto->id }}'> Delete</a>
        </td>
    </tr>
@endforeach