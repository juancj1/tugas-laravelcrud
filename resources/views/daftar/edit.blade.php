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
                            <li class="{{request()->is ('/') ? 'active' : '' }} " ><a href="#" class="">
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
                <button class="mobile-btn fixed right-0 top-6 lg:static lg:hidden z-30 lg:z-10">
                    <svg class="bar" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 17H19M5 12H19M5 7H19" stroke="black" stroke-width="2.01562" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <svg class="close " width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.6439 11.9998L18.657 6.99835C18.8765 6.77882 18.9998 6.48107 18.9998 6.17061C18.9998 5.86014 18.8765 5.5624 18.657 5.34286C18.4374 5.12333 18.1397 5 17.8292 5C17.5187 5 17.221 5.12333 17.0015 5.34286L12 10.356L6.99857 5.34286C6.77904 5.12333 6.48129 5 6.17083 5C5.86036 5 5.56261 5.12333 5.34308 5.34286C5.12355 5.5624 5.00022 5.86014 5.00022 6.17061C5.00022 6.48107 5.12355 6.77882 5.34308 6.99835L10.3562 11.9998L5.34308 17.0012C5.23381 17.1096 5.14708 17.2386 5.08789 17.3806C5.0287 17.5227 4.99823 17.6751 4.99823 17.829C4.99823 17.9829 5.0287 18.1353 5.08789 18.2773C5.14708 18.4194 5.23381 18.5484 5.34308 18.6567C5.45146 18.766 5.58041 18.8527 5.72247 18.9119C5.86454 18.9711 6.01692 19.0016 6.17083 19.0016C6.32473 19.0016 6.47711 18.9711 6.61918 18.9119C6.76125 18.8527 6.89019 18.766 6.99857 18.6567L12 13.6436L17.0015 18.6567C17.1098 18.766 17.2388 18.8527 17.3809 18.9119C17.5229 18.9711 17.6753 19.0016 17.8292 19.0016C17.9831 19.0016 18.1355 18.9711 18.2776 18.9119C18.4196 18.8527 18.5486 18.766 18.657 18.6567C18.7662 18.5484 18.853 18.4194 18.9121 18.2773C18.9713 18.1353 19.0018 17.9829 19.0018 17.829C19.0018 17.6751 18.9713 17.5227 18.9121 17.3806C18.853 17.2386 18.7662 17.1096 18.657 17.0012L13.6439 11.9998Z" fill="#000"/>
                    </svg>                                                        
                </button>

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

           
        

            <div>
                    <div class="">

       
                
            </div>

            <div class="">

                <h1 class="text-[#151F3C] pt-10 text-7xl max-w-[600px] font-bold max-sm:pl-10 max-xl:pb-10 max-sm:text-3xl ">
                    Form Edit
                </h1>
                
                <article class="text-base max-w-[550px] max-sm:pl-10 max-sm:text-sm">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum massa sit amet porta efficitur.
                </article>
          

                

            </div>


                
            </div>
     
            
        </section>
    </header>


<x-validation-errors class="mb-4" :errors="$errors" />

<div class="bg-[#FF994F] pb-10 pt-10 mt-5">
    <div class=" container mx-auto  ">
        <div class="bg-[#FFFAF2] pt-10 pb-10 pl-10 pr-10 ">
    <form class="" action="{{ url('update-daftar/'.$daftar->id) }}" method="post">

    @csrf 
    @method('put')

    <div class="">
            <x-input-label for="name" :value="__('name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$daftar->name" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$daftar->email" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone number')" />
            <x-text-input id="phone" class="block mt-1 w-full " type="text" name="phone" :value="$daftar->phone"  autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('gender')" />
            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="$daftar->gender" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="mt-5">
                {{ __('update daftar') }}
                
            </x-primary-button>

            

    </form>
</div>
</div>
</div>


<footer class="p-16 max-sm:p-10 bg-[#281900] mt-5 ">

    <div class="grid grid-cols-1 grid-rows-1 ">
        <div class="flex flex-col lg:flex-row justify-center gap-6  text-white rounded-lg h-30">

            <div>
                <div class="flex gap-3 align-center items-center mb-10">
                    <img src="{{asset('foto/courses.png')}}" alt="">
                </div>
                <p class="font-normal text-sm max-sm:text-xm w-72 text-[#DDDDDD] ">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum massa sit amet porta efficitur.
                </p>
                <div class="flex gap-8 mt-12">
                    <img src="{{asset('foto/facebook.svg') }}" alt="">
                    <img src="{{asset('foto/Group 86.svg') }}" alt="">
                    <img src="{{asset('foto/Group 87.svg') }}" alt="">
                    <img src="{{asset('foto/Group 88.svg') }}" alt="">
                </div>

            </div>

            <div>
                <h1 class="font-bold text-sm max-sm:text-lg mb-6 ">Home</h1>
                <ul class="max-sm:flex max-sm:gap-3 max-sm:w-5 text-[#DDDDDD] list-none max-sm:text-xs">
                    <li><a href="">class</a></li>
                    <li><a href="">Course</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Mentor</a></li>
                </ul>
                

            </div>

            <div class="">
                <h1 class="font-bold text-sm max-sm:text-lg mb-6 ">Our Company</h1>
                <p class="w-72 max-w-[150px] text-[#DDDDDD]">
                    Class Comunity Course Company Company Name Mens course Courses.com
                </p>
            </div>

            <div class="">
                <h1 class="font-bold text-sm max-sm:text-lg mb-6 ">Class</h1>
                <p class="w-72 max-w-[100px] text-[#DDDDDD]">
                    Potography HTML & CSS JavaScript Java PHP UI/UX Design  Web Design Design Grafis
                </p>
            </div>

            <div>
                <h1 class="font-bold text-sm max-sm:text-lg mb-6 ">Services</h1>
                <p class="text-[#DDDDDD]">You can contact Us to send email to us</p>

                <div class="flex relative ">

                    

                    <input class="rounded-full mt-5 pb-2 pt-2 pl-2" placeholder="Your email" type="text">
                    
                    

                </div>
               
              


            </div>

        </div>
    </div>
    </div>
</footer>

<script src={{ asset('js/fitur.js') }} type="application/javascript"></script>

</body>


</html>