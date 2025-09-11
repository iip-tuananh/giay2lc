<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h6>Chính sách</h6>
            </div> --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8" ng-init="activeLang='vi'">
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
                                    <div class="form-group">
                                        <label class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" ng-model="form.title">

                                        <span class="invalid-feedback d-block" role="alert">
				        <strong><% errors.title[0] %></strong>
			        </span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                        <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.content"></textarea>
                                        <span class="invalid-feedback d-block" role="alert">
				                <strong><% errors.content[0] %></strong>
                            </span>
                                    </div>
                                </div>

                                <div ng-show="activeLang==='en'">
                                    <div class="form-group">
                                        <label class="form-label">Tiêu đề (EN)</label>
                                        <input type="text" class="form-control" ng-model="form.title_en">

                                        <span class="invalid-feedback d-block" role="alert">
				        <strong><% errors.title_en[0] %></strong>
			        </span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Nội dung (EN)</label>
                                        <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.content_en"></textarea>
                                        <span class="invalid-feedback d-block" role="alert">
				                <strong><% errors.content_en[0] %></strong>
                            </span>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Trạng thái</label>
                            <select class="form-control" ng-model="form.status">
                                <option ng-value="1" ng-selected="1 == form.status">Xuất bản</option>
                                <option ng-value="0" ng-selected="0 == form.status">Nháp</option>

                            </select>
                            <span class="invalid-feedback d-block" role="alert">
				        <strong><% errors.status[0] %></strong>
			        </span>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>


</div>
<hr>
<div class="text-right">
    <button type="submit" class="btn btn-success btn-cons" ng-click="submit(0)" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Lưu
    </button>
    <a href="{{ route('policies.index') }}" class="btn btn-danger btn-cons">
        <i class="fa fa-remove"></i> Hủy
    </a>
</div>
