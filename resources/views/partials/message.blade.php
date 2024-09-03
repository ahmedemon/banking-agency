{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <span class="text-danger">{{ $error }}</span>
    @endforeach
@endif --}}

@if (Session::has('success'))
    <div class="container pt-3">
        <div class="mb-3 msg-success">
            <p class="alert alert-success alert-dismissible">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        </div>
    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! Toastr::message() !!}

@if (count($errors->all()))
    @foreach ($errors->all() as $error)
        <div class="mt-5">
            <script>
                toastr.error('{{ $error }}');
            </script>
        </div>
    @endforeach
@endif

