<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mt-5">
                        <h1 class="mb-4">Todo App</h1>

                        @if(session('success'))

                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if(session('failed'))

                            <div class="alert alert-danger">{{session('failed')}}</div>
                        @endif

                        <!-- Bootstrap Alerts -->
                        <div id="alertContainer" class="alert-container"></div>

                        <form id="taskForm" action="{{route('store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="taskInput">New Task</label>
                                <input type="text" class="form-control" id="taskInput" name="title" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                                <input type="hidden" id="taskIndex" value="">
                            </div>
                            <div class="form-group">
                                <label for="taskDescription">Description</label>
                                <textarea class="form-control" id="taskDescription" name="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="taskSubmitBtn">Add Task</button>
                        </form>


                        <ul id="taskList" class="list-group mt-3">

                            @foreach($todos as $item)

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{$item->title}}</strong>
                                        <p class="mb-0">{{$item->description}}</p>
                                    </div>
                                    <div>
                                        <a href="{{route('edit',$item->id)}}" type="button" class="btn btn-warning btn-sm mr-2 edit-btn" data-index="0">Edit</a>
                                        <form action="{{route('delete',$item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn" data-index="0">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{--   @dd($todos)--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
