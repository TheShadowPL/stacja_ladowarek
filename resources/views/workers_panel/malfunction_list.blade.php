<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ładowarek</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        h2 {
            color: #333;
        }

        table{
            width:100%;
            table-layout: fixed;
        }
        .tbl-header{
            background-color: #01ae70;
        }
        .tbl-content{
            height:300px;
            overflow-x:auto;
            margin-top: 0px;
            border: 1px solid #01ae70;
        }
        th{
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }
        td{
            padding: 15px;
            text-align: left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 12px;
            color: #000000;
            border-bottom: solid 1px #01ae70;
        }


        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<x-navbar />
<h2>Lista Ładowarek</h2>

<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
        <thead>
        <tr>
            <th>Ładowarka</th>
            <th>Użytkownik</th>
            <th>Opis Awari</th>
            <th>Data Zgłoszenia</th>
            <th>Akcje</th>
        </tr>
        </thead>
    </table>
</div>
<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
        @foreach($reports as $results)

            <tr>
                <td>{{ $results->charger->city }}</td>
                <td>{{ $results->user->username }}</td>
                <td>{{ $results->description }}</td>
                <td>{{ $results->created_at }}</td>
                <td>
                    <a href="{{ route('malfunction_list.edit', $results->id) }}">Edytuj</a>
                    <form action="{{ route('malfunction_list.delete', $results->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
</body>
</html>
