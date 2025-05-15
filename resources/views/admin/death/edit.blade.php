
<form action="{{ route('deaths.update', $death->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="certificate">
        <div class="top">
            <p>Diocese of Talibon</p>
            <p class="p2">SAINT VINCENT FERRER PARISH</p>
            <p>San Pascual, Ubay, Bohol</p>
        </div>
        <div class="mid">
            <h1 class="h1">DEATH CERTIFICATE</h1>
            <p>
                <span class="deceased">
                    <span>This is to certify that</span>
                    <span><input type="text" name="deceased_name" value="{{ $death->deceased_name }}"></span>
                    <span>minor/single/married, residing in
                        <input class="residence" name="residence" type="text" value="{{ $death->residence }}">
                    </span>
                </span>
                <span>died at the age of
                    <input class="age" name="age" type="number" value="{{ $death->age }}">.
                </span><br>
                Cause of death <span class="semi1">:</span>
                <input class="cause" name="cause" type="text" value="{{ $death->cause }}">
                Date and time of Death <span class="semi2">:</span>
                <input class="date_time" name="death_time" type="text" value="{{ $death->death_time }}">
                Place of Death <span class="semi3">:</span>
                <input class="place" name="place" type="text" value="{{ $death->place }}">
                Place & Time Of Burial<span class="semi4">:</span>
                <input class="burial_time" name="burial_time" type="text" value="{{ $death->burial_time }}">
                Name of Spouse (if married) or Name of Parents<br>
                if minor or single<span class="semi5">:</span>
                <input class="guardian" name="guardian" type="text" value="{{ $death->guardian }}"><br>
                Catholic priest who administered <br>
                the last rite<span class="semi6">:</span>
                <input class="priest" name="priest" type="text" value="{{ $death->priest }}"><br>

                <span class="testimony">
                    <span style="margin-left: 40px;"> In testimony to the truth of the above data, we affix our
                        signature on this</span>
                    <input class="day" name="day" type="text" value="{{ $death->day }}"> day of
                    <input class="month" name="month" type="text" value="{{ $death->month }}">,
                    <input class="year" name="year" type="number" value="{{ $death->year }}">
                    at the Catholic Priest Rectory in
                    <input name="rectory" type="text" value="{{ $death->rectory }}">
                </span>
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
        <a href="{{ route('deaths.index') }}">
            <button type="button" class="delete-btn">Cancel</button>
        </a>
        <button type="submit" class="edit-btn">Update</button>
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

    .edit-btn,
    .delete-btn {
        margin-top: 10px;
        border: 1px solid currentColor;
        color: var(--c-text-tertiary);
        border-radius: 6px;
        padding: .5rem .7rem;
        background-color: transparent;
        transition: 0.25s ease;
        cursor: pointer;
        font-size: 13px;
    }

    .edit-btn:hover,
    .delete-btn:hover {
        border: 1px solid white;
    }

    .buttons {
        display: flex;
        gap: 10px;
    }

    .mid .age {
        width: 3rem;
    }

    .testimony .day,
    .testimony .year {
        width: 3rem;
        margin-top: 20px;
    }

    .testimony .month {
        width: 10.5rem;
    }

    .testimony {
        text-indent: 10px;
    }

    .deceased {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .deceased .residence {
        width: 14.4rem;
    }

    .semi4 {
        margin-left: 17px;
    }

    .semi1 {
        margin-left: 64px;
    }

    .semi2 {
        margin-left: 5px;
    }

    .semi3 {
        margin-left: 68px;
    }

    .semi5 {
        margin-left: 58px;
    }

    .semi6 {
        margin-left: 86px;
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
        width: 28rem;
        word-spacing: 5px;
        font-size: 13px;
    }

    .mid p .confirm {
        word-spacing: 5px;

    }

    .mid p input {
        margin-bottom: 20px;
        background-color: var(--c-gray-800);
        border-style: none;
        border-bottom: 1px solid white;
        width: 16rem;
        color: white;
        font-style: italic;
        font-family: arial;

    }

    .mid p .maiden {
        margin-left: 160px;
        padding-right: 100px;
        font-size: 8px;
    }




    .bottom {
        margin-top: 4rem;
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
