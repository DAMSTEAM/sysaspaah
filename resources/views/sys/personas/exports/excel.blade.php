<div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
        </tr>
        </thead>
        <tbody>
        @foreach($personas as $persona)
            <tr>
                <td>{{ $persona->ID_PERSONA }}</td>
                <td>{{ $persona->NO_SOCIO }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>