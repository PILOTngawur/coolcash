@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1 class="text-2xl font-bold">KATEGORI UANG MASUK</h1>
            </div>

            <div class="section-body">

                <div class="card shadow-lg rounded-lg">
                    <div class="card-header bg-blue-500 text-white rounded-t-lg">
                        <h4 class="flex items-center"><i class="fas fa-dice-d6 mr-2"></i> EDIT KATEGORI UANG MASUK</h4>
                    </div>

                    <div class="card-body p-6">

                        <form action="{{ route('categories_debit.update', $categoriesDebit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label class="block text-sm font-medium text-gray-700">NAMA KATEGORI</label>
                                <input type="text" name="name" value="{{ old('name', $categoriesDebit->name) }}" placeholder="Masukkan Nama Kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">

                                @error('name')
                                <div class="text-red-600 text-sm mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                            <button class="btn btn-warning btn-reset bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 transition" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        var timeoutHandler = null;

        /**
         * btn submit loader
         */
        $( ".btn-submit" ).click(function()
        {
            $( ".btn-submit" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-submit" ).removeClass('btn-progress');

            }, 1000);
        });

        /**
         * btn reset loader
         */
        $( ".btn-reset" ).click(function()
        {
            $( ".btn-reset" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-reset" ).removeClass('btn-progress');

            }, 500);
        })

    </script>
@stop