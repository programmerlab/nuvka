
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content')  
          
              @include('partials.search')
        <!-- End Slider Area -->
        
        <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="{{url('/')}}">Home</a> &gt;&gt; <a href="#">Order</a></nav>
        
        <div class="published-date">
            <div class="row">
                <div class="date-box">
                  <div class="col-sm-12 border-right"> <span class="pub-date">
                    Checkout
                  </span> </div>
                  
                </div>
            </div>
        </div>
        
        <div class="blog-area area-padding detail-main">
            <div class="container">
                
                <div class="row">
                    <div class="report-left-sec col-sm-12">
                       
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tbody><tr>
          <td align="center" valign="top">
            <div id="m_326117052521356084template_header_image">
                          </div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_326117052521356084template_container" style="background-color:#fdfdfd;border:1px solid #e5e5e5;border-radius:3px!important">
              <tbody><tr>
                <td align="center" valign="top">
                  
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_326117052521356084template_header" style="background-color:#00aff0;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                    <tbody><tr>
                      <td id="m_326117052521356084header_wrapper" style="padding:36px 48px;display:block">
                        <h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left">Order Information
                      </td>
                    </tr>
                  </tbody></table>
                  
                </td>
              </tr>
              <tr>
                <td align="center" valign="top">
                  
                  <table border="0" cellpadding="0" cellspacing="0" width="100% " id="m_326117052521356084template_body">
                    <tbody><tr>
                      <td valign="top" id="m_326117052521356084body_content" style="background-color:#fdfdfd">
                        
                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                          <tbody><tr>
                            <td valign="top" style="padding:48px">
                              <div id="m_326117052521356084body_content_inner" style="color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

<p style="margin:0 0 16px">
Your order details are shown below for your reference:</p>

<div style="margin-bottom: 15px;float: right;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="payForm">

  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="sales@1marketresearch.com">
  <input type="hidden" name="item_name" value="{{$cart_detail->name}}">
  <input type="hidden" name="item_number" value="{{$ref}}">
  <input type="hidden" name="amount" value="{{$final_payment}}">
  <input type="hidden" name="tax" value="0.00">
  <input type="hidden" name="quantity" value="1">
  <input type="hidden" name="currency_code" value="USD">

  <!-- Enable override of buyers's address stored with PayPal . -->
  <input type="hidden" name="address_override" value="1">
  <!-- Set variables that override the address stored with PayPal. -->
  <input type="hidden" name="first_name" value="{{$order->first_name}}">
  <input type="hidden" name="last_name" value="{{$order->last_name}}">
  <input type="hidden" name="address1" value="{{$order->address}}">
  <input type="hidden" name="city" value="{{$order->city}}">
  <input type="hidden" name="state" value="{{$order->state}}">
  <input type="hidden" name="zip" value="{{$order->zipcode}}">
  <input type="hidden" name="country" value="{{$order->country}}">
  <input type="hidden" name="email" value="{{$order->email}}">

    <!-- Specify URLs -->
  <input type='hidden' name='cancel_return' value="{{url('paypalpay?cancel_return=1')}}">
  <input type='hidden' name='return' value="{{url('paypalpay?return=1')}}">
  <input type='hidden' name='notify_url' value="{{url('paypalpay?notify_url=1')}}">

    <input  onclick="document.getElementById('payForm').submit();"  type="image" src="https://www.braintreepayments.com/images/features/paypal/paypal-button@2x-d5ec2863.png" alt="paypal" width="250px" height="48" alt="PayPal - The safer, easier way to pay online">

    </form>

</div>

<ul class="m_326117052521356084wc-bacs-bank-details m_326117052521356084order_details m_326117052521356084bacs_details">
</ul>
  <h2 style="color:#00aff0;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Order #{{$ref}}</h2>

<table class="m_326117052521356084td" cellspacing="0" cellpadding="6" style="width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;border:1px solid #e4e4e4" border="1">
  <thead>
    <tr>
      <th class="m_326117052521356084td" scope="col" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">Product</th>
      <th class="m_326117052521356084td" scope="col" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">Quantity</th>
      <th class="m_326117052521356084td" scope="col" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">Price</th>
    </tr>
  </thead>  
  <tbody>
        <tr class="m_326117052521356084order_item">
      <td class="m_326117052521356084td" style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word;color:#737373;padding:12px">{{ $cart_detail->name}}<br><small></small>
