<h1>Datos de Personas</h1>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{foreach personas}}
        <tr>
            <td>{{persona_id}}</td>
            <td>{{nombre}}</td>
            <td>{{apellido}}</td>
            <td>{{edad}}</td>
            <td>{{estadoDsc}}</td>
            <td>
                <a href="index.php?page=Personas-Persona&mode=UPD&id={{persona_id}}">Editar</a>
                &nbsp;
                <a href="index.php?page=Personas-Persona&mode=DEL&id={{persona_id}}">Eliminar</a>
            </td>
        </tr>
        {{endfor personas}}
    </tbody>
</table>
<br>
<a href="index.php?page=Personas-Persona&mode=INS">Agregar Nueva Persona</a>
