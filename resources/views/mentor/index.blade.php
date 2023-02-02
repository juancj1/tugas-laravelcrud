<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
<header class="bg-[#FFFAF2]">
<section class="container mx-auto ">
            <!-- navbar -->
            <section id="topbar" class="flex justify-between gap-10 items-center py-5">
                <div id="left-side" class="flex gap-10 items-center">
                    <img class="max-sm:pl-5" src="foto/courses.png" alt="">
                    <nav class="fixed w-full h-full top-0 p-10 lg:p-0 lg:relative bg-primary lg:bg-transparent z-20 lg:z-0 ">
                        <ul class="flex flex-col lg:flex-row gap-y-5 gap-x-2 items-center">
                            <li class="{{request()->is ('/') ? 'active' : '' }} " ><a href="/dashboard" class="">
                                Home</a>
                            </li>
                                <li class="{{ request()->is('course') ? 'active' : '' }}"> <a class="active" href ="/course"> course</a></li>
                            <li><a href="#">Mentor</a></li>
                            <li class="has-child">
                                <a href="#">About Us</a>
                                <span class="caret"></span>
                                <ul class="submenu">
                                    <li><a href="#">Visi</a></li>
                                    <li><a href="#">Misi</a></li>
                                    <li><a href="#">Profil</a></li>
                                </ul>
                            </li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </nav>
                </div>

                   <!-- Settings Dropdown --> 

            <div class="hidden sm:flex sm:items-center sm:ml-6"> 

<x-dropdown align="right" width="48"> 

    <x-slot name="trigger"> 

        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-primary hover:bg-secondary  focus:outline-none transition ease-in-out duration-150"> 

            <div>{{ Auth::user()->name }}</div> 




            <div class="ml-1"> 

                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"> 

                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /> 

                </svg> 

            </div> 

        </button> 

    </x-slot> 

    <!-- {{ request()->is('/') ? 'active' : '' }} -->




    <x-slot name="content"> 

        <x-dropdown-link :href="route('profile.edit')"> 

            {{ __('Profile') }} 

        </x-dropdown-link> 




        <!-- Authentication --> 

        <form method="POST" action="{{ route('logout') }}"> 

            @csrf 




            <x-dropdown-link :href="route('logout')" 

                    onclick="event.preventDefault(); 

                                this.closest('form').submit();"> 

                {{ __('Log Out') }} 

            </x-dropdown-link> 

        </form> 

    </x-slot> 

</x-dropdown> 

</div> 


              

  

                
            </section>


            <div class=" mb-10 ">

                <h1 class="text-[#151F3C] pt-36 text-7xl max-w-[600px] font-bold max-sm:text-3xl ">
                    List Mentor yang sudah tersedia
                </h1>
                
                <article class="text-base max-w-[550px] pt-6 max-sm:text-sm">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum massa sit amet porta efficitur.
                </article>

            </div>


                
            </div>
     
            
        </section>
    </header>



    <div class="bg-white container mx-auto">
        <div>
        <x-success-status class="mb-4" :status="session('message')" />
            <table class="table table-bordered w-full ">
                <thead>
                    <tr class="text-center ">
                        <th scope="col" class=" border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">id</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 " >name</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">email</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">phone</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">gender</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">alamat</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">edit</th>
                        <th scope="col" class="border-2 border-slate-700 text-sm font-normal text-gray-800 px-6 py-4 ">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mentor as $mentor )
                    <tr class="text-center">
                        <td class="border-2 border-slate-700">{{ $mentor->id }}</td>
                        <td class="border-2 border-slate-700">{{ $mentor->name }}</td>
                        <td class="border-2 border-slate-700">{{ $mentor->email }}</td>
                        <td class="border-2 border-slate-700 ">{{ $mentor->phone }}</td>
                        <td class="border-2 border-slate-700">{{ $mentor->gender }}</td>
                        <td class="border-2 border-slate-700">{{ $mentor->alamat }}</td>
                        <td class="border-2 border-slate-700 bg-green-700 text-white">
                            <a href="{{ url('/edit-mentor/'.$mentor->id) }}" class="">edit</a>
                        </td>
                        <td class="border-2 border-slate-700 bg-red-800 text-white">
                            
                            <form action="{{ url('delete-mentor/'.$mentor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="">
                                    delete
                                </button>
                            </form>
                        </td>
                         
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6"> no record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    


</body>

</html>