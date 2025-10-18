<!DOCTYPE html>
<html dir="rtl">
<head>
    <style>

        .rTable {
            display: table;
            width: 100%;
        }
        .rTableRow {
            display: table-row;
        }
        .rTableHeading {
            display: table-header-group;
            background-color: #ddd;
        }
        .rTableCell, .rTableHead {
            display: table-cell;
            padding: 3px 10px;
            border: 1px solid #999999;
            height: 30px;
        }
        .rTableHeading {
            display: table-header-group;
            background-color: #ddd;
            font-weight: bold;
        }
        .rTableFoot {
            display: table-footer-group;
            font-weight: bold;
            background-color: #ddd;
        }
        .rTableBody {
            display: table-row-group;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Ticket</title>

</head>
<body>

<div class="rTable">
    <div class="rTableHead">
<h1 style="text-align: center"> {{ $guest->event->title ? $guest->event->title : $guest->event->title  }} Ticket</h1>
    </div>
</div>
<div class="rTable">
    <div class="rTableRow">
        <div class="rTableHead"><strong>Your Name :</strong></div>
        <div class="rTableHead"><span style="font-weight: bold;">Your Code </span></div>
        <div class="rTableHead"><span style="font-weight: bold;">Your Email </span></div>
    </div>
    <div class="rTableRow">
        <div class="rTableCell" style=" height: 80px;line-height: 50px; background: #dedede">{{ $guest->first_name }} {{ $guest->last_name }}</div>
        <div class="rTableCell" style=" height: 80px;line-height: 50px; background: #dedede">
            <img src="data:image/png;base64,{{\Milon\Barcode\DNS1D::getBarcodePNG($guest->id , 'C39')}}" alt="barcode"/>
            <p>{{$guest->id}}</p>
        </div>
        <div class="rTableCell" style=" height: 80px;line-height: 50px; background: #dedede">{{ $guest->email }} </div>
    </div>
</div>


<!-- End PDF -->
</body>
</html>
