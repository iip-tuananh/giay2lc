<div class="card">
    <style>
        .bank-card{background:#fff;border:1px solid #e9ecef;border-radius:10px;padding:16px}
        .bank-card__header{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:12px}
        .bank-card__title{font-weight:600}
        .bank-card__grid{display:grid;grid-template-columns:1fr;gap:12px}
        @media (min-width:768px){.bank-card__grid{grid-template-columns:1fr 1fr}}
        .bank-card .form-label{margin-bottom:6px;font-weight:500}

    </style>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 col-xs-12" ng-init="activeLang='vi'">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-white border-0 pb-0">
                        <div class="segmented-tabs" role="tablist" aria-label="Ngôn ngữ">
                            <button type="button"
                                    class="seg-btn"
                                    ng-class="{'active': activeLang==='vi'}"
                                    ng-click="activeLang='vi'"
                                    aria-selected="<% activeLang==='vi' %>">
                                Tiếng Việt
                            </button>
                            <button type="button"
                                    class="seg-btn"
                                    ng-class="{'active': activeLang==='en'}"
                                    ng-click="activeLang='en'"
                                    aria-selected="<% activeLang==='en' %>">
                                English
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <!-- TAB: VIETNAMESE -->
                        <div ng-show="activeLang==='vi'">
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Tiêu đề website</label>
                                <input class="form-control" ng-model="form.web_title" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.web_title[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Tên công ty viết gọn</label>
                                <input class="form-control" ng-model="form.short_name_company" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.web_title[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Số hotline</label>
                                <input class="form-control" ng-model="form.hotline" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.hotline[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Số tổng đài</label>
                                <input class="form-control" ng-model="form.phone_switchboard" type="text">
                            </div>
                            <div>
                                <label class="form-label">Thêm zalo chat (có thể thêm nhiều zalo chat) <span class="text-success cursor-pointer" ng-click="form.addZaloChat()">( + )</span></label>
                                <div class="row" ng-repeat="(index, zalo) in form.zalo_chat">
                                    <div class="col-md-5">
                                        <div class="form-group custom-group">
                                            <label class="form-label required-label">Tiêu đề</label>
                                            <input class="form-control" ng-model="zalo.title" type="text">
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong><% errors['zalo_chat.' + index + '.title'][0] %></strong>
                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group custom-group">
                                            <label class="form-label required-label">Số Zalo</label>
                                            <input class="form-control" ng-model="zalo.phone" type="text">
                                            <span class="invalid-feedback d-block" role="alert">
                                    <strong><% errors['zalo_chat.' + index + '.phone'][0] %></strong>
                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-sm btn-danger" ng-click="form.removeZaloChat($index)" style="height: 36px;" ng-if="$index > 0">Xóa</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Zalo doanh nghiệp</label>
                                <input class="form-control" ng-model="form.zalo" type="text">
                                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.zalo[0] %></strong>
                    </span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Địa chỉ công ty</label>
                                <input class="form-control" ng-model="form.address_company" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Địa chỉ sản xuất</label>
                                <input class="form-control" ng-model="form.address_center_insurance" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Mã số thuế</label>
                                <input class="form-control" ng-model="form.tax_code" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Email (nhập nhiều email cách nhau bởi dấu xuống dòng)</label>
                                <textarea class="form-control" ng-model="form.email" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.email[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Fanpage Facebook</label>
                                <input class="form-control" ng-model="form.facebook" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.facebook[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Shopee</label>
                                <input class="form-control" ng-model="form.twitter" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Tiktok</label>
                                <input class="form-control" ng-model="form.instagram" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Youtube</label>
                                <input class="form-control" ng-model="form.youtube" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Link map</label>
                                <input class="form-control" ng-model="form.location" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.location[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Cấu hình chữ chạy top header (mỗi dòng cách nhau bởi dấu xuống dòng)</label>
                                <textarea id="my-textarea" class="form-control" ng-model="form.text_top_header" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.text_top_header[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Meta title</label>
                                <textarea id="my-textarea" class="form-control" ng-model="form.meta_title" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.meta_title[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Mô tả web</label>
                                <textarea id="my-textarea" class="form-control" ng-model="form.web_des" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.web_des[0] %></strong>
					</span>
                            </div>





                            <div class="bank-card">
                                <div class="bank-card__header">
                                    <span class="bank-card__title">Thông tin ngân hàng</span>
                                    <small class="text-muted">Dùng để nhận chuyển khoản</small>
                                </div>

                                <div class="bank-card__grid">
                                    <div class="form-group custom-group">
                                        <label class="form-label">Ngân hàng</label>
                                        <input class="form-control" ng-model="form.nganhang" type="text" placeholder="VD: Vietcombank">
                                    </div>

                                    <div class="form-group custom-group">
                                        <label class="form-label">Chủ tài khoản</label>
                                        <input class="form-control" ng-model="form.chutaikhoan" type="text" placeholder="VD: Nguyễn Văn A">
                                    </div>

                                    <div class="form-group custom-group">
                                        <label class="form-label">Số tài khoản</label>
                                        <input class="form-control" ng-model="form.sotaikhoan" type="text"
                                               inputmode="numeric" pattern="[0-9]*" placeholder="VD: 0123456789">
                                    </div>

                                    <div class="form-group custom-group">
                                        <label class="form-label">Chi nhánh</label>
                                        <input class="form-control" ng-model="form.chinhanh" type="text" placeholder="VD: CN Hà Nội">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div ng-show="activeLang==='en'">
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Tiêu đề website (EN)</label>
                                <input class="form-control" ng-model="form.web_title_en" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.web_title_en[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Tên công ty viết gọn (EN)</label>
                                <input class="form-control" ng-model="form.short_name_company_en" type="text">
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.short_name_company_en[0] %></strong>
					</span>
                            </div>


                            <div class="form-group custom-group">
                                <label class="form-label">Địa chỉ công ty (EN)</label>
                                <input class="form-control" ng-model="form.address_company_en" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Địa chỉ sản xuất (EN)</label>
                                <input class="form-control" ng-model="form.address_center_insurance_en" type="text">
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label">Mã số thuế (EN)</label>
                                <input class="form-control" ng-model="form.tax_code" type="text" disabled>
                            </div>



                            <div class="form-group custom-group">
                                <label class="form-label required-label">Cấu hình chữ chạy top header (mỗi dòng cách nhau bởi dấu xuống dòng) (EN)</label>
                                <textarea id="my-textarea" class="form-control" ng-model="form.text_top_header_en" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.text_top_header_en[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Meta title (EN)</label>
                                <textarea id="my-textarea" class="form-control" ng-model="form.meta_title_en" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.meta_title_en[0] %></strong>
					</span>
                            </div>
                            <div class="form-group custom-group">
                                <label class="form-label required-label">Mô tả web (EN)</label>
                                <textarea id="my-textarea" class="form-control" ng-model="form.web_des_en" rows="3"></textarea>
                                <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.web_des_en[0] %></strong>
					</span>
                            </div>
                        </div>
                    </div>
                </div>



			</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group text-center mb-4">
					<label class="form-label required-label">Logo</label>
					<div class="main-img-preview">
						<p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
						<img class="thumbnail img-preview" ng-src="<% form.image.path %>">
					</div>
					<div class="input-group" style="width: 100%; text-align: center">
						<div class="input-group-btn" style="margin: 0 auto">
							<div class="fileUpload fake-shadow cursor-pointer">
								<label class="mb-0" for="<% form.image.element_id %>">
									<i class="glyphicon glyphicon-upload"></i> Chọn ảnh
								</label>
								<input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
							</div>
						</div>
					</div>
					<span class="invalid-feedback d-block" role="alert">
						<strong><% errors.image[0] %></strong>
					</span>
				</div>

                <div style=""></div>

                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Favicon</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB, kích thước 16x16 </p>
                        <img class="thumbnail img-preview" ng-src="<% form.favicon.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.favicon.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.favicon.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.favicon[0] %></strong>
					</span>
                </div>


                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">QR thanh toán</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png </p>
                        <img class="thumbnail img-preview" ng-src="<% form.qr.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.qr.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.qr.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.qr[0] %></strong>
					</span>
                </div>

{{--                <div class="form-group text-center">--}}
{{--                    <label for="">Chứng nhận</label>--}}
{{--                    <div class="row gallery-area border">--}}
{{--                        <div class="col-md-4 p-2" ng-repeat="g in form.galleries">--}}
{{--                            <div class="gallery-item">--}}
{{--                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">--}}
{{--                                    <i class="fa fa-times mr-0"></i>--}}
{{--                                </button>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="img-chooser" title="Chọn ảnh">--}}
{{--                                        <label for="<% g.image.element_id %>">--}}
{{--                                            <img ng-src="<% g.image.path %>">--}}
{{--                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['galleries.' + $index + '.image_obj']">--}}
{{--                                <strong>--}}
{{--                                    <% errors['galleries.' + $index + '.image' ][0] %>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                    <span class="invalid-feedback">--}}
{{--                                <strong>--}}
{{--                                    <% errors['galleries.' + $index + '.image_obj' ][0] %>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 p-2">--}}
{{--                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="gallery-chooser">--}}
{{--                                <i class="fa fa-plus fa-2x text-secondary"></i>--}}
{{--                            </label>--}}
{{--                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser" multiple>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span class="invalid-feedback">--}}
{{--                <strong>--}}
{{--                    <% errors.galleries[0] %>--}}
{{--                </strong>--}}
{{--            </span>--}}
{{--                </div>--}}

			</div>
		</div>
	</div>
</div>
<hr>
<div class="text-right">
	<button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
		<i ng-if="!loading.submit" class="fa fa-save"></i>
		<i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
		Lưu
	</button>
</div>

<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }
</style>
