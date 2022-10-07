<a href="#" data-toggle="modal"
        data-target="#modals-show-contact-{{ $item->id }}" class="btn btn-sm btn-primary" >
        عرض
</a>

<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-{{ $item->id }}">
    حذف
</a>
<!-- Modal to add new user starts-->
<div class="modal fade" id="modals-delete-{{ $item->id }}">
    <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" action=" {{ route('contacts.destroy',$item->id) }}"
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
<div class="modal fade" id="modals-show-contact-{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">عرض الرسالة</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="row">
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h4> {{ __('اسم المرسل') }}</h4>
                            <label for="name" class="form-label">{{ $item->name }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}

                    {{-- client URL --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group fallback w-100">
                            <h4> {{ __('البريد الالكتروني') }}</h4>
                            <label for="client_url" class="form-label">{{ $item->email }}</label>
                        </div>
                    </div>
                    {{-- end client URL --}}

                    {{-- client URL --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group fallback w-100">
                            <h4> {{ __('رقم التواصل') }}</h4>
                            <label for="client_url" class="form-label">{{ $item->phone }}</label>
                        </div>
                    </div>
                    {{-- end client URL --}}
                    {{-- client URL --}}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group fallback w-100">
                            <h4> {{ __('الرسالة') }}</h4>
                            <label for="client_url" class="form-label">{{ $item->message }}</label>
                        </div>
                    </div>
                    {{-- end client URL --}}


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
    $("#modals-show-contact-{{ $item->id }}").click(function(event){
        $.ajax({
            url: '{{ route('contacts.show',$item->id) }}',
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data.status);
                $('.contact-list-table').DataTable().ajax.reload();
            },

        })
    });

</script>
