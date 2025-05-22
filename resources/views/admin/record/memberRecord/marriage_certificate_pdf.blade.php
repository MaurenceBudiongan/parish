<!DOCTYPE html>
<html>

<head>
    <title>Marriage Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="center bold">Diocese of Talibon</div>
    <div class="center bold">SAINT VINCENT FERRER PARISH</div>
    <div class="center">San Pascual, Ubay, Bohol</div>
    <br>
    <h2 class="center">MARRIAGE CERTIFICATE</h2>
    <p>This certifies that <strong>{{ $marriage->groom_name }}</strong>, son of
        <strong>{{ $marriage->groom_fathername }}</strong> and <strong>{{ $marriage->bride_name }}</strong>, daughter of
        <strong>{{ $marriage->bride_fathername }}</strong>, received the Sacrament of Marriage on
        <strong>{{ \Carbon\Carbon::parse($marriage->date)->format('F d, Y') }}</strong>, officiated by
        <strong>{{ $marriage->priest }}</strong>.</p>

    <p>Witnesses:</p>
    <ul>
        <li>{{ $marriage->first_witnessed }}</li>
        <li>{{ $marriage->second_witnessed }}</li>
        <li>{{ $marriage->third_witnessed }}</li>
        <li>{{ $marriage->fourth_witnessed }}</li>
        <li>{{ $marriage->fifth_witnessed }}</li>
        <li>{{ $marriage->sixth_witnessed }}</li>
        <li>{{ $marriage->seventh_witnessed }}</li>
        <li>{{ $marriage->eighth_witnessed }}</li>
    </ul>

    <p>Issued at <strong>{{ $marriage->place_issuance }}</strong> on <strong>{{ $marriage->day }}
            {{ $marriage->month }}, {{ $marriage->year }}</strong>.</p>

    <br><br>
    <div class="center">
        <strong>REV. FR. DIOSDADO D. RANARA</strong><br>
        Parish Priest
    </div>
</body>

</html>
