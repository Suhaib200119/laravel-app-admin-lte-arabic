@extends('parentLayout.parent')
@section('titlePage', 'عرض المنتجات')
@section('title_1', 'المنتجات')
@section('title_2', 'عرض المنتجات')
@section('css')
    <link rel="stylesheet" href="{{ asset('cms/dist/adminlte/css/table_css.css') }}">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        function dialog_1(id, ref) {
            Swal.fire({
                title: 'هل أنت متأكد',
                text: "لا تستطيع التراجع عن حذف المنتج",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'تراجع',
                confirmButtonText: 'نعم احذفه'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/Products/'+id)
                        .then(function(response) {
                           ref.closest("tr").remove();
                           Swal.fire(
                                'تم الحذف بنجاح',
                                'تم حذف المنتج',
                                'success'
                                )
                        })
                        .catch(function(error) {
                            Swal.fire(
                                'فشلت عملية الحذف',
                                'لم يتم حذف المنتج',
                                'error'
                                )
                        })
                }
            })


        }



        function dialog_show(id){
            axios.get('/Products/'+id)
                    .then(function (response) {
                        
                        Swal.fire({
                            title: response.data.productName,
                            text: response.data.productDescription,
                            imageUrl:'images/'+response.data.productImage,
                            imageWidth: 400,
                            imageHeight: 200,
                            imageAlt: " صورة المنتج "+ response.data.productName,
                            })
                    })
        }
    </script>

@endsection


@section('pageContent')
    <table id="customers">

        <th>الرقم</th>
        <th>الأسم</th>
        <th>السعر</th>
        <th>الحالة</th>
        <th>الوصف</th>
        <th>تاريخ الإنتاج</th>
        <th>تاريخ الإنتهاء</th>
        <th>الصورة</th>
        <th>العمليات</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productName }}</td>
                <td>{{ $product->productPrice }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->productDescription }}</td>
                <td>{{ $product->productStartDate }}</td>
                <td>{{ $product->productEndDate }}</td>
                <td><img src="{{ asset('images/' . $product->productIamge) }}" alt="" width="150px"></td>

                <td>

                    <button onclick="dialog_1({{ $product->id }},this)" class="btn"
                        style="background-color: rgb(246, 109, 109)">
                        <i class="fa fa-trash" style="color: white"></i></button>

                    <a href="{{ route('Products.edit', $product->id) }}">
                        <button class="btn" style="background-color: rgb(59, 95, 239)"><i class="fa fa-edit"
                                style="color: white">
                            </i></button>
                    </a>

                    <button onclick="dialog_show({{ $product->id }})" class="btn"
                        style="background-color: rgb(246, 109, 109)">
                        <i class="fa fa-eye" style="color: white"></i></button>

                </td>

            </tr>
        @endforeach
    </table>
@endsection
