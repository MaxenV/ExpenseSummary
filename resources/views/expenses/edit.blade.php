@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Edytowanie wydatku') }}
                        <a href="{{ route('expenses.index') }}">
                            <button class="btn-sm btn btn-primary ">
                                Powrót
                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nazwa') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $expense->name }}" required autofocus autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price_one"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cena jednostki') }}</label>

                                <div class="col-md-6">
                                    <input id="price_one" type="number" step="0.01" min="0"
                                        class="form-control @error('price_one') is-invalid @enderror" name="price_one"
                                        value="{{ $expense->price_one }}" required autocomplete="price_one">

                                    @error('price_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="quantity"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ilość') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" min="0" step="0.001"
                                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                        required autocomplete="new-quantity" value="{{ $expense->quantity }}">


                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ilość') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date" required
                                        value="{{ $expense->date }}">


                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="row m-0 p-0">
                                    <label for="type"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Typ') }}</label>

                                    <div class="col-md-6">
                                        <select id="type" class="form-control @error('type') is-invalid @enderror"
                                            name="type" required autocomplete="new-type">
                                            @foreach ($existingTypes as $type)
                                                <option value="{{ $type[0]->type }}"
                                                    @if ($expense->type == $type[0]->type) selected @endif>{{ $type[0]->type }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row m-0 mb-1 mt-2 p-0 d-flex justify-content-center">
                                    <label for="newTypeCheck"
                                        class="col-md-4 offset-2 form-check-label text-md-end">{{ __('Nieznany typ') }}</label>

                                    <div class="col-md-6">
                                        <input id="newTypeCheck" type="checkbox"
                                            class="form-check-input
                                            @error('newTypeCheck') is-invalid @enderror"
                                            name="newTypeCheck">

                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row m-0 p-0 overflow-hidden newTypeContainer">
                                    <label for="newType"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nowy typ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="newType" id="newType"
                                            class="form-control @error('quantity') is-invalid @enderror">

                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success me-4 px-3">
                                        {{ __('Edytuj') }}
                                    </button>
                                    <a href="{{ route('expenses.index') }}">
                                        <button class="btn btn-primary px-3" type="button">
                                            Powrót
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/newType.js', 'resources/css/editCreate.css'])
@endsection
