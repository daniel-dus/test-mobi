<html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="libs/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div class="navbar-fixed">
            <nav class="blue  darken-4">
              <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                  <h4>Star Wars API</h2>
                </ul>
              </div>
            </nav>
        </div>

        <div class="row">
            <div class="col 12">
                <a href="#!" class="breadcrumb black-text">Películas</a>
            </div>
        </div>

        <div class="row">
            <div class="col s4 m2 l2" id="side-nav" style="border: 1px solid black; height: 400px">
                <ul>
                    <li><a href="main">Películas</a></li>
                </ul>
            </div>
            <div class="col s8 m9 l9" id="content">
                <table id="table-peliculas">
                    <thead>
                        <tr>
                            <th>Película</th>
                            <th>Director</th>
                            <th>Fecha de Lanzamiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/javascript" src="libs/jquery.3.4.1.min.js"></script>
        <script type="text/javascript" src="libs/materialize/js/materialize.min.js"></script>
    </body>

    <script type="text/javascript">
        $.ajax({
            url: 'main/get_peliculas',
            dataType: 'json',
            success:function(data){
                $('#table-peliculas tbody').html(data.tabla);
            }
        });

        function verNaves(url, pelicula){
            $.ajax({
                url: 'main/naves/',
                data: {url: url, pelicula: pelicula},
                type: 'POST',
                dataType: 'json',
                success:function(data){
                    $('#content').html(data.content);
                }
            })

        }

        function guardarNave(){
            $.ajax({
                url: 'main/insertar_nave',
                data: $('#form-nave').serialize(),
                type:'POST',
                success: function(data){
                    alert(data.msg);
                }
            })
        }

    </script>
</html>
