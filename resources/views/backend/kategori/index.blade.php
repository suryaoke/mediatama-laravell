 @extends('backend.admin_master')
 @section('backend')
     <div class="content">

         <h2 class="intro-y text-lg font-medium mt-10">
             Data List Kategori
         </h2>
         <div class="grid grid-cols-12 gap-6 mt-5">
             <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                 <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                     class="btn btn-primary shadow-md mr-2">Tambah Data</a>

             </div>
             <!-- BEGIN: Data List -->
             <div class="intro-y col-span-12 overflow-x-auto">
                 <div class="min-w-max">
                     <table id="datatable" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th class="whitespace-nowrap">NO</th>
                                 <th class="whitespace-nowrap">Nama</th>
                                 <th class="whitespace-nowrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($kategori as $key => $item)
                                 <tr class="intro-x">
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $key + 1 }}
                                     </td>
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $item->name }}
                                     </td>

                                     <td class="font-medium whitespace-nowrap">
                                         <a data-tw-toggle="modal"
                                             data-tw-target="#delete-confirmation-modal-{{ $item->id }}"
                                             class="btn btn-danger mr-1 mb-2">
                                             <i data-lucide="trash" class="w-4 h-4"></i> </a>
                                         <a data-tw-toggle="modal"
                                             data-tw-target="#update-header-footer-modal-preview-{{ $item->id }}"
                                             class="btn btn-warning mr-1 mb-2">
                                             <i data-lucide="edit" class="w-4 h-4"></i>
                                         </a>
                                     </td>

                                 </tr>

                                 <!-- BEGIN: Modal Update -->
                                 <div id="update-header-footer-modal-preview-{{ $item->id }}" class="modal"
                                     tabindex="-1" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <!-- BEGIN: Modal Header -->
                                             <div class="modal-header">
                                                 <h2 class="font-medium text-base mr-auto">Ubah Data Kategori</h2>
                                             </div>
                                             <!-- END: Modal Header -->

                                             <!-- BEGIN: Modal Body -->
                                             <form action="{{ route('admin.kategori.update', $item->id) }}" method="POST"
                                                 enctype="multipart/form-data">
                                                 @csrf
                                                 @method('PUT') <!-- Menambahkan method PUT untuk update -->
                                                 <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                     <div class="col-span-12 sm:col-span-12">
                                                         <label for="modal-form-1" class="form-label">Nama</label>
                                                         <input id="modal-form-1" type="text" name="name"
                                                             value="{{ old('name', $item->name) }}" class="form-control"
                                                             placeholder="Masukkan Nama" required>
                                                     </div>
                                                 </div>
                                                 <!-- END: Modal Body -->

                                                 <!-- BEGIN: Modal Footer -->
                                                 <div class="modal-footer">
                                                     <button type="button" data-tw-dismiss="modal"
                                                         class="btn btn-danger w-20 mr-1">Cancel</button>
                                                     <button type="submit" class="btn btn-primary w-20">Save</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- END: Modal Update -->

                                 <!-- BEGIN: Delete Confirmation Modal -->
                                 <div id="delete-confirmation-modal-{{ $item->id }}" class="modal" tabindex="-1"
                                     aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-body p-0">
                                                 <div class="p-5 text-center">
                                                     <i data-lucide="x-circle"
                                                         class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                     <div class="text-3xl mt-5">Are you sure?</div>
                                                     <div class="text-slate-500 mt-2">
                                                         Do you really want to delete these records?
                                                         <br>
                                                         This process cannot be undone.
                                                     </div>
                                                 </div>
                                                 <div class="px-5 pb-8 text-center">
                                                     <button type="button" data-tw-dismiss="modal"
                                                         class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                     <a href="{{ route('admin.kategori.delete', $item->id) }}" type="button"
                                                         class="btn btn-danger w-24">Delete</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- END: Delete Confirmation Modal -->
                             @endforeach

                         </tbody>
                     </table>
                 </div>
                 <!-- END: Data List -->

             </div>

         </div>
     </div>

     <!-- BEGIN: Modal Tambah -->
     <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content"> <!-- BEGIN: Modal Header -->
                 <div class="modal-header">
                     <h2 class="font-medium text-base mr-auto">Tambah Data Kategori</h2>

                 </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                 <form action="{{ route('admin.kategori.create') }}" method="POST" id="myForm" enctype="multipart/form-data">
                     @csrf
                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nama</label>
                             <input id="modal-form-1" type="text" name="name" class="form-control"
                                 placeholder="Masukkan Nama" required>
                         </div>


                     </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                     <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                             class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                             class="btn btn-primary w-20">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div> <!-- END: Modal Tambah -->
 @endsection
