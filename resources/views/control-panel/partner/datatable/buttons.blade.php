<a href="#" class="btn btn-sm btn-primary"  data-toggle= "modal" data-target= "#modals-edit-{{ $item->id }}">تعديل</a>
<div class="modal fade" id="modals-edit-{{ $item->id }}">
    <div class="modal-dialog">

        <form class="create-new-nature modal-content pt-0"
            action=" {{ route('partners.update',$item->id) }} " method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الشريك</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label for="username">الاسم</label>
                    <input type="text" class="form-control"
                        value="{{ $item->name }}" name="name" id="name" required>
                </div>
                <label for="image">صورة</label>
                <div class="form-group">

                    <input type="file" onchange="loadFile_image_{{ $item->id}}(image)" name="image" id="image{{ $item->id }}"
                        class="@error("image") is-invalid @enderror" style="display:none;" />
                    <button id="output_logo_{{ $item->id }}" type="button"
                        onclick="document.getElementById('image{{ $item->id }}').click();" value="emad"
                        style="
                                width: 100%;
                                height: 200px;
                                border-radius: 10px;
                                background-color: #0a1128;
                                background-image: url({{ asset('storage/' . $item->image) }});
                                background-repeat: no-repeat;
                                background-size: cover;
                                background-position: center;
                                " />
                </div>
                <script>
                    var loadFile_image_{{ $item->id }} = function(image) {
                        var image = document.getElementById("output_logo_{{ $item->id }}");
                        var src = URL.createObjectURL(event.target.files[0]);
                        image.style.backgroundImage = 'url(' + src + ')';
                    };
                </script>
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
        <form class="add-new-user modal-content pt-0" action=" {{ route('partners.destroy',$item->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">حذف الشركاء</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <h4>هل تريد حذف الشريك؟</h4>
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
