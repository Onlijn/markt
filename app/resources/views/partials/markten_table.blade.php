<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Bedrijfsnaam</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Telefooon</th>
            <th>E-mail</th>
            <th>Website</th>
        </tr>
    </thead>
    <tbody>
        @foreach($standhouders as $standhouder)
        <tr>
            <td>{{ $standhouder->id }}</td>
            <td>{{ $standhouder->Bedrijfsnaam }}</td>
            <td>{{ $standhouder->Voornaam }}</td>
            <td>{{ $standhouder->Achternaam }}</td>
            <td>{{ $standhouder->Telefoon }}</td>
            <td>{{ $standhouder->Email }}</td>
            <td>{{ $standhouder->Website }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
