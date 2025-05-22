<!DOCTYPE html>
<html>
<head>
    <title>Baptismal Certificate</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .center { text-align: center; }
        .section { margin-bottom: 15px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="center">
        <p>Diocese of Talibon</p>
        <p><strong>SAINT VINCENT FERRER PARISH</strong></p>
        <p>San Pascual, Ubay, Bohol</p>
    </div>

    <h2 class="center">Certificate of Baptism</h2>

    <div class="section">
        <p><span class="label">Name of Child:</span> {{ $baptismal->child_name }}</p>
        <p><span class="label">Date of Birth:</span> {{ $baptismal->date_birth }}</p>
        <p><span class="label">Place of Birth:</span> {{ $baptismal->place }}</p>
        <p><span class="label">Name of Father:</span> {{ $baptismal->father_name }}</p>
        <p><span class="label">Name of Mother:</span> {{ $baptismal->mother_name }}</p>
        <p><span class="label">Parent's Residence:</span> {{ $baptismal->parent_residence }}</p>
        <p><span class="label">Date of Baptism:</span> {{ $baptismal->date_baptism }}</p>
        <p><span class="label">Minister:</span> {{ $baptismal->minister }}</p>
        <p><span class="label">Sponsor:</span> {{ $baptismal->sponsor }}</p>
        <p><span class="label">Purpose:</span> {{ $baptismal->purpose }}</p>
    </div>

    <div class="center">
        <p><strong>REV. FR. DIOSDADO D. RANARA</strong></p>
        <p>Parish Priest</p>
    </div>
</body>
</html>
