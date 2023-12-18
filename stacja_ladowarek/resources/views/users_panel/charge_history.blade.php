

//@extends('layouts.app')

@section('content')
    <h1>Historia ładowań</h1>

    @if($chargingSessions->isEmpty())
        <p>Brak dostępnych danych o ładowaniach.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Data rozpoczęcia</th>
                <th>Data zakończenia</th>
                <th>Ilość naładowanej energii</th>
                <th>Koszt</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chargingSessions as $session)
                <tr>
                    <td>{{ $session->start_time }}</td>
                    <td>{{ $session->end_time }}</td>
                    <td>{{ $session->energy_charged }}</td>
                    <td>{{ $session->cost }}</td>
                    <td>{{ $session->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
