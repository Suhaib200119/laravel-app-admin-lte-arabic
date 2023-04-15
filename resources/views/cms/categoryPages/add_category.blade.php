@extends('parentLayout.parent')
@section('titlePage', 'إضافة صنف')
@section('title_1', 'الأصناف')
@section('title_2', 'إضافة صنف')
@section('css')
    <link rel="stylesheet" href="{{ asset('cms/dist/adminlte/css/form_css.css') }}">
@endsection

@section('js')

@endsection


@section('pageContent')
@section('header', 'قم بتعبئة بيانات الصنف الذي تريد إضافته')



<div>
    <form action="{{ Route('Categories.store') }}" method="post">
        @csrf
        <label for="categoryName">اسم الصنف</label>
        <input type="text" id="categoryName" name="categoryName" placeholder="اسم الصنمف">
        @if ($errors->any())
       <h5 class="error">
       {{ $errors->all()[0]}}
       </h5>
        @endif

        <label for="categoryType">النوع</label>
        <br>
        <input type="radio" name="categoryType" value="أثاث"> أثاث
        <br>
        <input type="radio" name="categoryType" value="ملابس"> ملابس
        <br>
        <input type="radio" name="categoryType" value="مأكولات"> مأكولات
        <br>
        <input type="radio" name="categoryType" value="مشروبات"> مشروبات
        @if ($errors->any())
        <h5 class="error">
        {{ $errors->all()[1]}}
        </h5>
         @endif

        <br>
        <br>


        <label for="status">الحالة</label>
        <select id="status" name="status">
            <option value="متوفر">متوفر</option>
            <option value="غير متوفر">غير متوفر</option>
        </select>

        <input type="submit" value="حفظ">
        @if (session('message'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session()->get('message') }}
            </div>
        @endif
    </form>
</div>
@endsection
