<a href="#" class="btn btn-sm btn-primary"  data-toggle= "modal" data-target= "#modals-edit-{{ $item->id }}">تعديل</a>
<div class="modal fade" id="modals-edit-{{ $item->id }}">
    <div class="modal-dialog">

        <form class="create-new-nature modal-content pt-0"
            action=" {{ route('reports.update',$item->id) }} " method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل التقرير</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label for="username">اسم التقرير</label>
                    <input type="text" class="form-control"
                        value="{{ $item->name }}" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="image">ملف التقرير</label>
                    <input type="file" name="file" id="file" class="form-control"  />
                </div>
                <div class="form-group">
                    <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-secondary btn-sm">
                        تحميل الملف
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                </button>
            </div>
        </form>
    </div>
</div>

<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-{{ $item->id }}">
    حذف
</a>
<a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-secondary btn-sm">
    تحميل الملف
</a>
<!-- Modal to add new user starts-->
<div class="modal fade" id="modals-delete-{{ $item->id }}">
    <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" action=" {{ route('reports.destroy',$item->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">حذف التقرير</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <h4>هل تريد حذف التقرير؟</h4>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger mr-1 data-submit">حذف</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Modal to add new user Ends-->
