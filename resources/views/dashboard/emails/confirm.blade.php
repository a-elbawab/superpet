<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>

<body>

    <style>
        body {
            margin: 0;
        }

        @page {
            margin: 0;
        }
    </style>
    <div
        style="background-image: url({{ url('/') }}/website/emails/img/img10.jpg);background-repeat: no-repeat;background-position: center top;background-size: cover;padding: 40px 20px;">
        <img style="width: 30%;max-width: 30%;display: block;margin: 0 auto;" src="{{ $event->getFirstMediaUrl('logo') }}"
            alt="">
        <div style="text-align: center;margin: 20px 0;">
            <p
                style="font-size: 40px;color: #be6294;text-align: center;font-weight: bold;border-top: 6px solid #213e62;border-bottom: 6px solid #213e62;padding: 18px 0 20px;line-height: 1.2;margin: 0;">
                Registration Confirmation
            </p>
        </div>
        <img style="width: auto;max-width: 100%;display: block;margin: 0 auto;" src="{{ $event->image_url }}"
            alt="">
    </div>
    <div
        style="background-image: url({{ url('/') }}/website/emails/img/img08.jpg);background-repeat: no-repeat;background-position: center bottom;background-size: contain;padding: 20px;">
        <p style="font-size: 30px;color: #000;text-align: center;font-weight: bold;line-height: 1.3;margin: 20px 0 0;">
            {{ $event->getAttributes()['title'] }}
        </p>
        </p>
        <p style="font-size: 30px;color: #134c99;text-align: center;font-weight: bold;line-height: 1.3;margin: 20px 0;">
            {{ $event->getCustomeDate() }}
        </p>
         <div class="text-center">
            <img style="width: 30%;max-width: 30%;display: block;margin: 0 auto;"
                src="{{ $event->getFirstMediaUrl('hotel_image') }}" alt="">
            <p
                style="font-size: 30px;color: #134c99;text-align: center;font-weight: bold;
                line-height: 1.3;margin: 20px 0; display: block">
                {{ $event->hotel }}
            </p>
        </div>
        <div style="display: flex;align-items: center;justify-content: space-between;margin: 40px 0;">
            <div style="width: 50%;max-width: 50%;flex: 0 0 50%;">
                <p style="font-size: 25px;margin: 30px 0 30px;">
                    Get your ticket including your registration code to Meets UP front desk to complete your
                    registration smoothly you can use download it now ⇣
                </p>
                <a style="background-color: #134c99;color: #fff;padding: 20px;border-radius: 10px;text-decoration: none;font-size: 25px;font-weight: bold;text-align: center;display: block;"
                    href="{{ route('guests.pdf2', $guest) }}">
                    Click Here to
                    <br>
                    Download Ticket
                </a>
            </div>
            <div style="width: 40%;max-width: 40%;flex: 0 0 40%;">
                <img style="width: auto;max-width: 100%;display: block;margin: 0 0 0 auto;"
                    src="{{ url('/') }}/website/emails/img/img066.png" alt="">
            </div>
        </div>
        <div style="clear: left;"></div>
        <div style="border-top: 2px solid #213e62;padding-top: 20px;margin-top: 40px; text-align: center">
            @foreach ($event->getMedia('email_footer') as $item)
                <img width="100" src="{{ $item->getUrl() }}">
            @endforeach
        </div>
    </div>
    <div style="background-color: #213e62;padding: 80px 20px;color: #fff;text-align: center;">
        <img style="width: auto;max-width: 100%;display: block;margin: 0 auto 40px;"
            src="{{ url('/') }}/website/emails/img/img09.png" alt="">
        <p style="font-size: 20px;margin: 0 0 10pt;">
            Tel: <a style="color: #fff;text-decoration: none;" href="tel:034230952">034230952</a> / <a
                style="color: #fff;text-decoration: none;" href="tel:034299488">034299488</a>
        </p>
        <p style="font-size: 20px;margin: 0 0 10pt;">
            Mobile: <a style="color: #fff;text-decoration: none;" href="tel:00201101430005">00201101430005</a> / <a
                style="color: #fff;text-decoration: none;" href="tel:0001101430006">0001101430006</a>
        </p>
        <p style="font-size: 20px;margin: 0 0 10pt;">
            Email: <a style="color: #fff;text-decoration: none;"
                href="mailto:conference@meetsupevents.com ">conference@meetsupevents.com</a>
        </p>
        <p style="font-size: 20px;margin: 0 0 10pt;">
            Website: <a style="color: #fff;text-decoration: none;"
                href="http://www.meetsupevents.com/">www.meetsupevents.com</a>
        </p>
        <p style="font-size: 28px;margin: 20pt 0 10pt;">
            Contact with us
        </p>
        <ul style="display: flex;justify-content: center;list-style: none;padding: 0;margin: 0;">
            <li style="margin: 3px;">
                <a href="https://www.facebook.com/Meetsupevents">
                    <img style="height: 50px;" src="{{ url('/') }}/website/emails/img/facebook.png"alt="">
                </a>
            </li>
            <li style="margin: 3px;">
                <a href="https://www.instagram.com/meets_up_events">
                    <img style="height: 50px;" src="{{ url('/') }}/website/emails/img/instagram.png"
                        alt="">
                </a>
            </li>
            <li style="margin: 3px;">
                <a href="https://wa.me/+201101430005">
                    <img style="height: 50px;" src="{{ url('/') }}/website/emails/img/whatsapp.png"
                        alt="">
                </a>
            </li>
            <li style="margin: 3px;">
                <a href="https://www.linkedin.com/company/meets-up-events">
                    <img style="height: 50px;" src="{{ url('/') }}/website/emails/img/linkedin.png"
                        alt="">
                </a>
            </li>
            <li style="margin: 3px;">
                <a href="https://www.youtube.com/@meetsup17">
                    <img style="height: 50px;" src="{{ url('/') }}/website/emails/img/youtube.png"
                        alt=""></a>
            </li>
        </ul>
    </div>

</body>

</html>
