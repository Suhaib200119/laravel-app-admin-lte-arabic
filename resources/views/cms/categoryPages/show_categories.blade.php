@extends('parentLayout.parent')
@section('titlePage', 'عرض الأصناف')
@section('title_1', 'الأصناف')
@section('title_2', 'عرض الأصناف')
@section('css')
    <link rel="stylesheet" href="{{ asset('cms/dist/adminlte/css/table_css.css') }}">

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset("cms/dist/adminlte/js/delete_category.js")}}"></script>
@endsection


@section('pageContent')
    <table id="customers">

        <th>الرقم</th>
        <th>الأسم</th>
        <th>النوع</th>
        <th>الحالة</th>
        <th>العمليات</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->categoryName }}</td>
                <td>{{ $category->categoryType }}</td>
                <td>{{ $category->status }}</td>
                <td>


                    <button onclick="dialog_1({{$category->id}},this)" class="btn" style="background-color: rgb(246, 109, 109)">
                        <i class="fa fa-trash" style="color: white"></i></button>

                    <a href="{{ route('Categories.edit', $category->id) }}">
                        <button class="btn" style="background-color: rgb(59, 95, 239)"><i class="fa fa-edit"
                                style="color: white">
                            </i></button>
                    </a>

                </td>

            </tr>
        @endforeach
    </table>
@endsection
