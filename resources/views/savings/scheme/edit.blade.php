@extends('layouts.frontend.app', ['pageTitle' => 'Savings scheme'])
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h6 class="element-header text-center">Update DPS Scheme</h6>
                            <form method="POST" action="{{ route('savings.scheme.update', $scheme->id) }}" accept-charset="UTF-8"
                                note="Do you want to create new DPS scheme?"> @csrf @method('put')
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="name">Savings Name</label>
                                            <input class="form-control" placeholder="DPS Scheme Name" required
                                                autofocus name="name" value="{{ old('name',$scheme->name) }}" type="text" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="distance">Payment Sequence (Day)</label>
                                            <input class="form-control" placeholder="Sequence in days" min="1" required
                                                name="distance" value="{{ old('distance',$scheme->distance) }}" type="number" id="distance">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input class="form-control" placeholder="Note" name="note"
                                                value="{{ old('note',$scheme->note) }}" type="text" id="note">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mx-auto">
                                        <div class="form-group">
                                            <label for="distance">Active status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0" {{ !old('status',$scheme->status) ? 'selected' : '' }}>Inactive</option>
                                                <option value="1" {{ old('status',$scheme->status) ? 'selected' : '' }}>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary" type="submit" value="Submit">
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

