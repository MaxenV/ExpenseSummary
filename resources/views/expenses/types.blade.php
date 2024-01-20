@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('components.sideNav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                <div class="table-responsive">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-around">
                            <div class="typeName col-sm-3 text-center h4 m-1">
                                Nazwa typu
                            </div>
                            <div class="options col-sm-3 text-center h4 m-1">
                                Opcje
                            </div>
                        </li>
                        @foreach ($types as $type)
                            <li class="list-group-item d-flex justify-content-around">
                                <div class="typeName col-sm-3 text-center">
                                    {{ $type->name }}
                                </div>
                                <div class="options col-sm-3 text-center">
                                    <a href="#"><button class="btn btn-success px-4">Edit</button></a>
                                    <button class="btn btn-danger px-3 delete" data-id="{{ $type->id }}">Delete</button>
                                </div>
                            </li>
                        @endforeach
                        <hr>
                        <li class="list-group-item ">
                            <form method="post" action="{{ route('types.index') }}" class="d-flex justify-content-around">
                                @csrf
                                <div class="typeName col-sm-3 text-center">
                                    <input type="text" name="name" class="form-control text-center"
                                        placeholder="Nazwa nowego typu">
                                </div>
                                <div class="options col-sm-3 text-center">
                                    <button class="btn btn-success px-4">Dodaj nowy typ</button>
                                </div>
                            </form>
                        </li>
                    </ul>

                </div>
            </main>
        </div>
    </div>




    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
@endsection

@section('javascript')
    <script type="text/javascript">
        const deleteUrl = "{{ url('types') }}/";
        let csrfToken = "{{ csrf_token() }}";
    </script>
@endsection
@vite(['resources/js/summaryGraph.js'])
@vite(['resources/js/delete.js'])
