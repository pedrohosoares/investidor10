<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 block p-6 rounded-lg shadow-lg bg-white">
                        <div class="form-group mb-6">
                            @csrf
                            <div>
                                <label for="title">
                                    <span>{{ __('Título') }}</span>
                                    <input required type="text" name="title" placeholder="Título" id="title" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                </label>
                                <label for="slug">
                                    <span>{{ __('Slug') }}</span>
                                    <input type="text" name="slug" placeholder="Slug" id="slug" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                </label>
                                <label for="content">
                                    <span>{{ __('Artigo') }}</span>
                                    <textarea required name="content" id="content" placeholder="Artigo" cols="30" rows="10" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
                                </label>
                                <label for="published">
                                    <span>{{ __('Publicar em') }}</span>
                                    <input required type="date" name="published" id="published" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                </label>
                                <br />
                                <button
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                type="submit">Cadastrar</button>
                            </div>
                        </div>
                        <aside class="categories">
                            <label for="title">
                                <span>{{ __('Categorias') }}</span>
                            </label>
                            @foreach ($categories as $category)
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="{{ $category->id }}" name="category[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                            <a href="{{ route('categories.create') }}" rel="{{ __('Add Nova Categoria') }}">{{ __('Add Nova Categoria') }}</a>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


