<form action="{{ route('marriages.update', $marriage->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="certificate">
        <div class="top">
            <p>Diocese of Talibon</p>
            <p class="p2">SAINT VINCENT FERRER PARISH</p>
            <p>San Pascual, Ubay, Bohol</p>
        </div>
        <div class="mid">
            <h1 class="h1">MARRIAGE CERTIFICATE</h1>
            <p>
                <span>This is to certify that
                    <input class="groom_name" type="text" name="groom_name" value="{{ $marriage->groom_name }}">
                    son of
                </span>
                <input class="groom_fathername" type="text" name="groom_fathername"
                    value="{{ $marriage->groom_fathername }}">
                and
                <input class="bride_name" type="text" name="bride_name" value="{{ $marriage->bride_name }}">
                daughter of
                <input class="bride_fathername" type="text" name="bride_fathername"
                    value="{{ $marriage->bride_fathername }}">,
                have received the Sacrament of Marriage according to the rite of the Roman Catholic Church on
                <input class="date" type="date" name="date" value="{{ $marriage->date }}">
                by
                <input type="text" name="priest" value="{{ $marriage->priest }}"><br>

                The Witnessed of their conjugal View:

                <span class="witnessed">
                    <span class="witnessed-content">
                        <input type="text" name="first_witnessed" value="{{ $marriage->first_witnessed }}">
                        <input type="text" name="second_witnessed" value="{{ $marriage->second_witnessed }}">
                        <input type="text" name="third_witnessed" value="{{ $marriage->third_witnessed }}">
                        <input type="text" name="fourth_witnessed" value="{{ $marriage->fourth_witnessed }}">
                    </span>
                    <span class="witnessed-content">
                        <input type="text" name="fifth_witnessed" value="{{ $marriage->fifth_witnessed }}">
                        <input type="text" name="sixth_witnessed" value="{{ $marriage->sixth_witnessed }}">
                        <input type="text" name="seventh_witnessed" value="{{ $marriage->seventh_witnessed }}">
                        <input type="text" name="eighth_witnessed" value="{{ $marriage->eighth_witnessed }}">
                    </span>
                </span>

                Issuance and given at
                <input class="place" type="text" name="place_issuance" value="{{ $marriage->place_issuance }}">
                on
                <input class="day" type="text" name="day" value="{{ $marriage->day }}">
                day of
                <input type="text" name="month" value="{{ $marriage->month }}">,
                <input class="year" type="number" name="year" value="{{ $marriage->year }}">
            </p>
        </div>
        <div class="bottom">
            <div class="priest">
                <span>REV. FR. DIOSDADO D. RANARA</span>
                <p>Parish Priest</p>
            </div>
        </div>
    </div>

    <div class="buttons">
        <button type="submit" class="saverecord-btn" onclick="return confirm('Save changes to this record?')">Update
            Record</button>
    </div>
</form>


<style>
    .saverecord-btn {
        margin-top: 20px;
        border: 1px solid currentColor;
        color: var(--c-text-tertiary);
        border-radius: 6px;
        padding: .5rem .7rem;
        background-color: transparent;
        transition: 0.25s ease;
        cursor: pointer;
        font-size: 13px;
    }

    .saverecord-btn:hover {
        border: 1px solid white;
    }

    .witnessed {
        display: flex;
        gap: 2rem;

    }

    .witnessed .witnessed-content {
        display: flex;
        flex-direction: column;

    }

    .witnessed .witnessed-content input {
        width: 13.6rem;

    }

    .certificate {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3rem;
        border: 7px solid var(--c-gray-500);
        padding: 10px 0px;
    }

    .top {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .top p {
        font-size: 10px;
        text-align: justify;

    }

    .top .p2 {
        font-weight: bold;
        font-size: 13px;

    }

    .mid {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem
    }

    .mid .h1 {
        font-size: 24px;
        font-weight: bold;
    }

    .mid p {
        width: 30rem;
        word-spacing: 5px;
        font-size: 13px;
        text-indent: 50px;

    }

    .mid p input {
        margin-bottom: 20px;
        background-color: var(--c-gray-800);
        border-style: none;
        border-bottom: 1px solid white;
        width: 9.13rem;
        color: white;
        font-style: italic;
        font-family: arial;
        text-align: center;
    }

    .mid p input,
    {
    margin-bottom: 20px;

    }

    .mid .groom_name {
        width: 13.5rem;
    }

    .mid .groom_fathername,
    .mid .bride_name {
        width: 13.4rem;
    }

    .mid .bride_fathername {
        width: 11rem;

    }

    .mid .place {
        width: 13rem;

    }

    .mid .day {
        width: 3rem;

    }

    .mid .year {
        width: 3rem;

    }

    .mid .date {
        margin-top: 20px;
    }






    .bottom {
        margin-top: 2rem;
    }

    .bottom .priest {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .bottom .priest span {
        font-size: 13px;
    }

    .bottom .priest p {

        font-size: 11px;

    }
</style>
