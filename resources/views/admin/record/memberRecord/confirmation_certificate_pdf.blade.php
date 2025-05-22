<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .certificate {
            border: 7px solid #000;
            padding: 30px;
            width: 100%;
        }
        .top, .mid, .bottom {
            text-align: center;
            margin-bottom: 20px;
        }
        input, textarea {
            border: none;
            background: none;
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
            <h2>CONFIRMATION CERTIFICATE</h2>
            <p>This is to certify that <strong>{{ $confirmation->child_name }}</strong>,
                son/daughter of <strong>{{ $confirmation->father_name }}</strong> and
                <strong>{{ $confirmation->mother_name }}</strong>,
                was confirmed according to the rite of the Roman Catholic Church on the
                <strong>{{ $confirmation->day }}</strong> of <strong>{{ $confirmation->month }}</strong>,
                <strong>{{ $confirmation->year }}</strong> by His Excellency
                <strong>{{ $confirmation->excellency }}</strong>, Archbishop/Bishop of
                <strong>{{ $confirmation->parish_name }}</strong>.
            </p>
            <p>Sponsors:
                <strong>{{ $confirmation->first_sponsor }}</strong> and
                <strong>{{ $confirmation->second_sponsor }}</strong>
            </p>
            <p>Purpose: <em>{{ $confirmation->purpose }}</em></p>
        </div>

        <div class="bottom">
            <p><strong>REV. FR. DIOSDADO D. RANARA</strong><br>Parish Priest</p>
        </div>
    </div>
</body>
</html>
