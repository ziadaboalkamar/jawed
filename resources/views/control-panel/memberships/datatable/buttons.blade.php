<a href="{{ asset('storage/'.$item->tranfer_file) }}" class="btn btn-sm btn-success" target="_blank">الايصال البنكي</a>

<a href="#" data-toggle="modal"
        data-target="#modals-show-memberships-{{ $item->id }}" class="btn btn-sm btn-primary" >
        عرض
</a>

<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-{{ $item->id }}">
    حذف
</a>

<!-- Modal to add new user starts-->
<div class="modal fade" id="modals-delete-{{ $item->id }}">
    <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" action=" {{ route('memberships.destroy',$item->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">حذف الطلب</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <h4>هل تريد حذف الطلب؟</h4>
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
<!-- Modal to add new user starts-->
<div class="modal fade" id="modals-show-memberships-{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">عرض طلب العضوية</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="row">
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('اسم المسجل') }}</h4>
                            <label for="name" class="form-label">{{ $item->name }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('المدينة') }}</h4>
                            <label for="name" class="form-label">{{ $item->city }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('المهنة') }}</h4>
                            <label for="name" class="form-label">{{ $item->job_name }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('عنوان العمل') }}</h4>
                            <label for="name" class="form-label">{{ $item->job_address }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('رقم البطاقة الشخصية') }}</h4>
                            <label for="name" class="form-label">{{ $item->id_number }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('تاريخ البطاقة') }}</h4>
                            <label for="name" class="form-label">{{ $item->id_date }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('مصدر البطاقة') }}</h4>
                            <label for="name" class="form-label">{{ $item->id_source }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('رقم الجوال') }}</h4>
                            <label for="name" class="form-label">{{ $item->phone }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('مكان الاقامة') }}</h4>
                            <label for="name" class="form-label">{{ $item->address }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('رقم الهاتف') }}</h4>
                            <label for="name" class="form-label">{{ $item->telephone }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('العنوان البريدي') }}</h4>
                            <label for="name" class="form-label">{{ $item->post_address }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('نوع العضوية') }}</h4>
                            <label for="name" class="form-label">{{ $item->type }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('تاريخ البدء') }}</h4>
                            <label for="name" class="form-label">{{ $item->start_date }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}

                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal to add new user Ends-->
<script>

    $("#modals-show-memberships-{{ $item->id }}").click(function(event){
        $.ajax({
            url: '{{ route('memberships.updateStatus',$item->id) }}',
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data.status);
                $('.memberships-list-table').DataTable().ajax.reload();
            },

        })
    });
</script>
