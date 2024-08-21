<!DOCTYPE html>
<html lang="en" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;-webkit-print-color-adjust: exact;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <style>
            td {
                vertical-align: top;
            }
            @media screen and (max-width: 767px) {
                .order-details {
                    width: 100% !important;
                }
                .shipping-address {
                    width: 100% !important;
                }
                .billing-address {
                    width: 100% !important;
                }
            }
        </style>
    </head>
    <body style="font-size: 14px; line-height: 1.5; margin: 0; padding: 10px 0;font-family: 'Open Sans', sans-serif;">
            <div style="padding: 0px 20px;">
                <p>Khách hàng submit gửi thông tin liên hệ</p>
                <p>
                    Thông tin: <br>
                    - Tên: {{ $datas['name'] }} <br>
                    - Điện thoại:{{ $datas['phone'] }} <br>
                    - Email: {{ $datas['email'] }} <br>
                    - Nội dung: {{ $datas['note'] }} <br>
                </p>
            </div>
            <div style="padding: 0px 20px;">
                <p>
                    Trân trọng, <br> <br>
                    Etrust Dev
                </p>
            </div>
        </div>
    </body>
</html>
