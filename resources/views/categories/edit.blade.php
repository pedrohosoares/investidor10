<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria') }} - {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('categories.update',$category->id) }}" method="POST">
                    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                        <div class="form-group mb-6">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id"  value="{{ $category->name }}" />
                            <div>
                                <label for="title">
                                    <span>{{ __('Nome') }}</span>
                                    <input type="text" value="{{ $category->name }}" required name="name" placeholder="Nome" id="nome" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                </label>
                                <br />
                                <button
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                type="submit">{{ __('Atualizar') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


