@extends('admin.main')
@section('content')
                <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Active</th>
                            <th>Update</th>
                            <th>Chức Năng</th>



                        </tr>
                        <tbody>


                             {!! \App\Helpers\Helper::menu($menus) !!}



                        </tbody>

                </table>



@endsection
