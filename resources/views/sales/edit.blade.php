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
</head>

<body>

    <div class="container">
        @errors @enderrors
        @success @endsuccess
        <h2>Editar</h2>
        <!-- /.box-header -->
        <form action="{{ route('vendas.update', ['sale' => $sale->id]) }}" method="POST">
            <div class="form-row">
                <div class="col-md-12">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend1">Produto</span>
                            </div>
                            <input type="text" aria-describedby="inputGroupPrepend1" class="form-control" id="name"
                                name="name" value="{{ old('name', $sale->product->name ?? null) }}" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">Data</span>
                            </div>
                            <input type="text" aria-describedby="inputGroupPrepend2" class="form-control"
                                id="updated_at" name="updated_at"
                                value="{{ old('updated_at', $sale->updated_at->format('d/m/Y') ?? null) }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">Valor</span>
                            </div>
                            <input type="text" aria-describedby="inputGroupPrepend3" class="form-control" id="price"
                                name="price" value="{{ old('price', $sale->product->price ?? null) }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">

                <button type="submit" class="btn btn-outline-success">Filtrar</button>
            </div>
        </form>
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
