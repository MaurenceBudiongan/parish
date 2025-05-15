@foreach ($baptismals as $baptismal)
    <form action="{{ route('baptismals.destroy', $baptismal->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="certificate">
            <div class="top">
                <p>Diocese of Talibon</p>
                <p class="p2">SAINT VINCENT FERRER PARISH</p>
                <p>San Pascual, Ubay, Bohol</p>
            </div>
            <div class="mid">
                <h1 class="h1">CERTIFICATE OF BAPTISM</h1>
                <p>
                    Name of Child <span class="semi1">:</span> <input class="child_name" type="text" name="child_name"
                        value="{{ $baptismal->child_name }}" readonly>
                    Date of Birth <span class="semi2">:</span> <input class="date_birth" type="date"
                        name="date_birth" value="{{ $baptismal->date_birth }}" readonly>
                    Place of Birth <span class="semi3">:</span> <input class="place" type="text" name="place"
                        value="{{ $baptismal->place }}" readonly>
                    Name of Father <span class="semi4">:</span> <input class="father_name" type="text"
                        name="father_name" value="{{ $baptismal->father_name }}" readonly>
                    Name of Mother <span class="semi5">:</span> <input class="mother_name" type="text"
                        name="mother_name" value="{{ $baptismal->mother_name }}" readonly>
                    <span class="maiden">(Mother's maiden family name)</span>
                    Parent's Residence&nbsp;&nbsp; : <input class="parent_residence" type="text"
                        name="parent_residence" value="{{ $baptismal->parent_residence }}" readonly>
                    Date Of Baptism&nbsp;&nbsp;&nbsp;&nbsp;: <input class="date_baptism" type="date"
                        name="date_baptism" value="{{ $baptismal->date_baptism }}" readonly>
                    Minister of Baptism&nbsp;&nbsp;: <input class="minister" type="text" name="minister"
                        value="{{ $baptismal->minister }}" readonly>
                    Baptismal Sponsor&nbsp;&nbsp;&nbsp;: <input class="Sponsor" type="text" name="sponsor"
                        value="{{ $baptismal->sponsor }}" readonly>

                    <span class="purpose">Purpose:
                        <textarea name="purpose" readonly>{{ $baptismal->purpose }}</textarea>
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
        <div class="buttons">
            <a href="{{ route('baptismals.edit', $baptismal->id) }}">
                <button type="button" class="edit-btn">Edit</button>
            </a>
            <button type="submit" class="delete-btn"
                onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
        </div>
    </form>
@endforeach

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

    .semi4,
    .semi5 {
        margin-left: 28px;
    }

    .semi1 {
        margin-left: 32px;
    }

    .semi2 {
        margin-left: 43px;
    }

    .semi3 {
        margin-left: 40px;
    }

    .semi5 {
        margin-left: 27px;
    }

    .certificate {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3rem;
        border: 7px solid var(--c-gray-500);
        padding: 10px 0px;
        backdrop-filter: blur(19px);
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

        width: 17.5rem;
        color: white;
        font-style: italic;
        font-family: arial;

    }

    .mid p .maiden {
        margin-left: 160px;
        padding-right: 100px;
        font-size: 8px;
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
