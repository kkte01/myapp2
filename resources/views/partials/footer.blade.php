{{--<footer>--}}
{{--    <p>저는 꼬리말입니다. 다른 뷰에서 저를 입양해 가요.</p>--}}
{{--</footer>--}}
{{--<!-- // 코드 5-14 resources/views/partials/footer.blade.php -->--}}
{{--@section('script')--}}
{{--    @parent--}}
{{--    <script>--}}
{{--        alert("저는 조각 뷰의 'script' 섹션입니다.");--}}
{{--    </script>--}}
{{--@endsection--}}
<!-- // 코드 5-15 resources/views/partials/footer.blade.php -->
@section('script')
    <script>
        alert("저는 조각 뷰의 'script' 섹션입니다.");
    </script>
    @parent
@endsection
