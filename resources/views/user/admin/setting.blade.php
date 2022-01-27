@extends('layouts.sidebar')

@section('settings')

    <div class="container">

        <div class="container">
            <div class="card table-container">

                <div class="card-body">
                    <div class="card-text">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (auth()->user()->hasRole('admin') && $users)

                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>


                                                <form action="">


                                                    @foreach ($roles as $rol)

                                                        <div class="form-check">
                                                            <input class="form-check-input" for="roles[]" type="checkbox" value="{{$rol->name}}"
                                                                id="{{$rol->name}}" @if ($user->hasRole($rol->name)) checked  @endif>

                                                            <label class="form-check-label" for="{{$rol->name}}">
                                                                {{$rol->name}}
                                                            </label>
                                                        </div>

                                                    @endforeach

                                                </form>



                                            </td>
                                        </tr>

                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
