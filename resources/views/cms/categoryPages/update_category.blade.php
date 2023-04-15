@extends("parentLayout.parent")
@section("titlePage","تعديل صنف")
@section("title_1","الأصناف")
@section("title_2","تعديل صنف")
@section("css")
<link rel="stylesheet" href="{{asset("cms/dist/adminlte/css/form_css.css")}}">
@endsection

@section("js")

@endsection


@section('pageContent')
@section('header', 'قم بتعبئة بيانات الصنف الجديدة للصنف الذي تريد تعديل بياناته')



<div>
    <form action="{{ Route('Categories.update',$categoryData->id) }}" method="post">
        @csrf
        @method("put")
        <label for="categoryName">اسم الصنف</label>
        <input type="text" id="categoryName" name="categoryName" placeholder="اسم الصنف" value="{{$categoryData->categoryName}}">
        @if ($errors->any())
       <h5 class="error">
       {{ $errors->all()[0]}}
       </h5>
        @endif

        <label for="categoryType">النوع</label>
        <br>
        <input type="radio" name="categoryType" value="أثاث" @if ($categoryData->categoryType=="أثاث") checked
        @endif> أثاث
        <br>
        <input type="radio" name="categoryType" value="ملابس" @if ($categoryData->categoryType=="ملابس") checked
        @endif> ملابس
        <br>
        <input type="radio" name="categoryType" value="مأكولات" @if ($categoryData->categoryType=="مأكولات") checked
        @endif> مأكولات
        <br>
        <input type="radio" name="categoryType" value="مشروبات" @if ($categoryData->categoryType=="مشروبات") checked
        @endif> مشروبات
        @if ($errors->any())
        <h5 class="error">
        {{ $errors->all()[1]}}
        </h5>
         @endif

        <br>
        <br>


        <label for="status">الحالة</label>
        <select id="status" name="status">
            <option value="متوفر" @if ($categoryData->status=="متوفر") selected
            @endif>متوفر</option>
            <option value="غير متوفر" @if ($categoryData->status=="غير متوفر") selected
                @endif>غير متوفر</option>
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

