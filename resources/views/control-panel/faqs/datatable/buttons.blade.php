<a href="#" class="btn btn-sm btn-primary"  data-toggle= "modal" data-target= "#modals-edit-{{ $item->id }}">تعديل</a>
<div class="modal fade" id="modals-edit-{{ $item->id }}">
    <div class="modal-dialog product-model">

        <form class="create-new-nature modal-content pt-0"
            action=" {{ route('faqs.update',$item->id) }} " method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل السؤال</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label for="question">{{ __('السؤال') }}</label>
                    <input type="text" class="form-control" value="{{ old('question',$item->question) }}" name="question" id="question" required>
                </div>
                <div class="form-group">
                    <label for="description">{{ __('الجواب') }}</label>
                    <textarea class="form-control" rows="3" name="description" id="description" >{{ old('description',$item->description) }}</textarea>
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
        <form class="add-new-user modal-content pt-0" action=" {{ route('faqs.destroy',$item->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">حذف السؤال</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <h4>هل تريد حذف السؤال؟</h4>
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
