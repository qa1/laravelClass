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
                    <form class="max-w-full" method="post" action="{{route('update', ['id'=>$todo->id])}}">
                        @csrf
                        <div class="pt-5 pb-5 pr-5">
                            Title
                            <input name="title" placeholder="Enter title" class="p-3 border-gray-900" value="{{$todo->title}}"></input>
                        </div>
                        <div class="pt-5 pb-5 pr-5">
                            Description
                            <textarea name="desc">{{ $todo->desc }}</textarea>
                        </div>
                        <div class="pt-5 pb-5 pr-5">
                            Status
                            <input name="status" type="checkbox" {{$todo->status==1 ? 'checked': ''}}>Done
                            </ input>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
