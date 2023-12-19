@extends('layout.master')

@section('content')
<canvas id="canvas" class="absolute z-[-1]"></canvas>
<div>
    <div class="mainHeaders  py-8 bg-white">
        <h1 class="text-5xl font-extrabold">{{ $title->title }}</h1>
    </div>
    <div class="flex justify-between items-center">
        <a href="{{ route('Upload') }}" class="flex justify-end mx-5">
            <button
                class="w-[30px] h-[30px] rounded-full TwoColorBtn uppercase text-lg tracking-wider text-slate-500"><i
                    class="fa-regular fa-circle-left"></i></button>
        </a>

        <a href="{{ route('goWinnerList') }}" class="flex justify-end mx-5">
            <button
                class="w-[30px] h-[30px] rounded-full TwoColorBtn uppercase text-lg tracking-wider text-slate-500"><i
                    class="fa-regular fa-circle-right"></i></button>
        </a>
    </div>
</div>
<div class="flex justify-center items-center py-12">
    <div>
        @if ($customers->count() > 0 && $products->count() > 0)
        <div id="sm" class="inside_box relative">
            <div class="group">

                <div class="customer_reel"></div>
                <div class="product_reel"></div>

            </div>

        </div>
        <div class="group lever">
            <button id="startSlot">Start</button>
        </div>
        @else
        <div class="">
            <a href="{{ route('Upload') }}">
                <button class="p-10 TwoColorBtn rounded-lg text-xl">No More Data! (back to upload
                    page)</button>
            </a>
        </div>
        @endif

        <!-- hidden input tag for removing winner from the list and to save in the winning list  -->
        <input type="text" name="cus_id" id="cus_id" class="outline-none shadow-none border-none bg-transparent"
            readonly hidden>
        <input type="text" name="prod_id" id="prod_id" class="outline-none shadow-none border-none bg-transparent"
            readonly hidden>

    </div>
</div>



<!-- Modal toggle -->

<div id="toggleModal"
    class="modal hidden w-[100%] h-[100vh] bg-gradient-to-tl from-[rgba(0,0,0,0.8)] to-[rgba(0,0,0,0.8)] absolute left-0 top-0">
    <div
        class="modalContainer inside_box w-1/3 h-1/3 px-10 absolute top-[50%] translate-x-[-50%] translate-y-[-50%] left-[50%] bg-slate-100">
        <div class="modalBody relative">
            <button class="absolute right-0 top-0 modalCloseBtn"><i
                    class="fa-regular fa-circle-xmark text-2xl"></i></button>
            <h2 class="text-2xl my-12 font-extrabold text-center">ဗလာကံစမ်းမဲထည့်မလား?</h2>
            <form action="{{ route('storeBlank') }}" method="POST">
                @csrf
                <div class="input-group my-8">
                    <label for="blank" class="inline-block mb-2">ကံစမ်းမဲအမည်</label>
                    <input type="text" name="blank" id="blank" value=""
                        class="w-full text-slate-500 p-2 border-none rounded-xl outline-none "
                        placeholder="ကျေးဇူးတင်ပါသည်...">
                    @error('blank')
                    <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('PickWinner') }}" class="mt-0">
                        <button type="button"
                            class="border border-[var(--color)] px-3 py-2 disabled:bg-slate-200 my-5 mx-3 rounded-xl">မထည့်ပါ</button></a>
                    <button type="submit"
                        class="border border-[var(--color)] px-3 py-2 disabled:bg-slate-200 my-5 mx-3 rounded-xl"
                        id="saveBlank" disabled>ထည့်မည်</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scriptSection')
<script>
    $().ready(function () {
        var customer_arr = [];
        var product_arr = [];
        $.ajax({
            url: "getCustomer",
            method: "GET",
            success: function (data) {
                // console.log(data);
                $.each(data.customer, function (i, v) {
                    var name = v.name;

                    customer_arr.push(name);
                });

                $.each(data.product, function (i, v) {
                    var name = v.name;

                    product_arr.push(name);
                });
                blank_prize();
            },
        });

        function blank_prize() {
            if (customer_arr.length > product_arr.length) {
                $('#toggleModal').removeClass('hidden');
            } else {
                $('#toggleModal').addClass('hidden');
            }

            $('.modalCloseBtn').click(function () {
                console.log('hi');
                $('#toggleModal').addClass('hidden');
            });

            $('#blank').on('keyup', function () {
                if ($('#blank').val().length > 0) {
                    $('#saveBlank').attr({
                        'disabled': false
                    });
                } else {
                    $('#saveBlank').attr({
                        'disabled': true
                    });
                }
            });
        }
    })
</script>
@endsection