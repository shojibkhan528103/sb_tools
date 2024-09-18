<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ htmlspecialchars($item->id, ENT_QUOTES, 'UTF-8') }}</td>
            <td>{{ htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') }}</td>
            <td>{{ htmlspecialchars($item->created_at, ENT_QUOTES, 'UTF-8') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
