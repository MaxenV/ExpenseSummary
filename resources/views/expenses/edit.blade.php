@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edytowanie wydatku') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('expenses.update', $expension->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $expension->name }}" required autofocus autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cena jednostki') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" min="0"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ $expension->price_one }}" required autocomplete="price">

                                    @error('price')
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
                                    <input id="quantity" type="number" min="0"
                                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                        required autocomplete="new-quantity" value="{{ $expension->quantity }}">


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
                                        value="{{ $expension->date }}">


                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Typ') }}</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-control @error('type') is-invalid @enderror"
                                        name="type" required autocomplete="new-type">
                                        <option value="null" selected>wybierz typ</option>
                                        <option value="1">jedzenie </option>
                                        <option value="2">podatki </option>
                                        <option value="3">zachcianki </option>
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edytuj') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
