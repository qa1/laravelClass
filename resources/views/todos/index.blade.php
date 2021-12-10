@extends('layouts.app')

@section('content')
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mauto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('create-form') }}">Add new todo</a>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mauto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="panel-bod">
                        <table class="table">

                            <!-- Table Headings -->
                            <thead>
                                <th>All Todos</th>
                                <th>&nbsp;</th>
                                <th>
                                    <a href="{{ route('mine') }}">Show mine</a>
                                </th>
                            </thead>

                            <!-- Table Body -->
                            <tbody class="max-w-full">
                                @foreach($todos as $todo)
                                <tr class="max-w-full">
                                    <!-- Task Name -->
                                    <td class="pt-5 pb-5 pr-5">
                                        <!-- <div class=""> -->
                                        <h1 class="sm:font-bold">{{ $todo->title }}</h1>
                                        <p>{{ $todo->desc }}</p>
                                        <p class="pt-2 text-gray-500"> Added By: {{ $todo->user->id == auth()->user()->id? 'You':$todo->user->name }}</p>
                                        <!-- </div> -->

                                    </td>

                                    <td>
                                        <!-- TODO: Delete Button -->
                                        <div>
                                            <a href="/todos/{{$todo->id}}" class="bg-green-500">View</a>
                                            @if($todo->user_id == auth()->user()->id)
                                            <a href="{{ route('edit-form', ['id'=>$todo->id]) }}" class="bg-yellow-500">Edit</a>
                                            <a href="/todos/{{$todo->id}}/delete" class="bg-red-500">Delete</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
