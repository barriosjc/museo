<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>

<body class="container">
    <div class="row">
        <div class="col-12">
            <h1>Tabla de cuadros</h1>
        </div>
    </div>
    <form name="buscar" id="buscar" method="get" action="{{ route('cuadro.buscar') }}">
        <div class="row">
            <div class="col-7">
                <input type="search" name="nombre" placeholder="nombre">
                <input type="search" name="pais" placeholder="pais">
                <input type="search" name="autor" placeholder="autor">
                <input type="submit" value="Buscar">
            </div>

            <div class="col-5">
                <select name="fields[]" id="fields" class="form-select" multiple> 
                    <option value="todos" selected><  TODOS ></option>
                    @foreach ($fields as $dato)
                        <option value="{{$dato}}">{{$dato}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">pais</th>
                        <th scope="col">Autor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuadros as $cuadro)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $cuadro['title'] }}</td>
                            <td>{{ $cuadro['country'] }}</td>
                            <td>{{ $cuadro['author'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- {{ $cuadros->links() }} --}}
    </div>

</body>

</html>
