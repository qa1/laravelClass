@extends('layouts.crud')

@section('content')
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="panel-bod">
                        <table class="table">

                            <!-- Table Headings -->
                            <thead>
                                <th>Todo</th>
                                <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody class="max-w-full">
                                <tr class="max-w-full">
                                    <!-- Task Name -->
                                    <td class="pt-5 pb-5 pr-5">
                                        <!-- <div class=""> -->
                                        <h1 class="sm:font-bold">{{ $todo->title }}</h1>
                                        <p>{{ $todo->desc }}</p>
                                        <div class="flex content-between">
                                            <p class="pt-2 text-gray-500 pr-5"> Added By: {{ $todo->user->name }}</p>
                                            <p class="pt-2 text-gray-500"> Status: {{ $todo->status == 1? "Done": "Pending"}}</p>
                                        </div>

                                    </td>

                                    <td>
                                        <!-- TODO: Delete Button -->
                                        <div>
                                            <a class="btn-primary" href="/todos/{{$todo->id}}">View</a>
                                            @if($todo->user_id == auth()->user()->id)
                                            <a class="btn-primary" href="{{ route('edit-form', ['id'=>$todo->id]) }}">Edit</a>
                                            <a class="btn-primary" href="/todos/{{$todo->id}}/delete">Delete</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