</td>
      <td class="m_326117052521356084td" style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px">1</td>
      <td class="m_326117052521356084td" style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px"><span class="m_326117052521356084woocommerce-Price-amount
amount"><span class="m_326117052521356084woocommerce-Price-currencySymbol">$</span>{{number_format($cart_detail->price,2)}}</span></td>
    </tr>
    
  </tbody>
  <tfoot>
        <tr>
            <th class="m_326117052521356084td" scope="row" colspan="2" style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px">Subtotal:</th>
            <td class="m_326117052521356084td" style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span class="m_326117052521356084woocommerce-Price-amount m_326117052521356084amount"><span class="m_326117052521356084woocommerce-Price-currencySymbol">$</span>{{number_format($cart_detail->price,2)}}</span></td>
          </tr>
          
          
          <tr>
            <th class="m_326117052521356084td" scope="row" colspan="2" style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px">Discount:</th>
            <td class="m_326117052521356084td" style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px">
                <span class="m_326117052521356084woocommerce-Price-amount m_326117052521356084amount">
                <span class="m_326117052521356084woocommerce-Price-currencySymbol">$</span>{{number_format($cart_detail->discount,2)}}</span></td>
          </tr>
          
          
<tr>
            <th class="m_326117052521356084td" scope="row" colspan="2" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">Payment Method:</th>
            <td class="m_326117052521356084td" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">Direct Bank
Transfer</td>
          </tr>
    <tr>
        <th class="m_326117052521356084td" scope="row" colspan="2" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">Total:</th>
        <td class="m_326117052521356084td" style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">
        <span class="m_326117052521356084woocommerce-Price-amount m_326117052521356084amount">
        <span class="m_326117052521356084woocommerce-Price-currencySymbol">$</span>{{number_format(($cart_detail->price - $cart_detail->discount),2)}}</span></td>
    </tr> 
  </tfoot>
</table>

<h2 style="color:#00aff0;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Customer
details</h2>
<ul> 
            <li>
<strong>Email:</strong> <span class="m_326117052521356084text" style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif"><a href="mailto:kroy.iips@gmail.com" target="_blank">{{$billing['email'] }}</a></span>
</li>
            <li>
<strong>Tel:</strong> <span class="m_326117052521356084text" style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">{{$billing['phone'] }}</span>
</li>
    </ul>
<table id="m_326117052521356084addresses" cellspacing="0" cellpadding="0" style="width:100%;vertical-align:top" border="0">
  <tbody><tr>
    <td class="m_326117052521356084td" valign="top" width="50%">
      <h3 style="color:#00aff0;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Billing address</h3>

      <p class="m_326117052521356084text" style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;margin:0 0 16px">{{$billing['first_name']}} {{$billing['last_name']}}
<br>{{$billing['company_name'] }} 
</br>{{$billing['city'] }} {{ $billing['state']}}
<br>{{ $billing['country'] }}, {{$billing['zipcode'] }}</p>
    </td>
      </tr>
</tbody></table>
                              </div>
                            </td>
                          </tr>
                        </tbody></table>
                        
                      </td>
                    </tr>
                  </tbody></table>
                  
                </td>
              </tr>
              <tr>
                <td align="center" valign="top">
                  
                  <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_326117052521356084template_footer">
                    <tbody><tr>
                      <td valign="top" style="padding:0">
                        <table border="0" cellpadding="10" cellspacing="0" width="100%">
                          <tbody><tr>
                            <td colspan="2" valign="middle" id="m_326117052521356084credit" style="padding:0 48px 48px 48px;border:0;color:#66cff6;font-family:Arial;font-size:12px;line-height:125%;text-align:center">
                              <p>Powered by – 1market research</p>
                            </td>
                          </tr>
                        </tbody></table>
                      </td>
                    </tr>
                  </tbody></table>
                  
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>
                    </div>
                    
                    
                </div>
                <!-- End row -->
                
                <!--End row-->
            </div>
        </div>
        @stop
