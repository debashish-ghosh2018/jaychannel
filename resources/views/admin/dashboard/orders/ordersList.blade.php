@extends('admin.dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Course Orders') }}</div>
                    <div class="card-body">                     
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Booking ID</th>                            
                            <th>Biller Name</th>
                            <th>Buyer Name</th>
                            <th>Credit Used</th>
                            <th>No Of Course Order</th>                           
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($courseorders as $order)
                            <tr>
                              <td><?php echo date('d-M-Y', strtotime($order->created_at)); ?></td>
                              <td><?php echo $order->booking_no; ?></td>                              
                              <td><?php echo $order->booking_person_name; ?></td>
                              <td><?php 
                                $content_buyer = $order->User()->get();
                                if(!empty($content_buyer[count($content_buyer) - 1])){
                                  echo $content_buyer[count($content_buyer) - 1]->name;
                                }
                              ?></td>
                              <td>{{ $order->credit_used }}</td>
                              <td><?php 
                                $course_booked = $order->bookedCourses()->get();
                                echo count($course_booked);
                              ?></td>
                              <td>
                                <a href="{{ route('showOrders') }}/{{ $order->id }}/courseorder" class="btn btn-block btn-primary">View</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <br/><br/>
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Credit Orders') }}</div>
                    <div class="card-body">                     
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Order ID</th>                            
                            <th>Biller Name</th>
                            <th>Buyer Name</th>
                            <th>Credit Purchase</th>
                            <th>Amount</th>                           
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($creditorders as $order)
                            <tr>
                              <td><?php echo date('d-M-Y', strtotime($order->created_at)); ?></td>
                              <td><?php echo $order->booking_no; ?></td>                              
                              <td><?php echo $order->booking_person_name; ?></td>
                              <td><?php 
                                $content_buyer = $order->User()->get();
                                if(!empty($content_buyer[count($content_buyer) - 1])){
                                  echo $content_buyer[count($content_buyer) - 1]->name;
                                }
                              ?></td>
                              <td>{{ $order->credit_purchase }}</td>
                              <td><?php 
                                $credit_details = $order->bookedCredits()->get();
                                echo count($credit_details);
                              ?></td>
                              <td>
                                <a href="{{ route('showOrders') }}/{{ $order->id }}/creditorder" class="btn btn-block btn-primary">View</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>                
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

