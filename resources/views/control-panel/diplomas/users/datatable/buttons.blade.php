<a href="#" class="btn btn-sm btn-primary"  data-toggle= "modal" data-target= "#modals-edit-{{ $item->id }}">تعديل الحالة</a>
<div class="modal fade" id="modals-edit-{{ $item->id }}">
    <div class="modal-dialog course-model">

        <form class="create-new-nature modal-content pt-0"
            action=" {{ route('diploma-users.update',$item->id) }} " method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الحالة</h5>
            </div>
            <div class="modal-body flex-grow-1">

                <div class="form-group">
                    <label for="description">{{ __('الحالة') }}</label>
                    <select class="form-control" name="status" id="status" >
                        <option @if(old('status',$item->status) == '0') selected @endif value="0">التسجيل غير مأكد</option>
                        <option @if(old('status',$item->status) == '1') selected @endif value="1">التسجيل مأكد</option>
                    </select>
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
<!-- Modal to add new user starts-->
<div class="modal fade" id="modals-delete-{{ $item->id }}">
    <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" action=" {{ route('diploma-users.destroy',$item->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">حذف المتدرب</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <h4>هل تريد حذف المتدرب؟</h4>
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
@if($item->payment_type == '0' && $item->payment_file)
    <a href="{{ asset('storage/'.$item->payment_file) }}" class="btn btn-sm btn-success" target="_blank">عرض الملف</a>
@endif
