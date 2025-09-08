<style>
    #myTab1 .nav-item.error {
        border-bottom: 2px solid #dc3545 !important;
    }

    #myTab1 .nav-item.error .nav-link {
        color: #dc3545 !important;
    }
</style>
<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item" ng-class="{'error': errors.home_title || errors.home_description || errors.home_image}">
        <a class="nav-link active" id="about-us-home-tab" data-toggle="tab" href="#about-us-home" role="tab"
            aria-controls="about-us-home" aria-selected="true">
            Giới thiệu (trang chủ)
        </a>
    </li>
    <li class="nav-item" ng-class="{'error': errors.youtube_link || errors.description || errors.content || errors.image}">
        <a class="nav-link" id="about-us-why-choose-tab" data-toggle="tab" href="#about-us-why-choose" role="tab"
            aria-controls="about-us-why-choose" aria-selected="true">
            Vì sao chọn (trang chủ)
        </a>
    </li>
    <li class="nav-item" ng-class="{'error': errors.youtube_link || errors.description || errors.content || errors.image}">
        <a class="nav-link" id="about-us-tab" data-toggle="tab" href="#about-us" role="tab"
            aria-controls="about-us" aria-selected="true">
            Trang chi tiết
        </a>
    </li>
    <li class="nav-item" ng-class="{'error': errors.image_mission || errors.mission}">
        <a class="nav-link" id="about-us-mission-tab" data-toggle="tab" href="#about-us-mission" role="tab"
            aria-controls="about-us-mission" aria-selected="true">
            Tầm nhìn
        </a>
    </li>
    <li class="nav-item"
        ng-class="{'error': errors.image_vision || errors.vision}">
        <a class="nav-link" id="about-us-vision-tab" data-toggle="tab" href="#about-us-vision"
            role="tab" aria-controls="about-us-vision" aria-selected="true">
            Sứ mệnh
        </a>
    </li>
    <li class="nav-item"
        ng-class="{'error': errors.image_core_values || errors.core_values}">
        <a class="nav-link" id="about-us-core-values-tab" data-toggle="tab" href="#about-us-core-values" role="tab"
            aria-controls="about-us-core-values" aria-selected="true">
            Giá trị cốt lõi
        </a>
    </li>
</ul>
<div class="tab-content" id="myTabContent1">
    <div class="tab-pane fade show active p-3" id="about-us-home" role="tabpanel" aria-labelledby="about-us-home-tab">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tiêu đề</label>
                    <input class="form-control" ng-model="form.home_title" type="text">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.home_title[0] %></strong>
                    </span>
                </div>
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nội dung</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.home_description" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.home_description[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh giới thiệu (trang chủ)</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.home_image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.home_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.home_image.element_id %>" type="file"
                                    class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.home_image[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="about-us-why-choose" role="tabpanel" aria-labelledby="about-us-why-choose-tab">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tiêu đề</label>
                    <input class="form-control" ng-model="form.home_why_choose_title" type="text">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.home_why_choose_title[0] %></strong>
                    </span>
                </div>
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nội dung ngắn gọn</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.home_why_choose_description" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.home_why_choose_description[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh giới thiệu chung</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.home_why_choose_image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.home_why_choose_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.home_why_choose_image.element_id %>" type="file"
                                    class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.home_why_choose_image[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info btn-sm float-left mb-3" ng-click="form.addWhyChooseCriteria()">
                    <i class="fa fa-plus"></i> Thêm tiêu chí
                </button>
            </div>
        </div>
        <div class="row mb-4" ng-repeat="(index, c) in form.why_choose_criterias">
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh tiêu chí</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% c.image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% c.image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% c.image.element_id %>" type="file"
                                    class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors['why_choose_criterias.' + index + '.image'][0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <input type="text" class="form-control" ng-model="c.title" placeholder="Tiêu đề <% index + 1 %>" style="display: inline-block; width: calc(100% - 70px);">
                <button style="width: 70px; height: calc(2.25rem + 2px) !important"  class="btn btn-danger btn-sm float-right" ng-click="form.removeWhyChooseCriteria(index)">
                    <i class="fa fa-times"></i> Xóa
                </button>
                <span class="invalid-feedback d-block" role="alert">
                    <strong><% errors['why_choose_criterias.' + index + '.title'][0] %></strong>
                </span>

                <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="c.content"
                    placeholder="Nội dung ảnh tiêu chí <% index + 1 %>"></textarea>
                <span class="invalid-feedback d-block" role="alert">
                    <strong>
                        <% errors['why_choose_criterias.' + index + '.content'][0] %>
                    </strong>
                </span>
            </div>

        </div>
    </div>
    <div class="tab-pane fade p-3" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Link giới thiệu chung (youtube)</label>
                    <input class="form-control" ng-model="form.youtube_link" type="text">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.youtube_link[0] %></strong>
                    </span>
                </div>
                <div class="form-group custom-group">
                    <label class="form-label required-label">Giới thiệu chung</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.description" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.description[0] %></strong>
                    </span>
                </div>
                <div class="form-group custom-group">
                    <label class="form-label required-label">Chi tiết</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.content" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.content[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh giới thiệu chung</label>
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
                                <input class="d-none" id="<% form.image.element_id %>" type="file"
                                    class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.image[0] %></strong>
                    </span>
                </div>

                <hr>
                <div class="form-group text-center">
                    <label for="">Ảnh chứng nhận</label>
                    <div class="row gallery-area border">
                        <div class="col-md-4 p-2" ng-repeat="g in form.galleries">
                            <div class="gallery-item">
                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">
                                    <i class="fa fa-times mr-0"></i>
                                </button>
                                <div class="form-group">
                                    <div class="img-chooser" title="Chọn ảnh">
                                        <label for="<% g.image.element_id %>">
                                            <img ng-src="<% g.image.path %>">
                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg"
                                                id="<% g.image.element_id %>">
                                        </label>
                                    </div>
                                    <span class="invalid-feedback d-block" role="alert"
                                        ng-if="!errors['galleries.' + $index + '.image_obj']">
                                        <strong>
                                            <% errors['galleries.' + $index + '.image' ][0] %>
                                        </strong>
                                    </span>
                                    <span class="invalid-feedback">
                                        <strong>
                                            <% errors['galleries.' + $index + '.image_obj' ][0] %>
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <label
                                class="gallery-item d-flex align-items-center justify-content-center cursor-pointer"
                                for="gallery-chooser">
                                <i class="fa fa-plus fa-2x text-secondary"></i>
                            </label>
                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser"
                                multiple>
                        </div>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            <% errors.galleries[0] %>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="about-us-mission" role="tabpanel" aria-labelledby="about-us-mission-tab">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nội dung</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.mission" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.mission[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh tầm nhìn</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.image_mission.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.image_mission.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.image_mission.element_id %>" type="file"
                                    class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.image_mission[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="about-us-vision" role="tabpanel"
        aria-labelledby="about-us-vision-tab">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nội dung</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.vision" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.vision[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh sứ mệnh</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.image_vision.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.social_responsibility_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.social_responsibility_image.element_id %>"
                                    type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.social_responsibility_image[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="about-us-core-values" role="tabpanel" aria-labelledby="about-us-core-values-tab">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nội dung</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.core_values" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.core_values[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh giá trị cốt lõi</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.image_core_values.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.image_core_values.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.image_core_values.element_id %>" type="file"
                                    class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.image_core_values[0] %></strong>
                    </span>
                </div>
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
