@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-10 offset-1">
                    <div class="element-box mt-5" id="add_form">
                        <h3 class="element-header text-center">Update Director Account</h3>
                        <hr class="mb-5 border-success">
                        <form method="POST" action="{{route('director-list.update', $director_edit->id)}}" accept-charset="UTF-8" note="Do you want to create new DIRECTOR with following information?" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Director Name</label>
                                        <input class="form-control" placeholder="Input Director Name" required autofocus value="{{$director_edit->name}}" name="name" type="text" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input class="form-control" placeholder="Director Mobile Number" required value="{{$director_edit->mobile}}" name="mobile" type="number" id="mobile">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input class="form-control" placeholder="Director designations" value="{{$director_edit->designation}}" name="designation" type="text" id="designation">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="profession">Profession</label>
                                        <input class="form-control" placeholder="Director Profession" value="{{$director_edit->profession}}" name="profession" type="text" id="profession">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="balance">Balance</label>
                                        <input class="form-control" placeholder="Director balance" value="{{$director_edit->balance}}" name="balance" type="number" id="balance">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input class="form-control" placeholder="Specific Address" value="{{$director_edit->address}}" name="address" type="text" id="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="active">Status</label>
                                        <select class="form-control" id="active" value="{{$director_edit->active}}" name="active">
                                            <option value="1" selected>Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="biography">Biography</label>
                                        <input class="form-control" placeholder="Biography" value="{{$director_edit->biography}}" name="biography" type="text" id="biography">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="post" title="">Position</label>
                                        <select class="form-control" id="post" value="{{$director_edit->post}}" name="post">
                                            <option {{$director_edit->publish == 1 ? "selected" : ""}} value="1">Other post</option>
                                            <option value="chairman" {{$director_edit->publish == "chairman" ? "selected" : ""}}>Chairman</option>
                                            <option value="secretary" {{$director_edit->publish == "secretary" ? "selected" : ""}}>Secretary</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="publish" title="Public profile will show in website">Publish</label>
                                        <select class="form-control" required id="publish" name="publish">

                                            <option value="1" {{$director_edit->publish == 1 ? "selected" : ""}}>Public</option>
                                            <option value="0" {{$director_edit->publish == 0 ? "selected" : ""}}>Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="photo" title="Max filesize 500 kb, Dimension 450(w)X650(h)">Profile
                                            Picture</label>
                                        <input class="" title="Max filesize 500 kb, Di" name="director_photo" type="file" id="photo">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input class="btn btn-sm btn-success" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection