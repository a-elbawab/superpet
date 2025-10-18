@extends('frontend.layout')

@section('content')
    <div class="container py-5">
        {{-- with messages --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mb-4 text-center">@lang('frontend.profile.edit_profile')</h2>
        <form action="{{ route('front.me.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <!-- الاسم -->
            <div class="mb-3">
                <label for="name" class="form-label">@lang('customers.attributes.name')</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $user->name) }}" required>
                </div>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- البريد الإلكتروني -->
            <div class="mb-3">
                <label for="email" class="form-label">@lang('customers.attributes.email')</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $user->email) }}" required>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- الهاتف -->
            <div class="mb-3">
                <label for="phone" class="form-label">@lang('customers.attributes.phone')</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ old('phone', $user->phone) }}" required>
                </div>
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- المحافظة -->
            <div class="mb-3">
                <label for="city_id" class="form-label">@lang('customers.attributes.city_id')</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                    <select class="form-control" id="city_id" name="city_id" required>
                        <option value="" disabled selected>@lang('cities.singular')</option>
                        @foreach ($cities as $key => $city)
                            <option value="{{ $key }}"
                                {{ old('city_id', $user->city_id) == $key ? 'selected' : '' }}>{{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                @error('city_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- العنوان -->
            <div class="mb-3">
                <label for="address" class="form-label">@lang('customers.attributes.address')</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                    <textarea class="form-control" id="address" name="address" rows="2">{{ old('address', $user->address) }}</textarea>
                </div>
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- تحديث الصورة الشخصية -->
            <div class="mb-3">
                <label for="image" class="form-label">@lang('customers.attributes.avatar')</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*"
                    onchange="previewImage(event)">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="mt-3 position-relative">
                    <img id="preview"
                        src="{{ $user->hasMedia('avatars') ? $user->getFirstMediaUrl('avatars') : 'https://via.placeholder.com/150' }}"
                        alt="معاينة الصورة" class="img-thumbnail" style="max-width: 150px;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" id="remove-image-btn"
                        data-url="{{ route('front.me.image.delete') }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>

            <!-- زر الحفظ -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">
                    <i class="fa fa-save"></i> @lang('frontend.profile.edit')
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const removeImageBtn = document.getElementById('remove-image-btn');
            const imageInput = document.getElementById('image');
            const preview = document.getElementById('preview');

            removeImageBtn.addEventListener('click', function() {
                const file = imageInput.files[0];
                const url = this.getAttribute('data-url');

                if (file) {
                    // إذا تم اختيار صورة جديدة، قم بإعادة تعيين الإدخال
                    imageInput.value = "";
                    preview.src = 'https://via.placeholder.com/150';
                } else if (preview.src !== 'https://via.placeholder.com/150') {
                    // إذا كانت الصورة موجودة من الباك، احذفها باستخدام AJAX
                    fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                preview.src = 'https://via.placeholder.com/150';
                                alert('تم حذف الصورة بنجاح.');
                            } else {
                                alert('حدث خطأ أثناء حذف الصورة.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('حدث خطأ أثناء حذف الصورة.');
                        });
                }
            });
        });
    </script>
@endsection
