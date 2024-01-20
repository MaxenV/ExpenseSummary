@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('components.sideNav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Share</button>
                            <button class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

                <h2>Section title</h2>
                <div class="row">
                    <div class="float-end">
                        <a href="addExpanses" class='d-block float-end'>
                            <button class="btn btn-success">Dodaj wydatek</button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>user id</th>
                                    <th>Nazwa</th>
                                    <th>Cena jednostki</th>
                                    <th>ilosc</th>
                                    <th>Cena</th>
                                    <th>typ</th>
                                    <th>data</th>
                                    <th class="col-sm-2">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expensions as $expension)
                                    <tr>
                                        <td>{{ $expension->userId }}</td>
                                        <td>{{ $expension->name }}</td>
                                        <td>{{ $expension->price_one }} PLN</td>
                                        <td>{{ $expension->quantity }}</td>
                                        <td>{{ $expension->price_one * $expension->quantity }} PLN</td>
                                        <td>{{ $types[$expension->type]['name'] }}</td>
                                        <td>{{ date('Y-m-d', strtotime($expension->date)) }} </td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('expenses.edit', $expension->id) }}"> <button
                                                    class="btn btn-success">edit</button></a>
                                            <button class="btn btn-danger btn-sm delete"
                                                data-id="{{ $expension->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script>
        const graphData = {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        }
    </script>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
@endsection

@section('javascript')
    <script type="text/javascript">
        const deleteUrl = "{{ url('delete') }}/";
        let csrfToken = "{{ csrf_token() }}";
    </script>
@endsection
@vite(['resources/js/summaryGraph.js'])
@vite(['resources/js/delete.js'])
