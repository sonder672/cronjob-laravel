<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
        type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript">
    </script>

    <title>Hello, world!</title>
</head>

<body>
    @include('navbar')
    <section class="vh-100" style="background-color: #eee">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px">
                        <div class="card-body p-md-5">
                            <a href="{{ route('home') }}" class="btn btn-success mb-2">Crear</a>
                            <div class="row justify-content-center">
                                <table class="table table-dark mb-0" id="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th>Publicación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->product_id }}</td>
                                                <td></td>
                                                <td onclick="return confirmAction()">{{ $product->name_product }}</td>
                                                <td>{{ $product->price }}</td>
                                                @if ($product->state == 1)
                                                    <td>Publicado</td>
                                                @else
                                                    <td>Sin publicar</td>
                                                @endif
                                                <td>{{ $product->updated_at }}</td>
                                                <td>
                                                    {{-- Se hace referencia a route('home') para que al hacer la petición
                                                        el middleware de Request lo intercepte --}}
                                                    <a href="{{ route('home') }}" class="btn btn-info">Editar</a>
                                                    <a href="{{ route('home') }}" class="btn btn-warning">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>

<script>
    //Implementación de Vanilla-Datatable.
    var table = document.querySelector("#table");
    var dataTable = new DataTable(table, {
        perPage:4,
        perPageSelect:[4, 8]
    });

    function confirmAction()
    {
        alert("Acaba de dar clic sobre el nombre");
    }
</script>
