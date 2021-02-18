@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $credit->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('credit_update') }}/{{ $credit->id }}" enctype="multipart/form-data" id="credits_id">
                            @csrf
                            <!-- @method('PUT') -->
                            <input type="hidden" id="credit_id" name="credit_id" value="{{ $credit->id }}" />
                            <div class="form-group row">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" id="title" name="title" value="{{ $credit->title }}" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Content</label>
                                <textarea class="form-control" id="content" name="content" rows="9" placeholder="{{ __('Content..') }}" required>{{ $credit->content }}</textarea>
                            </div>

                            <div class="form-group row">
                                <label for="fld_image">Image</label>
                                <input type="file" class="form-control" name="fld_image" id="fld_image" accept="image/*" style="padding: 0.200rem 0.75rem;" />
                                @isset($credit->homepage_image)
                                <img src="{{ config('app.url') }}/storage/app/credit_homepage_image/{{ $credit->homepage_image }}" width="50" />
                                <input type="hidden" id="fld_image_existing" name="fld_image_existing" value="{{ $credit->homepage_image }}" />
                                @endisset                                
                            </div>                            

                            <div class="form-group row">
                                <label>Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="Fixed" <?php echo ($credit->type == 'Fixed')?'selected':''; ?>>Fixed</option>
                                    <option value="Variable" <?php echo ($credit->type == 'Variable')?'selected':''; ?>>Variable</option>
                                </select>
                            </div>                       

                            <div class="form-group row">
                                <label>Chargable Amount</label>
                                <input class="form-control" type="number" placeholder="{{ __('Chargable Amount') }}" id="cost_amount" name="cost_amount" value="{{ $credit->cost_amount }}" required autofocus>
                            </div>                            

                            <div class="form-group row">
                                <label>Points</label>
                                <input class="form-control" type="number" placeholder="{{ __('Points') }}" id="points" name="points" value="{{ $credit->points }}" required autofocus>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Is For Sale</label>
                                <div class="col-md-9 col-form-label">
                                    <div class="form-check">
                                        <input class="form-check-input" id="is_for_sale_yes" type="radio" value="1" name="is_for_sale" <?php echo ($credit->is_for_sale == 1)?'checked':''; ?>>
                                        <label class="form-check-label" for="is_for_sale_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="is_for_sale_no" type="radio" value="0" name="is_for_sale" <?php echo ($credit->is_for_sale == 0)?'checked':''; ?>>
                                        <label class="form-check-label" for="is_for_sale_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Is Auto Renewable</label>
                                <div class="col-md-9 col-form-label">
                                    <div class="form-check">
                                        <input class="form-check-input" id="is_auto_renewal_yes" type="radio" value="1" name="is_auto_renewal" <?php echo ($credit->is_auto_renewal == 1)?'checked':''; ?>>
                                        <label class="form-check-label" for="is_auto_renewal_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="is_auto_renewal_no" type="radio" value="0" name="is_auto_renewal" <?php echo ($credit->is_auto_renewal == 0)?'checked':''; ?>>
                                        <label class="form-check-label" for="is_auto_renewal_no">No</label>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Status</label>
                                <div class="col-md-9 col-form-label">
                                    <div class="form-check">
                                        <input class="form-check-input" id="status_yes" type="radio" value="1" name="status" <?php echo ($credit->status == 1)?'checked':''; ?>>
                                        <label class="form-check-label" for="status_yes">Enable</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="status_no" type="radio" value="0" name="status" <?php echo ($credit->status == 0)?'checked':''; ?>>
                                        <label class="form-check-label" for="status_no">Disable</label>
                                    </div>
                                </div>
                            </div>  
 
                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('credits.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
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
        $('#credits_id').on('submit', function(e) {
            e.preventDefault();
            var data = new FormData();
            var title = $('#title').val();
            var content = $('#content').val();
            var type = $('#type').children("option:selected").val();
            var cost_amount = $('#cost_amount').val();
            var points = $('#points').val();
            var is_for_sale = $('input[name="is_for_sale"]:checked').val();
            var status = $('input[name="status"]:checked').val();
            var is_auto_renewal = $('input[name="is_auto_renewal"]:checked').val();
            var fld_image_existing = $('#fld_image_existing').val();            
            var fld_image = $('#fld_image')[0].files[0];
            data.append('title', title);
            data.append('content', content);
            data.append('type', type);
            data.append('cost_amount', cost_amount);
            data.append('points', points);
            data.append('is_for_sale', is_for_sale);
            data.append('status', status);
            data.append('is_auto_renewal', is_auto_renewal);
            data.append('fld_image_existing', fld_image_existing);
            data.append('fld_image', fld_image);
            var id = $('#credit_id').val();
            console.log(fld_image);
            $.ajax({
                url: '{{ route('credit_update') }}/' + id +'?_token=' + '{{ csrf_token() }}',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                beforeSend: function(data) {

                },
                success: function(data) {
                    console.log(data);
                    window.location.href = '{{ route('listCredits') }}';
                },
                error: function(data) {
                    console.log(data)
                },
            });
        });
    });
</script>
@endsection