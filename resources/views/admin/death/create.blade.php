<form action="{{ route('deaths.store')}}" method="POST">
        @csrf
    <div class="certificate">
        <div class="top">
            <p>Diocese of Talibon</p>
            <p class="p2">SAINT VINCENT FERRRER PARISH</p>
            <p>San Pascual, Ubay, Bohol</p>
        </div>
        <div class="mid">
            <h1 class="h1">DEATH CERTIFICATE</h1>
            <p>
                <span class="deceased">
                    <span>This is to certify that</span>
                    <span><input type="text" name="deceased_name"></span>
                    <span>minor/single/married,residing in <input class="residence" type="text"
                            name="residence"></span>
                </span>
                <span>died at the age of<input class="age" type="number" name="age">.</span><br>
                Cause of death <span class="semi1">:</span> <input class="cause" type="text" name="cause">
                Date and time of Death <span class="semi2">:</span> <input class="date_time" type="text"
                    name="death_time">
                Place of Death <span class="semi3">:</span> <input class="place" type="text" name="place">
                Place & Time Of Burial<span class="semi4">:</span> <input class="burial_time" type="text"
                    name="burial_time">
                Name of Spouse(if married)or Name of Parents<br>
                if(minor or single)<span class="semi5">:</span> <input class="guardian" type="text"
                    name="guardian"><br>
                Catholic preist who administered <br>
                the last rite&<span class="semi6">:</span> <input class="priest" type="text" name="priest"><br>


                <span class="testimony">
                    <span style="margin-left: 40px;"> In testimony to the truth of the above data, we affix our
                        signature on
                        this</span>
                    <input class="day" type="text" name="day">day of <input class="month" type="text"
                        name="month">,<input class="year" type="number" name="year">at the Catholic Priest
                    Rectory
                    in
                    <input type="text" name="rectory">.
                </span>

            </p>
        </div>
        <div class="bottom">
            <div class="priest">
                <span>REV.FR.DIOSDADO D. RANARA</span>
                <p>Parish Priest</p>
            </div>
        </div>
    </div>
    <button class="saverecord-btn" type="submit">Save Record</button>
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
