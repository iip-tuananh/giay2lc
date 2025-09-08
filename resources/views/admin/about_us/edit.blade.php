@extends('layouts.main')

@section('css')
@endsection

@section('title')
    Về chúng tôi
@endsection

@section('page_title')
    Về chúng tôi
@endsection


@section('content')
    <div ng-controller="AboutUs" ng-cloak>
        @include('admin.about_us.form')
    </div>
@endsection
@section('script')
    @include('admin.about_us.AboutUs')
    <script>
        app.controller('AboutUs', function($scope, $http) {
            $scope.form = new AboutUs(@json($object), {
                scope: $scope
            });
            $scope.loading = {};

            @include('admin.about_us.formJs')

            $scope.submit = function() {
                $scope.loading.submit = true;
                $.ajax({
                    type: 'POST',
                    url: "{!! route('about_us.update', $object->id) !!}",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: $scope.form.submit_data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $scope.errors = {};
                            // window.location.reload();
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                            // window.location.reload();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endsection
