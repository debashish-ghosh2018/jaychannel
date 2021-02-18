@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-3">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Credit Order</div>
                    <div class="card-body">
                        <h5><b>Order Date:</b> <?php echo date("d-m-Y", strtotime($creditorder->created_at)) ?></h5>
                        <h5><b>Order ID:</b> <?php echo $creditorder->booking_no; ?></h5>
                        <br/>
                        <h4><b>Biller Details:</b></h4>
                        <h5><b>&nbsp;&nbsp;Name:</b> <?php echo $creditorder->booking_person_name; ?></h5>
                        <h5><b>&nbsp;&nbsp;Email:</b> <?php echo $creditorder->booking_person_email; ?></h5>
                        <h5><b>&nbsp;&nbsp;Phone:</b> <?php echo $creditorder->booking_person_phone; ?></h5>
                        <h5><b>&nbsp;&nbsp;Address:</b> <?php echo $creditorder->booking_person_address; ?></h5>
                        <h5><b>&nbsp;&nbsp;Country:</b> <?php echo $creditorder->booking_person_country; ?></h5>
                        <h5><b>&nbsp;&nbsp;City:</b> <?php echo $creditorder->booking_person_city; ?></h5>
                        <h5><b>&nbsp;&nbsp;State:</b> <?php echo $creditorder->booking_person_state; ?></h5>
                        <h5><b>&nbsp;&nbsp;Postal Code:</b> <?php echo $creditorder->booking_person_postalcode; ?></h5>                        
                        <br/>
                        <h5><b>Credit Purchase:</b> {{ $creditorder->credit_purchase }}</h5>  
                        <h5><b>Buyer Name:</b> <?php 
                                $content_buyer = $creditorder->User()->get();
                                if(!empty($content_buyer[count($content_buyer) - 1])){
                                  echo $content_buyer[count($content_buyer) - 1]->name;
                                }
                        ?></h5> 
                        <h5><b>Credit Order:</b> <?php 
                                $order_credits = $creditorder->bookedCredits()->get();
                                if(!empty($order_credits)){
                                    foreach($order_credits as $order_credit){
                                        $credit_details = $order_credit->Credit()->get();
                                        if(!empty($credit_details[count($credit_details) - 1])){
                                            echo $credit_details[count($credit_details) - 1]->title . ' (Credits = '.($order_credit->credit_points * $order_credit->credit_qty).', Amount = '.($order_credit->credit_amount * $order_credit->credit_qty).')<br/>';
                                        }
                                    }
                                }
                        ?></h5>

                        <br/>
                        <a href="{{ route('orders.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
              <div class="col-md-3">
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection