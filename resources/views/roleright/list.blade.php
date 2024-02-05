@extends('layouts.app')

@section('content')
    <style>
        .line{
            display: inline-block;
            width: 250px;
            height: 100px;
            padding: 5px;
        }
        .hide{
            display: none!important;
        }
        td .form-check {
            padding-left: 0;
        }
        td input[type="checkbox"]{
            margin-right:3px;
        }
    </style>
    <div class="page-body patient-book">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-sm-12 col-xl-7">
                    <h2>Roles & Rights</h2>
                </div>

                </div>
            </div>

            <div class="body-container">
                <div class="col-12">
                    <form method="post" class="theme-form" role="form"  action="{{route('roleright-save')}}">
                        @csrf
                        <input name="apiUrl" type="hidden" value="api/v1/role/add">
                        <input name="apiUrlMethod" type="hidden" value="POST">
                        <input name="isForm" type="hidden" value="1">
                    <div class="container-fluid" style="overflow: auto;">
                        <div class="col-md-12">
                            <div class="content-box-large">
                                <fieldset>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            @foreach ($data->data as  $role)
                                                <th style="min-width: 225px;">
                                                    <div class="form-check check-main">
                                                        <input class="form-check-input" type="checkbox" name="role_id[{{$role->id}}]" id="select-all-{{$role->id}}" value="{{ $role->id }}" onclick="rolerightchecked(this)">
                                                        <label class="form-check-label" for="{{$role->id}}-all">{{$role->name}}</label>
                                                    </div>
                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($data->data as  $role)
                                                <td>
                                                    @foreach ($role->rights as  $rights)
                                                        <div class="form-check check-main">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input-{{$role->id}}" name="role_id[{{$role->id}}][{{$rights->id}}]" type="checkbox" value="{{$rights->id }}" {{ ($rights->is_checked=='true')?'checked':'' }}>{{$rights->name}}</label>
                                                        </div>
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
