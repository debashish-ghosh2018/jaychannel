@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Create Banner') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('banner_save') }}" enctype="multipart/form-data" id="banners_id">
                            @csrf
                            <div class="form-group row">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" id="title" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label for="fld_image">Image</label>
                                <input type="file" class="form-control" name="fld_image" id="fld_image" accept="image/*" required style="padding: 0.200rem 0.75rem;" />
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Status</label>
                                <div class="col-md-9 col-form-label">
                                    <div class="form-check">
                                        <input class="form-check-input" id="status_yes" type="radio" value="1" name="status">
                                        <label class="form-check-label" for="status_yes">Enable</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="status_no" type="radio" value="0" name="status">
                                        <label class="form-check-label" for="status_no">Disable</label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('banners.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#banners_id').on('submit', function(e) {
            e.preventDefault();
            var data = new FormData();
            var title = $('#title').val();
            var status = $('input[name="status"]:checked').val();            
            var fld_image_existing = $('#fld_image_existing').val();            
            var fld_image = $('#fld_image')[0].files[0];
            data.append('title', title);
            data.append('status', status);            
            data.append('fld_image_existing', fld_image_existing);
            data.append('fld_image', fld_image);
            console.log(fld_image);
            $.ajax({
                url: '{{ route('banner_save') }}?_token=' + '{{ csrf_token() }}',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                beforeSend: function(data) {

                },
                success: function(data) {
                    console.log(data);
                    window.location.href = '{{ route('listBanners') }}';
                },
                error: function(data) {
                    console.log(data)
                },
            });
        });
    });
</script>
@endsection