<a href="#" class="btn btn-sm btn-primary"  data-toggle= "modal" data-target= "#modals-edit-{{ $item->id }}">تعديل</a>
<div class="modal fade" id="modals-edit-{{ $item->id }}">
    <div class="modal-dialog course-model">

        <form class="create-new-nature modal-content pt-0"
            action=" {{ route('diplomas.update',$item->id) }} " method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الدبلوم</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="image">الصورة</label>
                        <div class="form-group">

                            <input type="file" onchange="loadFile_image_{{ $item->id}}(image)" name="image" id="image{{ $item->id }}"
                                class="@error("image") is-invalid @enderror" style="display:none;" />
                            <button id="output_logo_{{ $item->id }}" type="button"
                                onclick="document.getElementById('image{{ $item->id }}').click();" value="emad"
                                style="
                                        width: 100%;
                                        height: 150px;
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
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">{{ __('اسم الدبلوم') }}</label>
                            <input type="text" class="form-control" value="{{ old('name', $item->name) }}" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="period">{{ __('مدة الدبلوم') }}</label>
                            <input type="text" class="form-control" value="{{ old('period', $item->period) }}" name="period" id="period" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="trainer">{{ __('مقدم الدبلوم') }}</label>
                            <input type="text" class="form-control" value="{{ old('trainer', $item->trainer) }}" name="trainer" id="trainer" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="certificate">{{ __('الشهادة المعتمدة') }}</label>
                            <input type="text" class="form-control" value="{{ old('certificate', $item->certificate) }}" name="certificate" id="certificate">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="price">{{ __('رسوم الدبلوم') }}</label>
                            <input type="text" class="form-control" value="{{ old('price', $item->price) }}" name="price" id="price" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        @forelse ($item->goals as $key => $goal)
                            <label for="price" class="mt-1">{{ __('هدف رقم ') . ($key+1) }}</label>
                            <input type="text" class="form-control" value="{{ $goal->name }}" name="goals[]">
                        @empty
                            <label for="price" class="mt-1">{{ __('هدف رقم 1') }}</label>
                            <input type="text" class="form-control" value="" name="goals[]">
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">{{ __('وصف قصير') }}</label>
                        <textarea class="form-control" rows="3" name="short_description" id="short_description" >{{ old('short_description',$item->short_description) }}</textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">{{ __('الوصف') }}</label>
                            <textarea class="form-control" rows="3" name="description" id="description{{ $item->id }}" >{{ old('description',$item->description) }}</textarea>
                        </div>
                        <script>
                            CKEDITOR.replace('description{{ $item->id }}');
                        </script>
                    </div>
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
        <form class="add-new-user modal-content pt-0" action=" {{ route('diplomas.destroy',$item->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">حذف الدبلوم</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <h4>هل تريد حذف الدبلوم؟</h4>
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


<a href="{{ route('diploma-users.index',$item->id) }}" class="btn btn-success btn-sm" >
    المسجلين
</a>
