<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>

    <style>

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        table{
            font-size: 11px;
            font-family: sans-serif;
        }

        .float-left{
            float:left;
        }
        
        .float-right{
            float:right;
        }
        .text-right{
            text-align: right;
        }

        .full-width{
            width: 100%;
        }
        .half-width{
            width: 48%;
        }

        .bigger-text{
            font-size: 18px;
            font-weight: bold;
        }

        .text-white{
            color: white;
        }

        .text-bold{
            font-weight: bold;
        }
        
        .text-center{
            text-align: center;
        }
     
    </style>
</head>

<body>

    <table class="full-width" style="padding: 15px">
        <tbody>
            <tr>
                <td class="float-left half-width">
                    <img src="{{ asset('logo.png') }}" alt="Main Logo" width="120px" style="display: block; margin-bottom: 20px;">
                </td>
                <td class="float-right"></td>
            </tr>
            
            <tr>
                <td class="float-left half-width">
                    <span>{{ $order->first_name }} {{ $order->last_name }}</span>
                </td>
                <td class="float-right half-width text-right">
                    <span>Document Date: {{ now()->format('M d, Y') }}<span>
                </td>
            </tr>
            
            <tr>
                <td class="float-left half-width">
                    <span>{{ $order->nationality }}</span>
                </td>
                <td class="float-right half-width text-right">
                    <span>Booking reference: {{ $order->reference_id }}<span>
                </td>
            </tr>
            
            
            <tr>
                <td class="float-left full-width" style="margin-top: 100px;">
                </td>
            </tr>
            
            
            <tr>
                <td class="float-left text-bold half-width" style="margin-bottom: 10px; font-size: 14px">
                    <span>Proof of Payment</span>
                </td>
                <td class="float-right"></td>
            </tr>
           
            <tr>
                <td class="float-left text-bold half-width">
                    <span>Booking reference ({{ $order->reference_id }})</span>
                    
                </td>
                <td class="float-right text-bold half-width text-right">
                    Amount in <span>د.إ</span>
                </td>
            </tr>
            <tr>
                <td class="float-left half-width" >
                    <span>Activity Name: {{ $order->activity_name }}</span><br>
                    <span>Option Booked: 
                    @php
                    $total_participants = 0;
                    @endphp
                    @if($order->orderItems)
                        @foreach ($order->orderItems as $option)
                            @php
                                $total_participants = $option->infant + $option->child + $option->adult;
                            @endphp
                            {{ $option->package_title }}
                        @endforeach
                    @endif
                    </span><br>
                    <span>Tour date: {{ $order->date? Carbon\Carbon::parse($order->date)->format('M d, Y'): '' }}, Participants: {{ $total_participants }}</span>
                </td>
                <td class="float-right text-bold" >{{ $order->total_amount }}</td>
            </tr>
            
            <tr>
                <td class="float-left full-width" style="border-bottom:1px solid grey;">
                </td>
            </tr>
            
            <tr>
                <td class="float-left half-width">
                    <span></span>
                </td>
                <td class="float-right"></td>
                {{-- style="border: 1px solid black;" --}}
            </tr>
            
            <tr>
                <td class="float-left text-bold half-width">
                    <span>Total paid amount</span>
                </td>
                <td class="float-right text-bold half-width text-right">{{ $order->total_amount }}</td>
            </tr>
            
            
            

            <tr>
                <td class="float-left full-width" style="margin-top: 10px">
                    We have received the payment of {{ $order->total_amount }} <span>إ.د</span>
                </td>
                
            </tr>
            
            
            <tr>
                <td class="float-left full-width" style="margin-top: 30px;">
                </td>
            </tr>
            

            <tr>
                <td class="float-left full-width">
                    <span>
                        This is not an invoice for VAT purposes.<br>
                        Please note that this document is proof of payment only.
                    </span>
                </td>
                
            </tr>
           


           <tr>
                <td class="float-left full-width" style="margin-top: 100px;">
                </td>
            </tr>

            <tr>
                <td class="float-left text-bold full-width">
                    <span>
                        Pacific Adventures L.L.C
                    </span>
                </td>
            </tr>
            
            
            <tr>
                <td class="float-left" style="width:32%; min-height: 50px; ">
                    Port Saeed , Deira<br>
                    Office 714, Makateb Building<br>
                    Dubai U.A.E
                </td>
                <td class="float-left text-center" style="width:32%; min-height: 50px; border-left: 1px solid black; border-right: 1px solid black;">
                    Phone: +971 58 862 7171<br>
                    booking@pacific-adventures.com<br>
                    www.pacific-adventures.com
                </td>
                <td class="float-left text-right" style="width:32%; min-height: 50px;">
                    Pacific Adventures L.L.C
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
