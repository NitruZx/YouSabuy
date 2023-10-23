<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/regis.css')}}" />
    <script src="{{ asset('js/regis.js')}}" defer></script>
    <title>Contract</title>
</head>
<body>
    <div class="form">
        <div class="form-step form-step-active">
            <h1>ทำสัญญาผู้เช่าออนไลน์</h1>
            <hr>
            <h3>ห้องที่ท่านจะทำสัญญา : {{$room->room_id}}</h3>

            <div class="name">
                <div style="display: flex; flex-direction: column; width: 100%;">
                    <label for="fname">Firstname</label>
                    <input type="text" name="fname" id="fname" value="{{Auth::user()->firstname}}" readonly placeholder="FirstName" />
                </div>
                <div style="display: flex; flex-direction: column; width: 100%; margin-left: 10px;">
                    <label for="fname">Lastname</label>
                    <input type="text" name="lname" id="lname" value="{{Auth::user()->lastname}}" readonly placeholder="Last Name" />   
                </div>
            </div>
            <br>
            <label for="address">ID CARD</label>
            <input type="text" name="id_card" id="id_card" placeholder="ID CARD" ><br>

            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="address"><br>
            <label for="datetime">เลือกวันที่จะเข้าอาศัย:</label>
            <input class="form-control calendar" type="date" name="datecheckin" required>
            <br>

            <div class="btns-group">
                <a href="/dashboard" class="btn btn-prev ">Back</a>
                <a href="#" class="btn btn-next ">Next</a>
            </div>

        </div>


        <div class="form-step">
            <h1>ข้อตกลงของสัญญา</h1>
            <div class="formcontract">
                <iframe id="iframepdf" src="assets/pdf/guy.pdf" width="100%" height="600px"></iframe>
            </div>
            <br>
            <div>
                <input type="checkbox" id="rule" name="rule"  class="checkr" required>
                <label for="rule"> คู่สัญญาได้อ่านและเข้าใจข้อความในสัญญานี้โดยตลอดแล้วเห็นว่าถูกต้อง </label><br>
            </div>

                <div class="btns-group">
                    <a href="{{ url()->previous() }}" class="btn btn-prev ">Back</a>
                    <input type="hidden" name="room_id" value="{{$room->room_id}}" />
                    <input type="hidden" name="client_id" value="{{$room->client_id}}" />
                    <a href="{{route('dashboard')}}">
                    <input type="submit" value="Submit" class="inline-block rounded bg-primary px-6 pb-3.5 pt-3.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"></a>
                </div>
        </div>

    </div>

</body>
</html>