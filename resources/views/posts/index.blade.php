<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artigos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('components.alerts.success')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:flex space-x-2">
                    <a href="{{ route('posts.create') }}" rel="Novo post" type="button"
                        class="w-38 m-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">{{ __('Novo Post') }}</a>
                    <form method="get" class="pb-0">
                        <input list="results" class="h-9 rounded" type="search" name="s" placeholder="Buscar por Título ou Categoria" id="" />
                        <datalist id="results">
                        </datalist>
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                          <table class="min-w-full">
                            <thead class="border-b">
                              <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  ID
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Título
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Imagem
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Autor
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $post->id }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $post->title }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            thumb
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $post->author->name }}
                                        </td>
                                        <td class="w-4 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('posts.edit',$post->id) }}" rel="Editar">
                                                <svg style="width:24px;height:24px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="920.729px" height="920.729px" viewBox="0 0 920.729 920.729" style="enable-background:new 0 0 920.729 920.729;" xml:space="preserve"> <g> <path d="M897.491,833.729c-1.399,0-2.699,0.1-4.1,0.3l-245.7,31.8c-12.6,1.601-21.399-12.2-14.6-23c3.7-5.7,7.3-11.5,10.899-17.3   c9.5-15.4-3.199-35.9-20.8-35.9c-1.2,0-2.399,0.101-3.7,0.301l-322,48.399l-38.5,5.8l-105,15.801c-11.9,1.8-19.9,11.899-18.9,24   c0.4,5.399,2.6,10.5,6.1,14.3c4.1,4.5,9.8,7,16,7c1.2,0,2.4-0.101,3.7-0.3l383.8-57.7c13.101-2,22.101,12.8,14.4,23.6   c-2.5,3.4-5,6.9-7.5,10.3c-6.9,9.4-5.3,25.101,2.7,33.2c4.1,4.2,9.3,6.4,14.8,6.4c0.6,0,1.3,0,1.899-0.101h0.101h0.1l331.3-42.199   h0.101h0.1c5.7-0.9,10.7-4.2,14-9.301c3.601-5.6,4.9-12.5,3.3-18.699C917.391,840.329,908.591,833.729,897.491,833.729z"/> <path d="M755.891,191.529c26.7-31.7,22.6-79-9.1-105.7l-81.101-68.2c-31.7-26.7-79-22.6-105.7,9.1l-32.1,38.1l195.9,164.8   L755.891,191.529z"/> <polygon points="698.891,258.629 502.991,93.829 436.591,172.829 632.491,337.629  "/> <path d="M0.091,877.43c-0.5,6.8,5.8,12.1,12.4,10.399l49.5-12.5l-58.2-49L0.091,877.43z"/> <path d="M236.69,807.229l367.701-436.8l-195.901-164.8l-367.7,436.7c-6.8,8.101-10.9,18.101-11.6,28.601l-8.7,120.8l72.8,61.3   l117.3-29.5C220.791,820.93,229.891,815.229,236.69,807.229z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            </a>
                                        </td>
                                        <td class="w-4 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" rel="Excluir">
                                                    <svg style="width:24px;height:24px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="482.428px" height="482.429px" viewBox="0 0 482.428 482.429" style="enable-background:new 0 0 482.428 482.429;" xml:space="preserve"> <g> <g> <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098    c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117    h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828    C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879    C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096    c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266    c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979    V115.744z"/> <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07    c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z"/> <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07    c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z"/> <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07    c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                          @include('components.pagination',['data'=>$posts])
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <script>
        const filterNews = {
            url: window.location.origin,
            datalist:document.querySelector('datalist'),
            input:document.querySelector('input[name="s"]'),
            createList(news){
                this.datalist.innerHTML = '';
                news.data.forEach((nameNews,index)=>{
                    const option = document.createElement('option');
                    option.value = nameNews.title;
                    option.dataset.id = nameNews.id;
                    this.datalist.append(option);
                });
            },
            selectOption(){
                this.input.onchange = (e)=>{
                    const value = e.target.value;
                    const options = this.datalist.querySelectorAll('option');
                    options.forEach(element => {
                        if(element.value == value){
                            let id = element.dataset.id;
                            window.location.href = filterNews.url+'/posts?id='+id;
                        }
                    });
                }
            },
            putKeyInSearch(){
                this.input.oninput = (e)=>{
                    const value = e.target.value;
                    if(value.length > 2){
                        fetch('/api/posts?title='+value)
                        .then((results)=> results.json())
                        .then((results)=>{
                            filterNews.createList(results);
                            filterNews.selectOption();
                        });
                    }
                }
            },
            init(){
                this.putKeyInSearch();
            }
        }
        filterNews.init();
    </script>
</x-app-layout>
