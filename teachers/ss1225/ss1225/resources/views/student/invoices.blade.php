<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            {{-- <td>{{ $student->phoneRelation->phone }}</td> --}}

            @if (!empty($student->phoneRelation->phone))
                <td>{{ $student->phoneRelation->phone }}</td>
            @else
            <td>no data</td>
        @endif
        </tr>
    @endforeach
    </tbody>
</table>