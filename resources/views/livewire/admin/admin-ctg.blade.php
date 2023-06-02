<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> All Categories
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6"> 
                                         All Categories
                                    </div>
                                    <div class="col-md-6"> 
                                        <a href="{{route('admin.category.add')}}" class="btn btn-success float-end">Add Category</a> <!-- Removed angle brackets -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                                @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <!-- <th>Ctg</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        
                                        $i = ($categories->currentPage()-1)*$categories->perPage();
                                    @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$category->name}}</td>
                                            <!-- <td>{{$category->ctg}}</td> -->
                                            <td>
                                                <a href="{{route('admin.category.edit',['ctgId'=>$category->id])}}" class="text-info">Edit</a>
                                                <a href="#" class="text-danger" onclick="deleteDialog({{$category->id}})" style="margin-left:20px;">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to delete this category?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteDialog">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCtg()" style="background-color: purple;">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
        <script>
            function deleteDialog(id)
            {
                @this.set('ctgId',id);
                $('#deleteDialog').modal('show');
            }

            function deleteCtg()
            {
                @this.call('deleteCtg');
                $('#deleteDialog').modal('hide');
            }
        </script>
@endpush
   
