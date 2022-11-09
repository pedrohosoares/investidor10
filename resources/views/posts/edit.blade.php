<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar post ') }} - {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="grid md:grid-cols-80/20 grid-cols-1 gap-4 block rounded-lg shadow-lg bg-white">
                        <div class="form-group mb-6">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="p-5">
                                <label for="title">
                                    <span>{{ __('Título') }}</span>
                                    <input type="text" required value="{{ $post->title }}" name="title" placeholder="Título" id="title" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                </label>
                                <label for="slug">
                                    <span>{{ __('Slug') }}</span>
                                    <input type="text" name="slug" value="{{ $post->slug }}" placeholder="Slug" id="slug" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                </label>
                                <label for="content">
                                    <span>{{ __('Artigo') }}</span>
                                    <textarea name="content" required id="content" placeholder="Artigo" cols="30" rows="10" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">{{ $post->content }}</textarea>
                                </label>
                                <br />
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">
                                    {{ __('Thumbnail') }}
                                </label>
                                <input name="thumbnail" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                @if(!empty($post->thumbnail))
                                    <img src="{{ Storage::url($post->thumbnail) }}" class="" />
                                @endif
                                <br />
                                <button
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                type="submit">{{ __('Atualizar') }}</button>
                            </div>
                        </div>
                        <aside class="p-5 categories pt-5">
                            <label for="published">
                                <span>{{ __('Publicar em') }}</span>
                                <input type="datetime-local" required name="published" value="{{ $post->published }}" id="published" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                            </label>
                            <br />
                            <label for="title">
                                <span>{{ __('Categorias') }}</span>
                            </label>
                            @foreach ($categories as $category)
                                @php
                                $categoryID = $category->id;
                                $checked = App\Http\Support\PostSupport::filterCategoryChecked(
                                    $post->categories,
                                    $categoryID
                                );
                                @endphp
                                <div class="flex items-center mb-4">
                                    <input
                                    id="default-checkbox"
                                    type="checkbox"
                                    @if($checked->count()) checked @endif
                                    value="{{ $category->id }}"
                                    name="category[]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach

                            <hr />
                            <br />
                            <h3>Histórico de edição</h3>
                            <div class="h-96 overflow-auto">
                                <ul class="list-disc list-inside">
                                    @foreach ($post->history as $history)
                                        <li class="text-xs">{{ $history->description }} - {{ $history->created_at }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
