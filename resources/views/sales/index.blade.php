<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfect Pay - Sales</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container">
        @errors @enderrors
        @success @endsuccess
        <div class="d-flex justify-content-center mt-4">
            <form action="{{ route('sales.index') }}" class="form-inline" method="GET">
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <select class="form-control mb-2 mr-sm-2" name="customer_id" id='customer_id' required>
                    <option value="">
                        Clientes
                    </option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">
                        {{ $cliente->name }}
                    </option>
                    @endforeach
                </select>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Período</div>
                    </div>
                    <input type="date" name="data" class="form-control" id="inlineFormInputGroupUsername2"
                        placeholder="Username">
                </div>
                <button type="submit" class="btn btn-outline-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <div class="tabela-vendas">
            <h2>Tabela de Vendas</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $venda)

                    <tr>
                        <th scope="row">{{ $venda->product->name }}</th>
                        <td>{{ \Carbon\Carbon::parse($venda->updated_at)->format('d/m/yy')}}</td>
                        <td>{{ $venda->product->price }}</td>
                        <td><a href="/vendas/{{ $venda->id }}/edit" class="btn btn-outline-success">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tabela-vendas">
            <h2>Resultado das Vendas</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultadoVendas as $result)

                    <tr>
                        <th scope="row">{{ $result->status }}</th>
                        <td>{{ $result->quantity }}</td>
                        <td>R$ {{ $result->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
