<h1>Paises</h1>
<a href="#">Agregar Pais</a>

<ul>
    @foreach($paises as $pais)
        <li>{{ $pais->pais }}</li>
    @endforeach 
</ul>