<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.Menu.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">new Menu</a>
            </div>
           
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                   Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Menu as $Menu )
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
               {{$Menu->name}}
            </th>

            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                <img src="{{Storage::url($Menu->image)}} " class="w-16 h-16 rounded" alt="">
             </th>

             <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                {{$Menu->price}}
             </th>
            
             <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
               <div class="flex space-x-2">
                <a href="{{route('admin.Menu.edit', $Menu->id)}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg 
                    text-white"> Edite</a>
   
                    <form  class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                     action="{{route('admin.Menu.destroy', $Menu->id)}}" 
                     method="POST" 
                     onsubmit="return confirm('are you sur?')">
                           @csrf
                       @method('DELETE')
                       <button type="submit" >Delete</button>
                    </form>
               </div>
             </th>
         </tr>
         @endforeach  
        </tbody>
    </table>
</div>

        </div>
    </div>
</x-app-layout>
