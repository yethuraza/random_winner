@extends('layout.master')

@section('content')
<div class="">
    <div>
        <div class="mainHeaders py-3 bg-[#f1ebeb]">
            <h1 class="text-4xl font-extrabold">Winner Picker</h1>
        </div>
        <div class="flex fixed right-5 top-5">
            <i class="fa-solid fa-gear fa-2x cursor-pointer chbg"></i>
            <div class="inside_box text-white me-3 p-4 rounded-lg hidden chbgbox mt-10">
                <h4 class="text-2xl font-semibol">Choose Theme Color</h4>
                <div class="w-full flex justify-around items-center mt-2">
                    <select id="theme_color"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                        <option selected value="red">RED</option>
                        <option value="blue">BLUE</option>
                        <option value="green">GREEN</option>
                        <option value="orange">ORANGE</option>
                        <option value="indigo">INDIGO</option>
                        <option value="violet">VIOLET</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center h-[80vh]">
        <div
            class="p-5 w-[50%] bg-slate-700 text-white text-center hover:p-8 transition-[padding] ease-in-out duration-500 rounded-lg inside_box">
            <h3 class="text-2xl my-12 font-extrabold">Welcome from Random Winner Picker</h3>

            @if (!is_null($titles))
            <form action="{{ route('uploadTitle') }}" method="POST">
                @csrf
                <div class="input-group my-8" id="testBG">
                    <input type="text" name="EventTitle" id="EventTitle" value="{{ $titles->title }}"
                        class="w-full text-slate-500 p-2 border-none rounded-xl outline-none "
                        placeholder="Enter Event Name...">

                    @error('EventTitle')
                    class="text-start">{{ $message }}
                </div>
                @enderror
        </div>

        <button type="submit" class="border border-[var(--color)] px-3 py-2 my-5 rounded-xl">Update Title</button>
        </form>
        @else
        <form action="{{ route('uploadTitle') }}" method="POST">
            @csrf
            <div class="input-group my-8">
                <input type="text" name="EventTitle" id="EventTitle"
                    class="w-full text-slate-500 p-2 border-none rounded-xl outline-none "
                    placeholder="Enter Event Name...">

                @error('EventTitle')
                <div class="text-start">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="border border-[var(--color)] px-3 py-2 my-5 rounded-xl">Create Title</button>
        </form>
        @endif
    </div>
</div>
</div>
@endsection