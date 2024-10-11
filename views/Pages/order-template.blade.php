<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaandi Kaar E-commerce</title>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <table class="body-wrap"
                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                    <td class="container" width="600"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                        valign="top">
                        <div class="content"
                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action"
                                itemscope itemtype="http://schema.org/ConfirmAction"
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                    <td class="content-wrap"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0; padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: whitesmoke;"
                                        valign="top">
                                        <meta itemprop="name" content="Confirm Email"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 24px; vertical-align: top; margin: 0; padding: 0 0 10px; text-align: center;"
                                                    valign="top">
                                                    <h4
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 10px; font-weight: 600;">
                                                        Your order has been placed</h4>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 12px;"
                                                    valign="top">
                                                    <h5 style="font-family: 'Roboto', sans-serif; margin-bottom: 3px;">
                                                        Hey, {{ $body['name'] }}</h5>
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;">
                                                        Your order has been confirmed and will be
                                                        shipping soon.</p>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 18px;"
                                                    valign="top">
                                                    <table style="width:100%;">
                                                        <tbody>
                                                            <tr style="text-align: left;">
                                                                <th style="padding: 5px;">
                                                                    <p
                                                                        style="color: #878a99; font-size: 13px; margin-bottom: 2px; font-weight: 400;">
                                                                        Order Number</p>
                                                                    <span>{{ $body['order_number'] }}</span>
                                                                </th>
                                                                <th style="padding: 5px;">
                                                                    <p
                                                                        style="color: #878a99; font-size: 13px; margin-bottom: 2px; font-weight: 400;">
                                                                        Order Date</p>
                                                                    <span>{{ $body['date'] }}</span>
                                                                </th>
                                                                <th style="padding: 5px;">
                                                                    <p
                                                                        style="color: #878a99; font-size: 13px; margin-bottom: 2px; font-weight: 400;">
                                                                        Payment Method</p>
                                                                    <span>{{ $body['payment_method'] }}</span>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 12px;"
                                                    valign="top">
                                                    <h6
                                                        style="font-family: 'Roboto', sans-serif; font-size: 15px; text-decoration-line: underline;margin-bottom: 15px;">
                                                        Here's what you ordered:</h6>
                                                    <table style="width:100%;" cellspacing="0" cellpadding="0">
                                                        <thead style="text-align: left;">
                                                            <tr>
                                                                <th
                                                                    style="padding: 8px;border-bottom: 1px solid #e9ebec;">
                                                                    Product Details</th>
                                                                <th
                                                                    style="padding: 8px;border-bottom: 1px solid #e9ebec;">
                                                                    Quantity</th>
                                                                <th
                                                                    style="padding: 8px;border-bottom: 1px solid #e9ebec;">
                                                                    Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total = 0;
                                                            @endphp
                                                            @foreach ($body['cart_items'] as $item)
                                                                @php
                                                                    $total +=
                                                                        $item->product_quantity *
                                                                        $item->product_id->product_price;
                                                                @endphp
                                                                <tr>
                                                                    <td style="padding: 8px; font-size: 13px;">
                                                                        <h6
                                                                            style="margin-bottom: 2px; font-size: 14px;">
                                                                            {{ $item->product_id->product_name }}</h6>
                                                                        <p
                                                                            style="margin-bottom: 2px; font-size: 13px; color: #878a99;">
                                                                            {{ $item->product_id->product_description }}
                                                                        </p>
                                                                    </td>
                                                                    <td style="padding: 8px; font-size: 13px;">
                                                                        {{ $item->product_quantity }}
                                                                    </td>
                                                                    <td style="padding: 8px; font-size: 13px;">
                                                                        Rs.{{ number_format($item->product_id->product_price, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;border-top: 1px solid #e9ebec;">
                                                                    Subtotal
                                                                </td>
                                                                <th
                                                                    style="padding: 8px; font-size: 13px;border-top: 1px solid #e9ebec;">
                                                                    Rs.{{ number_format($total, 2) }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;border-top: 1px solid #e9ebec;">
                                                                    Total Amount
                                                                </td>
                                                                <th
                                                                    style="padding: 8px; font-size: 13px;border-top: 1px solid #e9ebec;">
                                                                    Rs.{{ number_format($total, 2) }}
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 0px;"
                                                    valign="top">
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;">
                                                        We'll send you shipping confirmation when your
                                                        item(s) are on the way! We appreciate your
                                                        business, and hope you enjoy your purchase.</p>
                                                    <h6
                                                        style="font-family: 'Roboto', sans-serif; font-size: 14px; margin-bottom: 0px; text-align: end;">
                                                        Thank you!</h6>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align: center; margin: 28px auto 0px auto;">
                                <p
                                    style="font-family: 'Roboto', sans-serif; font-size: 14px;color: #98a6ad; margin: 0px;">
                                    {{ date('Y') }} Chaandi Kaar Ecommerce. Design & Develop by ibexstack</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
