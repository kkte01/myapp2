<!--HTML 주석 안에서 name을(를) 출력합니다.-->
{{--블레이드 주석 안에서 {{ $name }}을(를) 출력합니다.--}}
{{--<h1>Hello {{ $name }} {{ $greeting ?? '' }}</h1>--}}
{{--@if($itemCount = count($items))--}}
{{--    <p>{{ $itemCount }} 종류의 과일이 있습니다.</p>--}}
{{--@else--}}
{{--    <p>엥~ 아무것도 없는데요!</p>--}}
{{--@endif--}}
<!-- // 코드 5-6 resources/views/test.blade.php -->
{{--<ul>--}}
{{--    @foreach($items as $item)--}}
{{--        <li>{{ $item }}</li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
<!-- // 코드 5-7 resources/views/welcome.blade.php -->
{{--<?php $items = []; ?>--}}
{{--<ul>--}}
{{--    @forelse($items as $item)--}}
{{--        <li>{{ $item }}</li>--}}
{{--    @empty--}}
{{--        <li>엥~ 아무것도 없는데요!</li>--}}
{{--    @endforelse--}}
{{--</ul>--}}
{{--<!-- // 코드 5-9 resources/views/test.blade.php -->--}}
{{--@extends('layouts.master')--}}

{{--@section('content')--}}
{{--    <p>저는 자식 뷰의 'content' 섹션입니다.</p>--}}
{{--@endsection--}}
{{--<!-- // 코드 5-10 resources/views/test.blade.php -->--}}
{{--@extends('layouts.master')--}}

{{--@section('style')--}}
{{--    <style>--}}
{{--        body {background: green; color: white;}--}}
{{--    </style>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <p>저는 자식 뷰의 'content' 섹션입니다.</p>--}}
{{--    @include('partials.footer')--}}
{{--@endsection--}}

{{--@section('script')--}}
{{--    <script>--}}
{{--        alert("저는 자식 뷰의 'script' 섹션입니다.");--}}
{{--    </script>--}}
{{--@stop--}}
<!-- // 코드 5-13 resources/views/test.blade.php -->
@extends('layouts.master')

@section('content')
    @include('partials.footer')
@endsection

@section('script')
    <script>
        alert("저는 자식 뷰의 'script' 섹션입니다.");
    </script>
@endsection
