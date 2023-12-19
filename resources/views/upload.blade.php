@extends('layout.master')

@section('content')
<div>
    <div>
        <div class="mainHeaders  py-8 bg-white">
            <h1 class="text-5xl font-extrabold">{{ $title->title }}</h1>
        </div>
        @if ($customers->count() > 0 && $products->count() > 0)
        <div class="flex justify-end me-3">
            @if($customers->count() > $products->count())
            <a href="{{ route('enterBlank') }}" class="w-fit">
                <button
                    class="w-[30px] h-[30px] rounded-full TwoColorBtn uppercase text-lg tracking-wider text-slate-500"><i
                        class="fa-regular fa-circle-right"></i></button>
            </a>
            @else
            <a href="{{ route('PickWinner') }}" class="w-fit">
                <button
                    class="w-[30px] h-[30px] rounded-full TwoColorBtn uppercase text-lg tracking-wider text-slate-500"><i
                        class="fa-regular fa-circle-right"></i></button>
            </a>
            @endif
        </div>
        @endif
    </div>

    <div class="flex justify-evenly items-starts relative pt-10">
        <div class="w-full mx-5 max-h-[750px] rounded-xl inside_box p-10">
            <form action="{{ route('uploadCustomer') }}" method="post" enctype="multipart/form-data" class="mb-3">
                @csrf
                <h1 class="text-center text-white text-[20px] mt-3">Upload Participant File</h1>
                <div class="inputField gap-3 mt-10 border border-[var(--color)] w-full rounded-xl border-dashed p-5">
                    <input type="file" name="CustomerUpload" id="CustomerUpload" class="w-full cursor-pointer">

                </div>

                @error('CustomerUpload')
                <div class="text-sm">{{ $message }}</div>
                @enderror
                @if(session('errorType') == 'customer')
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid mt-5">
                    <button type="submit" class="bg-white py-2 rounded-full">
                        <i class="fa-solid fa-cloud-arrow-up me-5"></i>Upload
                    </button>
                </div>
            </form>
            @if (session('success'))
            <div class="flex justify-end">
                <div id="alert-cust"
                    class="flex items-center p-3 mb-4 bg-gradient-to-tl from-[var(--bg1)] to-[var(--table-bg)] rounded-xl w-auto "
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg> <small>{{ session('success') }} </small>
                    <button type="button"
                        class="ms-3 -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-cust" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

            </div>
            @endif
            @if (count($customers) > 0)
            <div class="CusTable overflow-y-scroll max-h-[40vh] p-4 table_box">
                <table id="CusTB" class="display">

                    <thead>

                        <tr>
                            <th class="">Name</th>
                            <th>Phone</th>
                            <th class="">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td class="">{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td class="">{{ $customer->address }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @endif
        </div>

        <div class="w-full mx-5 max-h-[750px] rounded-xl inside_box p-10">
            <form action="{{ route('uploadProduct') }}" method="post" enctype="multipart/form-data" class="mb-3">
                @csrf
                <h1 class="text-center text-white text-[20px] mt-3">Upload Gifts File</h1>
                <div class="inputField gap-3 mt-10 border border-[var(--color)] w-full rounded-xl border-dashed p-5">
                    <input type="file" name="ProductUpload" id="ProductUpload" class="w-full cursor-pointer">
                </div>
                @error('ProductUpload')
                <div class="text-sm">{{ $message }}</div>
                @enderror
                @if(session('errorType') == 'product')
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="grid mt-5">
                    <button type="submit" class="bg-white py-2 rounded-full">
                        <i class="fa-solid fa-cloud-arrow-up me-5"></i>Upload
                    </button>
                </div>
            </form>
            @if (session('PSuccess'))
            <div class="flex justify-end">
                <div id="alert-product"
                    class="flex items-center p-3 mb-4 bg-gradient-to-tl from-[var(--bg1)] to-[var(--table-bg)] rounded-xl w-auto "
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg> <small>{{ session('PSuccess') }} </small>
                    <button type="button"
                        class="ms-3 -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-product" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

            </div>
            @endif
            @if (count($products) > 0)
            <div class="CusTable overflow-y-scroll max-h-[40vh] p-4 table_box">
                <table id="productTB" class="display">

                    <thead>
                        <tr>
                            <th class="w-1/2">Name</th>
                            <th class="w-1/2">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="">{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            @endif
        </div>
    </div>
</div>@endsection