
@section('pageTitle')
Liên hệ
@endsection
@extends('master')
@section('content')

<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Liên hệ</i></a>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="beta-map col-xs-12 col-sm-6 col-md-6">
			<h2>Cơ sở 1</h2>
			<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJdXE01vBUNDERXPvMxNvpaZc&key=AIzaSyCd-NV9xuTbm_HF3nga-Eo0Ax_nlT3DZCw" ></iframe></div>
		</div>
		<div class="container col-xs-12 col-sm-6 col-md-6">
			<div id="content" class="space-top-none">
				
				<!-- <div class="space50">&nbsp;</div> -->
				<div class="row">
					<div class="col-sm-12">
						<h2>Contact Form</h2>
						<div class="space20">&nbsp;</div>
						<p>Mọi ý kiến đóng góp xin vui lòng gửi theo form dưới . Cảm ơn !!!</p>
						<div class="space20">&nbsp;</div>
						<form action="send/ykien" method="post" class="contact-form" enctype="multipart/form-data">
                			<input type="hidden" name="_token" value="{{csrf_token()}}" />
							<div class="form-block">
								<input name="name" id="name" type="text" placeholder="Họ tên ... (bắt buộc)" required>
							</div>
							<div class="form-block">
								<input name="email" id="email" type="email" placeholder="Email ... (bắt buộc)" required>
							</div>
							<div class="form-block">
								<input name="tieude" id="tieude" type="text" placeholder="Tiêu đề ..." required>
							</div>
							<div class="form-block">
								<textarea name="noidung" id="noidung" placeholder="Nội dung ..." required></textarea>
							</div>
							<div class="form-block">
								<button type="submit" class="beta-btn primary">Gửi ý kiến<i class="fa fa-chevron-right"></i></button>
							</div>
						</form>
					</div>
				<!-- <div class="col-sm-4">
					<h2>Contact Information</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Address</h6>
					<p>
						Suite 127 / 267 – 277 Brussel St,<br>
						62 Croydon, NYC <br>
						Newyork
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Business Enquiries</h6>
					<p>
						Doloremque laudantium, totam rem aperiam, <br>
						inventore veritatio beatae. <br>
						<a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Employment</h6>
					<p>
						We’re always looking for talented persons to <br>
						join our team. <br>
						<a href="hr@betadesign.com">hr@betadesign.com</a>
					</p>
				</div> -->
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
</div>
@endsection