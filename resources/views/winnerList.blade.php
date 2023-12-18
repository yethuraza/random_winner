@extends('layout.master')

@section('content')
<div class="">
    <div>
        <div class="mainHeaders  py-8 bg-white">
            <h1 class="text-5xl font-extrabold">{{ $title->title }}</h1>
        </div>
        <div class="flex justify-start items-center mx-5">
            <a href="{{ $customers->count() > 0 && $products->count() > 0 ? route('PickWinner') : route('Upload') }}">
                <button
                    class="w-[30px] h-[30px] rounded-full TwoColorBtn uppercase text-lg tracking-wider text-slate-500"><i
                        class="fa-regular fa-circle-left"></i></button>
            </a>
            <a href="{{ url('/') }}" class="ms-5">
                <button
                    class="w-[30px] h-[30px] rounded-full TwoColorBtn uppercase text-lg tracking-wider text-slate-500"><i
                        class="fa-solid fa-house"></i></button>
            </a>
        </div>
    </div>
    <div class="p-5 rounded-lg w-[90%] inside_box mx-auto CusTable max-h-[70vh] mt-24 overflow-y-scroll printArea">
        <a href="{{ route('clearWinnerTable') }}" class="clear_btn">
            <button>Clear</button>
        </a>

        <table id="myTable" class="display">

            <thead>
                <tr>
                    <th colspan="3" class="">Participant List</th>
                    <th colspan="">Gift List</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th class="">Name</th>
                    <th class="border-r border-slate-600">Phone</th>
                    <th>Gift</th>
                </tr>
            </thead>
            <tbody>

                @php
                $i = 1;
                @endphp
                @foreach ($winners as $winner)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $winner->customer_name }}</td>
                    <td class="border-r border-slate-600">{{ $winner->customer_phone }}</td>
                    <td>{{ $winner->product_name }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection