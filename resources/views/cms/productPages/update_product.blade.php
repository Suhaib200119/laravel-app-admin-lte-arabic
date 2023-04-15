@extends("parentLayout.parent")
@section("titlePage","تعديل منتج")
@section("title_1","المنتجات")
@section("title_2","تعديل منتج")
@section("css")
<link rel="stylesheet" href="{{asset("cms/dist/adminlte/css/form_css.css")}}">

@endsection

@section("js")

@endsection


@section("header","قم بإدخال بيانات المنتج الجديدة الذي تريد تعديله")


@section("pageContent")
<form action="{{route("Products.update",$product->id)}}" method="POST" >
    @csrf
    @method("put")
    <label for="productName">اسم المنتج</label>
    <input type="text" id="productName" name="productName" placeholder="اسم المنتج" value="{{$product->productName}}">
   

    <label for="categoryId">الصنف</label>
    <select id="categoryId" name="categoryId">
        @foreach ($categories as $category )
      <option value="{{$category->id}}" @if ($category->id==$product->categoryId)
         selected
      @endif>{{$category->categoryName}}</option>
            
        @endforeach
    </select>
   

    <label for="productStartDate">تاريخ الإنتاج</label>
    <input type="date" name="productStartDate" id="productStartDate"  value="{{$product->productStartDate}}">
  

 <label for="productEndDate">تاريخ الإنتهاء</label>
    <input type="date" name="productEndDate" id="productEndDate"  value="{{$product->productEndDate}}">
  

    <label for="productPrice">سعرالمنتج</label>
    <input type="text" id="productPrice" name="productPrice" placeholder="سعر المنتج" value="{{$product->productPrice}}">

    <label for="productDescription">وصف المنتج</label>
    <input type="text" id="productDescription" name="productDescription" placeholder="وصف المنتج" value="{{$product->productDescription}}">

        
    <label for="status">الحالة</label>
    <select id="status" name="status">
      <option value="متوفر" @if ($product->status=="متوفر") selected
          
      @endif>متوفر</option>
      <option value="غير متوفر" @if ($product->status=="غير متوفر") selected
          
        @endif>غير متوفر</option>
    </select>

  
    <input type="submit" value="تعديل">
  </form>
  @if (session("message"))
  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ session()->get('message') }}
</div>
      
  @endif

@endsection
