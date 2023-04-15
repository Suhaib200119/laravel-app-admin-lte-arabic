@extends("parentLayout.parent")
@section("titlePage","إضافة منتج")
@section("title_1","المنتجات")
@section("title_2","إضافة منتج")
@section("css")
<link rel="stylesheet" href="{{asset("cms/dist/adminlte/css/form_css.css")}}">
@endsection

@section("js")

@endsection

@section("header","قم بإدخال بيانات المنتج الذي تريد إضافته")


@section("pageContent")
<form action="{{route("Products.store")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="productName">اسم المنتج</label>
    <input type="text" id="productName" name="productName" placeholder="اسم المنتج">
    @error("productName")
    <h5 class="error">
     {{
       $message
     }}
 </h5>
    @enderror
   

    <label for="categoryId">الصنف</label>
    <select id="categoryId" name="categoryId">
        @foreach ($categories as $category )
      <option value="{{$category->id}}">{{$category->categoryName}}</option>
            
        @endforeach
    </select>
   

    <label for="productStartDate">تاريخ الإنتاج</label>
    <input type="date" name="productStartDate" id="productStartDate">
    @error("productStartDate")
    <h5 class="error">
     {{
       $message
     }}
 </h5>
    @enderror

 <label for="productEndDate">تاريخ الإنتهاء</label>
    <input type="date" name="productEndDate" id="productEndDate">
    @error("productEndDate")
    <h5 class="error">
     {{
       $message
     }}
 </h5>
    @enderror

    <label for="productPrice">سعرالمنتج</label>
    <input type="text" id="productPrice" name="productPrice" placeholder="سعر المنتج">
    @error("productPrice")
    <h5 class="error">
     {{
       $message
     }}
 </h5>
    @enderror
    
    <label for="productDescription">وصف المنتج</label>
    <input type="text" id="productDescription" name="productDescription" placeholder="وصف المنتج">
    @error("productDescription")
   <h5 class="error">
    {{
      $message
    }}
</h5>
   @enderror
        
    <label for="status">الحالة</label>
    <select id="status" name="status">
      <option value="متوفر">متوفر</option>
      <option value="غير متوفر">غير متوفر</option>
    </select>

    <label for="productImage">صورة المنتج</label>
   <input type="file" name="productImage" id="productImage">
   @error("productImage")
   <h5 class="error">
    {{
      $message
    }}
</h5>
   @enderror
  
    <input type="submit" value="حفظ">
  </form>
  @if (session("message"))
  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ session()->get('message') }}
</div>
      
  @endif

@endsection
