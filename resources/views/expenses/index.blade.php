@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-lg-12 pt-3 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Wykres wydatków</h1>
                    Porównanie wydatków w różnych dniach tygodnia
                </div>

                <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

                <h2>Lista wydatków</h2>
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
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nazwa</th>
                                    <th class="text-center">Cena jednostki</th>
                                    <th class="text-center">ilosc</th>
                                    <th class="text-center">Cena</th>
                                    <th class="text-center">typ</th>
                                    <th class="text-center">data</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $index => $expense)
                                    <tr>
                                        <td class="text-center align-middle">{{ $expense->number }}</td>
                                        <td class="text-center align-middle">{{ $expense->name }}</td>
                                        <td class="text-center align-middle">{{ $expense->price_one }} PLN</td>
                                        <td class="text-center align-middle">{{ $expense->quantity }}</td>
                                        <td class="text-center align-middle">
                                            {{ $expense->price_one * $expense->quantity }}
                                            PLN
                                        </td>
                                        <td class="text-center align-middle">{{ $expense->type }}</td>
                                        <td class="text-center align-middle">
                                            {{ date('Y-m-d', strtotime($expense->date)) }}
                                        </td>
                                        <td class=" text-center align-middle d-flex justify-content-around flex-wrap">
                                            <a href="{{ route('expenses.edit', $expense->id) }}"
                                                class=" col-lg-5 text-center ">
                                                <button class="btn btn-success col-sm-12 px-4 text-center">Edit</button></a>
                                            <button class="btn btn-danger btn-sm delete  col-lg-5 px-3 text-center"
                                                data-id="{{ $expense->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $expenses->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>




    <script>
        const graphData = {
            labels: ["Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela"],
            datasets: [{
                data: [
                    @foreach ($expensesByDayOfWeek as $dayOfWeek => $totalAmount)
                        {{ $totalAmount }},
                    @endforeach
                ],
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

    @vite(['resources/js/summaryGraph.js'])
    @vite(['resources/js/delete.js'])
@endsection

@section('javascript')
    <script type="text/javascript">
        const deleteUrl = "{{ url('delete') }}/";
        let csrfToken = "{{ csrf_token() }}";
    </script>
@endsection
