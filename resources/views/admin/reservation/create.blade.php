<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.Reservation.store')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">index table</a>
        </div>
        <div class="m-2 p-2">

        </div>

        <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{route('admin.table.store')}}" >
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="firsh_name" class="block text-sm font-medium text-gray-700">firsh Name </label>
                        <div class="mt-1">
                            <input type="text" id="firsh_name" name="firsh_name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">last Name </label>
                        <div class="mt-1">
                            <input type="text" id="last_name" name="last_name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email </label>
                        <div class="mt-1">
                            <input type="email" id="email" name="email"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="tel_number" class="block text-sm font-medium text-gray-700">phone number </label>
                        <div class="mt-1">
                            <input type="number" id="tel_number" name="tel_number"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation date </label>
                        <div class="mt-1">
                            <input type="datetime-local" id="res_dete" name="res_date"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number </label>
                        <div class="mt-1">
                            <input type="number" id="image" name="guest_number"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                        </div>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="Status" class="block text-sm font-medium text-gray-700">tables</label>
                        <div class="mt-1">
                           <Select id="table_id" name="table_id" class="form-multiselect block w-full mt-1" mul tiple >
                       @foreach ($tables as $table )
                       <option value="{{$table->id}}">{{$table->name}} </option>
                       @endforeach
                            
                            </Select>
                        </div>
                    </div>
        
                   
                    
                    <div class="mt-6 p-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                    </div>
                </form>
            </div>

</x-app-layout>
