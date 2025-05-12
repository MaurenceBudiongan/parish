<form action="">
    <div class="certificate">
    <div class="top">
        <p>Diocese of Talibon</p>
        <p class="p2">SAINT VINCENT FERRRER PARISH</p>
        <p>San Pascual, Ubay, Bohol</p>
    </div>
    <div class="mid">
        <h1 class="h1">CONFIRMATION CERTIFICATE</h1>
        <p><span>This is to certify that <input class="child_name" type="text" name="child_name"></span>
            son/daughter of <input type="text" name="mother_name"> and <input type="text" name="father_name">
            <span class="confirm">was confirmed according to the rite of the Roman Catholic on</span>
            <br><span class="date"> the <input class="day" type="text" name="day">of <input class="month"
                    type="text" name="month">,<input class="year" type="number" name="year">by this
                Excellency</span>
            <input class="excellency" type="text" name="excellency">.D., Archibishop/Bishop of
            <input type="text" name="parish_name">.<br>
            The following are the sponsors/s: <input class="sponsor1" type="text">
            <input class="sponsor2" type="text">


            <span class="purpose">Purpose:
                <textarea name="purpose"></textarea>
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
</form>
<style>
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
        text-indent: 50px;

    }

    .mid p .confirm {
        word-spacing: 5px;

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
    .mid p .confirm {
        margin-bottom: 20px;

    }

    .mid p .day {
        margin-top: 20px;
    }

    .mid .child_name {
        width: 14.9rem;
    }

    .mid .day,
    .mid .year {
        width: 3.7rem;
    }

    .mid .excellency {
        width: 16.7rem;
    }

    .mid .sponsor1,
    .mid .sponsor2 {
        width: 13rem;
    }

    .mid .sponsor2 {
        margin-left: 15rem;
    }

    .purpose {
        position: relative;
    }

    .purpose textarea {
        position: absolute;
        top: -5px;
        font-style: italic;
        margin-left: 5px;
        background-color: transparent;
        border-style: none;
        color: white;
        resize: none;
        width: 24rem;
        height: 5rem;

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
