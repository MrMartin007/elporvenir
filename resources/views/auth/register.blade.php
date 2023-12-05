@extends('layouts.appp')

@section('title', 'Register')

@section('content')
    <style>
        body {

        }
        .m{
            margin-left: 35%;
            width: 30%;
            height: 50%;
        }
        .form {
            width: 300px;
            height: 300px;
            display: grid;
            place-content: center;

            /* Add a transparency to the background
               using rgba value */
            background: rgba(255, 255, 255, 0.1);

            /* Add a transparency to shadow */
            box-shadow: 0 26px 42px rgba(0, 0, 0, 0.1);
        }

    </style>
    <div  style="background: rgba(255, 255, 255, 0.6)"
          class="block mx-auto my-7 p-9  w-1/3 border border-gray-200
    round-lg shadow-lg" >
        <h1 class="text-3xl text-center pt-3">REGISTRO</h1>
        <div class="ima" >
            <img class="m offset-2" src=" https://cdn-icons-png.flaticon.com/512/1000/1000946.png">
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Name" id="name" name="name">

            @error('name')

            <p class="border border-red-500 rounded-md bg-red-100 w-full
            text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror

            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="email">

            @error('email')

            <p class="border border-red-500 rounded-md bg-red-100 w-full
            text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror


            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password" id="password" name="password">

            @error('password')

            <p class="border border-red-500 rounded-md bg-red-100 w-full
            text-red-600 p-2 my-2">* {{$message}}</p>

            @enderror
            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password_confirmation" id="password_confirmation" name="password_confirmation">

