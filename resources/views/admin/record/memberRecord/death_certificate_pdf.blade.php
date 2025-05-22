<!DOCTYPE html>
<html>

<head>
    <title>Death Certificate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* Add your styles here matching your existing certificate style */
        body {
            font-family: Arial, sans-serif;
            color: #000;
            background: #fff;
        }

        .certificate {
            border: 7px solid #555;
            padding: 20px;
            width: 700px;
            margin: auto;
        }

        .top,
        .mid,
        .bottom {
            text-align: center;
        }

        .top p {
            font-size: 12px;
            margin: 0;
        }

        .mid h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .mid p {
            font-size: 14px;
            text-align: justify;
        }

        .bottom p {
            font-size: 12px;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="top">
            <p>Diocese of Talibon</p>
            <p><strong>SAINT VINCENT FERRER PARISH</strong></p>
            <p>San Pascual, Ubay, Bohol</p>
        </div>
        <div class="mid">
            <h1>DEATH CERTIFICATE</h1>
            <p>
                This is to certify that <strong>{{ $death->deceased_name }}</strong>,
                minor/single/married, residing in <strong>{{ $death->residence }}</strong>,
                died at the age of <strong>{{ $death->age }}</strong>.<br>
                Cause of death: <strong>{{ $death->cause }}</strong><br>
                Date and time of Death: <strong>{{ $death->death_time }}</strong><br>
                Place of Death: <strong>{{ $death->place }}</strong><br>
                Place & Time Of Burial: <strong>{{ $death->burial_time }}</strong><br>
                Name of Spouse (if married) or Name of Parents if minor or single:
                <strong>{{ $death->guardian }}</strong><br>
                Catholic priest who administered the last rite: <strong>{{ $death->priest }}</strong><br>
                <br>
                In testimony to the truth of the above data, we affix our signature on this
                <strong>{{ $death->day }}</strong> day of <strong>{{ $death->month }}</strong>,
                <strong>{{ $death->year }}</strong>
                at the Catholic Priest Rectory in <strong>{{ $death->rectory }}</strong>.
            </p>
        </div>
        <div class="bottom">
            <p>REV. FR. DIOSDADO D. RANARA</p>
            <p>Parish Priest</p>
        </div>
    </div>
</body>

</html>
