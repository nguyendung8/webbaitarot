@extends('backend.master')
@section('title', 'Danh sách bình luận')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .comment-item {
        border: 1px solid #337AB7;
        padding: 11px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .close-btn {
        font-size: 21px;
        color: #337ab7;
        float: right;
        cursor: pointer;
    }
    .confirm-btn {
        display: flex;
        padding: 7px 12px;
        border: 1px solid #ddd;
        width: fit-content;
        margin: auto;
        border-radius: 5px;
        background: #337ab7;
        color: #fff;
        font-size: 15px;
    }
    .confirm-btn:hover {
        text-decoration: none;
        color: #fff;
        opacity: 0.9;
    }
</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bình luận đánh giá</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Danh sách bình luận
                    </div>
                    <div class="panel-body">
                        @foreach($comments as $comment)
                        <div class="comment-item">
						    <a href="{{ asset('admin/comment/delete/' . $comment->com_id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label class="customer-email">ID khách hàng: </label>
                            {{ $comment->user_id }}
                            <br>
                            <label class="customer-email">Tên khách hàng: </label>
                                {{ $comment->com_name }}
                            <br>
                            <label class="customer-email">ID Sản phẩm: </label>
                            {{ $comment->com_product }}
                            <br>
                            <label class="customer-phone">Bình luận: </label>
                                {{ $comment->com_content }}
                            <br>
                            <a class="confirm-btn" href="{{ asset('admin/comment/confirm-comment/' . $comment->com_id) }}"
                                onclick="return confirm('Bạn có chắc chắn muốn duyệt bình luận này không?')">
                                @if($comment->com_status == 0)
                                    Duyệt
                                @else
                                    Đã duyệt
                                @endif
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop
