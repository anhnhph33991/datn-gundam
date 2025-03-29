@extends('admin.layouts.master')
@section('title', 'Thêm mới User Voucher')

@section('style')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}

@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Thêm mới User Voucher</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.user-vouchers.index') }}">User Voucher</a>
                        </li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End page title -->

    <form action="{{ route('admin.user-vouchers.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- Left Content -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="user_ids" class="form-label">
                                                <span class="required">*</span> Chọn người dùng áp dụng
                                            </label>
                                            <select name="user_ids[]" id="user_ids" class="form-control select2"
                                                multiple="multiple">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ in_array($user->id, old('user_ids', [])) ? 'selected' : '' }}>
                                                        {{ $user->name }} ({{ $user->email }})
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('user_ids')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="voucher_id" class="form-label">
                                        <span class="required">*</span> Voucher
                                    </label>
                                    <select name="voucher_id" id="voucher_id" class="form-select">
                                        <option value="">Chọn voucher</option>
                                        @foreach ($vouchers as $voucher)
                                            <option value="{{ $voucher->id }}"
                                                {{ old('voucher_id') == $voucher->id ? 'selected' : '' }}>
                                                {{ $voucher->title }} ({{ $voucher->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('voucher_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="usage_count" class="form-label">
                                        <span class="required">*</span> Số lần sử dụng
                                    </label>
                                    <input type="number" name="usage_count" id="usage_count" class="form-control"
                                        placeholder="Nhập số lần sử dụng (mặc định là 0)"
                                        value="{{ old('usage_count', 0) }}">
                                    @error('usage_count')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">
                                + Thêm mới
                            </button>
                            <button class="btn btn-danger" type="button" onclick="window.history.back();">
                                Hủy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#user_ids').select2({
                placeholder: "Chọn người dùng",
                allowClear: true
            });
        });
    </script>
@endsection
